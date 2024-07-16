<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/Inventory.css">
    <link rel="icon" href="Image/logo.ico">
    <style>
        .your-events {
            background-color: #313237;
            margin: 50px 10px;
            border-radius: 10px 10px 0 0;
        }

        .headertitle {
            display: flex;
            background-color: #1e1f23;
            height: 60px;
            border-radius: 10px 10px 0 0;
            align-items: center;
            padding: 5px 5px 5px 13px;
            color: white;
            font-size: 14px;
            gap: 5px;
            font-weight: 700;
        }

        .iventdom {
            display: flex;
            gap: 10px;
            padding: 30px;
            flex-wrap: wrap;
        }

        .perevent {
            width: 300px;
            background: #2c2d31;
            color: white;

        }

        .eventdate {
            display: flex;
            background-color: #1e1f23;
            height: 60px;
            border-radius: 10px 10px 0 0;
            align-items: center;
            padding: 5px 5px 5px 13px;
            color: white;
            font-size: 14px;
            gap: 5px;
            font-weight: 700;
        }

        .rows div {
            padding: 15px 20px;
            border-bottom: solid 2px #313237;
        }

        .row {
            display: flex;
            flex-direction: column;
        }

        .row2 {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .row3 {
            height: 45%;
            overflow-y: auto;
            padding: 10px;
            scrollbar-width: thin;
            scrollbar-color: #888 #ccc;
            font-size: 12.5px;
        }


        .row4 div {
            border-bottom: none;
        }

        .Approve {
            margin-left: auto;
            padding: 5px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
        }

        .Cancel {
            padding: 5px;
            cursor: pointer;
            background-color: orangered;
            color: white;
            border: none;
            border-radius: 3px;
        }
    </style>

</head>
<?php
include("connect.php");
include("query.php");
echo "<style>
        body {
            background-color: $backgroundcolor;
        }
        .fade-overlay {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), $backgroundcolor);
    </style>";
?>

<body>
    <?php include 'aheader.php'; ?>
    <section id="page" style="min-height: 90vh;">
        <div class="wrapper" id="page">
            <h1 style="font-size: 50px">Customer Page</h1>
            <div class="pagetab">
                <?php include("admineditpage.php"); ?>
            </div>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Upload Image</h2>
                <form id="uploadForm" action="slide.php" method="post" enctype="multipart/form-data" onsubmit="return adminpass2()">
                    <p>Slide number<input type=" text" name="slideindex" readonly style="border: none; font-size: 30px">
                    </p>
                    <p>New image: <img id="previewImage" src=""><input type="file" name="myfile" id="fileInput" onchange="fileInputChanged()" style="display: none;"></p>
                    <input type="submit" name="submit" value="UPLOAD">
                </form>
            </div>
        </div>
        <div id="myModalpagetab" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal2()">&times;</span>
                <h2>Upload Image</h2>
                <form id="uploadFormPagetab" action="editpage.php" method="post" enctype="multipart/form-data" onsubmit="return adminpass2()">
                    <p>Logo<input type="text" name="ItemID" readonly style="border: none; font-size: 30px ">
                    <p>New image:</p> <img id="previewImage2" src="" width="200"><input type="file" name="logo" id="fileInput2" onchange="fileInputChanged2()" style="display: none;">
                    <input type="submit" name="logof" value="UPLOAD">
                </form>
            </div>
        </div>
    </section>
    <section id="inventory" style="min-height: 100vh;">
        <div class="wrapper" id="page">
            <?php include 'inventory.php'; ?>
        </div>
    </section>
    <section id="dashboard" class="wrapper">
        <section id="myevent" style="padding-top: 50px;">
            <?php
            if (isset($UserID)) {
                $getEventQuery = "SELECT borrow.id , borrow.customer_name , borrow.returned, books.BookID, books.Title, books.BookImage, books.Author
                      FROM borrow
                      INNER JOIN books ON book_id  = books.BookID 
                       ORDER BY books.BookID ASC";
                $result = mysqli_query($con, $getEventQuery);
            ?>
                <div class="your-events">
                    <div class="headertitle">
                        <p class="count"><?= $eventcount ?></p>
                        <p class="HeaderName">Request</p>
                    </div>
                    <div class="iventdom">
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                            $returned = $row['returned'];
                        ?>
                            <div class="perevent">
                                <div class="eventdate">
                                    <?php
                                    if ($row['returned'] == 0) { ?>
                                        <a href="updat_status.php?returned=1&eventid=<?= $row['id']; ?>" class="Approve">Approve</a>
                                    <?php } else { ?>
                                        <a href="updat_status.php?returned=0&eventid=<?= $row['id']; ?>" class="Approve" style=" background-color: gray; ">Approved</a>
                                    <?php }
                                    ?>
                                    <a href="updat_status.php?returned=2&eventid=<?= $row['id']; ?>" class="Cancel">Cancel</a>
                                </div>
                                <div class="rows">
                                    <div class="row">
                                        <h1 class="eventh1"><?= $row['Title'] ?></h1>
                                    </div>
                                    <div class="row2">
                                        <img src="<?= $row['BookImage'] ?>" style="width: 150px;">
                                    </div>
                                    <div class="row3">
                                        <p class="description"><?= $row['Author'] ?></p>
                                    </div>
                                    <div class="row4">
                                        <p class="count">Request by:
                                            <?php
                                            $requestid = $row['customer_name'];
                                            $sql2 = "SELECT * FROM users WHERE UserID = '$requestid'";
                                            $row2 = mysqli_query($con, $sql2);
                                            $requestusernames = mysqli_fetch_assoc($row2)['username'];
                                            echo " <span class='usericon'>$requestusernames</span>";
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    </div>
                </div>
        </section>
        <style>
            .alldash {
                display: flex;
                flex-wrap: wrap;
            }

            .dashitem {
                margin: 10px;
                padding: 10px;
                border: 1px solid #ddd;
                position: relative;
                overflow: hidden;
            }

            .dashitem .img {
                background-color: var(--primary);
                width: 344px;
                height: 91px;
            }

            .huge {
                font-size: 40px;
                line-height: normal;
            }

            .infodash {
                position: absolute;
                top: 7px;
                right: 6px;
                padding: 10px;
                color: white;
                text-align: right;
            }

            .view {
                text-align: right;
                padding: 5px;
            }

            .view p {
                color: #337ab7;
            }
        </style>
    </section>
    <script>
        function adminpass2() {
            var result = checkAdminPassword();

            if (result === true) {
                return true;
            } else if (result === "canceled") {
                alert("You Canceled.");
                return false;
            } else {
                // Code to execute if the password is incorrect
                alert("Incorrect password.");
                return false;
            }
        }

        function checkAdminPassword() {
            // Prompt the user for the admin password
            var enteredPassword = prompt("Enter Admin Password:");
            // Check if the entered password is correct
            if (enteredPassword === "<?php echo "$hashedadminpassword" ?>") {
                return true; // Password is correct
            } else if (enteredPassword === null) {
                return "canceled"; // User canceled the prompt
            } else {
                return false; // Incorrect password
            }
        }
    </script>
    <script src="acode.js"></script>
</body>