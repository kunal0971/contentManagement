<?php
    include_once 'header.php';
?>

<?php
    
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    

    if (isset($_SESSION['u_id'])) {
        echo '<p align="center">You are already logged in.</p>';
    } else {
        echo '<section class="main-container">
                <div class="main-wrapper">
                    <h2>Signup</h2>
                    <form class="signup-form" action="includes/signup.inc.php" method="POST">
                        <input type="text" name="first" placeholder="First Name">
                        <input type="text" name="last" placeholder="Last Name">
                        <input type="text" name="email" placeholder="E-mail">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="submit">Sign Up</button>
                    </form>
                </div>
            </section>';
    }
?>

<?php
    include_once 'footer.php';
?>
