<?php

include('dbc.php') ;

session_start() ;

if(isset($_SESSION['user'])){

?>

<html>

<head> 

<title> Admin Area </title>

</head>

<link href = "gui.css" rel = "stylesheet" type = "text/css">

<body>

<center>

<h1> Welcome: <?php echo $_SESSION['user']; ?> </h1>

<p> You have succesfully logged in. </p>

<form name = "form5" method = "post" action = "game.php">

    <p>
        <label>

            <input type = "submit" name = "playgame" id = "playgame" value = "Play Game">

        </label> 
    </p>

</form>

<form name = "form2" method = "post" action = "logout.php">

    <p>
        <label>

            <input type = "submit" name = "logout" id = "logout" value = "logout">

        </label> 
    </p>

</form>

<form name = "update" method = "post" action = "update.php">

    <p>
        <label>

            <input type = "submit" name = "update" id = "update" value = "Update Profile">

        </label> 
    </p>

</form>

</body>

</html>

<?php

}

else { 
    
?>

<html>

<br> <br> <br>

 <body>

<link href = "narate.css" rel = "stylesheet" type = "text/css">
<center>
<br>

<form name = "form3" method = "post" action = "login.php">

    <p>
        <label>

            <input type = "submit" name = "login" id = "login" value = "login">

        </label>  
    </p>

</form>

<br>

<form name = "form4" method = "post" action = "register.php">

    <p>
        <label>

            <input type = "submit" name = "register" id = "register" value = "register">

        </label> 
    </p>

</form>

</body> </html>

<?php

}

?>