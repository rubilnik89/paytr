<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body class="craft-body">
<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/style.css">

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

                    <div class="dropdown-menu_block dropdown-menu_block_registration">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <a href="#" class="dropdown-toggle">
                                Login <img src="img/user.png" class="dropdown-menu_avatar" alt="">
                                <img src="img/arr-down.png" class="dropdown-menu_arrow" alt="">
                            </a>

                            <ul class="dropdown-menu dropdown-menu_registration">
                                <li>
                                    <input name="email" type="email" class="dropdown-menu_input" placeholder="E-mail">
                                </li>
                                <li>
                                    <input type="password" name="password" class="dropdown-menu_input" placeholder="Password">
                                </li>
                                <li>
                                    <button class="dropdown-menu_btn">Login</button>
                                    <a href="{{ route('password.request') }}" class="dropdown-menu_link">Forgot
                                        password?</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="craft-registration">
        <div class="container">
            <h2 class="craft-inside_title">Registration</h2>
            <div class="row">
                <form method="POST" class="registration_form" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="col-sm-6">
                        <div class="inputs-blocks-margin">
                            <div class="input-block">
                                <label for="registration_input_name">Name</label>
                                <input class="registration_input_name" id="registration_input_name" type="text"
                                       name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-block">
                                <label for="registration_input_email">E-Mail Address</label>

                                <input class="registration_input_email" id="registration_input_email" type="email"
                                       name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="inputs-blocks-margin">
                            <div class="input-block">
                                <label for="registration_input_password">Password</label>
                                <input class="registration_input_password" id="registration_input_password"
                                       type="password" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-block">
                                <label for="registration_input_confirm_password">Confirm Password</label>
                                <input class="registration_input_confirm_password" id="password-confirm" type="password"
                                       name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 registration_right-col">
                        <div class="inputs-blocks-margin">
                            <div class="input-block">
                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="registration_input_type">Type</label>

                                    <div class="craft_select-wrapp">
                                        <select id="type" class="registration_input_name" name="type" required
                                                autofocus>
                                            <option value="0" class="select-title"></option>
                                            <option value="1">Физ лицо</option>
                                            <option value="2">Юр лицо</option>
                                        </select>

                                        @if ($errors->has('type'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="input-block">
                                <div class="form-group{{ $errors->has('reg_number') ? ' has-error' : '' }}">
                                    <label for="registration_input_reg_number">Reg number</label>
                                    <input id="registration_input_reg_number" type="text"
                                           class="registration_input_reg_number" name="reg_number"
                                           value="{{ old('reg_number') }}">
                                    @if ($errors->has('reg_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reg_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="input-block">
                                <div class="form-group{{ $errors->has('vat_number') ? ' has-error' : '' }}">
                                    <label for="registration_input_vat_number">Vat number</label>
                                    <input id="registration_input_vat_number" type="text"
                                           class="registration_input_vat_number" name="vat_number"
                                           value="{{ old('vat_number') }}">

                                    @if ($errors->has('vat_number'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('vat_number') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="input-block">
                                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="registration_input_country">Country</label>
                                    <div class="craft_select-wrapp">
                                        <select id="registration_input_country" class="registration_input_country"
                                                name="country" required autofocus>
                                            <option value="0" class="select-title"></option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->country_id }}">
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="input-block">
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="registration_input_address">Address</label>
                                    <input id="registration_input_address" type="text"
                                           class="registration_input_address" name="address"
                                           value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="input-block">
                                <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                                    <label for="registration_input_zip">Zip</label>

                                    <input id="registration_input_zip" type="text" class="registration_input_zip"
                                           name="zip" value="{{ old('zip') }}" required>
                                    @if ($errors->has('zip'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('zip') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="input-block">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="registration_input_phone">Phone</label>
                                    <input id="registration_input_phone" type="text" class="registration_input_phone"
                                           name="phone" value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif

                                </div>


                            </div>
                        </div>
                    </div>


                    <div>
                        <button class="registration_btn">Registration</button>
                    </div>
                </form>
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


<script src="js/jquery3.js"></script>
<script src="js/main.js"></script>
</body>
</html>