<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="icon" type="image/png" href="<?=base_url()?>_assets/images/lock.png">
        <link href="<?=base_url()?>_assets/_bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="<?=base_url('_assets/sweetalert/sweetalert.min.js');?>"></script>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto" >
                    <div class="card" style="margin-top: 150px; width: 20rem;">
                        <div class="card-header">
                            <b>Silahkan Login....</b>
                        </div>
                        <div class="card-body">
                            <form class="form" method="post" action="<?=base_url('prosesMasuk')?>">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username .." name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password .." name="password" type="password" value="">
                                    </div>
                                    
                                    <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php echo $this->session->flashdata('message'); ?>

</html>

<!-- <div class="row">
                <div >
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Silahkan Login....</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-15S">
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <strong>Login Gagal !</strong> Username / Password Salah
                                    </div>
                                </div>
                            </div>
                            <form class="form" method="post" action="">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username .." name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password .." name="password" type="password" value="">
                                    </div>
                                    
                                    <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->