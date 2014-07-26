          <ul class="nav nav-tabs">
            <li<?php if($flagPage == 1) echo ' class="active"'; ?>>
              <a href="<?php echo URL; ?>admin/index">Hakim (Solo/Duet)</a>
            </li>
            <li<?php if($flagPage == 2) echo ' class="active"'; ?>>
              <a href="<?php echo URL; ?>admin/index2">Hakim (Kreatif/Tradisi)</a>
            </li>                                                               
            <li<?php if($flagPage == 3) echo ' class="active"'; ?>>
              <a href="<?php echo URL; ?>admin/index3">Juri</a>
            </li>
          </ul>
          <style type="text/css">
            @media print {
              .nav-tabs { display:none; }
            }
          </style>