<?php

include('dbc.php') ;

if(ISSET($_POST['register'])){

    if(!empty($_POST['username'])){

        if(!empty($_POST['password'])){

            if(!empty($_POST['email'])){

                if(!empty($_POST['fullname'])){

                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];

                $duplicate = mysqli_query($dbc, "SELECT * FROM `login` WHERE username = '$username';");
               
                if (mysqli_num_rows($duplicate) > 0){

                    DIE("username is taken") ;

                }

                $hash = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO `login` (`id`, `username`, `password`, `full_name`, `email`) VALUES (NULL, '$username', '$hash', '$email', '$fullname');" ;

                mysqli_query($dbc, $query) or DIE('Bad query');

                if(ISSET($_POST['register'])){

                    header('Location:login.php');
                    
                }
            }
        }
    }
}    

} else{

        echo 'You did not enter all of the required fields' ;
}

?>

<html>

<body>

<link href = "gui.css" rel = "stylesheet" type = "text/css">

<center>

<h1> <strong> Register! </strong> </h1>

<form method= "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">

    Username: <br>
    <input type = "text" name= "username">
    <br><br>

    Password: <br>
    <input type = "password" name= "password">
    <br><br>

    E-mail: <br>
    <input type = "text" name= "email">
    <br><br>

    Full Name: <br>
    <input type = "text" name= "fullname">

    <br><br>

    <input type = "submit" name = "register" value = "register">

    <br><br>

    Already have an account? <br>
    <input type = "submit" name = "login" value = "login">

</form>

<?php 

if(ISSET($_POST['login'])){

    header('Location:login.php');

} 

?>

</body>

</html>