    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 navigation">
          <div class="panel panel-default">
            <div class="panel-heading">Laporan
            </div>
            <div class="panel-body">
              <form action="<?php echo URL; ?>admin/switchDay" method="POST">
                <div class="btn-group">
                  <button type="submit" name="submit_switch_day" class="btn btn-sm<?php if($daySwitch == 1) { echo " btn-success"; } else { echo " btn-default"; } ?>" value="1">Malam 1</button>
                  <button type="submit" name="submit_switch_day" class="btn btn-sm<?php if($daySwitch == 2) { echo " btn-success"; } else { echo " btn-default"; } ?>" value="2">Malam 2</button>
                  <button type="submit" name="submit_switch_day" class="btn btn-sm<?php if($daySwitch == 3) { echo " btn-success"; } else { echo " btn-default"; } ?>" value="3">Malam 3</button>
                </div>
              </form>
              <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo URL . 'admin/index'; ?>">Audit Markah Keseluruhan</li>
                <li class="list-group-item"><a href="<?php echo URL . 'admin/winners'; ?>">Senarai Pemenang</a></li>
              </ul>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">Tadbir Urus Data
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo URL . 'admin/schools'; ?>">Peserta (Sekolah)</a></li>
                <li class="list-group-item"><a href="<?php echo URL . 'admin/categories'; ?>">Kategori Tarian</a></li>
                <li class="list-group-item"><a href="<?php echo URL . 'admin/elements'; ?>">Elemen Markah</a></li>    
                <li class="list-group-item"><a href="<?php echo URL . 'admin/percentages'; ?>">Peratusan</a></li>
                <li class="list-group-item"><a href="<?php echo URL . 'admin/schedules/1'; ?>">Jadual Pertandingan</a></li>
                <li class="list-group-item"><a href="<?php echo URL . 'admin/users'; ?>">Login Pengguna</a></li>
              </ul>
            </div>
          </div>
        </div>