<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$member = new MembersController();

if (isset($_POST['btn-submit'])) {
    $member->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $member->formEdit($id); 
    }
} else if (isset($_POST['btn-edit'])) {
    $id = $_POST['id'];
    $member->edit($id, $_POST);
} else {
    $member->formAdd(); 
}