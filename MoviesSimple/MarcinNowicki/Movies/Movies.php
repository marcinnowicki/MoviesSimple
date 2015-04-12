<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Movies
 *
 * @author Marcin Nowicki 
 */

namespace MarcinNowicki\Movies;

class Character {

    public $idActor;
    public $character;
    public $description;
    public $actor;
    
    function __construct($newid, $newcharacter, $newdescription, Actor $newactor) {
        $this->idActor = $newid;
        $this->character = $newcharacter;
        $this->description = $newdescription;
        $this->actor = $newactor;
    }

}

class Movies {

    private $id;
    private $title;
    private $runtime;
    private $releasedate;
    private $actors;

    /**
     * 
     * @param type $newid
     * @param type $newtitle
     * @param type $newruntime
     * @param type $newreleasedate
     */
    function __construct($newid, $newtitle, $newruntime, $newreleasedate) {
        $this->id = $newid;
        $this->title = $newtitle;
        $this->runtime = $newruntime;
        $this->releasedate = $newreleasedate;
    }

    /**
     * 
     * @param type $newtitle
     * @param type $newruntime
     * @param type $newreleasedate
     */
    function Update($newtitle, $newruntime, $newreleasedate) {
        
        // $this->id = $newid;
        $this->title = $newtitle;
        $this->runtime = $newruntime;
        $this->releasedate = $newreleasedate;
    }

    /**
     * 
     * @param type $idActor
     * @param type $character
     * @param type $description
     * @param \MarcinNowicki\Movies\Actor $actor
     */
    function AssignActor($idActor, $character, $description, Actor $actor) {
        if ( $actor->getId() !== NULL) {
            $this->actors[] = new Character($idActor, $character, $description, $actor);
            echo "This actor " . $character . " played by " . $actor->getName() . " " . $actor->getFamilyname() .  " has id and I think it should have valid birthdate so I assigned him to this movie<BR>\n" ;
        } else {
            echo "This actor has id === NULL so I think it should have NOT valid birthdate so I rejected him <BR>\n" ;
        }
    }
    
    /**
     * 
     * @param type $property
     * @return type
     */
    function getProperty($property) {
        return $this->$property;
    }

    /**
     * 
     * @return type
     */
    function info() {
        return $this->id . " Title " . $this->title . " runtime " . $this->runtime . " (originaly released " . $this->releasedate . ")";
    }

    /**
     * 
     * @param type $a
     * @param type $b
     * @return type
     */
    function my_sort_function($a, $b) {
        // return strcmp($a->birthdate , $b->birthdate) ;
        return $a->birthdate > $b->birthdate;
    }

    function PrintSorted() {
        // var_dump($this->actors) ;
        // usort($this->actors, array( $this, "my_sort_function"));
        $myactors = $this->actors;
        echo "\n\nTest " . $myactors[0]->character . "\n";
        foreach ($myactors as $actor) {
            $temp = $actor->actor;
            $tosort[] = array("birthdate" => $temp->getBirthdate(), "character" => $actor->character);
        }

        array_multisort($tosort, SORT_ASC);
        foreach ($tosort as $tempcharacter) {
            echo "On " . $tempcharacter["birthdate"] . " actor who plays " . $tempcharacter["character"] . " was born\n";
        }
    }

    /**
     * 
     * @return type
     */
    function JSON() {
        $JSON = array(
            'id' => $this->id,
            'title' => $this->title,
            'runtime' => $this->runtime,
            'releasedate' => $this->releasedate,
            'actors' => $this->actors
        );
        return json_encode($JSON);
    }

    /**
     * destructor
     */
    function __destruct() {
        echo "\n" . $this->getproperty("title") . " I am destroyed<BR/>\n";
    }
}
