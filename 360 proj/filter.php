<?php 
session_start();
    if (isset($_POST['action'])){
        if($_POST['action']!='none'){
        $_SESSION['type'] = $_POST['action'];
        echo $_POST['action'];}
        else $_SESSION['type'] = null; 
    }else{
        $_SESSION['type'] = null; 
    }
?>