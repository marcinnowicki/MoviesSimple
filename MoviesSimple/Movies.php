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
class Character {

    public $idActor;
    public $character;
    public $description;
    public $actor;

    function Character($newid, $newcharacter, $newdescription, $newactor) {
        $this->idActor = $newid;
        $this->character = $newcharacter;
        $this->description = $newdescription;
        $this->actor = $newactor;
    }

}

class Movies {

    //put your code here
    protected $id;
    protected $title;
    protected $runtime;
    protected $releasedate;
    protected $actors;

    function Movies($newid, $newtitle, $newruntime, $newreleasedate) {
        $this->id = $newid;
        $this->title = $newtitle;
        $this->runtime = $newruntime;
        $this->releasedate = $newreleasedate;
    }

    function Update($newtitle, $newruntime, $newreleasedate) {
        // $this->id = $newid;
        $this->title = $newtitle;
        $this->runtime = $newruntime;
        $this->releasedate = $newreleasedate;
    }

    function AssignActor($idActor, $character, $description, $actor) {
        $this->actors[] = new Character($idActor, $character, $description, $actor);
    }

    function getproperty($property) {
        return $this->$property;
    }

    function info() {
        return $this->id . " Title " . $this->title . " runtime " . $this->runtime . "(" . $this->releasedate . ")";
    }

    function my_sort_function($a, $b) {
        // return strcmp($a->birthdate , $b->birthdate) ;
        return $a->actor->getproperty("birthdate") > $b->actor->getproperty("birthdate");
    }

    function PrintSorted() {
        // var_dump($this->actors) ;
        // usort($this->actors, array( $this, "my_sort_function"));
        
        foreach ($this->actors as $actor) {
            echo "Actor " . $actor->id . " " ; 
            var_dump($actor) ;
            
        }
        
        var_dump($this->actors) ;
    }


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

}
