<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>craft</title>
</head>
<body class="craft-body">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/lightbox.css">
<link rel="stylesheet" href="css/style.css">

<div class="craft-main-wrapp">
    <header class="craft-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="img/logo.png" alt="logo">
                </div>
                <div class="col-sm-6 header-right-col">
                    <ul class="change-lang">
                        <li class="active">
                            <a href="">CZ</a>
                        </li>
                        <li>
                            <a href="">EN</a>
                        </li>
                        <li>
                            <a href="">RU</a>
                        </li>
                    </ul>

                    <div class="dropdown-menu_block">
                        <a href="#" class="dropdown-toggle">
                            {{ Auth::user()->name }} <img src="img/user.png" class="dropdown-menu_avatar" alt="">
                            <img src="img/arr-down.png" class="dropdown-menu_arrow" alt="">
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="">Профиль</a>
                            </li>
                            <li>
                                <a href="{{ route('my_orders_links', $client_id) }}">Мои заказы</a>
                            </li>
                            <li>
                                <a href="">Брендирование</a>
                            </li>
                            <li>
                                <a href="">FAQ</a>
                            </li>
                            <li>
                                <form action="{{ url('/logout') }}" method="post">
                                    {{ csrf_field() }}
                                    <button>Выйти</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="craft-main-content">
        <div class="container">
            <div class="craft-main-content_top-row">
                <a href="{{ $active_product['image'] }}" data-lightbox="example-set" class="craft-main-content_top-row_photo photo">
                    <img src="{{ $active_product['image'] }}" alt="">
                </a>

                <div class="craft-main-content_top-row_description descr">
                    <h3 class="desription_product-title itemName">{{ $active_product['name'] }}</h3>
                    <div class="desription_product-blocks">
                        <div class="desription_product-block">
                            <div class="desription_product-block_title">Group:</div>
                            <div class="desription_product-block_value itemGroupName">{{ $active_product['group_name'] }}</div>
                        </div>
                        <div class="desription_product-block">
                            <div class="desription_product-block_title">Code (SKU):</div>
                            <div class="desription_product-block_value itemCode">{{ $active_product['code'] }}</div>
                        </div>
                        <div class="desription_product-block">
                            <div class="desription_product-block_title">Price:</div>
                            <div class="desription_product-block_value price itemPrice">{{ $active_product['price_id' . Auth::user()->price_group_id] . Auth::user()->currency}}</div>
                        </div>
                    </div>

                    <div class="desription_product-blocks">
                        <div class="desription_product-block">
                            <div class="desription_product-block_title">Material:</div>
                            <div class="desription_product-block_value">Leather</div>
                        </div>
                        <div class="desription_product-block">
                            <div class="desription_product-block_title">Size:</div>
                            <div class="desription_product-block_value">20x20x20</div>
                        </div>
                        <div class="desription_product-block">
                            <div class="desription_product-block_title">Manufacturer:</div>
                            <div class="desription_product-block_value">Chine</div>
                        </div>
                    </div>

                    <div class="desription_product-blocks">
                        <div class="desription_product-block">
                            <div class="desription_product-block_title">Brending:</div>
                            <div class="desription_product-block_value">Yes</div>
                        </div>
                    </div>

                    <div class="craft-main-content_top-row_descriptio_text">
                        <div class="desription_product-block_title">Description:</div>
                        <div class="itemDescr">{{ $active_product['description'] }}</div>

                        <span class="read-more">... <span>more</span></span>

                        <span class="descr-close">close</span>
                    </div>
                    <input class="itemId" type="hidden" value="{{ $active_product['item_id'] }}">
                    <table class="craft-main-content_top-row_description_table order2">
                        <tr class="table_header">
                            <td>Склад</td>
                            <td>Доступно</td>
                            <td>Доставка</td>
                            <td>Количество</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Прага</td>
                            <td class="itemQty">{{ $active_product['qty'] }} шт.</td>
                            <td>10 дней</td>
                            <td>
                                <input type="text" value="1" class="description_table_quantity editable_value10">
                            </td>
                            <td>
                                <div class="description_table_add_button add_button praha" data-id="amount_praha">{{ $active_product['qty'] == 0 ? 'Нет в наличии' : 'Добавить'}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Армения</td>
                            <td>1 000 000 шт.</td>
                            <td>30 дней</td>
                            <td>
                                <input type="text" value="1" class="description_table_quantity editable_value30">
                            </td>
                            <td>
                                <div class="add_button description_table_add_button armenia" data-id="amount_armenia">Добавить</div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="container craft-main-content_bottom-row">
            <div class="craft-main-content_bottom-row_kat">
                <h4 class="craft-main-content_bottom-row_title">Категории</h4>

                <div class="craft-main-content_bottom-row_kat_wrapp">
                    @foreach($product_groups as $index => $group)
                        <div id="{{ $group['group_id'] }}" class="craft-main-content_bottom-row_single-kat cat {{ $index == 0 ? 'active' : '' }}">{{ $group['group_name']}}</div>
                    @endforeach
                </div>
            </div>
            <div class="craft-main-content_bottom-row_products">
                <h4 class="craft-main-content_bottom-row_title">Товары</h4>
                <h4 class="craft-main-content_bottom-row_title">Цена</h4>

                <div class="craft-main-content_bottom-row_products_wrap" id="products">
                    @foreach($products as $index => $product)
                        <div id="{{ $product['item_id'] }}" class="craft-main-content_bottom-row_single-product product {{ $index == 0 ? 'active' : '' }}"
                             data-qty="{{ round($product['qty']) }}">{{ $product['name']}}
                            <span class="price">{{$product['price_id' . Auth::user()->price_group_id] . Auth::user()->currency}}</span>
                            <span class="hidden groupId">{{ $product['group_id'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="craft-main-content_bottom-row_order">
                <h4 class="craft-main-content_bottom-row_title">Заказ</h4>
                <div class="order-wrap hidden">
                    <table id="table_send" class="craft-main-content_bottom-row_order_table">
                        <tr class="table_header">
                            <td>ID</td>
                            <td>Наименование</td>
                            <td>Доставка</td>
                            <td>Цена</td>
                            <td>Количество</td>
                            <td>Сумма</td>
                            <td></td>
                        </tr>
                    </table>

                    <div class="total-sum_block">
                        <span class="total-sum_title">Total:</span>
                        <span id="total" class="total-sum_number">{{ Auth::user()->currency }}</span>
                        <div>
                            <a id="send_link" href="" class="total-sum_link">Оформить заказ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="craft-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="img/footer-logo.png" class="footer-logo" alt="">

                <div class="footer-info">
                    <div>Amikon Praha s.r.o.</div>
                    <div>Na belidle 302/27, 15000 Praha 5, Prague, Czech Republic</div>
                    <div>IC: 24661431</div>
                </div>
            </div>
            <div class="col-sm-6">
                <ul class="change-lang change-lang__footer">
                    <li class="active">
                        <a href="">CZ</a>
                    </li>
                    <li>
                        <a href="">EN</a>
                    </li>
                    <li>
                        <a href="">RU</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="overlay-for-description"></div>

<script src="js/jquery3.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/main.js"></script>


<script>
    $('.cat').click(function () {
        var thisId = $(this).attr('id');
        if($(this).hasClass('active'))
        {
            $(this).removeClass('active');
            for(var i = $('#products').children().length; i >= 0; i--)
            {
                var product_group_id = $('#products').children().eq(i).children('.groupId').text();
                if(product_group_id == thisId)
                {
                    $('#products').children().eq(i).remove();
                }
            }

        } else
        {
            $(this).addClass('active');
            $.ajax({
                method: 'GET',
                url: "/group_products/" + thisId,
                success: function (res) {
                    var price_id = 'price_id' + "{{ Auth::user()->price_group_id }}";

                    for (var i = 0; i < res.length; i++) {
                        $("#products").append('<div id="' + res[i].item_id + '" class="craft-main-content_bottom-row_single-product product"> ' + res[i].name +
                            '<span class="price">' + res[i][price_id] + "{{ Auth::user()->currency }}" + '</span>' +
                            '<span class="hidden groupId">' + res[i].group_id + '</span></div>');
                    }
                    $('.product').click(function () {
                        $('.craft-main-content_bottom-row_single-product').removeClass('active');
                        $(this).addClass('active');
                    });

                    $("#products").children().click(function () {
                        ShowProduct($(this));
                    });
                }
            });
            $(".craft-main-content_bottom-row_products_wrap").getNiceScroll().resize();
        }
    });

    $('.product').click(function () {
        $('.craft-main-content_bottom-row_single-product').removeClass('active');
        $(this).addClass('active');

        ShowProduct($(this));
    });

    var del_tr;
    function ShowProduct(self) {
        var thisId = self.attr('id');
        var qty = self.data('qty');
        $.ajax({
            method: 'GET',
            url: "/get_product/" + thisId,
            data: qty,
            success: function (res) {
                var priceIdNumber = 'price_id' + "{{ Auth::user()->price_group_id }}";
                var price = res[priceIdNumber];
                $(".descr .itemName").empty().text(res.name);
                $(".descr .itemGroupName").empty().text(res.group_name);
                $(".descr .itemDescr").empty().text(res.description);
                $(".descr .itemCode").empty().text(res.code);
                $(".descr .itemPrice").empty().text(price + ' ' + "{{ Auth::user()->currency }}");
                $(".descr .itemId").empty().val(res.item_id);
                $(".descr .itemName2").empty().val(res.name);
                $(".descr .itemQty").empty().text(res.qty + ' шт.');
                $(".descr .editable_value10").val('1');
                $(".descr .editable_value30").val('1');

                $(".photo").attr('href', res.image).empty().append('<img src=' + res.image + '>');
                //todo: если товара 0 то сделать неактивную кнопку добавить. Пока так.
                if((res.qty == 0) || (price == 0))
                {
                    $('.descr .praha').text('Нет в наличии')
                } else
                {
                    $('.descr .praha').text('Добавить')
                }
            }
        });
    }


    $(".add_button").click(function () {
        var itemQty = +$('.itemQty').text().substring($('.itemQty').text().lastIndexOf(' '), -1);
        var total = $('#total').text().substring($('#total').text().lastIndexOf(' '), -1);
        var currency = "{{ Auth::user()->currency }}";
        var country = $(this).data('id');
        var days = country == 'amount_armenia' ? 30 : 10;
        var amount = +$('.order2').find('.editable_value' + days).val();
        var itemId = $('.descr .itemId').val();
        var itemName = $('.descr .itemName').text();
        var itemPrice = $('.descr .itemPrice').text().substring($('.descr .itemPrice').text().lastIndexOf(' '), -1);

        if(itemPrice == 0)
        {
            alert('Товар нельзя заказать, т.к. не указана его стоимость, свяжитесь с администратором.');
            return false;
        }
        //если в инпуте стоит число больше чем доступно на складе
        if((+$('.editable_value10').val() > +itemQty) && (days == 10))
        {
            alert('В наличии нет столько товара');
            return false;
        }
        //если добавляем товар и в итоге в нижней таблице получается заказа больше чем в наличии.
        if(((+$('.editable_value10').val() + +$('.editable_value' + itemId + days).val()) > +itemQty) && (days == 10))
        {
            console.log('fre')
            alert('В наличии нет столько товара');
            return false;
        }
        $('.order-wrap').removeClass('hidden');
        if ($("tr").is('#order' + itemId) && ($('.days' + itemId + days).text().slice(0, -5) == days))//если такой элемент добавили с таким же кол-вом дней доставки
        {
            $('.days' + itemId + days).parent().find('.editable_value' + itemId + days).val((+$('.days' + itemId + days).parent().find('.editable_value' + itemId + days).val()) + +amount);//меняем количество товара
            $('.days' + itemId + days).parent().find('.cost' + itemId + days).text(+(+$('.days' + itemId + days).parent().find('.editable_value' + itemId + days).val() * +itemPrice).toFixed(2) + currency);//меняем сумму за товар с новым кол-вом
        } else {
            $('#table_send').append(
                '<tr id="order' + itemId + '"> ' +
                '<td>' + itemId + '</td> ' +
                '<td>' + itemName + '</td> ' +
                '<td class="days' + itemId + days + '">' + days + ' дней</td> ' +
                '<td>' + itemPrice + currency + '</td>' +
                '<td><input type="text" class="order_table_quantity editable_value' + itemId + days + '" value="' + amount + '" ></td>' +
                '<td class="cost2 cost' + itemId + days + '">' + +(itemPrice * amount).toFixed(2) + currency + '</td> ' +
                '<td onclick="del_tr($(this))"><div class="del del-btn"></div></td>' +
                '</tr>'
            );
            $('.editable_value' + itemId + days).on('keyup keydown change', function () {
                // максимально доступное кол-во на складе устанавливает если клиент хочет больше
                if(($(this).val() > itemQty) && (days == 10))
                {
                    alert('В наличии нет столько товара');
                    $(this).val(itemQty)
                }
                var parent = $(this).parent().parent();
                total = $('#total').text().substring($('#total').text().lastIndexOf(' '), -1);
                var middleSum = +total - +parent.find('.cost2').text().substring(parent.find('.cost2').text().lastIndexOf(' '), -1);

                parent.find('.cost2').text(+(+$(this).val() * +itemPrice).toFixed(2) + currency);

                if(+parent.find('.editable_value' + itemId + days).val() == 0)
                {
                    del_tr($(this).parent());
                    $('.order-wrap').addClass('hidden');
                }
                $('#total').text((+middleSum + +parent.find('.cost2').text().substring(parent.find('.cost2').text().lastIndexOf(' '), -1)) + currency);
            });
            $('.editable_value' + itemId + days)[0].onkeypress = function (e) {
                return numbersOnly(e);
            };
        }

        $('#total').text(parseFloat(+total + (+(itemPrice) * +(amount))).toFixed(2) + currency);

        del_tr = function (self) {
            var totalsum = $('#total').text().substring($('#total').text().lastIndexOf(' '), -1);
            var summaText = self.parent().find('.cost2').text();
            var summaNum = summaText.substring(summaText.lastIndexOf(' '), -1);
            $('#total').text(+totalsum - +summaNum + currency);
            self.parent().remove();
            if($('#total').text().substring($('#total').text().lastIndexOf(' '), -1) == 0)
            {
                $('.order-wrap').addClass('hidden');
            }
        };
    });

    $('#send_link').click(function (e) {
        e.preventDefault();
        var userGroup = "{{ Auth::user()->price_group_id }}";
        var total = $('#total').text().substring($('#total').text().lastIndexOf(' '), -1);

        if (((userGroup == 3) && (total < 1000)) || ((userGroup == 0) && (total < 25000))) {
            alert('Минимальный заказ 1000 евро или 25000 крон');// todo уточнить какой мин заказ для крон
            return false;
        }

        var tr = $('#table_send').find('tr');
        var arr_tr = [];
        var arr_td = [];
        var abc = {};

        for (var i = 0; i < tr.length; i++) {
            if (i == 0) continue;

            abc['id'] = tr.eq(i).children().eq(0).text();
            abc['name'] = tr.eq(i).children().eq(1).text();
            abc['days'] = tr.eq(i).children().eq(2).text();
            abc['price'] = tr.eq(i).children().eq(3).text().substring(tr.eq(i).children().eq(3).text().lastIndexOf(' '), -1);
            abc['amount'] = tr.eq(i).children().eq(4).children('input').val();
            abc['total_price'] = tr.eq(i).children().eq(5).text().substring(tr.eq(i).children().eq(5).text().lastIndexOf(' '), -1);

            arr_td.push(abc);
            abc = {};
        }
        arr_tr.push(arr_td);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: 'POST',
            url: "/order/{{ $client_id }}",
            data: {_token: CSRF_TOKEN, arr_tr: JSON.stringify(arr_tr)},
            dataType: 'JSON',
            success: function () {
                alert('sucsess')
            }
        })
    });

    function numbersOnly(e) {
        e = e || event;
        if (e.ctrlKey || e.altKey || e.metaKey) return;
        var chr = getChar(e);
        if (chr == null) return;
        if (chr < '0' || chr > '9') {
            return false;
        }
    }
    function getChar(event) {
        if (event.which == null) {
            if (event.keyCode < 32) return null;
            return String.fromCharCode(event.keyCode) // IE
        }

        if (event.which != 0 && event.charCode != 0) {
            if (event.which < 32) return null;
            return String.fromCharCode(event.which) // остальные
        }

        return null; // специальная клавиша
    }
    $('.editable_value10')[0].onkeypress = function (e) {return numbersOnly(e);};
    $('.editable_value30')[0].onkeypress = function (e) {return numbersOnly(e);};


</script>
</body>
</html>