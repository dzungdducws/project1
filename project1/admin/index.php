<script src="ckeditor/ckeditor.js"></script>
<?php
include_once("connect.php");
session_start();
define("TEMPLATE", true);
if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){
    include_once("admin.php");
}
else{
    include_once("login.php");
}
?>