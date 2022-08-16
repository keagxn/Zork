<?php

include('dbc.php') ;

session_start() ;

if(ISSET($_POST['update'])){

    if(!empty($_POST['username'])){

        if(!empty($_POST['password'])){

            if(!empty($_POST['email'])){

                if(!empty($_POST['fullname'])){

                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];

                $duplicate = mysqli_query($dbc, "SELECT * FROM `login` WHERE username = '$username';");
               
                if (mysqli_num_rows($duplicate) > 1){

                    DIE("username is taken") ;

                }

                $hash = password_hash($password, PASSWORD_DEFAULT);

                $query = "UPDATE  `login` SET  `username` = REPLACE(`username`, '{$_SESSION['username']}', '$username') WHERE  `username` LIKE '{$_SESSION['username']}';" ;

                $query2 = "UPDATE  `login` SET  `username` = REPLACE(`password`, '{$_SESSION['password']}', '$password') WHERE  `password` LIKE '{$_SESSION['password']}';" ;

                $query3 = "UPDATE  `login` SET  `email` = REPLACE(`email`, '{$_SESSION['email']}', '$email') " ;

                $query4 = "UPDATE  `login` SET  `full_name` = REPLACE(`full_name`, '{$_SESSION['full_name']}', '$fullname') WHERE  `full_name` LIKE '{$_SESSION['full_name']}';" ;

                mysqli_query($dbc, $query) or DIE('Bad query');

                mysqli_query($dbc, $query2) or DIE('Bad query');

                mysqli_query($dbc, $query3) or DIE('Bad query');

                mysqli_query($dbc, $query4) or DIE('Bad query');

                if(ISSET($_POST['update'])){

                    header('Location:index.php');
                    
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

<h1> <strong> Update Profile </strong> </h1>

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

    <input type = "submit" name = "update" value = "update">

    <br><br>

    Cancel <br>
    <input type = "submit" name = "cancel" value = "cancel">

</form>

<?php 

if(ISSET($_POST['cancel'])){

    header('Location:index.php');

} 

?>

</body>

</html>