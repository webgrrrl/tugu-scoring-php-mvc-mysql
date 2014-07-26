<?php 
session_start();
?>
<!doctype html>

<html>
  
  <head>
    <title>Sistem Pemarkahan Tugu Budaya</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/bootstrap/js/bootstrap.min.js"></script>
    <style>
    @media print {
      /* don't display the following when printing */
      .navigation, footer {
        display:none;
      }
      
    }
    </style>
  </head>
  
  <body>
    <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a href="." class="navbar-brand">Sistem Pemarkahan Tugu Budaya</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="<?php echo URL; ?>login/logout">Log Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
