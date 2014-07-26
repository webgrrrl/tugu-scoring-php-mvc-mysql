        <div class="col-md-9 content">
        <?php require ('application/views/_templates/logindisplay.php'); ?>
          <div class="row">
            <div class="col-xs-4"> </div>
            <div class="col-xs-4"> </div>
            <div class="col-xs-4"> </div>
          </div>
          <div class="row">
            <form method="post" action="<?php echo URL; ?>auditor/index3">
              <h1 class="page-title">Pengesahan Markah
                <select name="schoollevel" class="input-lg" >
                <?php
                $schools = $schools_model->getSchoolsByLevel($selectedLevel);
                ?>
                  <option value="0"<?php if($selectedLevel == "0") echo " selected='selected'" ?>>Semua Tahap</option>
                  <option value="SM"<?php if($selectedLevel == "SM") echo " selected='selected'" ?>>Sek. Menengah</option>
                  <option value="SR"<?php if($selectedLevel == "SR") echo " selected='selected'" ?>>Sek. Rendah</option>
                </select>
                oleh
                <select name="juryid" class="input-lg">
                  <option value="0">Semua Juri</option>
                  <?php
                  foreach ($juries as $jury) {
                    $juryUserID = $jury -> UserID;
                  ?>
                  <option value="<?php echo $juryUserID; ?>"<?php if($selectedJury == $juryUserID) echo " selected='selected'" ?>><?php echo $jury -> UserName; ?></option>
                  <?php
                  }
                  ?>
                </select>
                <button type="submit" name="submit_filter_view" class="btn btn-primary btn-lg">>></button>
              </h1>
            </form>
          <?php
          /** just so that the tabs are colored
           *  refer to nav tabs below          
          */
          $flagPage = 3;
          require ('application/views/auditor/navtab.php');
          ?>
          <table class="table table-condensed table-hover table-striped">
            <thead>
              <tr class="text-center">
                <th>#</th>
                <th>Peserta / Sekolah</th>
                <?php
                foreach($categories as $category) {
                  echo "<th>" . $category -> CategoryName . "</th>\n";
                }
                ?>
                <th class="text-center">Jumlah</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach($schools as $school) {
              $totalScore = 0;
              $schoolid =  $school -> SchoolID;
            ?>
            <form method="post" action="<?php echo URL; ?>auditor/updateMarks">
              <input type="hidden" name="userid" value="<?php echo $selectedJury; ?>">
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $school -> SchoolName; ?></td>
                <td class="text-center col-xs-1">
                  <?php
                  $categoryid = 1;
                  $score = 0;
                  if($selectedJury != "0") {
                    $jurymarks = $jurymarks_model->getMarksAudit($selectedJury, $schoolid, $categoryid);
                    if($jurymarks) { $score = $jurymarks -> JurymarkPoints; }
                  } else {
                    $jurymarks = $jurymarks_model->getAllMarksAudit($schoolid, $categoryid);
                    $checkMark = $jurymarks -> TotalPoints;
                    if($checkMark !=0) { $score = $checkMark; }
                  }  
                  $totalScore = $totalScore + $score;
                  ?>
                  <input type="text" name="category<?php echo categoryid; ?>" class="form-control input-sm text-center" value="<?php echo $score; ?>" />
                </td>
                <td class="text-center col-xs-1">
                  <input type="text" name="total" class="form-control input-sm" value="<?php
                  echo $totalScore;
                  ?>" />
                </td>
                <td class="text-center col-xs-1">
                <?php
                  $categoryid = 2;
                  $score = 0;
                  if($selectedJury != "0") {
                    $jurymarks = $jurymarks_model->getMarksAudit($selectedJury, $schoolid, $categoryid);
                    if($jurymarks) { $score = $jurymarks -> JurymarkPoints; }
                  } else {
                    $jurymarks = $jurymarks_model->getAllMarksAudit($schoolid, $categoryid);
                    $checkMark = $jurymarks -> TotalPoints;
                    if($checkMark !=0) { $score = $checkMark; }
                  }  
                  $totalScore = $totalScore + $score;
                  ?>
                  <input type="text" name="category<?php echo categoryid; ?>" class="form-control input-sm text-center" value="<?php echo $score; ?>" />
                </td>
                <td class="text-center col-xs-1">
                  <input type="text" name="total" class="form-control input-sm" value="<?php
                  echo $totalScore;
                  ?>" />
                </td>
                <td class="text-center col-xs-1">
                <?php
                  $categoryid = 3;
                  $score = 0;
                  if($selectedJury != "0") {
                    $jurymarks = $jurymarks_model->getMarksAudit($selectedJury, $schoolid, $categoryid);
                    if($jurymarks) { $score = $jurymarks -> JurymarkPoints; }
                  } else {
                    $jurymarks = $jurymarks_model->getAllMarksAudit($schoolid, $categoryid);
                    $checkMark = $jurymarks -> TotalPoints;
                    if($checkMark !=0) { $score = $checkMark; }
                  }  
                  $totalScore = $totalScore + $score;
                  ?>
                  <input type="text" name="category<?php echo categoryid; ?>" class="form-control input-sm text-center" value="<?php echo $score; ?>" />
                </td>
                <td class="text-center col-xs-1">
                  <input type="text" class="form-control input-sm text-center" value="<?php
                  $categoryid = 4;
                  $score = 0;
                  if($selectedJury != "0") {
                    $jurymarks = $jurymarks_model->getMarksAudit($selectedJury, $schoolid, $categoryid);
                    if($jurymarks) { $score = $jurymarks -> JurymarkPoints; }
                  } else {
                    $jurymarks = $jurymarks_model->getAllMarksAudit($schoolid, $categoryid);
                    $checkMark = $jurymarks -> TotalPoints;
                    if($checkMark !=0) { $score = $checkMark; }
                  }  
                  $totalScore = $totalScore + $score;
                  ?>" />
                </td>
                <td class="text-center col-xs-1">
                  <input type="text" name="total" class="form-control input-sm" disabled="disabled" value="<?php
                  echo $totalScore;
                  ?>" />
                </td>
                <td>
                  <button type="submit" name="submit_update_marks" class="btn btn-primary btn-sm"<?php if($selectedJury == 0) echo " disabled='disabled'"; ?>>ubah</button>
                </td>
              </tr>
            </form>
            <?php
              ++$i;
            }
            ?>
                          
            </tbody>
          </table>

          </div>
        </div>
      </div>
    <!-- /div -->
    <style type="text/css">
      .content {padding-right:10px;}
      .table {margin:0px;padding:0px;}
    </style>