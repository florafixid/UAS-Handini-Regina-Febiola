<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container-fluid p-0">
        <div class="row no-gutters min-vh-100 justify-content-center align-items-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row no-gutters">

                            <!-- Sisi Kiri -->
                            <div class="col-lg-6 d-none d-lg-flex" style="background: linear-gradient(180deg, #4e73df 10%, #224abe 100%); min-height: 500px; align-items: center; justify-content: center; flex-direction: column;">
                                <div class="text-center text-white px-4">
                                    <i class="fas fa-shopping-cart fa-5x mb-4"></i>
                                    <h2 class="font-weight-bold">Sales Order App</h2>
                                    <p class="mt-3">Sistem manajemen pesanan penjualan<br>PT Maju Jaya</p>
                                </div>
                            </div>

                            <!-- Sisi Kanan (Form Login) -->
                            <div class="col-lg-6 d-flex align-items-center">
                                <div class="p-5 w-100">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <div class="alert alert-danger">
                                            <?= $this->session->flashdata('error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user" method="post" action="<?= site_url('login/proses');?>">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js');?>"></script>

</body>

</html>