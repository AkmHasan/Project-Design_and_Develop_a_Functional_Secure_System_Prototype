<?php
session_start();
  include("connections.php");
  include("functions.php");
  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && preg_match("^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^", $user_name) && preg_match("^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^", $password))
    {
      $user_id = random_num(30);
      $salted = "qwoidnwqoindoi12312k5bnk".$password;
      $hashed = hash('sha512', $salted);
      $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$hashed')";

      mysqli_query($con, $query);
      header("Location: login.php");
      die;

    }else
    {
      echo "Error: For securiry reasons our policy is the following:- Usernames must be at least 4 characters long, contain one lowercase letter, one uppercase letter and at least one number. Passwords must be at least 8 characters long, contain one lowercase letter, one uppercase letter and at least one number ";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
</head>
<body>

  <style type="text/css">

  body {
   background-image: url("background.jpg");

  }

  #text{
    height: 25px;
    border-radius: 5px;
    padding: 4px;
    border: solid thin #aaa;
    width: 100%;
  }

  #button{
    padding: 10px;
    width: 100px;
    color: white;
    background-color: brown;
    border: none;
  }

  #box{
    background-color: orange;
    margin: auto;
    width: 300px;
    padding: 20px;

  }

  </style>

  <div id="box">

    <form method="post">

      <div style="font-size: 30px;margin: 10px;color: white;">ABC Air Signup Portal</div>
      <input id="text" type="text" name="user_name"><br><br>
      <input id="text" type="password" name="password"><br><br>

      <input id="button" type="submit" value="Signup"><br><br>

      <a href="login.php">Login</a><br><br>
    </form>
  </div>
</body>
</html>
