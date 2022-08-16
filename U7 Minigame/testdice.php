<?php
session_start();
if(isset($_POST['submitbutton'])){

    $_SESSION['choice1'] = rand(1, 6);

    $_SESSION['choice2'] = rand(1, 6);

    $_SESSION['choice3'] = rand(1, 6);

}else{
    $_SESSION['number'] = rand(1, 6);
}

echo '<pre>';
print_r ($_SESSION['number']);
echo '</pre>';

//3 dice
//keep 1 dice
//goal to roll a 3  dice and stay under 7
//select dice to keep
//keep dice each round after keep 1 next 2 roll
//error message if under 7
//try again?
//use radio buttons or checkboxes
//prefer radio buttons
//add the kept to session array
//array push to session array
//new game, keep 2 array push the 2 to $kept dice, roll again, push next value
//evaluate array for under 7
//IF 7 EXACT
//flip a coin or do some special


?>

<html>
    <body>
        <h1>Roll a Dice</h1>

        <?php
        if(isset($_POST['submitbutton'])){ ?>

        <img src= "dice/<?php echo $_SESSION ['choice1']; ?>.jpg">

        <img src= "dice/<?php echo $_SESSION ['choice2']; ?>.jpg">

        <img src= "dice/<?php echo $_SESSION ['choice3']; ?>.jpg">

        <?php }else{ ?>

            <img src= "dice/1.jpg">

            <img src= "dice/1.jpg">

            <img src= "dice/1.jpg">
        
        <?php } ?>

        <form method = "POST" action = "<?php echo $_SERVER ['PHP_SELF']; ?>">
            <!-- <input type = "text" name = "number" placeholder = "<?php echo $_SESSION['a']; ?>" > -->

            <!-- //choice buttons -->
            <input type = "submit" name = "submitbutton" value = "Store a Number">
        </form>

    </body>
</html>