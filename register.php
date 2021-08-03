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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pokeball.css">
    <!-- Bootstrap javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
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
                    <a class="dropdown-item" href="#">About</a>
                    <a class="dropdown-item" href="#">Credit</a>
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
<?php
//if (isset($_SESSION['error'])) {
//    echo "<a style='color: red'>{$_SESSION['error']}</a>";
//    echo '<br><br>';
//    unset($_SESSION['error']); // clear the error in the $_SESSION array
//}
//?>
<div class="container page-contents">
    <?php
    if (isset($_SESSION['error'])) {
        echo
        "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    {$_SESSION['error']}
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        unset($_SESSION['error']); // clear the error in the $_SESSION array
    }
    ?>
    <div class="center-max-content bg-light shadow-sm p-3 mb-5 bg-body rounded" style="margin-top: 2%;">
        <h2 style="text-align: center">Register</h2>
        <form class="form-group" action="registerv.php" method="post">
            <table>
                <tr class="spacing">
                    <td>
                        <label for="name"><b>Name</b></label>
                    </td>
                    <td>
                        <input class="login form-control" type="text" id="name" placeholder="Enter your name"
                               name="name" required>
                    </td>
                </tr>
                <tr class="spacing">
                    <td>
                        <label for="email"><b>Email</b></label>
                    </td>
                    <td>
                        <input class="login form-control" type="email" id="email" placeholder="Enter Email" name="email"
                               required>
                    </td>
                </tr>
                <tr class="spacing">
                    <td>
                        <label for="password"><b>Password</b></label>
                    </td>
                    <td>
                        <input class="login form-control" type="password" id="password" placeholder="Enter Password"
                               name="password"
                               required>
                    </td>
                </tr>
                <tr class="spacing">
                    <td>
                        <label for="confirm-password"><b>Repeat Password</b></label>
                    </td>
                    <td>
                        <input class="login form-control" type="password" placeholder="Repeat Password"
                               id="confirm-password"
                               name="confirm-password" required>
                    </td>
                </tr>
            </table>
            <div class="btn-div-center login-btn">
                <button class="btn btn-outline-primary" type="submit">Register</button>
            </div>
    </div>

</div>
</body>
<!--Here the user can register -->
</html>