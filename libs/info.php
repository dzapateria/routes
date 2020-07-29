<?php

?>

<style>
    table td{
        min-width: 100px;
        border: solid 1px grey;

    }
</style>
<hr>
Debug info
<hr>
<table>
    <tr>
        <th>OP</th>
        <th>val</th>
        <th>Description</th>
    </tr>
    <tr>
        <td> uri():</td>
        <td>  <?=uri()?></td>
    </tr>
    <tr>
        <td> uri('a')</td>
        <td> <?php print_r (uri('a'))?></td>
    </tr>
    <tr>
        <td> $_GET['url']</td>
        <td> <?php print_r ($_GET['url'])?></td>
    </tr>
    <tr>
        <td> DIR </td>
        <td> <?=DIR?> </td>
    </tr>
    <tr>
        <td> DEV </td>
        <td> <?= DEV? 'true' : 'false'?></td>
    </tr>
    <tr>
        <td> $_GET </td>
        <td> <?php print_r ($_GET)?></td>
    </tr>


</table>

<p> </p>
