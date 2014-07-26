<div class="col-md-9 content">        
        <?php require ('application/views/_templates/logindisplay.php'); ?>
  </p>        
  <h1 class="page-title">Peratusan Elemen berdasarkan Kategori</h1>          
  <div class="row">          
  <?php
  /** list out each category into its own table
   **/
  foreach($categories as $category) {
    $strCategoryID = $category->CategoryID;
    $strCategoryName = $category -> CategoryName;
  ?>                   
    <table class="table table-condensed table-hover table-striped">
    <h2>Kategori <?php echo $strCategoryName; ?></h2>
      <thead>              
        <tr class="text-center">                
          <th class="col-xs-1">#</th>                
          <th>Elemen</th>                
          <th class="col-xs-2">% Elemen</th>                                                                                         
          <th class="col-xs-2"> </th>              
        </tr>            
      </thead>            
      <tbody>
        <form action="<?php echo URL; ?>admin/addPercentages" method="POST">
          <input type="hidden" name="categoryid" value="<?php echo $strCategoryID; ?>" />
        <tr>
          <td> </td>
          <td>
            <select class="form-control input-sm" name="elementid">
            <?php
            foreach($elements as $element) {
              echo "<option value='" . $element -> ElementID . "'>" . $element -> ElementName . " (" . $element ->ElementCode . ")</option>\n";
            }
            ?>
            </select>
          </td>                                                                                                                                                                                                                           
          <td>                  
            <input type="text" class="form-control input-sm" name="percentagevalue" placeholder="(peratusan)">
          </td>                                                                                                                                               
          <td>                  
            <button type="submit" class="btn btn-success btn-xs" name="submit_add_percentages">tambah</button>                  
          </td>              
        </tr>
        </form>
        <?php
        $percentages = $percentages_model->getPercentages($strCategoryID);
        $iList = 1;
        foreach ($percentages as $percentage) {
        ?>             
        <form action="<?php echo URL; ?>admin/updatePercentages" method="POST">  
          <input type="hidden" name="percentageid" value = "<?php echo $percentage -> PercentageID; ?>" />               
          <input type="hidden" name="categoryid" value="<?php echo $percentage -> CategoryID; ?>" />
          <tr>
            <td><?php echo $iList; ++$iList; ?></td>
            <td>
              <select class="form-control input-sm" name="elementid">
              <?php
              foreach($elements as $element) {
                $elementPercentage = $percentage -> ElementID;
                $elementElement = $element -> ElementID;
                echo "<option value='" . $elementElement . "'";
                if($elementPercentage == $elementElement) echo " selected='selected'";
                echo ">" . $element -> ElementName . " (" . $element -> ElementCode . ")</option>\n";
              }
              ?>
              </select>
            </td>                                                                                                                                                                                                                           
            <td>                  
              <input type="text" class="form-control input-sm" name="percentagevalue" value="<?php echo $percentage -> PercentageValue; ?>" placeholder="(peratusan)">
            </td>                                                                                                                                               
            <td>                  
              <button type="submit" class="btn btn-primary btn-xs" name="submit_update_percentages">ubah</button>                  
              <a class="btn btn-danger btn-xs" data-href="<?php echo URL . 'admin/deletePercentage/' . $percentage->PercentageID; ?>" data-toggle="modal" data-target="#confirm-delete" href="#">buang</a>
            </td>              
          </tr>              
        </form>              
        <?php } ?>                           
      </tbody>          
    </table>
    <?php } ?>
  </div>        
</div>      
<!-- modal to alert delete -->    
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">        
  <div class="modal-dialog modal-sm">            
    <div class="modal-content">                             
      <div class="modal-header">                    
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
        </button>                    
        <h4 class="modal-title" id="myModalLabel">Buang rekod peratusan</h4>                
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
$('#confirm-delete').on('show.bs.modal', function(e) {
  $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
})
</script>