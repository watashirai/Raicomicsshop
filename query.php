<?php

$query = mysqli_query($con, "select * from currentuser where UserID = '1'");
$row = mysqli_fetch_assoc($query);
$username = $row["username"];
$FName = $row["FName"];
$email = $row["email"];
if ($username != 0) {
    $queryUser = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
    $rowUser = mysqli_fetch_assoc($queryUser);
    $password = $rowUser["password"];
    $UserID = $rowUser["user_id"];
    $role = $rowUser["role"];


    // if ($username != "admin") {
    //     $query69 = mysqli_query($con, "SELECT COUNT(MyEventID) AS count from myevents WHERE customer_id = $UserID");
    //     $row69 = mysqli_fetch_assoc($query69);
    //     $eventcount = $row69["count"];
    // } else {
    //     $query69 = mysqli_query($con, "SELECT COUNT(MyEventID) AS count from myevents");
    //     $row69 = mysqli_fetch_assoc($query69);
    //     $eventcount = $row69["count"];
    // }
}
?>
<script>
    function verify() {
        alert("Please login into a verify account first.");
    }
</script>