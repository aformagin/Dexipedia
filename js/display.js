var currentMax = 6;

function displayTest(num, element){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function (){
        document.getElementById(element).innerHTML = this.responseText;
    }

    xhttp.open("POST", "getpokemon.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pid=" + num);
}

function firstLoad(){
    var element = "display";
    for (let i = 0; i < 6; i++){
        displayTest(i+1, element+i);
    }
}

function displayNext(){
    currentMax = currentMax + 6;
    var element = "display";

    for (let i = 0; i < 6; i++){

        displayTest(currentMax+1+i, element+i);
    }
}

function displayPrev(){
    currentMax = currentMax - 6;

    if(currentMax < 0)
        currentMax = 0;
    var element = "display";
    for (let i = 0; i < 6; i++){
        displayTest(currentMax+1+i, element+i);
    }
}