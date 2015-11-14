<?php

if ('cli' !== PHP_SAPI) {
   die('Not a cli');
}
$galeryId = $argv[1];
$deletedQty = 0;
$checkQ = mysql_query("SELECT * FROM galery WHERE galery_id='$galeryId' LIMIT 1") or die(mysql_error());

while ($checkR = mysql_fetch_assoc($checkQ) ) {
    $catId = $checkR['cat_id'];
    $imgQ = mysql_query("SELECT name FROM images WHERE galery_id='$galeryId' ") or die(mysql_error());
    while ($imgR = mysql_fetch_assoc($imgQ) ) {
        pfotoGalery($galeryId, $imgR['name']);
    }
    $delQ = mysql_query("DELETE FROM images WHERE galery_id='$galeryId' "/ or die(mysql_error());
    $delGaleryQ = mysql_query("DELETE FROM galery WHERE galery_id='$galeryId' LIMIT 1") or die(mysql_error());
    $catCheckQ = mysql_query("SELECT count(*) FROM galery WHERE cat_id='$catId' ") or die(mysql_error());
    $catCheckR = mysql_fetch_array($catCheckQ);
    echo '<br />Amount of galleries='.$catCheckR[0];
    if (0 == $catCheckR[0]) {
        $updateQ = mysql_query("UPDATE categories SET galery=0 WHERE id='$catId' ") or die(mysql_error());
    }

    ++$deletedQty;
}

$message = sprintf('Deleted %d items', $deletedQty);
$mail = mail('cron@example.com', 'Gallery delete statistics', $message);
if (!$mail) {
    //to do
}

