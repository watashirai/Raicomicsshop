<?php
include("connect.php");

if (isset($_POST['submit'])) {
    $enteredUsername = $_POST['user'];
    $enteredPassword = $_POST['pass'];

    // Use prepared statement to protect against SQL injection
    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $enteredUsername);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $hashedPassword = $row['password'];

        // Verify the entered password with the hashed password
        if (password_verify($enteredPassword, $hashedPassword)) {
            $username = $row["username"];
            $email = $row['email'];
            $updateStmt = mysqli_prepare($con, "UPDATE currentuser SET  username = ?, email = ? WHERE UserId = 1");
            mysqli_stmt_bind_param($updateStmt, "ss",  $username, $email);
            $updateQuery = mysqli_stmt_execute($updateStmt);

            if ($row['verified'] == 0) {
?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Email Verification</title>
                    <style>
                        body {
                            font-family: 'Arial', sans-serif;
                            background-color: #f0f2f5;
                            margin: 0;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                        }

                        .modal {
                            display: block;
                            position: fixed;
                            z-index: 1;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            overflow: auto;
                            background-color: rgba(0, 0, 0, 0.5);
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            animation: fadeIn 0.5s;
                        }

                        .modal-content {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 10px;
                            width: 90%;
                            max-width: 500px;
                            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                            animation: slideIn 0.5s;
                        }

                        @keyframes fadeIn {
                            from {
                                opacity: 0;
                            }

                            to {
                                opacity: 1;
                            }
                        }

                        @keyframes slideIn {
                            from {
                                transform: translateY(-50px);
                                opacity: 0;
                            }

                            to {
                                transform: translateY(0);
                                opacity: 1;
                            }
                        }

                        .close {
                            color: #aaa;
                            float: right;
                            font-size: 28px;
                            font-weight: bold;
                            cursor: pointer;
                        }

                        .close:hover {
                            color: #000;
                        }

                        h2 {
                            text-align: center;
                            margin: 0;
                            padding: 10px 0;
                        }

                        p {
                            text-align: center;
                            margin: 10px 0;
                        }

                        input[type="text"] {
                            width: calc(100% - 40px);
                            margin: 10px auto;
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            display: block;
                        }

                        button {
                            width: calc(100% - 40px);
                            margin: 10px auto;
                            padding: 10px;
                            border: none;
                            border-radius: 5px;
                            background-color: #4CAF50;
                            color: white;
                            cursor: pointer;
                            font-size: 16px;
                            transition: background-color 0.3s;
                            display: block;
                        }

                        button:hover {
                            background-color: #45a049;
                        }

                        #resendVerification {
                            background-color: #f0ad4e;
                        }

                        #resendVerification:hover {
                            background-color: #ec971f;
                        }
                    </style>
                </head>

                <body>
                    <div id="verificationModal" class="modal">
                        <div class="modal-content">
                            <form action="" method="post" enctype="multipart/form-data">
                                <span class="close" formaction="logout.php">&times;</span>
                                <h2>Email Verification Required</h2>
                                <p>Your account is not verified yet. Please check your email for the verification link.</p>
                                <p>If you did not receive the email, click the button below to resend the verification email.</p>
                                <p>Enter the verification code:</p>
                                <input type="hidden" name="email" value="<?= $email ?>">
                                <input type="text" name="code" id="verificationCodeInput" placeholder="Enter code">
                                <button id="submitVerificationCode" formaction="process.php">Submit</button>
                                <button id="resendVerification" formaction="mail.php">Resend Verification Email</button>
                            </form>
                        </div>
                    </div>
                </body>

                </html>
<?php
            } else if ($updateQuery) {
                if ($row['role'] == "Admin") {
                    echo '<script>alert("Successfully logged in as admin");</script>';
                    echo '<script>window.location.href = "admin.php";</script>';
                } else {
                    echo '<script>alert("Successfully logged in");</script>';
                    echo '<script>window.location.href = "homepage.php";</script>';
                }
                exit();
            } else {
                echo '<script>alert("Error on login, try again later");</script>';
                echo '<script>window.history.back();</script>';
            }
        } else {
            echo '<script>alert("Incorrect Password");</script>';
            echo '<script>window.history.back();</script>';
        }
    } else {
        echo '<script>alert("User not found or invalid credentials");</script>';
        echo '<script>window.history.back();</script>';
    }
    exit();
}
?>