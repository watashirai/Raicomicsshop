<?php
include("connect.php");
include("query.php");

if (isset($_GET['returned'])) {
    $returned = $_GET['returned'];
    $eventid = $_GET['eventid'];


    if ($returned == 0) {
        $sql = "UPDATE borrow SET returned = $returned WHERE id = $eventid";

        if ($con->query($sql) === TRUE) {
            $successMessage = "Approve Cancel.";
            echo "<script>
                alert('$successMessage');
                window.location.href = 'admin.php?dashboard';
              </script>";
            exit();
        } else {
            $errorMessage = "Error unblocking user: " . $con->error;
            echo "<script>
                alert('Error: $errorMessage');
                window.location.href = 'admin.php?dashboard';
              </script>";
            exit();
        }
    }

    if ($returned == 1) {
        $sql = "UPDATE borrow SET returned = $returned WHERE id = $eventid";

        if ($con->query($sql) === TRUE) {
            $successMessage = "Request Approved.";
            echo "<script>
                alert('$successMessage');
                window.location.href = 'admin.php?dashboard';
              </script>";
            exit();
        } else {
            $errorMessage = "Error unblocking user: " . $con->error;
            echo "<script>
                alert('Error: $errorMessage');
                window.location.href = 'admin.php?dashboard';
              </script>";
            exit();
        }
    } else if ($returned == 2) {
        $sql = "DELETE FROM borrow WHERE id = $eventid";

        if ($con->query($sql) === TRUE) {
            $successMessage = "Request Canceled.";
            echo "<script>
                alert('$successMessage');
                window.location.href = 'admin.php?dashboard';
              </script>";
            exit();
        } else {
            $errorMessage = "Error unblocking user: " . $con->error;
            echo "<script>
                alert('Error: $errorMessage');
                window.location.href = 'admin.php?dashboard';
              </script>";
            exit();
        }
    }
} else {
    $noUserIdMessage = "User ID not provided.";
    echo "<script>
            alert('$noUserIdMessage');
            window.location.href = 'admin.php?dashboard';
          </script>";
    exit();
}
