<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Template &middot; Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">

  </head>

  <body>
  <nav class="navbar navbar-default navbar-static-top">
        <div class="container" id="navbar">
          <div class="navbar-header" id="logobar">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="#">iMath</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">DAFTAR/LOGIN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </div>
    </nav>

    <div class="container contents" id="loginbg">

      <!-- Jumbotron -->
      <!-- <div class="jumbotron">
        <h1>Marketing stuff!</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <a class="btn btn-large btn-success" href="#">Get started today</a>
      </div>
 -->
    <div class="container">
      <div class="row" id="formsignin">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="account-wall">
              <form class="form-signin" method="POST" action= <?php echo base_url()."autentikasi/login/" ?>
              <input type="text" name="username" class="form-control" placeholder="Username" required/>
              <input type="password" name="password" class="form-control" placeholder="Password" required/>
              <input type="submit" name="submit" value="Login" />
              <? php echo $this->session->flashdata('messageLogin'); ?>
              <a href = "<? php echo base_url()?>autentikasi/forget">Lupa Password?</a>
              <p>Kamu belum menjadi anggota? Yuk <a href = "<?php echo base_url()?>autentikasi/signup"> Daftar!</a></p>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
      <hr>

      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>
    </div>
</body>
</html>
