<?php
//echo __FILE__;

$recupAllPost = postHomepageAll($db);


$messageNoPost = "Pas encore de news";

$nbPost = count($recupAllPost);


require '../view/publicView/publicHomepageView.php'; 