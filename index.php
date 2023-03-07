<?php

$insert=false;
if(isset($_POST['name'])){
    // Set connection variables
    $server="localhost";
    $username="root";
    $password="";

    // Create a database connection
    $con = mysqli_connect($server,$username,$password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }

    // Collect post variables
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sql="INSERT INTO `bennett`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // Execute the query
    if($con->query($sql)==true){
        $insert=true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <title>University Form</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to Bennett University</h1>
        <p>Enter your details and submit this form</p>
    <?php
        if($insert==true){
            echo "<p class='submitMsg'>Thanks for submitting the form</p>";
        }
    ?>
    </div>
    <form action="index.php" method="post" class="form">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
    </form>
</body>
</html> 