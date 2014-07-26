<div class="col-md-9 content">        
        <?php require ('application/views/_templates/logindisplay.php'); ?>
  </p>        
  <h1 class="page-title">Senarai Elemen Pemarkahan</h1>          
  <div class="row">          
    <table class="table table-condensed table-hover table-striped">            
      <thead>              
        <tr class="text-center">                
          <th class="col-xs-1">#</th>                
          <th>Nama Elemen</th>                
          <th class="col-xs-2">Kod Elemen</th>                
          <th class="col-xs-2"> </th>              
        </tr>            
      </thead>            
      <tbody>                             
      <?php
      /** This table row displays a form to add element in the database
       */              
      ?>               
        <form action="<?php echo URL; ?>admin/addElement" method="POST">              
          <tr>
            <td> </td>
            <td><input type="text" class="form-control input-sm" name="elementname" placeholder="(nama elemen)"></td>
            <td><input type="text" class="form-control input-sm" name="elementcode" placeholder="(kod)"></td>
            <td><button class="btn btn-success btn-xs" name="submit_add_element">tambah</button></td>              
          </tr>              
        </form>                             
        <?php
        /** This table row lists all elements in the database
         * as well as form to edit/delete elements              
         */              
        $iList = 1;
        foreach ($elements as $element) {
        ?>               
        <form action="<?php echo URL; ?>admin/updateElement" method="POST">              
          <tr>
            <td><?php echo $iList; ++$iList; ?></td>
            <td>                  
              <input type="hidden" name="elementid" value="<?php if (isset($element->ElementID)) echo $element->ElementID; ?>">                   
              <input type="text" class="form-control input-sm" name="elementname" value="<?php if (isset($element->ElementName)) echo $element->ElementName; ?>">
            </td>                                                                                                                                               
            <td>                  
              <input type="text" class="form-control input-sm" name="elementcode" value="<?php if (isset($element->ElementCode)) echo $element->ElementCode; ?>">
            </td>
            <td>                  
              <button type="submit" class="btn btn-primary btn-xs" name="submit_update_element">ubah</button>                  
              <a class="btn btn-danger btn-xs" data-href="<?php echo URL . 'admin/deleteElement/' . $element->ElementID; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">buang</a>
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
        <h4 class="modal-title" id="myModalLabel">Ubah rekod elemen</h4>                
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
        <h4 class="modal-title" id="myModalLabel">Buang rekod elemen</h4>                
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