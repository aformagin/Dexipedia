<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pokeball.css">
    <!-- Bootstrap javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <!--This is the start of the Nav bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

    <h1>FEEDBACK</h1>
    <h3>Let us know what you think about the website!</h3>
    <!-- PAGE BODY-->
    <form action="#" method="POST">
        <div>
            First Name:&emsp;<input type="text" name="fname"><br>
            Last Name:&emsp;<input type="text" name="lname"><br>
            Email:  &emsp;&emsp;&emsp;<input type="text" name="email"><br>
        </div>
        <br>
        <div>
            <!--Team Radio Buttons-->
            <h5>Please Select the Team you Would Like your Feedback to be Sent too:</h5>
            <input type="radio" id="designTeamRadio" name="team" value=0>
            <label for="designTeamRadio">Web Design Team</label><br>
            <input type="radio" id="techTeamRadio" name="team" value=1>
            <label for="techTeamRadio">Technical Support Team</label><br>
            <input type="radio" id="marketingTeamRadio" name="team" value=2>
            <label for="marketingTeamRadio">Marketing Team</label><br>
            <input type="radio" id="merchTeamRadio" name="team" value=3>
            <label for="merchTeamRadio">Merchandise and Shipping Team</label><br>
        </div>
        <br>
        <div>
            <h5>Subject:</h5> <input type="text" name="subject"><br>
            <h5>Content:</h5><textarea name="message" rows="4" cols="75"></textarea><br>
            <input type="submit">
        </div>
    </form>
</body>
</html>