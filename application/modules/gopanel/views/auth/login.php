<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title><?=$title ?> | Gopanel | Login</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="/assets/gopanel/images/favicon.ico">
    <link href="/assets/gopanel/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/gopanel/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <!-- Notfication toastr -->
    <link href="/assets/gopanel/css/toastr.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/gopanel/css/loading.css" rel="stylesheet" type="text/css">
    <link href="/assets/gopanel/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/gopanel/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/gopanel/main/custom.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="loaddiv" style="display: none;">
         <div class="myloading">Yüklənir&#8230;</div>
        <div class="text-load"><h3>Yüklənir, gözləyin...</h3></div>
    </div>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page account-page-full">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="javascript:void(0)" class="logo"><img style="width: 100px;" src="/assets/gopanel/img/logo-dark.png"  alt="logo" ></a>
                </div>
                <div class="p-3">
                    <h4 class="font-18 m-b-5 text-center">Xoş Gəlmisiniz !</h4>
                    <p class="text-muted text-center"><b>Gopanel idarəetmə sisteminə</b>nə daxil olmaq üçün məlumatları daxil edin.</p>
                    <form class="form-horizontal m-t-30" action="auth/login_procces" id="login">
                        <div class="form-group">
                            <label for="username">İstifadəçi Adı</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="istifadəçi adınızı daxil edin">
                        </div>
                        <div class="form-group password-area">
                            <label for="userpassword">Şifrə</label>
                            <input type="password" class="form-control psw-input" id="userpassword" name="password" placeholder="Şifrənizi daxil edin">
                            <i toggle=".psw-input" id="show-password" class="far fa-eye"></i>
                        </div>
                        <div class="hiddeninputs">
                            <input type="hidden" name="token" value="<?=$token?>">
                        </div>
                        <div class="form-group row m-t-20">
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Məni Xatırla</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                    <i class="fas fa-sign-in-alt"></i> Daxil Ol
                                </button>
                            </div>
                        </div>
                        <!-- <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="javascript:void(0);">
                                    <i class="mdi mdi-lock"></i> Şifrəni unutmusan?
                                </a>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
        <div class="m-t-40 text-center">
            <p>© <?=date("Y") ?> by  Goweb Creative Agency</p>
            <!-- development by Goweb Creative Agency Oruc Seyidov -->
        </div>
    </div>
    <div class="bg-login"></div>
    <!-- end wrapper-page -->
    <!-- jQuery  -->
    <script src="/assets/gopanel/js/jquery.min.js"></script>
    <script src="/assets/gopanel/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/gopanel/js/metisMenu.min.js"></script>
    <script src="/assets/gopanel/js/jquery.slimscroll.js"></script>
    <script src="/assets/gopanel/js/waves.min.js"></script>
    <!-- Tostar Notification -->
    <script src="/assets/gopanel/js/toastr.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="/assets/gopanel/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <!-- App js -->
    <script src="/assets/gopanel/js/app.js"></script>
    <script src="/assets/gopanel/main/app.js"></script>
    <?php $this->load->view("blocks/flashdata"); ?>
</body>
</html>