<div class="col-md-9 content">        
        <?php require ('application/views/_templates/logindisplay.php'); ?>
  </p>        
  <h1 class="page-title">Panel Jadual Pertandingan</h1>
  <div class="row">          
  <ul class="nav nav-tabs">
      <li<?php if($strScheduleDay == 1) echo ' class="active"'; ?>>
        <a href="<?php echo URL; ?>admin/schedules/1">Malam 1</a>
      </li>
      <li<?php if($strScheduleDay == 2) echo ' class="active"'; ?>>
        <a href="<?php echo URL; ?>admin/schedules/2">Malam 2</a>
      </li>
      <li<?php if($strScheduleDay == 3) echo ' class="active"'; ?>>
        <a href="<?php echo URL; ?>admin/schedules/3">Malam 3</a>
      </li>
    </ul>
    <table class="table table-condensed table-hover table-striped">            
      <thead>              
        <tr class="text-center">                
          <th class="col-xs-1">Slot #</th>                
          <th>Peserta</th>                
          <th class="col-xs-2">Kategori</th>                                                                                         
          <th class="col-xs-2"> </th>              
        </tr>            
      </thead>            
      <tbody>                             
      <?php
      /** This table row displays a form to add schedules in the database
       */              
      ?>               
        <form action="<?php echo URL; ?>admin/addSchedule" method="POST">
          <input type="hidden" name="scheduleday" value="<?php echo $strScheduleDay; ?>" />              
          <tr>
            <td><input type="text" class="form-control input-sm" name="scheduleslot" placeholder="(no)"></td>
            <td>
              <select class="form-control input-sm" name="schoolid">
                <option>(pilih peserta)</option>
                <?php
                foreach ($schools as $school) {
                  echo "<option value='" . $school -> SchoolID . "'>" . $school -> SchoolName . "</option>\n";
                }
                ?>
              </select>
            </td>
            <td>
              <select class="form-control input-sm" name="categoryid">
                <option>(pilih kategori)</option>
                <?php
                foreach ($categories as $category) {
                  echo "<option value='" . $category -> CategoryID . "'>" . $category -> CategoryName . "</option>\n";
                }
                ?>
              </select>
            </td>
            <td><button class="btn btn-success btn-xs" name="submit_add_schedule">tambah</button></td>
          </tr>              
        </form>                             
        <?php
        /** This table row lists all schedules in the database
         * as well as form to edit/delete schedules              
         */              
        $schedules = $schedules_model->getSchedules($strScheduleDay);
        if($schedules !== false) {
          foreach ($schedules as $schedule) {
          ?>               
        <form action="<?php echo URL; ?>admin/updateSchedule" method="POST">                                                                     
          <input type="hidden" name="scheduleday" value="<?php echo $strScheduleDay; ?>" />              
          <input type="hidden" name="scheduleid" value="<?php if (isset($schedule->ScheduleID)) echo $schedule->ScheduleID; ?>">                   
          <tr>
            <td>
              <input type="text" class="form-control input-sm" name="scheduleslot" value="<?php echo $schedule -> ScheduleSlot; ?>" />
            </td>
            <td>                  
              <select class="form-control input-sm" name="schoolid">
                <?php
                foreach ($schools as $school) {
                  $strSchoolIDSchedule = $schedule -> SchoolID;
                  $strSchoolIDSchool = $school -> SchoolID;
                  echo '<option value="' . $strSchoolIDSchool . '"';
                  if ($strSchoolIDSchedule == $strSchoolIDSchool) echo " selected";
                  echo ">" . $school -> SchoolName . "</option>\n";
                }
                ?>
              </select>
            </td>                                                                                                                                               
            <td>                  
              <select class="form-control input-sm" name="categoryid">
                <?php
                foreach ($categories as $category) {
                  $strCategoryIDSchedule = $schedule -> CategoryID;
                  $strCategoryIDCategory = $category -> CategoryID;
                  echo '<option value="' . $strCategoryIDCategory . '"';
                  if ($strCategoryIDSchedule == $strCategoryIDCategory) echo " selected";
                  echo ">" . $category -> CategoryName . "</option>\n";
                }
                ?>
              </select>
            </td>                                                                                                                                               
            <td>                  
              <button type="submit" class="btn btn-primary btn-xs" name="submit_update_schedule">ubah</button>                  
              <a class="btn btn-danger btn-xs" data-href="<?php echo URL . 'admin/deleteSchedule/' . $schedule->ScheduleID; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">buang</a>
            </td>              
          </tr>              
        </form>              
          <?php
          }
        }
          ?>                           
      </tbody>          
    </table>          
  </div>        
</div>      
</div>    
<!-- modal to update delete -->    
<div class="modal fade" id="confirm-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">        
  <div class="modal-dialog modal-sm">            
    <div class="modal-content">                             
      <div class="modal-header">                    
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
        </button>                    
        <h4 class="modal-title" id="myModalLabel">Ubah rekod jadual</h4>                
      </div>                             
      <div class="modal-body">                    
        <p>Adakah anda pasti?
        </p>
      </div>                                 
      <div class="modal-footer">                    
        <a href="#" class="btn btn-danger danger">YA, SAYA PASTI</a>                    
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal
        </button>                
      </div>            
    </div>        
  </div>    
</div>         
<!-- modal to alert delete -->    
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">        
  <div class="modal-dialog modal-sm">            
    <div class="modal-content">                             
      <div class="modal-header">                    
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
        </button>                    
        <h4 class="modal-title" id="myModalLabel">Buang rekod jadual</h4>                
      </div>                             
      <div class="modal-body">                    
        <p>Adakah anda pasti?
        </p>
      </div>                                 
      <div class="modal-footer">                    
        <a href="#" class="btn btn-danger danger">YA, SAYA PASTI</a>                    
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal
        </button>                
      </div>            
    </div>        
  </div>    
</div>         
<style type="text/css">
.content {padding-right:10px;}     
</style>    
<script type="text/javascript">                       
/** still working on this
$('#confirm-update').on('show.bs.modal', function(e) {
  if($(this).find('.danger').attr('clicked','true')) { return true; } else { return false; }
  e.preventDefault();
})
*/
$('#confirm-delete').on('show.bs.modal', function(e) {
  $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
})
</script>