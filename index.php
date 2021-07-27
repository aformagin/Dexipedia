<?php
session_start();
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
                <li ><a href="favorites.php">Favorite Pokemon</a></li>
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
        <description >
            <ul >
                <li ><h3>About Us</h3><hr><p>Our goal with the website<a href="#" >About Us</a></p></li>
                <li ><h3>Pokedex</h3><hr><p>Ouuu look at all the pokemon!!<a href="#" >Pokedex</a></p></li>
                <li ><h3>FeedBack</h3><hr><p>Lets us know what you think about our website!<a href="#" >Feedback</a></p></li>
            </ul>
        </description>
    </body>
</html>