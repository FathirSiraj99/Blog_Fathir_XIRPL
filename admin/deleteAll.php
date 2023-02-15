<?php 
    require_once 'connect.php';
    require_once 'header.php';
    $id = $_GET['id'];

    $queryDelete = "DELETE FROM artikel ";
    if ($connect->query($queryDelete)) {
       echo "
                <script>
                    alert('Data sukses dihapus');
                    window.location.href='index.php';
                </script>
            ";
    }

?>