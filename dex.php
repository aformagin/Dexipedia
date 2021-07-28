<!DOCTYPE html>
<html>
<head>
    <!-- Meta information needs to go here-->
    <title>The Dex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!--This is the start of the Nav bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Team 21 Site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
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
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<!--End of Nav Bar-->
<div class="shadow" style="max-width: max-content; margin-right: auto; margin-left: auto;">
    <div class="container-fluid form-group">
        <form action="pokemon.php" method="POST" style="padding: 10px;">
            <table>
                <tr>
                    <td>
                        <label class="form-control-plaintext">Pokemon Name: </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="pname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-control-plaintext">Pokemon ID: </label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="pid" min="1" max="898">
                    </td>
                </tr>
            </table>
            <input class="btn btn-success" type="submit" value="Search Dex">
        </form>
    </div>
</div>
</body>
</html>