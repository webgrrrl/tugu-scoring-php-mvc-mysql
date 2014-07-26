<div class="col-md-9 content">        
        <?php require ('application/views/_templates/logindisplay.php'); ?>
  </p>        
  <h1 class="page-title">Senarai Peserta Sekolah</h1>          
  <div class="row">          
    <table class="table table-condensed table-hover table-striped">            
      <thead>              
        <tr class="text-center">                
          <th class="col-xs-1">#
          </th>                
          <th>Peserta
          </th>                
          <th>Tahap
          </th>                
          <th class="col-xs-2"> 
          </th>              
        </tr>            
      </thead>            
      <tbody>                             
      <?php
      /** This table row displays a form to add school in the database
       */              
      ?>               
        <form action="<?php echo URL; ?>admin/addSchool" method="POST">              
          <tr>
            <td> </td>
            <td><input type="text" class="form-control input-sm" name="schoolname" placeholder="(nama sekolah)"></td>
            <td>
              <select class="form-control input-sm" name="schoollevel">
                <option value="SM">Sekolah menengah</option>
                <option value="SR">Sekolah rendah</option>
              </select>
            </td>
            <td><button class="btn btn-success btn-xs" name="submit_add_school">tambah</button></td>              
          </tr>              
        </form>                             
        <?php
        /** This table row lists all schools in the database
         * as well as form to edit/delete schools              
         */              
        $iList = 1;
        foreach ($schools as $school) {
        ?>               
        <form action="<?php echo URL; ?>admin/updateSchool" method="POST">              
          <tr>
            <td><?php echo $iList; ++$iList; ?></td>
            <td>                  
              <input type="hidden" name="schoolid" value="<?php if (isset($school->SchoolID)) echo $school->SchoolID; ?>">                   
              <input type="text" class="form-control input-sm" name="schoolname" value="<?php if (isset($school->SchoolName)) echo $school->SchoolName; ?>">
            </td>
            <td>
              <select class="form-control input-sm" name="schoollevel">
                <option value="SM"<?php if(($school -> SchoolLevel) == "SM") echo ' selected="selected"' ?>>Sekolah menengah</option>
                <option value="SR"<?php if(($school -> SchoolLevel) == "SR") echo ' selected="selected"' ?>>Sekolah rendah</option>
              </select>
            </td>
            <td>                  
              <button type="submit" class="btn btn-primary btn-xs" name="submit_update_school">ubah</button>                  
              <a class="btn btn-danger btn-xs" data-href="<?php echo URL . 'admin/deleteSchool/' . $school->SchoolID; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">buang</a>
            </td>              
          </tr>              
        </form>              
        <?php } ?>                           
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
        <h4 class="modal-title" id="myModalLabel">Ubah rekod sekolah</h4>                
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
        <h4 class="modal-title" id="myModalLabel">Buang rekod sekolah</h4>                
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