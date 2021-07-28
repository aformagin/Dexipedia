<!-- Checking if a user is logged in, if they are we don't want them to see the register page so we redirect them to the home page -->
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
        <title>Register</title>
    </head>
    <body>
    <!--This is the start of the Nav bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Team 21 Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <?php
                    // if the user is logged in we show the logout button, else we show the login/register buttons.
                    if (isset($_SESSION['id'])) {
                        echo '<a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>';
                    } else {
                        echo '<a class="nav-link" href="login.php">Login / Register<span class="sr-only">(current)</span></a>';
                    }
                    ?>
                </li>

                <!-- Dropdown menu within the nav bar -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Poke-Focused
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="favorites.php">Favourite Pokemon</a>
                        <a class="dropdown-item" href="#">Pokedex</a>
                        <a class="dropdown-item" href="#">Pokemon Minigames</a>
                    </div>
                </li>

                <!-- Dropdown menu within the nav bar -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More...
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">About</a>
                        <a class="dropdown-item" href="#">Credit</a>
                        <a class="dropdown-item" href="#">FeedBack</a>
                    </div>
                </li>
            </ul>
            <!-- Search -->
            <form action="#" method="POST" target="_self" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="search"  placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!--End of Nav Bar-->
    <?php
        if (isset($_SESSION['error'])) {
            echo "<a style='color: red'>{$_SESSION['error']}</a>";
            echo '<br><br>';
            unset($_SESSION['error']); // clear the error in the $_SESSION array
        }
    ?>
        <h2>Register</h2>
        <form action="registerv.php" method="post">
            <div>
                <label for="name"><b>Name</b></label>
                <input class="login" type="text" id="name" placeholder="Enter your name" name="name" required>


                <label for="email"><b>Email</b></label>
                <input class="login" type="email" id="email" placeholder="Enter Email" name="email" required>
            
                <label for="password"><b>Password</b></label>
                <input class="login" type="password" id="password" placeholder="Enter Password" name="password" required>
            
                <label for="confirm-password"><b>Repeat Password</b></label>
                <input class="login" type="password" placeholder="Repeat Password" id="confirm-password" name="confirm-password" required>
              <button type="submit">Register</button>
    </body>
    <!--Here the user can register -->
</html>