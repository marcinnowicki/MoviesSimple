<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Roles
 * Deprecated. Roles are implemented inside Movie class
 *
 * @author Marcin Nowicki 
 */

namespace MarcinNowicki\Movies;

class Roles {

//put your code here
    public $id;
    public $idMovie;
    public $idActor;
    public $character;
    public $description;

    function __construct($newid, $newidMovie, $newidActor, $newcharacter, $newdescription) {
        $this->id = $newid ;
        $this->idMovie  = $newidMovie ;
        $this->idActor = $newidActor ;
        $this->character = $newcharacter ;
        $this->description = $newdescription ;
    }

}

