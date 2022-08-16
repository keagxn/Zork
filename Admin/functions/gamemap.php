<?php

//locations
$location = NULL;

$desc = NULL;

$move = NULL;

$inventory = array();

if (empty($_SESSION['x'])) {

    $_SESSION['x'] = 0;

}

if (empty($_SESSION['y'])) {

    $_SESSION['y'] = 0;
    
}

//check limitations for west and east
if($_SESSION['x'] > 2){

    $emsg = "You ran into a wall!";
    $_SESSION['x'] = 2;

} elseif($_SESSION['x'] < -2){

    $emsg = "You ran into a wall!";
    $_SESSION['x'] = -2;

}

//check limitations for north and south

if($_SESSION['y'] > 1){

    $emsg = "You ran into a wall!";
    $_SESSION['y'] = 0;

}

if($_SESSION['y'] < -4){

    $emsg = "You ran into a wall!";
    $_SESSION['y'] = -4;

}

//Empty spaces
if($_SESSION['x'] == -1 and $_SESSION['y'] == -1) {

    if($move == 'b'){

        $_SESSION['x'] = -1 ;
        $_SESSION['y'] = 0 ;
        $emsg = "You ran into a wall!";

    }

    if($move == 'r'){

        $_SESSION['x'] = -2 ;
        $_SESSION['y'] = -1 ;
        $emsg = "You ran into a wall!";

    }
}

if($_SESSION['x'] == 0 and $_SESSION['y'] == 1) {

    $msg = "You ran into a wall!";
    $_SESSION['x'] = 0 ;
    $_SESSION['y'] = 0 ;

}

if($_SESSION['x'] == 0 and $_SESSION['y'] == -1){

    $msg = "You ran into a wall!";
    $_SESSION['x'] = 0 ;
    $_SESSION['y'] = 0 ;

}

if($_SESSION['x'] == 1 and $_SESSION['y'] == -1){

    $msg = "You ran into a wall!";
    $_SESSION['x'] = 1 ;
    $_SESSION['y'] = 0 ;

}

//Start
if($_SESSION['x'] == 0 and $_SESSION['y'] == 0){
    $location = "Class";
    $desc = "You are in class, why don't you recognize any of these people? You shouldn't be here. There is a door on either side of you.";
}

//school route

//lobby
if($_SESSION['x'] == 1 and $_SESSION['y'] == 0){
    $location = "Lobby";
    $desc = "You open the door and enter the lobby. There is a rotten sandwich on the ground. There appears to be a closet in front of you, and an office to your right.";
}

//closet
if($_SESSION['x'] == 1 and $_SESSION['y'] == 1){
    $location = "Closet";
    $desc = "A small space with a door leading right, and a dirty mop.";
}

//hallway
if($_SESSION['x'] == 2 and $_SESSION['y'] == 1){
    $location = "Hallway";
    $desc = "You enter into a deserted hallway -must be because everyone is in class- there is a peice of paper with some writing on it, and a room behind you.";
}

//office
if($_SESSION['x'] == 2 and $_SESSION['y'] == 0){
    $location = "Office";
    $desc = "You enter the office, you decide it's not actually the main office, as it only has 1 door with a lock on it. After further inspection the lock requires 4 numbers. If you can't crack it this must be a dead end.";

}

//portal
if($_SESSION['x'] == 2 and $_SESSION['y'] == -1){
    $location = "Portal";
    $desc = "The lock opens! You open the door and are immediately blinded, you slowly open your eyes to see... a portal? There door slams shut behind you, only one way to go: step back into the portal.";

}

//home route

//home
if($_SESSION['x'] == -1 and $_SESSION['y'] == 0){
    $location = "Home";
    $desc = "This isn't your house, but this is where it should be, you decide to check it out; there is a basement entrance to your left, and the gate to the backyard is in front of you";
}

//nado shelter
if($_SESSION['x'] == -2 and $_SESSION['y'] == 0){
    $location = "Tornado Shelter";
    $desc = "There is a lock on the doors, the shed is behind you, and the house is to your right; but wait... do you have a key?";
}

//backyard
if($_SESSION['x'] == -1 and $_SESSION['y'] == 1){
    $location = "Backyard";
    $desc = "The backyard is completely empty... exept for a shed to your left, and a bucket at your feet.";
}

//shed
if($_SESSION['x'] == -2 and $_SESSION['y'] == 1){
    $location = "shed";
    $desc = "The shed contains nothing but a key on the floor, this house is deserted!";
}

//basement
if($_SESSION['x'] == -2 and $_SESSION['y'] == -1){
    $location = "Basement";
    $desc = "The doors unlock, you hear something brrrr- but you also see a bucket, you continue and discover the strangest machine you've ever seen, it has the word: TIME written in big bold letters. It's a time machine! Go towards it and see what it can do! ";
    //2 descriptions
    $desc2 = "whoooosh you land in front of the strangest machine you've ever seen,it has the word: TIME written in big bold letters. It's a time machine! Go towards it and see what it can do! " ;
}

//merge

//Time Machine
if($_SESSION['x'] == -2 and $_SESSION['y'] == -2){
    $location = "Time Machine";
    $desc = "choice.";
}

//Dinosor
if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){
    $location = "boss battle";
    $desc = "dinosor time boy engage or withdrawl";
}

//Dystopia
if($_SESSION['x'] == -1 and $_SESSION['y'] == -2){
    $location = "Distopia";
    $desc = "You land before an abandoned building, behind you is a bursted fire hydrant, and to your right an allyway";
}

//allyway
if($_SESSION['x'] == -1 and $_SESSION['y'] == -2){
    $location = "Allyway";
    $desc = "you hop the fence and face a corner, the only way to go is to check the sewer drain behind you";
}

//Hydrant
if($_SESSION['x'] == 0 and $_SESSION['y'] == -2){
    $location = "Fire Hydrant";
    $desc = "something happened here, the ground before you is soaking wet, your only option is to go right, but youll surely slip and fall, a fire erups from where you came from you need to clear the way";
}

//Sewer
if($_SESSION['x'] == 0 and $_SESSION['y'] == -3){
    $location = "Sewers";
    $desc = "ewww sewers are gross, your faced with another portal to your right, although it states what youll be doing, you need to return to the class to fight a cyborg that sent you here, or continue down the sewers";
}

//Sewer death
if($_SESSION['x'] == 0 and $_SESSION['y'] == -4){
    $location = "Sewers";
    $desc = "you are washed away and die";
}

//Portal
if($_SESSION['x'] == 1 and $_SESSION['y'] == -3){
    $location = "Portal";
    $desc = "it is time to fight the big boy";
}



?>