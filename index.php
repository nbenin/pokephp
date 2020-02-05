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

    // Set the image source variable
    $pokeImg = $dataPokemon{sprites}{front_default};
    // Set description
    $pokeDescription = getEnglishDescription($dataSpecies);
    // Set moves list
    $movesList = getMovesList($dataPokemon);
    var_dump($movesList);

}

// Function for moves list
function getMovesList($pokeObj) {
    $fourRandoms = [];
    $movesCount = 4;

    // Special case for Ditto
    if (count($pokeObj{moves}) < 4) {
        $movesCount = count($pokeObj{moves});
    }

    $randomNums = array_rand($pokeObj{moves}, $movesCount);
    foreach ($randomNums as $num) {
        array_push($fourRandoms, $pokeObj{moves}[$num]{move}{name});
    }

    // Again special for ditto
    if ($randomNums === 0) {
        array_push($fourRandoms, $pokeObj{moves}[0]{move}{name});
    }

    return $fourRandoms;
}

// Function to find english description
function getEnglishDescription($pokeObj) {
    $pokeDescription = '';
    foreach ($pokeObj{flavor_text_entries} as $flavorText) {
        if ($flavorText{language}{name} == 'en') {
            $pokeDescription = $flavorText{flavor_text};
            return $pokeDescription;
        } else {
            continue;
        }
    }
    return $pokeDescription;
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
            <img src="<?php echo $pokeImg; ?>" alt="Poke icon" class="pokeIcon">
            <p class="pokeName"></p>
        </section>
        <form class="getinput">
            <input id="input" name="pokemon" type="text" placeholder="type a pokemon name!">
            <button id="inputBtn" class="btn search">search</button>
        </form>
    </section>
    <section class="P2">
        <section class="description" id="description">
            <p class="description"><?php echo $pokeDescription; ?></p>
        </section>
        <section class="moves" id="moves">
            <ul id="movesList">
            </ul>
        </section>
        <section class="evolution" id="evolution">
            <img class="evolution" src="" alt="evicon">
            <p class="evolutionName"></p>
        </section>
        <section class="buttons">
            <button id="prevButton" class="btn" class="search"><==</button>
            <button id="nextButton" class="btn" class="search">==></button>
        </section>
    </section>
</section>
<script src="assets/scripts/scripts.js"></script>
</body>
</html>