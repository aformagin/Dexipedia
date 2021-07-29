<?php
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

if (!empty($_POST['pid'])) {
    $searchID = $_POST['pid'];
    $pokemonID = "pokemon/$searchID";

    $link = "https://pokeapi.co/api/v2/$pokemonID";
    $responseArray = getResponse($link);
    $displayedName = ucfirst($responseArray[0]);
    $displayedDexNum = $responseArray[2];
    $frontSprite = $responseArray[1];
    echo "<table class='table table-responsive shadow p-3 mb-5 bg-body' style='border: solid 2px; border-color: black;'>";
    echo "<tr><th class='table-dark' colspan=2><label></label>";
    echo "#$displayedDexNum - $displayedName</th>";
    echo "</tr><tr><td><label>Name</label></td><td>";
    echo "<label>$displayedName</label></td></tr>";
    echo "<tr><td><label>Dex Number</label></td><td>";
    echo "<label>$displayedDexNum</label></td></tr>";
    echo "<tr><td><label>Sprite</label></td><td>";
    echo "<label id='img'><img src=$frontSprite></label></td></tr></table>";
}

?>


