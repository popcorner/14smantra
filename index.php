<?php
/**
 * https://github.com/popcorner/14smantra
 * © 2018 popcorner
 */
require './mag.php';

if(isset($_POST['action'])) {
    header('Content-Type: application/json; charset=utf-8');
    if($_POST['action']=='encode') {
        echo json_encode(encode($_POST['value']));
    } elseif($_POST['action']=='decode') {
        echo json_encode(decode($_POST['value']));
    }
} else {
    include './tpl.php';
}