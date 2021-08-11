<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dexipedia - A Pokemon encyclopedia</title>
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
            <div class="container page-contents shadow-sm p-3 mb-5 bg-body rounded bg-light" style="padding: 2%;">
                <description>
                  <ul style="list-style-type:none;">
                      <li>
                        <h3>About Us</h3><hr>
                        <p>Our website is a Pokémon information catalogue based on the popular
                          series of Pokémon games. We have created various pages such as Pokedex, Favourites, and FeedBack accessible to you through the navigation bar. These pages and more offer you information on the game mechanics and valuable information on each Pokémon. This is a student driven project that allowed us to expand on our working skills of PHP, HTML, MySQL, and more. Our team of 5 hardworking <i>University of Windsor</i> students was inspired by our shared interest of Pokémon to create a website for curious poke-lovers to discover.
                        </p>
                        <p>As our users find our site they are met with our beautiful <b>home page</b>. This holds our logo, a large navigation bar near the top of the screen, and a bit about our website. The navigation bar contains our home page, our Pokedex page, and our account section. In the account section users are able to register for an account if they would like. From there we have also enabled login and logout sections that change based on if the user has signed in.
                        </p>
                        <p>In our <b>Pokedex</b> page our users are presented with a large search box. This box has two searching options; Pokémon name or Pokémon Id number. With each option the result would end up the same. If the user searches for ‘bell’ the page will return the Pokémon ‘Bellsprout’ since it is the first Pokémon which contains ‘bell’ in its name. If the user searches for a Pokémon based on their Id number the result will be the exact Pokémon displayed.
                        </p>
                        <p>Users also have the option to browse through a paged catalog of all existing Pokémon. Located underneath our search option there is our <b>“Browse ‘em all!” header.</b> All included Pokémon are displayed in groups of six starting at Pokémon number one which is Bulbasaur. There are buttons at the bottom of each group of six allowing users to move forward and backwards between pages.
                        </p>
                      </li>
                    </ul>
                </description>
            </div>
        </div>
      </body>
</html>
