<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset = utf-8>
    <meta content = "IE=edge" http-equiv = X-UA-Compatible>
    <meta content = "width=device-width,initial-scale=1" name = viewport>
    <meta name = "description" content = ""> 
    <meta name = "author" content = "">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('dist/styles/main.css');?>">
    <script type="text/javascript">
      var BASE_URL = "<?php echo base_url();?>";
      var CSRF_NAME = "<?php echo $this->security->get_csrf_token_name(); ?>";
      var CSRF_VALUE= '<?php echo $this->security->get_csrf_hash(); ?>';
    </script>
  </head>
  <body>
    <section class="header-top hidden-xs">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <ul class="social-media social-media-header list-unstyled list-inline">
          <li><a href="<?php echo $general['link_twitter'] ;?>"><i class="fa fa-twitter"></i></a></li>
          <li><a href="<?php echo $general['link_instagram'] ;?>"><i class="fa fa-instagram"></i></a></li>
          <li><a href="<?php echo $general['link_gplus'] ;?>"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="<?php echo $general['link_youtube'] ;?>"><i class="fa fa-youtube"></i></a></li>
        </ul>
        <ul class="top-info list-unstyled list-inline hidden-sm">
          <li><a href=""><i class="fa fa-envelope"></i> <span><?php echo $general['email'] ;?></span></a></li>
          <li><a href=""><i class="fa fa-phone"></i> <span><?php echo $general['phone'] ;?></span></a></li>
        </ul>
      </div>
      <div class="col-md-6 text-right">
        <select name="languange" class="select2">
          <option value="">English</option>
          <option value="">Indonesia</option>
        </select>
        <button type="button" data-url="/ajax-popup/login" class="btn btn-primary btn-sm user-top-btn wcifx-popup" data-modal="#loginModal">Login</button>
        <button type="button" data-url="/ajax-popup/register" class="btn btn-primary btn-sm user-top-btn wcifx-popup" data-modal="#regModal">Register</button>
      </div>
    </div>
  </div>
</section>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">
        <img alt="Brand" src="<?php echo site_url("dist/images/logo.png"); ?>">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php echo $primary_menu;?>
    </div>
  </div>
</nav>