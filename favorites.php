<?php
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = 'Please login or register to access the favorites page';
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Project</title>
    </head>
    <body >
        <!--This is the start of the Nav bar-->
        <div>
            <ul >
                <li ><a href="#">Pokedex</a></li>
                <li ><a href="#">Favorite Pokemon</a></li>
                <li >
                    <form  action="#" action="#" method="POST" target="_self">
                        <input  type="text" name="search" placeholder="Search for Pokemon">
                    </form>
                </li>
                <li ><a href="#">Pokemon Minigames</a></li>
                <li ><a href="#">About</a></li>
                <li ><a href="#">Credit</a></li>
                <li ><a href="#">Feed Back</a></li>
                <li>
                    <?php
                    // if the user is logged in we show the logout button, else we show the login/register buttons.
                    if (isset($_SESSION['id'])) {
                        echo '<a href="logout.php">Logout</a>';
                    } else {
                        echo '<a href="login.php">Login / Register</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
        <!--End of Nav Bar-->
        <div>
            <p>The same way that pokedex work, but instead of printing all pokemon print only the user favorite pokemon</p>
        </div>
    </body>
</html>