<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 1/11/17
 * Time: 11:04 PM
 */

if (!isset($_SESSION['photoUrl'])) {
echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
die();
}
?>