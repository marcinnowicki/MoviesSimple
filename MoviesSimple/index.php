<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>New title</title>
    </head>
    <body>
        <pre>
        <?php
        // put your code here
        include "Movies.php" ;
        include "Actor.php" ;
        
        $collection = array() ;
        $collection[] = "God father" ;
        $collection[] = "Avatar" ;
        
        $myfile = New Movies(1, "Godfather", 123, "1972-07-02") ;
        echo "myfile as JSON from object " . json_encode($myfile) . " " . $myfile->info();
        echo "myfile as JSON from method " . json_encode($myfile->JSON()) . "\n" ;
        echo json_encode( $collection ) . " " . $myfile->info();
        
        $collection[$myfile->getproperty("id")] = $myfile->JSON() ;
        // $collection[0] = $myfile ;
        echo "\nMovie as var_dump" ;
        // var_dump( $myfile ) ;
        echo "\nInfo as returned by object " . $myfile->info() ;
        echo json_encode($myfile) ;

        $myfile->Update("God father", 124, "1972-07-03") ;
        $collection[$myfile->getproperty("id")] = $myfile->JSON() ;
        // $collection[1] = $myfile ;
        echo "\nid = " . $myfile->getproperty("id")  ;
        echo "\nMovie as var_dump" ;
        // var_dump( $myfile ) ;
        echo "\nInfo as returned by object " . $myfile->info() ;
        echo "\nMovie as JSON " . json_encode($myfile) ; 

        $myfile = New Movies(2, "Avatar", 143, "2010-10-02") ;
        $collection[$myfile->getproperty("id")] = $myfile->JSON() ;
        
        echo "\n\nAll as JSON " . json_encode($collection) . "\n";
        
        $clark = New Actor(1, "Clark", "Gable", "1901-02-01") ;
        echo "Actor JSON straigth " . json_encode($clark) . "\n"; 
        echo "Actor JSON from method " . $clark->JSON() . "\n"; 
        // var_dump($collection) ;
        
        $mymovie = New Movies(3, "Gone with the Wind", 144, "1939-10-02") ;
        $mymovie->AssignActor(1, "Rhett Butler", "Cool guy", $clark->myCopy()) ;
        $other = New Actor(2, "Vivien", "Leigh", "1913-11-05") ;
        $mymovie->AssignActor(2, "Scarlett O'Hara", "Nice girl", $other->myCopy()) ;
        $another = New Actor(3, "Thomas", "Mitchell", "1892-07-11") ;
        $mymovie->AssignActor(3, "Gerald O'Hara", "Scarlet's father", $another->myCopy()) ;
        echo "Gone " . $mymovie->JSON() ;
        $mymovie->PrintSorted() ;
        ?>
        </pre>
    </body>
</html>
