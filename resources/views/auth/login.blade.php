
<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Oturum Aç - {{$system->site_name}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/metatige/metatige-vdark.png">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="/assets/libs/owl.carousel//assets/owl.carousel.min.css">

        <link rel="stylesheet" href="/assets/libs/owl.carousel//assets/owl.theme.default.min.css">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">

    </head>

    <body class="auth-body-bg">
        
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    
                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
    
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">
                                                    
                                                    <h4 class="p-4 bg-white"><i class="bx bxs-quote-alt-left text-primary h1 align-middle "></i><span class="text-primary">Erasmus</span> Proje Yönetim Paneli</h4>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index-2.html" class="d-block auth-logo">
                                            <img src="/assets/images/metatige/metatige-hdark.png" alt="" height="42" class="auth-logo-dark">
                                            <img src="/assets/images/logo-light.png" alt="" height="18" class="auth-logo-light">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        
                                        <div>
                                            <h5 class="text-primary">Hoşgeldin!</h5>
                                            <p class="text-muted">Devam edebilmek için oturum aç.</p>
                                        </div>
            
                                        <div class="mt-4">
                                            <form action="javascript:;">
                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">E-posta</label>
                                                    <input type="text" class="form-control" id="email" placeholder="E-posta adresini gir">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Şifre</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" placeholder="Şireni gir" aria-label="Password" aria-describedby="password-addon" id="password">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit" onclick="login()">Oturum Aç</button>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">Copyright © <script>document.write(new Date().getFullYear())</script> - <a href="https://metatige.com" target="_blank" class="">Metatige</a> <br> Tüm hakları saklıdır.</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>

        <script src="/assets/libs/toastr/build/toastr.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>
        <!-- owl.carousel js -->
        <script src="/assets/libs/owl.carousel/owl.carousel.min.js"></script>

        <!-- auth-2-carousel init -->
        <script src="/assets/js/pages/auth-2-carousel.init.js"></script>
        
        <!-- App js -->
        <script src="/assets/js/app.js"></script>

        <script>
            function login(){
                var email = $("#email").val();
                var password = $("#password").val();

                axios.post('/auth/login', {email:email, password:password}).then((res) => {
                    toastr[res.data.type](res.data.message);
                    if(res.data.status){
                        setInterval(() => {
                            window.location.assign('/');
                        }, 500);
                    }
                });
            }
        </script>

    </body>
</html>
