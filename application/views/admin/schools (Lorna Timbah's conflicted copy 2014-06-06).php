<div class="col-md-9 content">        
  <p class="text-right">Admin: <strong>Liliy Badsit</strong>
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
            <td>
              <?php echo $iList; ++$iList; ?>
            </td>                <td>                  
              <input type="hidden" name="schoolid" value="<?php if (isset($school->SchoolID)) echo $school->SchoolID; ?>">                   
              <input type="text" class="form-control input-sm" name="schoolname" value="<?php if (isset($school->SchoolName)) echo $school->SchoolName; ?>">                 </td>                <td>                  
              <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">ubah</button>                  
              <a class="btn btn-danger btn-xs" data-href="<?php echo URL . 'admin/deleteSchool/' . $school->SchoolID; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">buang</a>            </td>              
          </tr>              
        </form>              
        <?php } ?>                           
      </tbody>          
    </table>          
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
<style type="text/css">      .content {padding-right:10px;}     
</style>    
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
  $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
})
</script>