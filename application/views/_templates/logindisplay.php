<?php
echo "<p class='text-right'>";
switch($_SESSION["LevelID"]) {
  case 1: echo "Juri"; break;
  case 2: echo "Hakim"; break;
  case 3: echo "Juru Audit"; break;
  case 4: echo "Pentadbir"; break;
}
echo ": <strong>" . strtoupper($_SESSION["UserName"]) . "</strong></p>";
?>