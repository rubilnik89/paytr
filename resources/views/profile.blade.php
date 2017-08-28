<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body class="craft-body">
<link rel="stylesheet" href="css/bootstrap.css">
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
                            Username <img src="img/user.png" class="dropdown-menu_avatar" alt="">
                            <img src="img/arr-down.png" class="dropdown-menu_arrow" alt="">
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="">Профиль</a>
                            </li>
                            <li>
                                <a href="">Мои заказы</a>
                            </li>
                            <li>
                                <a href="">Брендирование</a>
                            </li>
                            <li>
                                <a href="">FAQ</a>
                            </li>
                            <li>
                                <button>Выйти</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="craft-profile">
        <div class="container">
            <h2 class="craft-inside_title">Profile</h2>
            <div class="row">
                <div class="col-sm-4 profile-img_block">

                    <div class="profile-img">
                        <img src="img/user-photo.png" alt="">
                    </div>

                    <label class="profile_upload-photo_label" for="profile_upload-photo">Update</label>
                    <input type="file" class="profile_upload-photo" id="profile_upload-photo">
                    
                </div>
                <div class="col-sm-8 registration_right-col">
                    <form action="">
                        <div class="inputs-blocks-margin">
                            <div class="input-block">
                                <label for="profile_input_name">Name</label>
                                <input type="text" class="profile_input_name" id="profile_input_name">
                            </div>
                            <div class="input-block">
                                <label for="profile_input_email">E-Mail Address</label>
                                <input type="text" class="profile_input_email" id="profile_input_email">
                            </div>
                        </div>

                        <div class="inputs-blocks-margin">
                            <div class="input-block">
                                <label for="profile_input_password">Password</label>
                                <input type="text" class="profile_input_password" id="profile_input_password">
                            </div>
                            <div class="input-block">
                                <label for="profile_input_confirm_password">Confirm Password</label>
                                <input type="text" class="profile_input_confirm_password" id="profile_input_confirm_password">
                            </div>
                        </div>

                        <div class="inputs-blocks-margin">
                            <div class="input-block">
                                <label for="profile_input_type">Type</label>
                                <div class="craft_select-wrapp">
                                    <select class="profile_input_name" id="profile_input_type">
                                        <option value=" " class="select-title"></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-block">
                                <label for="profile_input_reg_number">Reg number</label>
                                <input type="text" class="profile_input_reg_number" id="profile_input_reg_number">
                            </div>
                            <div class="input-block">
                                <label for="profile_input_vat_number">Vat number</label>
                                <input type="text" class="profile_input_vat_number" id="profile_input_vat_number">
                            </div>
                        </div>


                        <div class="input-block">
                            <label for="profile_input_country">Country</label>
                            <div class="craft_select-wrapp">
                                <select class="profile_input_country" id="profile_input_country">
                                    <option value=" " class="select-title"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-block">
                            <label for="profile_input_address">Address</label>
                            <input type="text" class="profile_input_address" id="profile_input_address">
                        </div>
                        <div class="input-block">
                            <label for="profile_input_zip">Zip</label>
                            <input type="text" class="profile_input_zip" id="profile_input_zip">
                        </div>
                        <div class="input-block">
                            <label for="profile_input_phone">Phone</label>
                            <input type="text" class="profile_input_phone" id="profile_input_phone">
                        </div>

                        <div>
                            <button class="registration_btn">Save</button>
                        </div>
                    </form>
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


<script src="js/jquery3.js"></script>
<script src="js/main.js"></script>
</body>
</html>