<div class="col-md-9 content">        
        <?php require ('application/views/_templates/logindisplay.php'); ?>
  </p>        
  <h1 class="page-title">Panel Pengurusan Login</h1>
  <?php
  /** flag if levels page 0 or levels page 1 for navigation
   *  too lazy to check page self **/     
  $flagPage = 1;   
  ?>

    <ul class="nav nav-tabs">
      <li<?php if($flagPage == 0) echo ' class="active"'; ?>>
        <a href="<?php echo URL; ?>admin/users">Senarai Pengguna</a>
      </li>
      <li<?php if($flagPage == 1) echo ' class="active"'; ?>>
        <a href="<?php echo URL; ?>admin/levels">Tahap Login</a>
      </li>
    </ul>

    <div class="row">          
    <table class="table table-condensed table-hover table-striped">            
      <thead>              
        <tr class="text-center">                
          <th class="col-xs-1">#</th>                
          <th>Nama Tahap</th>
          <th>Tahap</th>
          <th class="col-xs-2"> </th>              
        </tr>            
      </thead>            
      <tbody>                             
      <?php
      /** This table row displays a form to add a record in the database
       */              
      ?>               
        <form action="<?php echo URL; ?>admin/addLevel" method="POST">     
          <tr>
            <td> </td>
            <td><input type="text" class="form-control input-sm" name="levelname" placeholder="(nama tahap)"></td>
            <td><input type="text" class="form-control input-sm" name="levellevel" placeholder="(angka)"></td>
            <td><button class="btn btn-success btn-xs" name="submit_add_level">tambah</button></td>
          </tr>              
        </form>                             
        <?php
        /** This table row lists all levels in the database
         * as well as form to edit/delete levels              
         */              
        $levels = $levels_model->getAllLevels();
        $iList = 1;
        foreach ($levels as $level) {
          ?>               
        <form action="<?php echo URL; ?>admin/updateLevel" method="POST">              
          <input type="hidden" name="levelid" value="<?php if (isset($level->LevelID)) echo $level->LevelID; ?>">                   
          <tr>
            <td><?php echo $iList; ++$iList; ?></td>
            <td>
              <input type="text" class="form-control input-sm" name="levelname" value="<?php echo $level -> LevelName; ?>" />
            </td>
            <td>
              <input type="text" class="form-control input-sm" name="levellevel" value="<?php echo $level -> LevelLevel; ?>" />
            </td>                                                                                                                                               
            <td>                  
              <button type="submit" class="btn btn-primary btn-xs" name="submit_update_level">ubah</button>                  
              <a class="btn btn-danger btn-xs" data-href="<?php echo URL . 'admin/deleteLevel/' . $level->LevelID; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">buang</a>
            </td>              
          </tr>              
        </form>              
        <?php
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
        <h4 class="modal-title" id="myModalLabel">Ubah rekod tahap</h4>                
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
        <h4 class="modal-title" id="myModalLabel">Buang rekod tahap</h4>                
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