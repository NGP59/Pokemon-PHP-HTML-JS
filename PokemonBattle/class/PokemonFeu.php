<?php


class PokemonFeu extends Pokemon
{

    public function __construct(string $name, int $hP, int $atk, string $urlImage, string $urlImageBack, string $idPokemon)
    {
        parent::__construct($name, $hP, $atk, $urlImage, $urlImageBack,$idPokemon);
    }


    public function attaquer(Pokemon $adversaire)
    {
        if ($adversaire instanceof PokemonPlante) {
            $adversaire->setHP($adversaire->getHP() 
            - (2 * $this->atk));
        } elseif ($adversaire instanceof PokemonFeu 
                 || $adversaire instanceof PokemonEau) {
            $adversaire->setHP($adversaire->getHP() - (0.5 * $this->atk));
        } else {
            parent::attaquer($adversaire);
        }
    }
}
