<?php
session_start();

define('ROOT', str_replace('\\', '/', getcwd().'/'));
require 'libs/routes.php';

?>


<?php
include partial('head');
?>

<!-- Page here -->

<?php
include src();
?>
<!--end page -->

<?php
include partial('footer');
?>





