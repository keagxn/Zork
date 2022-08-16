<?php

session_start();

$help = "Type in your intended move in the field below."
        . "<br>" .
        "All moves are not case sensative, as a shortcut, type the first letter of the intended move." 
        . "<br>" .
        "Directional Moves: Forwards, Backwards, Right, Left."
        . "<br>" .
        "Actions: Engage (Begin the fight), Withdrawl (Run away)," 
        . "<br>" .
        "Attack (Damage the enemy), Pickup/Grab (Add the item to your inventory)"
        . "<br>" .
        "Use (Consume the item), Eat (Increase or Decrease Hp) " ;

//set vars and arrays
if (empty($_SESSION['x'])) {

    $_SESSION['x'] = 0;

}

if (empty($_SESSION['y'])) {

    $_SESSION['y'] = 0;
    
}

if(isset($_SESSION['inventory'])){
    $inventory = $_SESSION['inventory'];
}
else{
    $inventory = array();
}

if(ISSET($_SESSION['hp'])){

    $hp = $_SESSION['hp'];

}else{

    $hp = 100;

}

if(ISSET($_SESSION['armour'])){

    $armour = $_SESSION['armour'];

}else{

    $armour = 0;

}

if(ISSET($_SESSION['dino'])){

    $dino = $_SESSION['dino'];

}else{

    $dino = 100;

}

if(ISSET($_SESSION['dinodmg'])){

    $dinodmg = $_SESSION['dinodmg'];

}else{

    $dinodmg = 25;

}

if(ISSET($_SESSION['dmg'])){

    $dmg = $_SESSION['dmg'];

}else{

    $dmg = 25;

}

if(ISSET($_SESSION['emsg'])){

    $emsg = $_SESSION['smsg'];

}else{

    $emsg = NULL;

}

if(ISSET($_SESSION['unlock1'])){

    $unlock1 = $_SESSION['unlock1'];

}else{

    $unlock1 = NULL;

}

$life = 1 ;

