<?php
     $error = "";
     if(isset($_POST['submit'])){
        
  
        $jsonFile = 'users.json';
        $jsonData = file_get_contents($jsonFile);
        $arrayData = json_decode($jsonData, true);
        
        // check if username exists before
        $exists = false;

        foreach($arrayData as $user){
            if($user['username']===$_POST['username']){
                $exists=true;
            }
        }

        if($exists){
            $error="The username should be unique!";
        }
        else{
             session_start();
             $newObject = [
                 'username' => $_POST['username'],
                 'password' => $_POST['password'],
                 'fullName' => $_POST['fullName'],
                 'sex'=> $_POST['sex'],
                 'date-of-birth'=>$_POST['dob']
             ];
        
            $arrayData[] = $newObject;
            
            $_SESSION['name']=$_POST['username'];
            
            $newJsonData = json_encode($arrayData, JSON_PRETTY_PRINT);
        
            
            file_put_contents($jsonFile, $newJsonData);

            header('Location: index.php');
        }


        print_r($_POST);
         
     
        
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
            margin: 10px 0;
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
        div.error {
            margin-bottom: 3px;
            color: red;
            text-align:left;
        }
        a{
            text-decoration:none;
            color:#4caf50;
            font-weight:700;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <h2>Sign Up</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <div class="error"><?php echo $error?></div>

        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="sex">Sex:</label>
        <br>
        <select id="sex" name="sex" style="margin-bottom: 10px;margin-top: 5px;">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <button type="submit" name="submit">Sign Up</button>
        <p>Have an account? <a href="login.php">Login</a></p>

    </form>
</body>
</html>