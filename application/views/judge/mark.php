    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h3>Sekolah:<br /><strong><?php echo strtoupper($schools->SchoolName); ?></strong></h3>
        </div>
        <div class="col-md-3">
          <h3>Kategori:<br /><strong><?php echo strtoupper($categories->CategoryName); ?></strong></h3>
        </div>
        <div class="col-md-4">
          <h3>Hakim:<br /><strong><?php echo strtoupper($_SESSION['UserName']); ?></strong></h3>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1>Borang Pemarkahan Hakim</h1>
        </div>
        <form action="<?php echo URL; ?>judge/addJudgeMarks">
          <input type="hidden" name="schoolid" value="<?php echo $schoolid; ?>" />
          <input type="hidden" name="categoryid" value="<?php echo $categoryid; ?>" />
          <div class="panel-body">
            <table class="table table-condensed table-hover table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Unsur Permarkahan</th>
                  <th class="col-xs-2 text-center">Markah Penuh</th>
                  <th class="col-xs-2 text-center">Markah</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $iList = 1;
              $iTotalMarks = 0;
              foreach($percentages as $percentage) {
                ?>
                  <tr>
                    <td><?php echo $iList; ++$iList; ?></td>
                    <?php
                    $elements = $elements_model->getElement($percentage -> ElementID);
                    ?>
                    <td><?php echo $elements -> ElementName; ?></td>
                    <td class="text-center"><?php echo $percentage -> PercentageValue; ?></td>
                    <td>
                      <input type="hidden" name="elementid[]" value="<?php echo $elements -> ElementID; ?>" />
                      <input type="text" class="form-control input-sm text-center" name="judgemarkpoints[]" onchange="grandTotal()" />
                    </td>
                  </tr>
                <?php
                $iTotalMarks += $percentage -> PercentageValue;
              }
              ?>
              
                <tr>
                  <td colspan="3">
                    <p style="font-weight:bold;text-align:right;">JUMLAH</p>
                  </td>
                  <td>
                    <input type="text" name="total" class="form-control input-sm text-center" disabled="disabled" value="<?php echo '/' . $iTotalMarks; ?>" />
                  </td>
                </tr>
              
              </tbody>
            </table>
          </div>
        </form>
        <div class="panel-footer text-right">
          <button type="submit" name="submit_add_marks" class="btn btn-success" data-href="<?php echo URL . 'admin/saveResult/'; ?>" data-toggle="modal" data-target="#confirm-save" href="#">SIMPAN</button>
          <button type="reset" class="btn btn-danger">Batal</a>
        </div>
      </div>
      
<!-- modal to alert save -->    
<div class="modal fade" id="confirm-save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">        
  <div class="modal-dialog modal-sm">            
    <div class="modal-content">                             
      <div class="modal-header">                    
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
        </button>                    
        <h4 class="modal-title" id="myModalLabel">Simpan markah</h4>                
      </div>                             
      <div class="modal-body">                    
        <p>Adakah anda pasti?
        </p>
      </div>                                 
      <div class="modal-footer">                    
        <a href="#" class="btn btn-success success">YA, SAYA PASTI</a>                    
        <button class="btn btn-default" data-dismiss="modal">Batal</button>                
      </div>            
    </div>        
  </div>    
</div>         
<style type="text/css">
.content {padding-right:10px;}     
</style>    
<script type="text/javascript">
$('#confirm-save').on('show.bs.modal', function(e) {
  return true;
})

$('input').change(function(){
    var linetotals = 0;
    $('[name^="judgemarkpoints"]').each(function(){
      if($(this).val() == "") {
        pleaseLa = 0;
      } else {
        pleaseLa = parseFloat($(this).val());
      }
      linetotals += pleaseLa;
    });
    $('[name=total]').val(linetotals);
});
</script>