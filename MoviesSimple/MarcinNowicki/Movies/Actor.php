<?php

/**
 * Description of Actor
 *
 * @author Marcin Nowicki 
 */

namespace MarcinNowicki\Movies;

/**
 * Class containing information about actor
 * Each entity must have a unique identifier.
 * The Movie entity must hold the title, runtime and release date.
 * Properties - all private
 * id - unique id
 * name - name of actor
 * familyname - family name of actor
 * birthdate - day of birth
 * 
 * Constructor:
 * __construct
 * 
 * Destructor:
 * __destruct
 * 
 * Methods (setters and getters):
 * getId - returns id
 * getName - returns name
 * getFamilyname - returns family name
 * getBirthdate - returns date of birth
 * setId - sets Id
 * setName - modifies name
 * setFamilyname - modifies familyname
 * setBirthdate - modifies birthdate
 * 
 * Methods:
 * getproperty - returns a property by its name
 * JSON - returns object in JSON format
 * myCopy - returns a copy of itself, used to add a copy o Actor to Movie
 *        - returns object
 *        - can return an array
 */
class Actor {

    private $id;
    private $name;
    private $familyname;
    private $birthdate;

    function __construct($newid, $newname, $newfamilyname, $newbirthdate) {
        $tempdate = new \DateTime($newbirthdate);
        if ($tempdate->format('Y-m-d') === $newbirthdate) {
            $this->id = $newid;
            $this->name = $newname;
            $this->familyname = $newfamilyname;
            $this->birthdate = $newbirthdate;
        } else {
            unset($this);
        }
    }

    /**
     * 
     * @return type
     */
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getFamilyname() {
        return $this->familyname;
    }

    function getBirthdate() {
        return $this->birthdate;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setFamilyname($familyname) {
        $this->familyname = $familyname;
    }

    function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    function JSON() {
        $JSON = array(
            'id' => $this->id,
            'name' => $this->name,
            'familyname' => $this->familyname,
            'birthdate ' => $this->birthdate
        );
        return json_encode($JSON);
    }

    function getproperty($property) {
        return $this->$property;
    }

    function myCopy() {

        $myCopy = array(
            'id' => $this->id,
            'name' => $this->name,
            'familyname' => $this->familyname,
            'birthdate' => $this->birthdate
        );
        // return $myCopy ;
        return self;
    }

    function __destruct() {
        echo $this->getFamilyname() . " is destroyed<BR/>";
    }

}
