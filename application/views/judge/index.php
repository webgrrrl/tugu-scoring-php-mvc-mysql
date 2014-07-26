    <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
          <h3>Selamat Datang Hakim: <strong><?php if(isset($_SESSION['UserName'])) echo $_SESSION['UserName']; ?></strong></h3>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h1>Panel Pemarkahan Malam <?php echo $daySwitch; ?></h1>
        </div>
        <div class="panel-body">
        <?php
        /** counttotalrows in databaseresult
         *  divide counttotalrows by 8 to get numberofrows for table
         */
        $countSchedules = count($schedules); // count how many records in db result
        $cellPerRow = 8; // the number of boxes per row of selection in the display
        $numRows = ceil($countSchedules/$cellPerRow); // count number or rows needed to generate in the display, round up if mod
        $modSchedule = $countSchedules % $cellPerRow; // if there's a mod, the last row displays only these many boxes
        $flagRow = 0; // this is the pointer for what row number the loop is currently in, starts with 0
        $flagRecord = 0; // this is the pointer for record number, starts with 0 because database count starts with 0
        while($flagRow < $numRows) { // if loop hasn't reached the last row
        ?>

          <div class="row clearfix">    
          
            <div class="col-xs-3">     
              <div class="col-xs-6">
                <a href="<?php echo URL . 'judge/mark/' . $schedules[$flagRecord] -> ScheduleID; /* link to the marking page based on record id */ ?>">
                <img src="<?php                  
                switch($schedules[$flagRecord] -> CategoryID){
                  case 1: $imgButton = 'solo'; break;
                  case 2: $imgButton = 'duet'; break;
                  case 3: $imgButton = 'kreatif'; break;
                  case 4: $imgButton = 'tradisi'; break;
                }
                echo URL . 'public/img/' . $imgButton . '.png';
                ?>" class="center-block" />
                <p><?php 
                  $schoolid = $schedules[$flagRecord] -> SchoolID;
                  $schools = $schools_model -> getSchoolByID($schoolid);
                  echo $schools -> SchoolName;
                  ++$flagRecord; 
                  ?></p>
                </a>
              </div>
              <div class="col-xs-6">
              <?php
              if($flagRecord < $countSchedules) {
              ?>
                <a href="<?php echo URL . 'judge/mark/' . $schedules[$flagRecord] -> ScheduleID; ?>">
                <img src="<?php                  
                switch($schedules[$flagRecord] -> CategoryID){
                  case 1: $imgButton = 'solo'; break;
                  case 2: $imgButton = 'duet'; break;
                  case 3: $imgButton = 'kreatif'; break;
                  case 4: $imgButton = 'tradisi'; break;
                }
                echo URL . 'public/img/' . $imgButton . '.png';
                ?>" class="center-block" />
                <p><?php 
                  $schoolid = $schedules[$flagRecord] -> SchoolID;
                  $schools = $schools_model -> getSchoolByID($schoolid);
                  echo $schools -> SchoolName;
                  ++$flagRecord; 
                  ?></p></a>
                  <?php
                  }
                  ?>
              </div>
            </div>
          
            <div class="col-xs-3">
              <div class="col-xs-6">
              <?php
              if($flagRecord < $countSchedules) {
              ?>
                <a href="<?php echo URL . 'judge/mark/' . $schedules[$flagRecord] -> ScheduleID; ?>">
                <img src="<?php                  
                switch($schedules[$flagRecord] -> CategoryID){
                  case 1: $imgButton = 'solo'; break;
                  case 2: $imgButton = 'duet'; break;
                  case 3: $imgButton = 'kreatif'; break;
                  case 4: $imgButton = 'tradisi'; break;
                }
                echo URL . 'public/img/' . $imgButton . '.png';
                ?>" class="center-block" />
                <p><?php 
                  $schoolid = $schedules[$flagRecord] -> SchoolID;
                  $schools = $schools_model -> getSchoolByID($schoolid);
                  echo $schools -> SchoolName;
                  ++$flagRecord; 
                  ?></p></a>
                  <?php
                  }
                  ?>
              </div>
              <div class="col-xs-6">
              <?php
              if($flagRecord < $countSchedules) {
              ?>
                <a href="<?php echo URL . 'judge/mark/' . $schedules[$flagRecord] -> ScheduleID; ?>">
                <img src="<?php                  
                switch($schedules[$flagRecord] -> CategoryID){
                  case 1: $imgButton = 'solo'; break;
                  case 2: $imgButton = 'duet'; break;
                  case 3: $imgButton = 'kreatif'; break;
                  case 4: $imgButton = 'tradisi'; break;
                }
                echo URL . 'public/img/' . $imgButton . '.png';
                ?>" class="center-block" />
                <p><?php 
                  $schoolid = $schedules[$flagRecord] -> SchoolID;
                  $schools = $schools_model -> getSchoolByID($schoolid);
                  echo $schools -> SchoolName;
                  ++$flagRecord; 
                  ?></p></a>
                  <?php
                  }
                  ?>
              </div>
            </div>
            
            <div class="col-xs-3">
              <div class="col-xs-6">
              <?php
              if($flagRecord < $countSchedules) {
              ?>
                <a href="<?php echo URL . 'judge/mark/' . $schedules[$flagRecord] -> ScheduleID; ?>">
                <img src="<?php                  
                switch($schedules[$flagRecord] -> CategoryID){
                  case 1: $imgButton = 'solo'; break;
                  case 2: $imgButton = 'duet'; break;
                  case 3: $imgButton = 'kreatif'; break;
                  case 4: $imgButton = 'tradisi'; break;
                }
                echo URL . 'public/img/' . $imgButton . '.png';
                ?>" class="center-block" />
                <p><?php 
                  $schoolid = $schedules[$flagRecord] -> SchoolID;
                  $schools = $schools_model -> getSchoolByID($schoolid);
                  echo $schools -> SchoolName;
                  ++$flagRecord; 
                  ?></p></a>
                  <?php
                  }
                  ?>
              </div>
              <div class="col-xs-6">
              <?php
              if($flagRecord < $countSchedules) {
              ?>
                <a href="<?php echo URL . 'judge/mark/' . $schedules[$flagRecord] -> ScheduleID; ?>">
                <img src="<?php                  
                switch($schedules[$flagRecord] -> CategoryID){
                  case 1: $imgButton = 'solo'; break;
                  case 2: $imgButton = 'duet'; break;
                  case 3: $imgButton = 'kreatif'; break;
                  case 4: $imgButton = 'tradisi'; break;
                }
                echo URL . 'public/img/' . $imgButton . '.png';
                ?>" class="center-block" />
                <p><?php 
                  $schoolid = $schedules[$flagRecord] -> SchoolID;
                  $schools = $schools_model -> getSchoolByID($schoolid);
                  echo $schools -> SchoolName;
                  ++$flagRecord; 
                  ?></p></a>
                  <?php
                  }
                  ?>
              </div>
            </div>
            
            <div class="col-xs-3">
              <div class="col-xs-6">
              <?php
              if($flagRecord < $countSchedules) {
              ?>
                <a href="<?php echo URL . 'judge/mark/' . $schedules[$flagRecord] -> ScheduleID; ?>">
                <img src="<?php                  
                switch($schedules[$flagRecord] -> CategoryID){
                  case 1: $imgButton = 'solo'; break;
                  case 2: $imgButton = 'duet'; break;
                  case 3: $imgButton = 'kreatif'; break;
                  case 4: $imgButton = 'tradisi'; break;
                }
                echo URL . 'public/img/' . $imgButton . '.png';
                ?>" class="center-block" />
                <p><?php 
                  $schoolid = $schedules[$flagRecord] -> SchoolID;
                  $schools = $schools_model -> getSchoolByID($schoolid);
                  echo $schools -> SchoolName;
                  ++$flagRecord; 
                  ?></p></a>
                  <?php
                  }
                  ?>
              </div>
              <div class="col-xs-6">
              <?php
              if($flagRecord < $countSchedules) {
              ?>
                <a href="<?php echo URL . 'judge/mark/' . $schedules[$flagRecord] -> ScheduleID; ?>">
                <img src="<?php                  
                switch($schedules[$flagRecord] -> CategoryID){
                  case 1: $imgButton = 'solo'; break;
                  case 2: $imgButton = 'duet'; break;
                  case 3: $imgButton = 'kreatif'; break;
                  case 4: $imgButton = 'tradisi'; break;
                }
                echo URL . 'public/img/' . $imgButton . '.png';
                ?>" class="center-block" />
                <p><?php 
                  $schoolid = $schedules[$flagRecord] -> SchoolID;
                  $schools = $schools_model -> getSchoolByID($schoolid);
                  echo $schools -> SchoolName;
                  ++$flagRecord; 
                  ?></p></a>
                  <?php
                  }
                  ?>
              </div>
            </div>
          </div>
          
          <?php
          ++$flagRow;
        }
        ?>
        
        </div>
        <div class="panel-footer"></div>
      </div>
    <style type="text/css">
    .row, .col-xs-6, .col-xs-3 {
      padding:0;
      margin:0;
    }
    .col-xs-6 img { width:75%;height:auto;overflow:hidden; }
    .col-xs-6 p {text-align:center;font-size:80%;}
    .col-xs-6 a:hover {text-decoration:none;font-weight:bold;}
    .col-xs-6:hover { background-color:#cccccc;text-decoration:none; }
    .col-xs-6:active { background-color:#ccccff;text-decoration:none; }
    </style>