<?php

if($msg != ""){
    $m = explode('_',$msg);
    $msg_type = $m[1];
    $msgs = $m[0];
    ?>
    <div class="alert alert-<?= $msg_type ?> alert-dismissible fade show position-fixed" style="bottom: 5%; right: 5%;" role="alert">
        <?= $msgs ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}
$msg = "";
?>