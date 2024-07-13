<style>
    /* Popup container */
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        /* Changed background color */
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 2;
        /* Ensure popup is above the fade overlay */
    }

    .fade {
        display: none;
        position: fixed;
        background-color: rgba(0, 0, 0, 0.5);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1;
    }

    /* Close button */
    .close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }

    .popup-button {
        display: block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .popup-button:hover {
        background-color: #0056b3;
    }



    .show {
        display: block;
    }
</style>


<header class="header">

    <section class="flex">
        <a href="homepage.php" class="logo">
            <img src="css/img/logo.png" alt="Taskmosaic" style="height: 65px">
        </a>

        <nav class="navbar">
            <a href="homepage.php">My projects</a>
            <a href="tasklist.php">My task</a>
        </nav>

        <div class="icons">
            <a onclick="togglePopup()">
                <div id="user-btn">
                    <img src="css/img/user-profile.png" alt="rai" style="height: 35px;">
                </div>
            </a>
        </div>

    </section>
    <div id="fade" class="fade"></div>
    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" onclick="togglePopup()">&times;</span>
            <h2>Choose an Option</h2>
            <a href="edituser.php" class="popup-button">Edit User</a>
            <a href="editpass.php" class="popup-button">Change Password</a>
            <a href="logout.php" class="popup-button">Logout</a>

        </div>
    </div>
    <script>
        function togglePopup() {
            var popup = document.getElementById("popup");
            popup.classList.toggle("show");
            var popup = document.getElementById("fade");
            popup.classList.toggle("show");
        }
    </script>
</header>