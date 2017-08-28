<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as Guzzle_Request;
use GuzzleHttp\Psr7\Stream;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Psr\Http\Message\ResponseInterface;

class PaytraqController extends Controller
{
//    protected $group_ids = [
//        '020' => '2561',
//        '019' => '2562',
//        '012' => '2563',
//        '013' => '2564',
//        '001' => '2565',
//        '005' => '2567',
//        '008' => '2568',
//        '021' => '2569',
//        '046' => '2570',
//        '007' => '2571',
//        '015' => '2572',
//        '017' => '2573',
//        '038' => '2574',
//        '002' => '2575',
//        '010' => '2576',
//        '014' => '2577',
//        '003' => '2578',
//        '022' => '2579',
//        '009' => '2580',
//        '004' => '2581',
//        '016' => '2582',
//        '006' => '2583',
//    ];
    protected function client($url)
    {
        $api_key = env('API_KEY');
        $api_token = env('API_TOKEN');
        $client = new Client(['base_uri' => 'https://go.paytraq.com/api/']);
        $response = $client->get($url . "&APIToken=$api_token&APIKey=$api_key");

        return json_decode(json_encode(simplexml_load_string((string) $response->getBody()->read(1000000))), true);
    }
//    public function update_finans(Request $request)
//    {
//        $headers = ['Content-Type' => 'text/xml'];
//        $body = "<Client>
//                   <FinancialData>
//                      <ContractNumber>$request->contract_number</ContractNumber>
//                      <CreditLimit>$request->credit_limit</CreditLimit>
//                      <Deposit>$request->deposit</Deposit>
//                      <Discount>$request->discount</Discount>
//                      <PayTerm>
//                         <PayTermType>$request->pay_term_type</PayTermType>
//                         <PayTermDays>$request->pay_term_days</PayTermDays>
//                      </PayTerm>
//                      <TaxKeys>
//                         <Products>
//                            <TaxKeyID>$request->products_tax_key_id</TaxKeyID>
//                         </Products>
//                         <Services>
//                            <TaxKeyID>$request->services_tax_key_id</TaxKeyID>
//                         </Services>
//                      </TaxKeys>
//                      <Warehouse>
//                         <WrhID>$request->wrhID</WrhID>
//                      </Warehouse>
//                      <PriceGroup>
//                         <PriceGroupID>$request->price_group_id</PriceGroupID>
//                      </PriceGroup>
//                   </FinancialData>
//                </Client>";
//        $paytraq_id = Auth::user()->paytraq_id;
//        $api_key = env('API_KEY');
//        $api_token = env('API_TOKEN');
//        $client = new Client();
//        $req = new Guzzle_Request('POST', "https://go.paytraq.com/api/client/financialData/$paytraq_id?APIToken=$api_token&APIKey=$api_key", $headers, $body);
//        $response = $client->send($req);
//        $body = json_decode(json_encode(simplexml_load_string((string) $response->getBody()->read(1024))), true);
//
//        $user = User::where('paytraq_id', $paytraq_id)->update([
//            'contract_number' => $request->contract_number,
//            'credit_limit' => $request->credit_limit,
//            'deposit' => $request->deposit,
//            'discount' => $request->discount,
//            'pay_term_type' => $request->pay_term_type,
//            'pay_term_days' => $request->pay_term_days,
//            'products_tax_key_id' => $request->products_tax_key_id,
//            'services_tax_key_id' => $request->services_tax_key_id,
//            'wrhID' => $request->wrhID,
//            'price_group_id' => $request->price_group_id,
//        ]);
//        return redirect(route('main'));
//    }








