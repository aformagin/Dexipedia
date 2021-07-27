<!DOCTYPE html>

<html>
    <head>
        <title>Test Pokemon Page</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php
        function getResponse($link){
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
        
        if(!empty($_POST["pname"]) && empty($_POST["pid"])){
            $searchedName = strtolower($_POST["pname"]);
            $pokemonName = "pokemon/$searchedName";

            $link = "https://pokeapi.co/api/v2/$pokemonName";
            $responseArray = getResponse($link);
            $displayedName = $responseArray[0];
            $displayedDexNum = $responseArray[2];
            $frontSprite = $responseArray[1];
        } elseif(!empty($_POST["pid"]) && empty($_POST["pname"])){
            $searchedID = $_POST["pid"];
            $pokemonID = "pokemon/$searchedID";

            $link = "https://pokeapi.co/api/v2/$pokemonID";
            $responseArray = getResponse($link);
            
            $displayedName = ucfirst($responseArray[0]);
            $displayedDexNum = $responseArray[2];
            $frontSprite = $responseArray[1];
        } else {
            echo '<div class="alert alert-warning" role="alert">Please fill out one of the inputs!</div>';
        }
        ?>
        <div class="container">
            <div class="container-fluid shadow" style="max-width: max-content; margin-right: auto; margin-left: auto; padding: 10px;">
                <table class="table table-responsive" style="border: solid 2px;">
                    <tr>
                        <th class="table-dark" colspan=2><label></label><?php echo "#$displayedDexNum - $displayedName"; ?></th>
                    </tr>
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <?php  echo "<label>$displayedName</label>";?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Dex Number</label>
                        </td>
                        <td>
                            <?php  echo "<label>$displayedDexNum</label>";?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Sprite</label>
                        </td>
                        <td>
                            <?php echo "<label id='img'><img src=$frontSprite></label>";?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>