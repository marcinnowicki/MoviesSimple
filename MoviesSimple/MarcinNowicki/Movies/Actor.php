<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actor
 *
 * @author Marcin Nowicki 
 */

namespace MarcinNowicki\Movies;

class Actor {
    //put your code here
    private $id ;
    private $name ;
    private $familyname ;
    /**
     * @Type("DateTime")
     */
    private $birthdate ;
    
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

        
    function __construct($newid, $newname, $newfamilyname, $newbirthdate) {
        $tempdate = new \DateTime($newbirthdate) ;
        if ( $tempdate->format('Y-m-d') === $newbirthdate) {
            $this->id = $newid ;
            $this->name = $newname ;
            $this->familyname = $newfamilyname ;
            $this->birthdate = $newbirthdate ;
        } else {
            unset($this);
        }
    }
    
    function JSON() {
        $JSON = array(
            'id' => $this->id,
            'name' => $this->name,
            'familyname' => $this->familyname,
            'birthdate ' => $this->birthdate 
        );
        return json_encode($JSON) ;
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
        return self ;
    }
    
    function __destruct() {
        echo $this->getFamilyname() . " is destroyed<BR/>" ;
    }
    
}
