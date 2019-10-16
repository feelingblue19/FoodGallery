<?php
    session_start();
    if(isset($_SESSION['userid']))
    {
        session_destroy();
        echo '<script>window.history.back()</script>';
    }
    
?>