<?php
session_start();


$userinfo = array(
                'test'=>'pass'
                );

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
    }else {
        //Invalid Login
        echo "<div style='color:red'>incorrect username or password</div>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
            body {
                background-image:url('https://i.ytimg.com/vi/voWpbz1De_M/maxresdefault.jpg');
                background-positon:center;
                background-attachment:fixed;
                margin-top:-2500px;
                padding-top:2500px;
            }
            .content {
                height: 900px;
                overflow-y: auto;
                overflow-x: hidden;
                width: 600px;
                color:#ffd326;
                margin:0 auto;
                float:right;
            }
            p.border{
                border:double;
                border-color: red;
                color:red;
                background: yellow;
                height:60px;
                text-align: center;
                font-size: 40px;
            }
            #nav-wrap{
                width:100%;
                background-color: grey;
                top:0;
            }
            #nav{
                width:70%;
                margin-left: -20px;
                margin: 0 auto;
                text-align: center;
            }
            #nav ul li:hover{
                background-color:#404040
            }
            #nav ul li a{
                text-decoration: none;
                color:white;
            }
            #nav ul{
                list-style-type:none;
                position:relative;
                padding:0;
                margin:0;
                }
            #nav ul li{
                display:inline-block;
                width:140px;
                height:40px;
                line-height:40px;
                padding:10px;
                font-size:20px;
                transition-property: background,display;
                transition-duration: .25s;
                transition-timing-function: linear;
            }
        </style>
 
    </head>
    <body>
        <div id ="nav-wrap">
            <div id ="nav">
                <ul>
                    <li><a href="http://testcats.azurewebsites.net/home">home</a></li>
                    <li><a href="http://testcats.azurewebsites.net/video">video</a></li>
                    <li><a href="http://testcats.azurewebsites.net/pictures">pictures</a></li>
                    <li><a href="http://testcats.azurewebsites.net/login">login</a></li>
                    <li><a href="http://testcats.azurewebsites.net/r2d2">R2-D2</a></li>
                </ul>
            </div>
        </div>
    
        <p class = "border">The wonderful world of matthew schwarz</p>
       <div class ="content">
        <?php if($_SESSION['username']): ?>
            <p>You are logged in as <?=$_SESSION['username']?></p>
            <p><a href="?logout=1">Logout</a></p>
        <?php endif; ?>

        <form name="login" action="" method="post">
            Username:  <input type="text" name="username" value="" /><br />
            Password:  <input type="password" name="password" value="" /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
        </div>
    </body>
</html>