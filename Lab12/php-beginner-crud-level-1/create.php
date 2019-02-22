<!DOCTYPE HTML>
<html>
<head>
    <title>BOOKS - Create a Record - PHP CRUD</title>
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
    <div class="container">
   
        <div class="page-header">
            <h1>Insert Books</h1>
        </div>
        
      
    <?php
if($_POST){
 
    include 'config/database.php';
 
        $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";
        $stmt = $con->prepare($query);

        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
    }
    ?>
 
