<?php 
require('connection.php');
?>
<!doctype html>
<html>

<head>
    <title>Register</title>
    <style>
    body {
        text-align: center;
    }

    /* fieldset{
        margin:auto;
        width:400px;
        height: 400px;
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

    <h2 style="margin-top:140px">REGISTER</h2>
    <!-- <p><a href="register.php" ><button style="height:30px;width=130px;background-color:#d81b60;color:white">Register</button></a> | <a href="login.php"><button style="height:30px;width=130px;background-color:#d81b60;color:white">Login</button></a></p>   -->

    <form action="" method="POST">
        <legend>

            
            <input type="text" name="username" placeholder="Username" id="infield"><br><br>
            <input type="password" name="pass" placeholder="Password" id="infield"><br><br>


            <input type="submit" value="Register" name="submit" id="infield"
                style="height:49px;width:320px;background-color:#d81b60;border:none;color:white" /> <br><br>
            <a href="login.php">Already a member? Login</a> <br><br>

        </legend>
    </form>
    <?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['username']) && !empty($_POST['pass'])) {  
$username=$_POST['username'];  
$pass=$_POST['pass'];  


$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);
$specialChars = preg_match('@[^\w]@', $pass);
if (strlen($username) < 6 || strlen($username) > 12 ) {
    
    echo 'Username should be of length 6-12';
    echo "<br>";
}

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
    echo 'Password should be at least 6 characters in length and should include at least one upper case letter and special characters.';
    echo "<br>";
}

if ($uppercase && $lowercase && $number && $specialChars && strlen($pass) > 6 && strlen($username) > 6 && strlen($username) < 12 ){

    echo "<br>";
    $query=mysqli_query($dbconnect,"SELECT * FROM users WHERE username='".$username."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
    $sql="INSERT INTO users(username,password) VALUES('$username','$pass')";  
  
    $result=mysqli_query($dbconnect,$sql);  
        if($result){  
    echo "Account Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "That username already exists! Please try again with another.";  
    }  

}


    
    
    // $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    // mysqli_select_db($con,'user-registration') or die("cannot select DB");  
  
    
  
} 
}  
?>
</body>

</html>