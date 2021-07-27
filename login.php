<?php 
require('connection.php');
?>
<!doctype html>
<html>

<head>
    <title>Login</title>
    <style>
    body {
        text-align: center;
    }

    /* fieldset{
        margin:auto;
        width:200px;
        height: 200px;
    } */
    #infield {
        border-radius: 2px;
        border: 1px solid grey;
        padding: 7px;
        width: 300px;
        height: 30px;
    }
    </style>
</head>

<body>
    <h2 style="margin-top:140px">LOGIN</h2>
    <!-- <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>   -->

    <form action="" method="POST">
        <legend>
            <input type="text" name="email" placeholder="Email" id="infield"><br><br>

            <input type="password" name="pass" placeholder="Password" id="infield"><br><br>


            <input type="submit" value="Login" name="submit" id="infield"
                style="height:49px;width:320px;background-color:#d81b60;border:none;color:white" /> <br><br>
            <a href="register.php">Not a member? Register</a> <br><br>
        </legend>
    </form>
    <?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['email']) && !empty($_POST['pass'])) {  
    $email=$_POST['email'];  
    $pass=$_POST['pass'];  
  
    // $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    // mysqli_select_db($con,'user-registration') or die("cannot select DB");  
  
    $query=mysqli_query($dbconnect,"SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['email'];  
    $dbpassword=$row['password'];  
    }  
  
    if($email == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['email']=$email; 
     
    echo " Logged in!";
    echo "$email"; 
    /* Redirect browser */  
    header("Location: homepage.php");  
    }  
    } else {  
    echo "not Logged in!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>
</body>

</html>