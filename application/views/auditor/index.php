        <div class="col-md-9 content">
        <?php require ('application/views/_templates/logindisplay.php'); ?>
          <div class="row">
            <div class="col-xs-4"> </div>
            <div class="col-xs-4"> </div>
            <div class="col-xs-4"> </div>
          </div>
          <div class="row">
            <form method="post" action="<?php echo URL; ?>auditor/index2">
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
                <select name="judgeid" class="input-lg">
                  <option value="0">Semua Hakim</option>
                  <?php
                  foreach ($judges as $judge) {
                    $judgeUserID = $judge -> UserID;
                  ?>
                  <option value="<?php echo $judgeUserID; ?>"<?php if($selectedJudge == $judgeUserID) echo " selected='selected'" ?>><?php echo $judge -> UserName; ?></option>
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
          $flagPage = 1;
          require ('application/views/auditor/navtab.php');
          ?>
          <table class="table table-condensed table-hover table-striped">
            <thead>
              <tr class="text-center">
                <th rowspan="2">#</th>
                <th rowspan="2">Peserta</th>
                <th class="text-center" colspan="5">SOLO</th>
                <th class="text-center" colspan="5">DUET</th>
                <th class="text-center" rowspan="2">Jumlah</th>
                <th rowspan="2"> </th>
              </tr>
              <tr>
                <?php
                $percentages = $percentages_model->getPercentages("1");
                // element codes for kreatif
                foreach($percentages as $percentage) {
                  $elements = $elements_model->getElement($percentage -> ElementID);
                  $elementCode = $elements -> ElementCode;
                  echo "<th class='text-center'>" . $elementCode . "</th>\n";
                }
                // element codes for tradisi
                $percentages = $percentages_model->getPercentages("2");
                foreach($percentages as $percentage) {
                  $elements = $elements_model->getElement($percentage -> ElementID);
                  $elementCode = $elements -> ElementCode;
                  echo "<th class='text-center'>" . $elementCode . "</th>\n";
                }
                ?>
              </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach($schools as $school) {
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $school -> SchoolName; ?></td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm">
                </td>
                <td class="text-center">
                  <input type="text" class="form-control input-sm" disabled="disabled">
                </td>
                <td>
                  <button class="btn btn-primary btn-sm"<?php if($selectedJudge == 0) echo " disabled='disabled'"; ?>>ubah</button>
                </td>
              </tr>
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