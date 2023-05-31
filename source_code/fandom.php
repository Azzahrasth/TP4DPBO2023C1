<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Fandom.controller.php");

$fandom = new FandomController();
$fandom->index();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        $fandom->delete($id);
    }
}