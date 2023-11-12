<?php
    session_start();

    $name = "";

    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header('Location: login.php');
    }
    else{
        if($_SESSION['name']){
            $name = $_SESSION['name']??'';
        }
        else{
            header('Location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e937dabe7a.js" crossorigin="anonymous"></script>
</head>
<style>
    * {
      box-sizing:border-box;
      margin: 0;
      padding: 0;
    }
    
    .nav{
        overflow: hidden;
        background-color: blue;
        height:auto;
    }
    .dropdown{
        float:left;
        margin-top:10px;
    }
    div.dropdown{
      width: fit-content;
      padding-left: 0;
      overflow: hidden;
    }
    div .dropbtn{
        margin-top:10px;
    }
    div.dropdown .dropbtn {
        display: block;
        font-size: 20px;  
        text-align: center;
        color: white;
        padding: 5px;
        margin: 0;
        width: 100px;
        box-sizing: border-box;
    }
    /* div.dropdown-content{
        background-color: blue;
        padding: 3cqmax;
    } */
    div a {
        font-size: 16px;
        color: white;
        text-align: center;
        text-decoration: none;
    } 
    .dropdown:hover,div a:hover {
        cursor: pointer;
        background-color: red;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }
    .dropdown:hover .dropdown-content {
         display: block;
    }
    .menu-icon{
        background-image: url("./assets/menu.png");
        width: 26px;
        height: 20px;
        margin-top: 2px;
        margin-right: 4px;
        display: inline-block;
        background-size:cover;
    }
    .text{
        display: inline-block;
        margin:0;
        box-sizing: border-box;

    }
    .right-nav{
        margin-top:10px;
        float:right;
        color:white;
    }
    .user{
        font-weight:600;
        display:inline-block;
    }
    .logout-button {
        font-weight:600;
        background-color: #fff;
        color: black;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin:5px;
        margin-right:10px;
        width:80%;
    }

    .logout-button:hover {
        background-color: blue;
        color:white;
        border:1px solid white;
    }

    form{
        display:inline-block;
    }

    div.right-nav a{
        display:inline-block;
        width:70px;
        text-decoration:none;
        color:black;
        margin:5px 10px;
    }
    div.right-nav a:hover{
        background-color: blue;
        color:white;
        /* border:1px solid white; */
    }

    div.dropdown{
        margin:0;
    }
    div.dropdown .dropbtn{
        margin-top: 10px;
    }

</style>
<body>
    <div class="nav">
        <div class="dropdown">
            <div class="dropbtn"><div class="menu-icon"></div><span class="text">Menu</span></div>
            <div class="dropdown-content">
                <a href="./index.php">Main Page</a>
                <a href="./gallery.php">Gallery</a>
                <a href="./cv.php">CV</a>
                <a href="./contact-info.php">Contact Info</a>
            </div>
            
        </div>
        <?php echo "
            <div class='right-nav'>
                <div class='user'>Welcome $name</div>
                <form action='index.php' method='POST'>
                    <input type='hidden' id='hiddenLabel' name='logout' value='logout'>
                    <button class='logout-button'>Logout</button>
                </form>
            </div>"
        ?>
        
    </div>

    