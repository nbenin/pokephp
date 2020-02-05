<?php
// Get the pokemon name
$pokemon = $_GET['pokemon'];

// Start setting information when form submitted
if (isset($pokemon)) {

    // API call
    $responsePokemon = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $pokemon);
    $responseSpecies = file_get_contents('https://pokeapi.co/api/v2/pokemon-species/' . $pokemon);
    $dataPokemon = json_decode($responsePokemon, true);
    $dataSpecies = json_decode($responseSpecies, true);

    // Calling functions
    setIcon($dataPokemon);
}

// Function to set the icon
function setIcon($pokeObj) {
    $pokeImg = $pokeObj{sprites}{front_default};
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Poké-dex library to keep track of all the pokemons">
    <meta name="robots" content="index,follow">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="Imane and Neil">
    <meta name="description" content="Poké-dex library to keep track of all the pokemons">
    <title>Poké-dex</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<h1 class="title">The greatest Poké-dex</h1>
<section class="container">
    <section class="P1">
        <section class="pokemonIcon">
            <img src="<?php echo $pokeImg;?>" alt="Poke icon" class="pokeIcon">
            <p class="pokeName"></p>
        </section>
        <form action="" method="GET" class="getinput">
            <input id="input" name="pokemon" type="text" placeholder="type a pokemon name!">
            <button id="inputBtn" class="btn search" type="submit">search</button>
        </form>
    </section>
    <section class="P2">
        <section class="Descriptionbox">
            <p class="description"></p>
        </section>
        <section class="movesList">
            <ul id="movesList">
            </ul>
        </section>
        <section class="EvolutionIcon">
            <img class="evolutionIcon" src="" alt="evicon">
            <p class="evolutionName"></p>
        </section>
        <section class="buttons">
            <button id="previousbtn" class="btn" class="search"><==</button>
            <button id="nextbtn" class="btn" class="search">==></button>
        </section>
    </section>
</section>
</body>
</html>