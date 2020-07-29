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
        <th>VARIABLE</th>
        <th>VALUE</th>
    </tr>
    <tr>
        <td> uri():</td>
        <td> <?=uri()?></td>
    </tr>
    <tr>
        <td> uri('a')</td>
        <td> <?php print_r (uri('a'))?></td>
    </tr>
    <tr>
        <td> $_GET['url']</td>
        <td> <?php @print_r ($_GET['url'])?></td>
    </tr>
    <tr>
        <td> ROOT </td>
        <td> <?=ROOT?> </td>
    </tr>
    <tr>
        <td> DEV </td>
        <td> <?= DEV? 'true' : 'false'?></td>
    </tr>
    <tr>
        <td> $_GET </td>
        <td> <?php print_r ($_GET)?></td>
    </tr>
    <tr>
        <td> PHP_OS</td>
        <td> <?=PHP_OS?></td>
    </tr>
    <tr>
        <td> DEV_MODE</td>
        <td> <?=DEV_MODE?></td>
    </tr>

    <tr>
        <td> src()</td>
        <td> <?=src()?></td>
    </tr>

</table>

