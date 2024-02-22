<?php
require_once("class/Pokemon.php");
require_once("class/PokemonFeu.php");
require_once("class/PokemonEau.php");
require_once("class/PokemonPlante.php");
session_start();


$pokemonTab = $_SESSION["pokemonTab"];
$j1 = htmlspecialchars($_GET["pokemonJ1"]);
$j2 = htmlspecialchars($_GET["pokemonJ2"]);


function PokemonName($pokemonId, $listPokemon)
{
    echo  $listPokemon[$pokemonId]->getName();
}
function ShowPokemon($pokemonId, $listPokemon, $position)
{
    // echo  $listPokemon[$pokemonId]->getName();
    // var_dump($listPokemon[$pokemonId]);
    //ici il faut verifier si j1 ou j2

    if ($position == 1) {
?> <img src="<?php echo $listPokemon[$pokemonId]->getUrlImageBack(); ?>" alt="pokemon" id="pokemon1">
    <?php
    } else if ($position == 2) {
    ?><img src="<?php echo $listPokemon[$pokemonId]->getUrlImageFront(); ?>" alt="pokemon" id="pokemon2">
<?php
    }
}

function Combat(Pokemon $pok1, Pokemon $pok2)
{
$pok1->setHP(100);
$pok2->setHP(100);
    while (!$pok1->isDead() && !$pok2->isDead()) {
        $pok1->attaquer($pok2);
        if ($pok2->isDead()) {
            echo $pok1->getName() . "is the winner";
        } else {
            $pok2->attaquer($pok1);
            if ($pok1->isDead()) {
                echo $pok2->getName() . "is the winner";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pokemon.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans&display=swap" rel="stylesheet">
    <title>Battle</title>
</head>

<body>
    <span id="sideJ2">
        <div name="J2">
            <h2>
                <?php ShowPokemon($j2, $pokemonTab, 2)
                ?>
            </h2>
            <img src="./assets/image/platform.png" alt="plarfom" id="p2">
        </div>

    </span>

    <span id="sideJ1">
        <div name="J1">
            <h2>
                <?php ShowPokemon($j1, $pokemonTab, 1)
                ?>
            </h2>
            <img src="./assets/image/platform.png" alt="plarfom" id="p1">
        </div>

    </span>
    <span>
        <img src="./assets/image/Menu.png" alt="textbox" id="lifeMenuP1">
        <p id="namePosition1"><?php PokemonName($j1, $pokemonTab);     ?></p>
    </span>
    <span>
        <img src="./assets/image/textbox.png" alt="textbox" id="textHUD">
    </span>
    <span>
        <img src="./assets/image/Menu.png" alt="textbox" id="lifeMenuP2">
        <p id="namePosition"><?php PokemonName($j2, $pokemonTab);     ?></p>
    </span>
    <div name="Resultat">
        <p id="resultat">
            <?php Combat($pokemonTab[$j1], $pokemonTab[$j2]);
            ?>
        </p>
    </div>


</body>

</html>