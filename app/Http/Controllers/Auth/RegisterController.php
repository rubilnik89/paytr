<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Mail\ActivateAccount;
use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Psr7\Request as Guzzle_Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'required',
            'phone' => 'required|numeric|digits_between:2,20',
            'type' => 'required',
            'address' => 'required||max:255',
            'zip' => 'required|numeric|digits_between:2,20',
        ]);
    }

    public function showRegistrationForm()
    {
        $countries = Country::orderBy('name', 'asc')->get();
        return view('auth.register')->with(['countries' => $countries]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, $clientID)
    {
        $es = ['AT','BG','BE','GB','DE','HU','GR','IT','ES','DK','IE','LT','LV',
            'CY','MT','NL','LU','SI','SK','PL','FI','FR','PT','RO','HR','SE','EE'
        ];
        $currency =  ' €';
        if($data['country'] == 'CZ')
        {
            $price_group_id = PRICE_GROUP_ID_CZK_NDS;//10115
            if($data['type'] == 2){
                $price_group_id = PRICE_GROUP_ID_OPT_CZK_NDS;//10298
            }
            $currency = ' Kč';
        } else if(in_array($data['country'], $es))
        {
            $price_group_id = PRICE_GROUP_ID_EUR_NDS;//10422
            if($data['type'] == 2){
                if($data['vat_number']){
                    $price_group_id = PRICE_GROUP_ID_OPT_EUR_BEZ_NDS_NO_VAT;//10011
                } else
                {
                    $price_group_id = PRICE_GROUP_ID_OPT_EUR_NDS_VAT;//10506
                }
            }
        } else{
            $price_group_id = PRICE_GROUP_ID_EUR;//10114
            if($data['type'] == 2)
            {
                $price_group_id = PRICE_GROUP_ID_OPT_EUR;//10011
            }
        }


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => $data['type'],
            'reg_number' => $data['reg_number'] ?: null,
            'vat_number' => $data['vat_number'] ?: null,
            'address' => $data['address'],
            'zip' => $data['zip'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'paytraq_id' => $clientID,
            'currency' => $currency,
            'price_group_id' => $price_group_id
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all(), $this->paytraq_add_client($request))));

        Mail::to($user)->send(new ActivateAccount($user));
//        $this->guard()->login($user);
//
//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
        return redirect('/login')->with('message', 'confirm your email!');
    }

    public function paytraq_add_client(Request $request)
    {
        $api_key = env('API_KEY');
        $api_token = env('API_TOKEN');
        $headers = ['Content-Type' => 'text/xml'];
        $body = "<Client>
                   <Name>$request->name</Name>
                   <Email>$request->email</Email>
                   <Type>$request->type</Type>
                   <Status>$request->status</Status>
                   <RegNumber>$request->reg_number</RegNumber>
                   <VatNumber>$request->vat_number</VatNumber>
                   <LegalAddress>
                      <Address>$request->address</Address>
                      <Zip>$request->zip</Zip>
                      <Country>$request->country</Country>
                   </LegalAddress>
                   <Phone>$request->phone</Phone>
                   <ClientGroup>
                      <GroupID>$request->group_id</GroupID>
                   </ClientGroup>
                </Client>";
        $client = new Client();
        $req = new Guzzle_Request('POST', "https://go.paytraq.com/api/client?APIToken=$api_token&APIKey=$api_key", $headers, $body);
        $response = $client->send($req);
        $body = json_decode(json_encode(simplexml_load_string((string) $response->getBody()->read(1024))), true);

        return $body['ClientID'];
    }


    public function activation($userId, $token)
    {

        $user = User::findOrFail($userId);

        // Check token in user DB. if null then check data (user make first activation).
        if (is_null($user->remember_token)) {
            // Check token from url.
            if (md5($user->email) == $token) {
                // Change status and login user.
                $user->status = 1;
                $user->save();

                \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

                // Make login user.
                Auth::login($user, true);
            } else {
                // Wrong token.
                \Session::flash('flash_message_error', trans('interface.ActivatedWrong'));
            }
        } else {
            // User was activated early.
            \Session::flash('flash_message_error', trans('interface.ActivatedAlready'));
        }
        return redirect(route('main'));
    }
}
