<?php
session_start();

define('ROOT', str_replace('\\', '/', __DIR__.'/'));
require 'libs/routes.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=CSS?>styles.css?v=<?=DEV?time():date("d.m.y")?>">
    <title><?=uri(true)[0]?></title>
</head>
<body>

<?php
include part('head');
?>

<!-- Page here -->

<?php
include src();
?>
<!--end page -->


<script src="<?=JS?>codigo.js?v=<?=DEV?time():date("d.m.y")?>"></script>

<!-- debug helpers outputs -->
<?php if(DEV) include ROOT . '/libs/info.php'; ?>

</body>
</html>