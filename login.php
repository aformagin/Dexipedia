<!-- Checking if a user is logged in, if they are we don't want them to see the login page so we redirect them to the home page -->
<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login/Register</title>

    </head>
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
    <!-- Showing and errors if they exist -->
    <?php
      if (isset($_SESSION['error'])) {
        echo "<a style='color: red'>{$_SESSION['error']}</a>";
        echo '<br><br>';
        unset($_SESSION['error']); // clear the error in the $_SESSION array
      }
    ?>
    <body>
        <h2>Login!</h2>
        <form action="loginv.php" method="post">
            <div>
              <label for="uname"><b>Email</b></label>
              <input class="login" type="email" id="email" placeholder="Enter Email" name="email" required>
          
              <label for="psw"><b>Password</b></label>
              <input class="login" type="password" id="password" placeholder="Enter Password" name="password" required>
              <button type="submit">Login</button>
            </div>
        </form>
        <h2>Register</h2>
          <form action="register.php" method="post">
            <div>
              <button type="submit">Register</button>
            </div>
          </form>
    </body>
</html>