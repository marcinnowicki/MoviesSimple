<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actor
 *
 * @author marci_000
 */
class Actor {
    //put your code here
    private $id ;
    private $name ;
    private $familyname ;
    private $birthdate ;
    
    function Actor($newid, $newname, $newfamilyname, $newbirthdate) {
        $this->id = $newid ;
        $this->name = $newname ;
        $this->familyname = $newfamilyname ;
        $this->birthdate = $newbirthdate ;
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
        return $myCopy ;
    }
}
