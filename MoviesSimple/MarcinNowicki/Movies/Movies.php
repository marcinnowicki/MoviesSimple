<?php

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
    
    /**
     * 
     * @param type $newid
     * @param type $newcharacter
     * @param type $newdescription
     * @param \MarcinNowicki\Movies\Actor $newactor
     */
    function __construct($newid, $newcharacter, $newdescription, Actor $newactor) {
        $this->idActor = $newid;
        $this->character = $newcharacter;
        $this->description = $newdescription;
        $this->actor = $newactor;
    }

}

/**
 * Class containing information about movie
 * Each entity must have a unique identifier.
 * The Movie entity must hold the title, runtime and release date.
 * Properties  - all private
 * id          - unique id
 * title       - title of the movie
 * runtime     - run time of a movie in minutes
 * releasedate - Datetime, release date of a movie
 * actors      - array containing objects of actors
 * 
 * Constructor:
 * __construct
 * 
 * Destructor:
 * __destruct
 * 
 * Methods (setters and getters):
 * getId          - returns id
 * getTitle       - returns movie title
 * getRuntime     - returns run time of the movie in minutes
 * getReleasedate - returns date of release
 * getActors      - returns array of all actors, as objects
 * setTitle       - updates movie title
 * setRuntime     - updates movie runtime
 * setReleasedate - updates movie release date
 * setActors      - updates list of actors
 * 
 * Methods:
 * Update         - updates all properties except actors
 * AssignActor    - assign actor and character played
 * info           - returns information about the movie as a string
 * my_sort_function - deprecated
 * PrintSorted    - prints cast in order of actors birthdate
 * JSON           - returns object as JSON
 * 
 */
class Movies {

    private $id;
    private $title;
    private $runtime;
    private $releasedate;
    private $actors;

    /**
     * Construtor
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

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getRuntime() {
        return $this->runtime;
    }

    function getReleasedate() {
        return $this->releasedate;
    }

    function getActors() {
        return $this->actors;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setRuntime($runtime) {
        $this->runtime = $runtime;
    }

    function setReleasedate($releasedate) {
        $this->releasedate = $releasedate;
    }

    function setActors($actors) {
        $this->actors = $actors;
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

    /**
     * void
     * sorts cast in order of ascending date of birth
     */
    function PrintSorted() {
        // deprecated
        // usort($this->actors, array( $this, "my_sort_function"));
        $myactors = $this->actors;
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
