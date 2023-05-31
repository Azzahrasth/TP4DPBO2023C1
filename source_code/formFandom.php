<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Fandom.controller.php");

$fandom = new FandomController();

if (isset($_POST['btn-submit'])) {
    $fandom->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $fandom->formEdit($id); 
    }
} else if (isset($_POST['btn-edit'])) {
    $id = $_POST['id_fandom'];
    $fandom->edit($id, $_POST);
} else {
    $fandom->formAdd(); 
}