<!DOCTYPE HTML>
<html>
<head>
    <title>BOOKS - Read Records - PHP CRUD</title>
     
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         

    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>

    <div class="container">
  
        <div class="page-header">
            <h1>Read Products</h1>
        </div>
     
       <?php
// include database connection
include 'config/database.php';
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
 

if($action=='deleted'){
    echo "<div class='alert alert-success'>Record was deleted.</div>";
}


 
$query = "SELECT id, name, description, price FROM products ORDER BY id DESC";
$stmt = $con->prepare($query);
$stmt->execute();
 
$num = $stmt->rowCount();
 

echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";
 

if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Description</th>";
        echo "<th>Price</th>";
        echo "<th>Action</th>";
    echo "</tr>";
     
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
     
 
    echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$description}</td>";
        echo "<td>&#36;{$price}</td>";
        echo "<td>";
          
             
            
            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
 
            
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
 
// end table
echo "</table>";
     
}
 
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
?>
         
    </div>
     
<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        
        window.location = 'delete.php?id=' + id;
    } 
}
</script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 
</body>
</html>