    public function order($id, Request $request)
    {
        $taxKeyId = 82875;
        $price_group_id = Auth::user()->price_group_id;
        $currency = 'EUR';
        if(($price_group_id == 10115) || ($price_group_id == 10298))
        {
            $currency = 'CZK';
        }
        if(($price_group_id == 10011) || ($price_group_id == 10505))
        {
            $taxKeyId = 82612;
        }
        $api_key = env('API_KEY');
        $api_token = env('API_TOKEN');
        $data = json_decode($request->arr_tr);
        $item = '';
        foreach ($data[0] as $order)
        {
            $item .= "<LineItem>
                         <Item>
                            <ItemID>$order->id</ItemID>
                         </Item>
                         <Qty>$order->amount</Qty>
                         <Price>$order->price</Price>
                         <TaxKey>
                            <TaxKeyID>$taxKeyId</TaxKeyID>
                        </TaxKey>
                      </LineItem>";
        }
        $headers = ['Content-Type' => 'text/xml'];
        $body = "<Sale>
                   <Header>
                      <Document>
                         <DocumentDate></DocumentDate>
                         <Client>
                            <ClientID>$id</ClientID>
                         </Client>
                      </Document>
                      <SaleType>sales_order</SaleType>
                      <Operation>sell_goods</Operation>
                      <Currency>$currency</Currency>
                   </Header>
                   <LineItems>
                         $item
                   </LineItems>
                </Sale>";
        $client = new Client();
        $req = new Guzzle_Request('POST', "https://go.paytraq.com/api/sale?APIToken=$api_token&APIKey=$api_key", $headers, $body);
        $response = $client->send($req);
        $body = json_decode(json_encode(simplexml_load_string((string) $response->getBody()->read(1024))), true);


        Order::create([
            'paytraq_id' => $id,
            'data' => json_encode($request->arr_tr),
            'document_id' => $body['DocumentID']
        ]);

        $user = Auth::user();
        Mail::send('emails.order',['data' => $data[0]], function ($message) use ($user){
            $message->to($user->email);
        });
        Mail::send('emails.order_admin',['user_email' => $user->email], function ($message) use ($user){
            $message->to('info@support.me');
        });

        $response = array(
            'status' => 'success',
        );
        return response()->json($response);

    }

    public function my_orders_links($id)
    {
//        Auth::logout(Auth::user());
        $order_links = Order::select('document_id')->where('paytraq_id', $id)->get();
        $links = [];
        foreach ($order_links as $link)
        {
            $document_id = $link['document_id'];
            $url = "saleLink/$document_id?";
            $links[] = ['link' => $this->client($url), 'document_id' => $document_id];
        }
        return view('my_orders', compact('links'));
    }

    public function my_orders_pdf($id)
    {
        $url = "salePDF/$id?";
        $api_key = env('API_KEY');
        $api_token = env('API_TOKEN');
        $client = new Client(['base_uri' => 'https://go.paytraq.com/api/']);
        $response = $client->get($url . "&APIToken=$api_token&APIKey=$api_key");
        $stream = $response->getBody()->getContents();

        $filename = 'test.pdf';
        $path = storage_path($stream);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);



        dd($stream);

        return view('my_orders', compact('links'));
    }

    public function profile()
    {
        return view('profile');
    }


    ////// API

//    public function main()
//    {
//        $product_groups = $this->get_product_groups();
//        $products = $this->get_products_by_group();
//        $client_id = Auth::user()->paytraq_id;
//        return view('main', compact('product_groups', 'products', 'client_id'));
//    }
//
//    public function get_product($product_id)
//    {
//        $api_key = env('API_KEY');
//        $api_token = env('API_TOKEN');
//        $url = "product/$product_id?";
//        $product = $this->client($url);
//        $product['PriceGroupId'] = Auth::user()->price_group_id;
//
//        if($product['HasImage'] == 'true')
//        {
//            $image_url = "productImage/" . $product['ItemID'] . "?";
//            $client = new Client(['base_uri' => 'https://go.paytraq.com/api/']);
//            $response = $client->get($image_url . "&APIToken=$api_token&APIKey=$api_key");
//            $product['image'] = base64_encode($response->getBody()->read(700000));
//        }
//
//        return $product;
//    }
//
//    protected function get_product_groups()
//    {
//        $url = "productGroups?";
//        return $this->client($url);
//    }
//
//    public function get_products_by_group($group_id = null)
//    {
//        if(!$group_id)
//        {
//            $page = 0;
//            $url = "products?page=$page";
//            $all_products = $this->client($url);
//            while(count($all_products['Product']) % 100 == 0)
//            {
//                ++$page;
//                $url = "products?page=$page";
//                $products = $this->client($url)['Product'];
//                foreach ($products as $product)
//                {
//                    array_push($all_products['Product'], $product);
//                }
//            }
//            return $all_products;
//        } else {
//            $sku = array_search($group_id, $this->group_ids);
//            $url = "products?query=$sku";
//            $all_products_sku = $this->client($url);
//            $group_products['Product'] = [];
//            foreach ($all_products_sku['Product'] as $product)
//            {
//                if ($product['Group']['GroupID'] == $group_id)
//                {
//                    $group_products['Product'][] = $product;
//                }
//            }
//            return $group_products;
//        }
//    }

