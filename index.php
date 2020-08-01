<?php
session_start();

define('ROOT', str_replace('\\', '/', getcwd().'/'));
require 'libs/routes.php';

?>


<?php
include get_partial('head');
?>

<!-- Page here -->

<?php
include get_content();
?>
<!--end page -->

<?php
include get_partial('footer');
?>





