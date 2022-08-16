<?php
session_start();
if(isset($_POST['submitbutton'])){

    $_SESSION['number'] = rand(1, 6);

    // $_SESSION ['number'] = $_POST['number'];

}else{
    $_SESSION['number'] = rand(1, 6);
}

echo '<pre>';
print_r ($_SESSION['number']);
echo '</pre>';
?>

<html>
    <body>
        <h1>Roll a Dice</h1>

        <img src= "dice/<?php echo $_SESSION ['number']; ?>.jpg">

        <form method = "POST" action = "<?php echo $_SERVER ['PHP_SELF']; ?>">
            <!-- <input type = "text" name = "number" placeholder = "<?php echo $_SESSION['a']; ?>" > -->
            <input type = "submit" name = "submitbutton" value = "Store a Number">
        </form>

    </body>
</html>