<style>
    * {
    padding: 0px;
    margin: 0px;
    font-family: Arial, Helvetica, sans-serif;
}
    .settings {
        max-width: 353px;
        margin: 356px auto;
        padding: 16px;
        background-color: #d5d5d5;
        border: 1px solid #020202;
        border-radius: 19px;
    }

    .settings input {
        width: 100%;
        margin-bottom: 10px;
        padding: 8px;
        box-sizing: border-box;
    }

    .settings input[type="submit"] {
        background-color: #1E9AFE;
        color: #fff;
        cursor: pointer;
    }

    .settings input[type="submit"]:hover {
        background-color: #1E9AFE;
    }
</style>

<?php $email = $_GET['email']; ?>
<form action="updateresetpassword.php" class="settings" method="post" enctype="multipart/form-data">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    New Password: <input type="password" name="password">
    Confirm Password: <input type="password" name="cpassword">
    <input type="submit" value="Change">
</form>