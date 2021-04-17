<?php 
    if (isset($_POST['action'])){
        $_SESSION['type'] = $_POST['action'];
    }else{
        $_SESSION['type'] = 'none'; 
    }
?>