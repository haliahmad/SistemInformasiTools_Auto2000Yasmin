<?php 
$page_id = null;
$comp_model = new SharedController;
?>
<div class="py-5 mt-4">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 text-center">
                <div class="fadeIn animated mb-4">
                    <h2 class="text-uppercase font-weight-bold">Sistem Informasi Tools</h2>
                </div>
                <img src="assets/images/logo.png" alt="Logo" class="img-fluid" width="200" height="180">
            </div>
            <div class="col-md-5">
                <?php $this::display_page_errors(); ?>
                <div class="bg-light p-4 shadow rounded">
                    <h4 class="text-center"><i class="fa fa-key"></i> User Login</h4>
                    <hr>
                    <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation" method="post" novalidate>
                        <div class="form-group">
                            <label for="username">Username atau Email</label>
                            <div class="input-group">
                                <input id="username" placeholder="Masukkan Username atau Email" name="username" required class="form-control" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input id="password" placeholder="Masukkan Password" required name="password" class="form-control" type="password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div>
                                <label>
                                    <input type="checkbox" name="rememberme"> Ingat Saya
                                </label>
                            </div>
                            <div>
                                <a href="#">Lupa Password?</a>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block" type="submit">
                                <i class="fa fa-sign-in-alt"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
