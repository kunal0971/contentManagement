<?php

session_start();

if (isset($_POST['submit'])) {
    include 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    // error handlers
    // check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uname='$uid' OR email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                // de-hashing the password
                #$hashedPwdCheck = password_verify($pwd, $row['pwd']);
                $hashedPwdCheck = $row['pwd'];
                if ($hashedPwdCheck != $pwd) {
                    header("Location: ../index.php?login=error");
                    exit();
                } elseif ($hashedPwdCheck == $pwd) {
                    // log in the user here
                    $_SESSION['u_id'] = $row['id'];
                    $_SESSION['u_first'] = $row['first'];
                    $_SESSION['u_last'] = $row['last'];
                    $_SESSION['u_email'] = $row['email'];
                    $_SESSION['u_uname'] = $row['uname'];
                    #header("Location: ../index.php?login=success");
                    header("Location: ../home.php");
                    exit();
                }
            }
        }
    }
} else {
        header("Location: ../index.php?login=error");
        exit();
}
