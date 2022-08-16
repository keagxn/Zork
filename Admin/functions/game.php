<html>
<body>

<link href = "narate.css" rel = "stylesheet" type = "text/css">

<script src="https://kit.fontawesome.com/57d9a5bd4f.js" crossorigin="anonymous"></script>

<?php require('gamemovement.php'); ?>

<style>
  body {
    background-image: url("https://wallpaperset.com/w/full/2/e/3/468956.jpg");
  }
  
  
</style>

<div class="header">
<h1 style="color:#000000";> Forward To The Past </h1> 
</div>
<br>
<br>
<center>

<div class="terminal-glitch"></div>

<div class="terminal">

  <p><?php if($move == 'help' or $move == 'HELP' or $move == 'Help' or $move == 'h' or $move == 'H' ){

    echo $help ; } ?> </p>

  <p><?php if(ISSET($emsg)){ echo "Error: " . $emsg;} ?> </p>

  <p> <?php echo ". "; ?> </p>
  <p> <?php echo ". "; ?> </p>
  <p> <?php echo $desc; ?> </p>

  <p class="break"> <?php echo "Health: " . $hp ; ?> </p> 

  <p class="break"> <?php if(ISSET($msg)){ echo $msg;} ?> </p>

  <p><?php if(ISSET($msg2)){ echo $msg2;} ?></p>

  <p><?php if(ISSET($msg3)){ echo $msg3;} ?></p>

  <p class="break"><?php if(ISSET($inventory)){
    //prevent duplicate items
    $uinventory = array_unique($inventory);
    echo "Inventory: Compass, Battery" . implode(", ", $uinventory); } ?> </p>

  <p><?php echo "Coordinates: X: " . $_SESSION['x'] . " Y: " . $_SESSION['y'] ?></p>
  <p> <?php echo "Location: " . $location ; ?> </p>

  <br> <br>

    <form class = "myButton" method = "POST" action = "game.php">

    Type Move: 
    <input type = "text" name = "movement">

    <input class = "myButton2" type = "submit" name = "movebutton">

    </form>

    <br>

   

    <?php 

if(in_array("bucket", $inventory)){

    ?> <div style="font-size: 50px; color: #00FFFF; display:inline-block;"> <i class="fas fa-fill"></i> </div>

<?php } ?>

<?php 

if(in_array("paper", $inventory)){

    ?> <div style="font-size: 50px; color: #00FFFF; display:inline-block;"> <i class="fas fa-scroll "></i> </div>

<?php } ?>

<?php 

if(in_array("key", $inventory)){

    ?> <div style="font-size: 50px; color: #00FFFF; display:inline-block; "> 
    <i class="fas fa-key "></i> </div>

<?php } ?>


    

</div>

</body>

</html>

