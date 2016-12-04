<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/style.css')?>" rel="stylesheet">
</head>
<body>
    <div class="col-md-4 col-md-offset-4 form-login">
        <div class="outter-form-login">
            <div class="logo-login">
                <em class="glyphicon glyphicon-user"></em>
            </div>
            <form action="<?php echo base_url('C_akses_bidan/login_bidan')?>" class="inner-login" method="post">
                <h3 class="text-center title-login">Login Bidan</h3>
                <?php if ($this->session->flashdata('pesan') <> '') { ?>
                    <center>
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </center>
                <?php } ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <input type="hidden" clas="form-control" name="status" value="0">
                </div>
                <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
                <div class="text-center forget">
                    <p>Lupa Password?</p>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
</body>
</html>
