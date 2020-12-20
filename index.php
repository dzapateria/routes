<?php
session_start();


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





