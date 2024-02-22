<?php

session_start();
require_once("class/Pokemon.php");
require_once("class/PokemonFeu.php");
require_once("class/PokemonEau.php");
require_once("class/PokemonPlante.php");

if (isset($_SESSION["pokemonTab"])) {
    $pokemonTab = $_SESSION["pokemonTab"];
} else {
    $pokemonTab = [];
    $_SESSION["pokemonTab"] = $pokemonTab;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Pokemon</title>
    <link rel="stylesheet" href="assets/css/pokemon.css">
</head>

<body>

    <a href="selection.php">go to the selction</a>

    <form action="" metode="get">

    <label for="pokeId"> ID :</label>
        <input type="text" name="pokeId">

        <label for="pokeName"> Nom :</label>
        <input type="text" name="pokeName">
        <label for="hp"> Hp :</label>
        <input type="number" name="hp">
        <label for="atk"> Atk : </label>
        <input type="number" name="atk">

        <label for="urlImageFront"> image face : </label>
        <input type="text" name="urlImageFront">

        <label for="urlImageBack"> image dos : </label>
        <input type="text" name="urlBack">

        <label for="type"> Type de pokemon :</label>
        <select name="type" id="type">
            <option value="normal">Normal</option>
            <option value="feu">Feu</option>
            <option value="eau">Eau</option>
            <option value="plante">Plante</option>
        </select>

        <input type="submit" value="Crée mon pokemon">
    </form>

</body>

</html>
<?php

if (
    isset($_GET["pokeName"])
    && isset($_GET["hp"])
    && isset($_GET["atk"])
    && isset($_GET["type"])
    && isset($_GET["urlImageFront"])
    && isset($_GET["pokeId"])
) {
    $name = $_GET["pokeName"];
    $hp = $_GET["hp"];
    $atk = $_GET["atk"];
    $urlImageFront= $_GET["urlImageFront"];
    $urlImageBack= $_GET["urlBack"];
    $type = $_GET["type"];
    $pokeId = $_GET["pokeId"];
    $pokemon;
    switch ($type) {
        case "feu":
            $pokemon = new PokemonFeu($name, $hp, $atk, $urlImageFront, $urlImageBack,$pokeId);
           
            break;
        case "eau":
            $pokemon = new PokemonEau($name, $hp, $atk, $urlImageFront, $urlImageBack,$pokeId);
        
            break;
        case "plante":
            $pokemon = new PokemonPlante($name, $hp, $atk, $urlImageFront, $urlImageBack,$pokeId);
           
            break;
        default:
            $pokemon = new Pokemon($name, $hp, $atk, $urlImageFront, $urlImageBack,$pokeId);
    
        }
 
}

if (isset($pokemon)) {

    //array_push($pokemonTab,$pokemon)
    $pokemonTab[] = $pokemon;
    $_SESSION["pokemonTab"] = $pokemonTab;
    echo $pokemon->__toString();


?>
    <p>
        <?php echo $pokemon->getName() ?>
    </p>
    <img src=<?php
                echo '"' . $pokemon->getUrlImageFront() . '"'
                ?> alt="">
<?php
}

//les gifs des pokemons

// aquali : 
// fixe :
// https://github.com/PokeAPI/sprites/blob/master/sprites/pokemon/134.png?raw=true

// front gif :
// https://www.pokencyclopedia.info/sprites/gen5/ani_black-white/ani_bw_134.gif

// back :
// https://www.pokencyclopedia.info/sprites/gen5/ani-b_black-white/a-b_bw_134.gif

// pyroli :
// https://github.com/PokeAPI/sprites/blob/master/sprites/pokemon/136.png?raw=true

// front gif :
// https://www.pokencyclopedia.info/sprites/gen5/ani_black-white/ani_bw_136.gif

// back:
// https://www.pokencyclopedia.info/sprites/gen5/ani-b_black-white/a-b_bw_136.gif

// phylally :
// https://github.com/PokeAPI/sprites/blob/master/sprites/pokemon/470.png?raw=true

// front gif :
// https://www.pokencyclopedia.info/sprites/gen5/ani_black-white/ani_bw_470.gif

// back:
// https://www.pokencyclopedia.info/sprites/gen5/ani-b_black-white/a-b_bw_470.gif

// evoli :
// https://github.com/PokeAPI/sprites/blob/master/sprites/pokemon/133.png?raw=true

// front gif :
// https://www.pokencyclopedia.info/sprites/gen5/ani_black-white/ani_bw_133.gif

// back :
// https://www.pokencyclopedia.info/sprites/gen5/ani-b_black-white/a-b_bw_133.gif