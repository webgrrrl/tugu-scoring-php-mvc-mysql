<div class="col-md-9 content">        
        <?php require ('application/views/_templates/logindisplay.php'); ?>
  </p>        
  <h1 class="page-title">Panel Pengurusan Login</h1>

    <div class="row">          
    <table class="table table-condensed table-hover table-striped">            
      <thead>              
        <tr class="text-center">                
          <th class="col-xs-1">#</th>                
          <th>ID Pengguna</th>                
          <th>Nama Penuh</th>
          <th>Kata Laluan</th>
          <th>Tahap</th>
          <th>Sekolah</th>
          <th class="col-xs-2"> </th>              
        </tr>            
      </thead>            
      <tbody>                             
      <?php
      /** This table row displays a form to add users in the database
       */              
      ?>               
        <form action="<?php echo URL; ?>admin/addUser" method="POST">     
          <tr>
            <td> </td>
            <td><input type="text" class="form-control input-sm" name="userlogin" placeholder="(id pengguna)"></td>
            <td><input type="text" class="form-control input-sm" name="username" placeholder="(nama)"></td>
            <td><input type="password" class="form-control input-sm" name="userpassword" placeholder="(kata laluan)"></td>
            <td>
              <select class="form-control input-sm" name="levelid">
                <option>(pilih)</option>
                <option value="1">Juri</option>
                <option value="2">Hakim</option>
                <option value="3">Auditor</option>
                <option value="1">Pentadbir</option>
              </select>
            </td>
            <td>
              <select class="form-control input-sm" name="schoolid">
                <option>(pilih peserta)</option>
                <option value="0">Tidak berkenaan</option>
                <?php
                foreach ($schools as $school) {
                ?>
                <option value="<?php echo $school -> SchoolID; ?>"><?php echo $school -> SchoolName; ?></option>
                <?php
                }
                ?>
              </select>
            </td>
            <td><button class="btn btn-success btn-xs" name="submit_add_user">tambah</button></td>
          </tr>              
        </form>                             
        <?php
        /** This table row lists all users in the database
         * as well as form to edit/delete users              
         */              
        $users = $users_model->getAllUsers();
        $iList = 1;
        foreach ($users as $user) {
          ?>               
        <form action="<?php echo URL; ?>admin/updateUser" method="POST">              
          <input type="hidden" name="userid" value="<?php if (isset($user->UserID)) echo $user->UserID; ?>">                   
          <tr>
            <td><?php echo $iList; ++$iList; ?></td>
            <td>
              <input type="text" class="form-control input-sm" name="userlogin" value="<?php echo $user -> UserLogin; ?>" />
            </td>                                                                                                   
            <td>
              <input type="text" class="form-control input-sm" name="username" value="<?php echo $user -> UserName; ?>" />
            </td>
            <td>
              <input type="password" class="form-control input-sm" name="userpassword" value="<?php echo $user -> UserPassword; ?>" />
            </td>                                                                                                                                               
            <td>                  
              <select class="form-control input-sm" name="levelid">
                <?php
                $strLevelIDUser = $user -> LevelID;
                ?>
                <option value="1"<?php if ($strLevelIDUser == 1) echo " selected='selected'"; ?>>Juri</option>
                <option value="2"<?php if ($strLevelIDUser == 2) echo " selected='selected'"; ?>>Hakim</option>
                <option value="3"<?php if ($strLevelIDUser == 3) echo " selected='selected'"; ?>>Juru Audit</option>
                <option value="4"<?php if ($strLevelIDUser == 4) echo " selected='selected'"; ?>>Pentadbir</option
              </select>
            </td>                                                                                                                  
            <td>                  
              <select class="form-control input-sm" name="schoolid">
              <?php
              $strSchoolIDUser = $user -> SchoolID;
              echo "<option value='0'";
              if(!isset($strSchoolIDUser) || $strSchoolIDUser == 0 ) echo " selected";
              echo ">Tidak berkenaan</option>\n";
              foreach ($schools as $school) {
                $strSchoolIDSchool = $school -> SchoolID;
                echo '<option value="' . $strSchoolIDSchool . '"';
                if ($strSchoolIDUser == $strSchoolIDSchool) echo " selected";
                echo ">" . $school -> SchoolName . "</option>\n";
              }
              ?>
              </select>
            </td>                                                                                                                                               
            <td>                  
              <button type="submit" class="btn btn-primary btn-xs" name="submit_update_user">ubah</button>                  
              <a class="btn btn-danger btn-xs" data-href="<?php echo URL . 'admin/deleteUser/' . $user->UserID; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">buang</a>
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
        <h4 class="modal-title" id="myModalLabel">Ubah rekod pengguna</h4>                
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
        <h4 class="modal-title" id="myModalLabel">Buang rekod pengguna</h4>                
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