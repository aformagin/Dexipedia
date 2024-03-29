<?php
//Call the file with the database info
require_once 'database.php';
session_start();
//Start a session and check if the user is logged in, if not send them to the login page with an error message
if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = 'Please login or register to access the favorites page';
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Dexipedia, a student driven project">
    <meta name="keywords" content="HTML, PHP, CSS, JavaScript, Bootstrap">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dexipedia - Favourites</title>

    <link rel="icon" href="imgs/dexipedia.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous"> <?php
    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
        $sql = "SELECT colorScheme FROM colorChoice WHERE id=$user_id";
        $res = $connection->query($sql);
        $row = $res->fetch_assoc();
        $value = $row['colorScheme'];

        if ($value == 2) {
            echo '<link rel="stylesheet" href="css/pkmn.css">';
        } elseif ($value == 3) {
            echo '<link rel="stylesheet" href="css/pkmnpurp.css">';
        } elseif ($value == 4) {
            echo '<link rel="stylesheet" href="css/pkmntan.css">';
        } else {
            echo '<link rel="stylesheet" href="css/pokeball.css">';
        }
    } else {
        echo '<link rel="stylesheet" href="css/pokeball.css">';
    }
    ?>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="imgs/dexipedia.png" style="max-height: 75px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Poke-Focused
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="favorites.php">Favourite Pokemon</a>
                    <a class="dropdown-item" href="dex.php">Pokedex</a>
                </div>
            </li>

            <!-- Dropdown menu within the nav bar -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
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
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<!--End of Nav Bar-->
<div class="container page-contents">
    <div class="shadow-sm p-3 mb-5 bg-body rounded bg-light center-max-content" style="margin-top: 2%;">
        <!--Open the divs where the pokemon will be placed -->
        <?php
        //Function to retrieve data from the database. It is used to make sure the pokemon name is correct
        function retrieveFromDB($data)
        {
            $query = "SELECT * FROM PKMN_NAMES where pkmnName like '%$data%' or pkmnid like '%$data%'";

            $host = "localhost";
            $username = "formagia_PKMNDBTest";
            $password = "testdb123!";
            $table = $username;

            $conn = mysqli_connect($host, $username, $password, $table);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $result_query = $conn->query($query);
            $results = $result_query->fetch_assoc();

            return $results['pkmnName'];

        }

        function getResponse($link)
        {
            //PHP get request

            $response = file_get_contents($link); //The response object is in the format of JSON

            $jsonObj = json_decode($response); //Decode the JSON string so it is workable in PHP

            $name = $jsonObj->name; //Getting the name works

            // Gets the front sprite from the jsonObject
            $pics = $jsonObj->sprites; //Gets the pictures object from the jsonobject
            $front = $pics->front_default; //gets the front_default sprite


            // Gets the id (which is the international dex number) from the jsonResponseObject
            $dexNum = $jsonObj->id;
            return array($name, $front, $dexNum);
        }

        //Get the user ID
        $user_id = $_SESSION['id'];
        //Check if the user has any saved pokemon on their file
        $result = $connection->query("SELECT pkmnId  FROM favorites WHERE id=$user_id");
        if (mysqli_num_rows($result) == 0) {
            echo "<h2> Nothing Saved </h2>";
        } //If the user has saved pokemon, create a table with the pokemon's name, id, and sprite
        else {
            $sql = "SELECT pkmnId FROM favorites WHERE id=$user_id";
            $res = $connection->query($sql);
            while ($row = $res->fetch_assoc()) {
                $searchedID = $row['pkmnId'];
                $searchedName = retrieveFromDB($searchedID);
                $pokemonID = "pokemon/$searchedName";

                $link = "https://pokeapi.co/api/v2/$pokemonID";
                $responseArray = getResponse($link);

                $displayedName = ucfirst($responseArray[0]);
                $displayedDexNum = $responseArray[2];
                $frontSprite = $responseArray[1];

                echo '<table class="table table-responsive shadow p-3 mb-5 bg-body" style="border: solid 2px; border-color: black;">
                    <tr>
                        <th class="table-dark" colspan=2><label></label>#' . $displayedDexNum . ' - ' . $displayedName . '</th>
                    </tr>
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <label>' . $displayedName . '</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Dex Number</label>
                        </td>
                        <td>
                            <label>' . $displayedDexNum . '</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Sprite</label>
                        </td>
                        <td>
                            <label id=img><img src=' . $frontSprite . '></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-div-center">
                                <form  action="delete.php" method="POST" target="_self">
                                    <button class="btn btn-warning" name="pkmnId" value=' . $displayedDexNum . '><object data="imgs/nofill_star.svg"></object></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>';
            }
        }
        ?>
    </div>
</div>
</body>
</html>
