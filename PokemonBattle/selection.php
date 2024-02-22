<?php
require_once("class/Pokemon.php");
require_once("class/PokemonFeu.php");
require_once("class/PokemonEau.php");
require_once("class/PokemonPlante.php");
session_start();

$pokemonTab = $_SESSION["pokemonTab"];

function generateSelectArray($pokemon)
{
    foreach ($pokemon as $key => $value) {
        echo '<option value="' . $key  . '">' . $value->getName() . '  </option>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="combat.php" method="get">
        <Label>J1 :</Label>
        <select name="pokemonJ1" id="pokemonJ1">
            <?php generateSelectArray($pokemonTab)  ?>
        </select>

        <Label>J2 :</Label>
        <select name="pokemonJ2" id="pokemonJ2">
            <?php generateSelectArray($pokemonTab)  ?>
        </select>
        <input type="submit" value="Combattez">
    </form>


<img src="https://github.com/PokeAPI/sprites/blob/master/sprites/pokemon/0.png?raw=true" alt="" id="pokemonSelect1">

<img src="https://github.com/PokeAPI/sprites/blob/master/sprites/pokemon/0.png?raw=true" alt="" id="pokemonSelect2">

    <!-- <?php
            foreach ($pokemonTab as $pokemon) {
            ?>

        <p>
            <?php
                echo $pokemon->getName();
            ?>
        </p>
        <img src=<?php
                    echo '"' . $pokemon->getUrlImageFront() . '"'
                    ?> alt="">
    <?php
            }
    ?> -->

    <script type="text/javascript" src="./assets/js/pokemonSelection.js">
        <?php

        // $pokemonTab;

        ?>
    </script>
</body>

</html>