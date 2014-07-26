    <div class="container">
      <h1 class="page-header">Log masuk sistem</h1>
<?php
/*
switch($strLoginState) {
	case 1:
		$strLoginMsg="Anda telah dilog keluar. Log masuk sekali lagi untuk meneruskan.";
    $alertType="alert-success";
		break;
	case 2:
		$strLoginMsg="Sesi anda telah ditamatkan. Log masuk sekali lagi untuk meneruskan.";
    $alertType="alert-warning";
		break;
	case 3:
		$strLoginMsg="Nama pengguna atau kata laluan anda salah. Cuba lagi.";
    $alertType="alert-danger";
		break;
	case 4:
		$strLoginMsg="Kata laluan anda telah berjaya diubah. Sila log masuk untuk meneruskan.";
    $alertType="alert-info";
		break;
	default:
		*/
    $strLoginMsg="Sila log masuk untuk meneruskan."; 
    $alertType="alert-info";
    /*
		break;
}
*/
?>
      <div class="alert alert-dismissable <?php echo $alertType; ?>">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $strLoginMsg; ?>
      </div>
      <div class="well">
        <form id="login" method="post" action="<?php echo URL; ?>login/index">
          <div class="form-group">
            <label class="control-label">ID Login</label>
            <div class="controls">
              <input type="text" class="form-control" name="userlogin" />
            </div>
            <label class="control-label">Kata Laluan</label>
            <div class="controls">
              <input type="password" class="form-control col-xs-5" name="userpassword" />
            </div>
            <label class="control-label"> </label>
            <div class="controls">
              <button class="btn pull-right btn-primary" name="submit_login" type="submit">Log Masuk</button>
            </div>
         </div>
        </form>
      </div><!-- .well -->