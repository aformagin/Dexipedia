<?php
//Call the file with the database info
require_once 'database.php';
session_start();
//Start a session and check if the user is logged in, if not send them to the login page with an error message
if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = 'Please login or register to access the settings page';
    header("Location: login.php");
    exit();
}

//Used to delete the user from the user table
if(isset($_POST['delete_user'])) {
    $user_id = $_SESSION['id'];
    $connection->query("DELETE FROM users WHERE id = '$user_id'");
    require_once 'logout.php';
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dexipedia - Account Settings</title>
        <link rel="icon" href="imgs/dexipedia.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/pokeball.css">
        <!-- Bootstrap javascript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body class="poke-body">
        <!--This is the start of the Nav bar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-min page-contents">

            <a class="navbar-brand" href="index.php"><img src="imgs/dexipedia.png" style="max-height: 75px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            // if the user is logged in we show the logout button, else we show the login/register buttons.
                            if (isset($_SESSION['id'])) {
                                echo '<a class="dropdown-item" href="logout.php">Logout<span class="sr-only">(current)</span></a>';
                                echo '<a class="dropdown-item" href="settings.php">Settings</a>';
                            } else {
                                echo '<a class="dropdown-item" href="login.php">Login / Register<span class="sr-only">(current)</span></a>';
                            }
                            ?>
                        </div>
                    </li>
                    <!-- Dropdown menu within the nav bar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Poke-Focused
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="favorites.php">Favourite Pokemon</a>
                            <a class="dropdown-item" href="dex.php">Pokedex</a>
                            <a class="dropdown-item" href="#">Pokemon Minigames</a>
                        </div>
                    </li>

                    <!-- Dropdown menu within the nav bar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More...
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="about.php">About</a>
                            <a class="dropdown-item" href="credit.php">Credit</a>
                            <a class="dropdown-item" href="feedback.php">FeedBack</a>
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
        <div class="spacing">
            <p>More to come, just waiting on others</p>
            <div class="container page-contents shadow-sm p-3 mb-5 bg-body rounded bg-light" style="padding: 2%;">
                <form method="post" action="">
                    <button type="submit" name="delete_user">Delete Account</button>
                </form>
            </div>
        </div>
    </body>
</html>
