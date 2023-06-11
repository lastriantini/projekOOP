<?php 
include 'koneksi.php';
$server = mysqli_connect("127.0.0.1:8111","root","","db_xpplg");
session_start();
   if(isset($_SESSION['username'])) {
                header('location:dashboard.php');
            } if(isset($_POST["submit"] )) {        

             $username = $_POST["username"];
        $password = $_POST["password"];
       
       $sql = "SELECT * FROM login1
        WHERE username = '$username' AND password = '$password' ";

      $result = mysqli_query($server, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        // $_SESSION['username'] = $row['username'];
        //     header('location:dashboard.php');   
        } if(empty($username )) {
            $error1 = true;
        } if(empty($password )) {
            $error1 = true;
        }else {
            $error =true;
        }

 
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    <link href="mata.png" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   
</head>
<body  class="p-3 mb-2 bg-dark-subtle text-emphasis-dark">
<div class="position-absolute top-50 start-50 translate-middle">

    <div class="card" style="width: 18rem;">
 <div class="card-body">
<center>
        <div class="form-container">
           <?php if(isset($error)) { ?>
       
         <div class="alert alert-danger"> 
           salah </div>
            <?php } ?></h1>
            <h1>login</h1>

            <div class="form-container">
           <?php if(isset($error1)) { ?>
       
         <div class="alert alert-danger"> 
           username/password tidak boleh kosong </div>
            <?php } ?></h1>

           
  
        <form action="dashboard.php" method="post" style="" >
        <div class="input-group mb-3">
          
            <input type="text" autocomplete="off" id="name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username"  >
        </div>        <!-- password -->
            <br>
            <div class="input-group mb-3">
            <input type="password" autocomplete="off" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1" name="password">
        </div>   
            <!-- password -->
            <!-- button -->
        </div></center>
        <button type="submit" name="submit" class="btn btn-outline-primary">kirim</button>
        <!-- button -->
    </form> 
</div> </div>
</div>
</body>
</html>