<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Signup</title>
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/signinstyle.css">
</head>

<?php

?>

<body>
    <div class="bgdiv">
        <div class="frame">
            <div class="create-acxount-bg">
                <form action="" class="loginsignup" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class=" login">
                        <div class="text-wrapper">Signup</div>
                        <div class="user">
                            <input class="input" placeholder="Username" type="text" name="txtusername" required />
                            <img class="img-2" src="css/img/login-avatar.png" />
                        </div>
                        <div class="password">
                            <input class="input" placeholder="Password" type="password" name="txtpassword" id="password" required />
                            <img class="img-2" src="css/img/lock.png" />
                        </div>
                        <div class="confirm">
                            <input class="input" placeholder="Confirm Password" type="cpassword" name="txtcpassword" id="confirmPassword" required />
                            <img class="img-2" src="css/img/lock.png" />
                        </div>
                        <div class="mail">
                            <input class="input" placeholder="Email" type="text" name="txtemail" required />
                            <img class="img-2" src="css/img/email.png" />
                        </div>
                        <div class="div-wrapper">
                            <input type="submit" formaction="createuser.php" class="text-wrapper-5" value="Sign up">
                        </div>
                    </div>
                    <a href="login.php">
                        <div class="signin-wrapper">
                            <input class="text-wrapper-5" type="button" value="LOGIN">
                        </div>
                    </a>
                </form>
            </div>
            <div class="sign-in">

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
                <div class="sign-content-wrapper">
                    <div class="sign-content">
                        <div class="text">
                            <div class="text-wrapper-4">Please Signup</div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        // Check if the passwords match
        if (password !== confirmPassword) {
            alert("Passwords do not match. Please make sure both passwords are the same.");
            return false; // Prevent form submission
        }
        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            return false; // Prevent form submission
        }
        // If passwords match, allow form submission
        return true;
    }
</script>

</html>