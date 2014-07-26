    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h3>Peserta:<br /><strong><?php echo strtoupper($schools->SchoolName); ?></strong></h3>
        </div>
        <div class="col-md-3">
          <h3>Kategori:<br /><strong><?php echo strtoupper($categories->CategoryName); ?></strong></h3>
        </div>
        <div class="col-md-4">
          <h3>Juri: <strong><?php echo strtoupper($_SESSION['UserName']); ?></strong></h3>
          <h4>(<?php echo strtoupper($_SESSION['SchoolName']); ?>)</h4>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1>Borang Pemarkahan Juri</h1>
        </div>
        <div class="panel-body text-center">
          <form id="formAddMarks" action="<?php echo URL; ?>jury/addMarks" method="POST">
            <input type="hidden" name="scheduleid" value="<?php echo $scheduleid; ?>" />
            <input type="hidden" name="userid" value="<?php echo $_SESSION['UserID']; ?>" />
            <input type="hidden" name="schoolid" value="<?php echo $schools -> SchoolID; ?>" />
            <input type="hidden" name="categoryid" value="<?php echo $categories -> CategoryID; ?>" />
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-default btn-lg">
                <input type="radio" name="jurymarkpoints" value="10">
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <br />CEMERLANG
              </label>
              <label class="btn btn-default btn-lg">
                <input type="radio" name="jurymarkpoints" value="8">
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <br />SANGAT BAIK
              </label>
              <label class="btn btn-default btn-lg">
                <input type="radio" name="jurymarkpoints" value="6">
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <br />BAIK
              </label>
              <label class="btn btn-default btn-lg">
                <input type="radio" name="jurymarkpoints" value="4">
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <br />SEDERHANA
              </label>
              <label class="btn btn-default btn-lg">
                <input type="radio" name="jurymarkpoints" value="2">
                <img src='<?php echo URL; ?>public/img/gold_star.png' style="width:50px;height:50px;" />
                <br />LEMAH
              </button>
          </div>
        </div>
        <div class="panel-footer text-right">
          <button type="submit" name="submit_add_marks" class="btn btn-success">SIMPAN</button>
          <button type="reset" class="btn btn-danger">Batal</a>
        </div>
      </form>
    </div>
    <style type="text/css">
    .row { min-width:650px;}
    .content {padding-right:10px;}     
    </style>