//check for login and button press
if(ISSET($_SESSION['user'])){

    if(ISSET($_POST['movebutton'])){

        //available moves and case sensative
        $availmoves = array('right', 'Right', 'r', 'R', 'RIGHT', 'left', 'Left', 'l', 'L', 'LEFT', 'forward', 'f', 'F', 'Forward', 'FORWARD', 'backward', 'b', 'Backward', 'B', 'BACKWARD', 'back', 'BACK', 'BACKWARDS', 'backwards', 'Backwards', 
                            'help', 'HELP', 'Help', 'h', 'H', 'engage', 'Engage', 'ENGAGE', 'e', 'E', 'withdrawl', 'Withdrawl', 'Withdrawl', 'w', 'W', 'grab', 'use', 'attack', 'eat', ) ;

        $move = $_POST['movement'];

        //navigation
        if(in_array($move, $availmoves)){

            if($move == 'forward' or $move == 'f' or $move == 'F' or $move == 'Forward' or $move == 'FORWARD' ){

                if($_SESSION['x'] == -2 and $_SESSION['y'] == -3 or $_SESSION['x'] == -2 and $_SESSION['y'] == -1){

                    if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){

                        $_SESSION['x'] == -2 ;
                        $_SESSION['y'] == -3 ;
                        $emsg = "you cannot run away" ;

                    }

                    if($_SESSION['x'] == -2 and $_SESSION['y'] == -1){

                        $_SESSION['x'] == -2 ;
                        $_SESSION['y'] == -1 ;
                        $emsg = "your trapped" ;

                    }

                }else{

                    $_SESSION['y'] = $_SESSION['y'] + 1 ;

                }

            }

            elseif($move == 'backward' or $move == 'b' or $move == 'Backward' or $move == 'B'or $move == 'BACKWARD' or $move == 'back' or $move == 'BACK' or $move == 'BACKWARDS' or $move == 'backwards' or $move == 'Backwards' ){

                if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){

                    $_SESSION['x'] == -2 ;
                    $_SESSION['y'] == -3 ;
                    $emsg = "you cannot run away" ;

                }else{

                    $_SESSION['y'] = $_SESSION['y'] - 1 ;

                }

            }

            elseif($move == 'right' or $move == 'Right' or $move == 'r' or $move == 'R' or $move == 'RIGHT' ){

                if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){

                    $_SESSION['x'] == -2 ;
                    $_SESSION['y'] == -3 ;
                    $emsg = "you cannot run away" ;

                }else{

                    $_SESSION['x'] = $_SESSION['x'] + 1 ;

                }

            }

            elseif($move == 'left' or $move == 'Left' or $move == 'l' or $move == 'L' or $move == 'LEFT' ){

                if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){

                    $_SESSION['x'] == -2 ;
                    $_SESSION['y'] == -3 ;
                    $emsg = "you cannot run away" ;

                }else{

                    $_SESSION['x'] = $_SESSION['x'] - 1 ;

                }

            }

            //location specific moves and events

            elseif($move == 'eat' ){
                //lobby
                if($_SESSION['x'] == 1 and $_SESSION['y'] == 0){

                    $hp = $hp - 10 ;

                    $_SESSION['hp'] = $hp;

                    $msg2 = "Gross! You ate a rotten sandwich!";

                }else{

                    $emsg = "There is nothing to eat" ;

                }
                
            }

            elseif($move == 'engage' or $move == 'Engage' or $move == 'ENGAGE' or $move == 'e' or $move == 'E' ){

                if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){

                    echo "fight club time boss battle" ;

                }else{

                    $emsg = "You can't fight here." ;

                }
                
            }

            elseif($move == 'withdrawl' or $move == 'Withdrawl' or $move == 'WITHDRAWL' or $move == 'w' or $move == 'W' ){

                if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){

                    $_SESSION['y'] = $_SESSION['y'] + 1 ;

                    $msg2  = "You ran from the fight" ;

                }else{

                    $emsg = "There is nothing to withdrawl from." ;

                }
                
                
            }

            elseif($move == 'grab'){

                if($_SESSION['x'] == 2 and $_SESSION['y'] == 1 or $_SESSION['x'] == 1 and $_SESSION['y'] == 1 or $_SESSION['x'] == -2 and $_SESSION['y'] == 1 or $_SESSION['x'] == -1 and $_SESSION['y'] == 1 ){
                
                    //hallway
                    if($_SESSION['x'] == 2 and $_SESSION['y'] == 1){

                        array_push($inventory, "paper");

                        $_SESSION['inventory'] = $inventory;

                        $msg2  = "You picked up the paper" ;

                    }

                    //shed
                    if($_SESSION['x'] == -2 and $_SESSION['y'] == 1){

                        array_push($inventory, "key");

                        $_SESSION['inventory'] = $inventory;

                    }

                    //basement
                    if($_SESSION['x'] == -1 and $_SESSION['y'] == 1){

                        array_push($inventory, "bucket");

                        $_SESSION['inventory'] = $inventory;

                    }

                }else{

                    $emsg = 'There is nothing to pickup' ;

                }
                
            }

            elseif($move == 'use'){

                if($_SESSION['x'] == 2 and $_SESSION['y'] == 0 or $_SESSION['x'] == -2 and $_SESSION['y'] == 0 or $_SESSION['x'] == -2 and $_SESSION['y'] == -3 ){
                    //office
                    if($_SESSION['x'] == 2 and $_SESSION['y'] == 0){
                        
                        if(in_array("paper", $inventory)){

                            $unlock1 = 1 ;

                            $_SESSION['unlock1'] = $unlock1 ;

                            $msg2 = "the door unlocks!" ;

                        }

                    }else{

                        $emsg = "you can't use anything here" ;
        
                    }

                    if($_SESSION['x'] == -2 and $_SESSION['y'] == 0){

                        if(in_array("key", $inventory)){

                            $_SESSION['y'] = $_SESSION['y'] - 1 ;

                        }

                    }

                    if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){

                        if(in_array("bucket", $inventory)){

                            $armour = $armour + 25 ;

                            $_SESSION['armour'] = $armour;

                        }

                    }
                }else{

                    $emsg = "you cannot use anything here" ;

                }
            }

        }else{

            $msg = "I do not understand the word: " . $move . "It does not exist or it is mispelt" ;

        }

        //portal teleportation
        if($_SESSION['x'] == 2 and $_SESSION['y'] == -2){

            $_SESSION['x'] = -2 ;
            $_SESSION['y'] = -1 ;

        }

        //locked areas
        //office
        if($_SESSION['x'] == 2 and $_SESSION['y'] == -1){

            if($unlock1 == 1){

                $_SESSION['x'] = 2 ;
                $_SESSION['y'] = -1 ;
                $msg2 = 'you got it' ;

            }else{

                $_SESSION['x'] = 2 ;
                $_SESSION['y'] = 0 ;
                $emsg = "You don't have the code!" ;

            }

        }
        //basement
        if($_SESSION['x'] == -2 and $_SESSION['y'] == -1){

            if(in_array('key', $inventory)){

                $_SESSION['x'] = -2 ;
                $_SESSION['y'] = -1 ;
                $msg2 = 'you opened the lock!' ;

            }else{

                $_SESSION['x'] = -2 ;
                $_SESSION['y'] = 0 ;
                $emsg = "You don't have a key!" ;

            }

        }

        //boss battle
        if($_SESSION['x'] == -2 and $_SESSION['y'] == -3){

            if($move == 'attack'){

                if($_SESSION['armour'] = 25){

                    $dinodmg = $dinodmg - 25;

                }

            $dino = $dino - $dmg; 

            $hp = $hp - $dinodmg;

            $_SESSION['hp'] = $hp; 

            $_SESSION['dino'] = $dino; 

            if($_SESSION['hp'] <= 0){

                //reset hp and position if defeated

                $hp = 100; 

                $dino = 100;

                $msg3 = "You were defeated by the dino and become stranded again (Try again with more armour!)";

                $_SESSION['dino'] = $dino; 

                $_SESSION['hp'] = $hp;  

                $_SESSION['x'] = 0 ;
                $_SESSION['y'] = 0 ;

            }

            if($_SESSION['dino'] <= 0){

                $_SESSION['x'] = -1 ;
                $_SESSION['y'] = -2 ;

                $msg3 = "You have defeated the dino! It is now time to return home"; 
                }
            }
        }

    }


require('gamemap.php'); 


//end of session

} else {

    echo "no session" ;

}

?>

</body>

</html>\