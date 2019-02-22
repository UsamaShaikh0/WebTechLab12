<?php
// include database connection
include 'config/database.php';

     
        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
         $query = "DELETE FROM products WHERE id = ?";
         $stmt = $con->prepare($query);

        if($stmt->execute()){
            header('Location: index.php?action=deleted');
        }else{
            echo "Unable to delete record.";
        }

  ?>