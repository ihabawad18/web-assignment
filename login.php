<?php
    $error = $username = $password ='';

    if(isset($_POST['submit'])){
        $error = '';
        $username=$_POST['username'];
        $password=$_POST['password'];

        // print_r($_POST);
        $jsonFile = 'users.json';
        $jsonData = file_get_contents($jsonFile);
        $arrayData = json_decode($jsonData, true); 
        $not_found=true;
        foreach($arrayData as $user){
            if($user['username']===$username){
                $not_found= false ;
                if($password!==$user['password']){
                    $error = "username or password is incorrect";
                }
            }
        }
        if($not_found){
            $error = "username or password is incorrect";
        }
        if(!$error){
            session_start();
            $_SESSION['name']=$username;
            header('Location: index.php');
        }
    }

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        a{
            text-decoration:none;
            color:#4caf50;
            font-weight:700;
        }
        div.error {
            margin: 7px auto;
            color: red;
            text-align:center;

        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required  value="<?php echo $username?>">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required value="<?php echo $password?>">

        <button type="submit" name="submit">Login</button>
        <div class="error"><?php echo $error?></div>
        <p>Dont have account? <a href="signup.php">SignUp</a></p>
    </form>
</body>
</html>