///////EndAPI

//DB!!!!!

    public function main()
    {
        $product_groups = Category::select('group_id', 'group_name')->get();
        $group_ids = [];
        foreach ($product_groups as $item)
        {
            array_push($group_ids, $item['group_id']);
        }
        $products_distinct = Product::distinct()->get(['group_id']);
        $arr = [];
        foreach ($products_distinct as $item)
        {
            array_push($arr, $item['group_id']);
        }
        $product_groups = Category::whereIn('group_id', $arr)->get();
        $active_group_id = $product_groups[0]['group_id'];
        $active_product = Product::where('group_id', $active_group_id)->first();
        $active_product['group_name'] = Category::where('group_id', $active_product['group_id'])->first()['group_name'];
        $products = Product::where('group_id', $active_group_id)->get();
        $client_id = Auth::user()->paytraq_id;
        return view('main', compact('product_groups', 'products', 'client_id', 'active_group_id', 'active_product'));
    }

    public function get_product($product_id)
    {
        $product = Product::where('item_id', $product_id)->first();
        $product['group_name'] = Category::where('group_id', $product['group_id'])->first()['group_name'];
        $product['PriceGroupId'] = Auth::user()->price_group_id;
        return $product;
    }

    public function get_products_by_group($group_id)
    {
        $group_products = Product::where('group_id', $group_id)->get();
        return $group_products;
    }

////////end DB


//////FILLS
    public function fill_products()
    {
        $this->fill_categories();
        $products = $this->get_products_by_group();
        set_time_limit(0);
        foreach ($products['Product'] as $index => $product)
        {
            $image = asset('no_image.png');
            if($product['HasImage'] == 'true')
            {
                $api_key = env('API_KEY');
                $api_token = env('API_TOKEN');
                $image_url = "productImage/" . $product['ItemID'] . "?";
                $client = new Client(['base_uri' => 'https://go.paytraq.com/api/']);
                $response = $client->get($image_url . "&APIToken=$api_token&APIKey=$api_key");
                $image = 'data:image/jpg;charset=utf8;base64,' . base64_encode($response->getBody()->read(700000));
            }

            Product::create([
                'item_id' => $product['ItemID'],
                'name' => $product['Name'],
                'code' => $product['Code'],
                'unit_name' => $product['Unit']['UnitName'],
                'description' => $product['Description'] != [] ? $product['Description'] : '',
                'has_image' => $product['HasImage'],
                'image' => $image,
                'weight' => $product['Weight'] != [] ? $product['Weight'] : 0,
                'group_id' => $product['Group']['GroupID'],
                'qty' => $product['Inventory']['Qty'],
            ]);
        }
        $this->fill_prices();
    }

    protected function fill_categories()
    {
        $product_groups = $this->get_product_groups();
        foreach ($product_groups['Group'] as $product_group)
        {
            Category::create([
                'group_id' => $product_group['GroupID'],
                'group_name' => $product_group['GroupName']
            ]);
        }
    }

    protected function fill_prices()
    {
        $prices = [10422,10506,10115,10298,10505,10011];
        set_time_limit(0);
        foreach ($prices as $price)
        {
            $page = 0;
            $tax = 'PriceIncTax';
            if(($price == 10505) || ($price == 10011))
            {
                $tax = 'PriceExclTax';
            }
            $body_count = 0;
            while (($body_count % 100) == 0)
            {
                $url = "productPriceList/$price?page=$page";
                $body = $this->client($url);
                foreach ($body['Product'] as $product)
                {
                    Product::where('item_id' , $product['ItemID'])->update(['price_id'.$price => $product['Price'][$tax]]);
                }
                $page++;
                $body_count += count($body['Product']);
            }
        }
    }

    public function fill_qty()
    {
        $page = 0;
        $qtys_count = 0;
        while (($qtys_count % 100) == 0)
        {
            $url = "currentInventory/1531?page=$page";
            $qtys = $this->client($url);
//            dd($qtys);
//            if($page == 1) dd($qtys);

            foreach ($qtys['LineItem'] as $qty)
            {
                Product::where('item_id', $qty["ItemID"])->update([
                    'qty' => $qty['Qty']
                ]);
            }
            $page++;
            $qtys_count += count($qtys['LineItem']);
        }
    }
//////END FILLS
}