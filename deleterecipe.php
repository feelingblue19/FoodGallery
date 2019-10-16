<?php
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        include ('koneksi.php');
        $sql = $koneksi->query("SELECT id FROM recipe WHERE id='$id'");


        if($sql->num_rows==0){
            echo '<script>window.history.back()</script>';
        }
        else
        {
            $del = $koneksi->query("DELETE FROM recipe WHERE id='$id'");
            if($del)
                echo '<script>window.history.back()</script>';
        }
    }
    else
    {
        echo '<script>window.history.back()</script>';

    }
?>