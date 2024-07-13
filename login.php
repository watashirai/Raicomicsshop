<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/signinstyle.css">
</head>
<?php

?>

<body>

    <div class="bgdiv">
        <div class="frame">
            <div class="create-acxount-bg">
                <form action="" class="loginsignup" method="post" enctype="multipart/form-data">
                    <div class="login">
                        <div class="text-wrapper">Login</div>
                        <div class="name1">
                            <input class="input" placeholder="Username" name="user" type="text" />
                            <img class="img-2" src="css/img/login-avatar.png" />
                        </div>
                        <div class="password1">
                            <input class="input" placeholder="Password" type="password" name="pass" />
                            <img class="img-2" src="css/img/lock.png" />
                        </div>
                        <a href="forgetpass.php">
                            <div class="forget">
                                <div>Forget Password?</div>
                            </div>
                        </a>
                        <div class="div-wrapper">
                            <input class="text-wrapper-5" formaction="checkuser.php" type="submit" name="submit" value="LOG IN">
                        </div>

                    </div>
                    <div class="signin-wrapper">
                        <a href="signup.php">
                            <input class="text-wrapper-5" type="button" value="SIGN UP">
                        </a>
                    </div>
                </form>
            </div>
            <style>
                .signin-wrapper {
                    display: flex;
                    justify-content: center;
                    position: absolute;
                    width: 158px;
                    height: 39px;
                    top: 296px;
                    left: -233px;
                    border-radius: 20px;
                    overflow: hidden;
                    border: 1px solid;
                    border-color: #000000;
                    align-items: center;
                    background-color: white;
                }
            </style>
            <div class="sign-in">
                <div class="sign-content-wrapper">
                    <div class="sign-content">
                        <div class="text">
                            <div class="text-wrapper-4">Welcome to Taskmosaic</div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>