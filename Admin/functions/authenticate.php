<?php 

session_start();
include('dbc.php') ;

if (isset($_POST['login'])) {

    if (!empty($_POST['username'])) {

            if (!empty($_POST['password'])) {

//if everything is submitted get data from $_POST

            $username = $_POST ['username'];
            $password = $_POST ['password'];

            $query = "SELECT * FROM login WHERE username = '$username'" ;

            $result = mysqli_query($dbc, $query) or die ('Error querying database'); 

            while ($row = mysqli_fetch_array($result)) {
                $id = $row ['id'];
                $username_db = $row ['username'];
                $password_db = $row ['password'];
                $email_db = $row ['email'];
                $full_name_db = $row ['full_name']; 

            }

            if (!password_verify($password, $password_db)) {

                $_SESSION['user'] = $username;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['full_name'] = $full_name_db;
                $_SESSION['email'] = $email_db;

                header('Location: index.php');
            }

            else {
                    echo 'Please review your login details and try again.' ; 
                    include('login.php') ;
            }
        }

        else {
            echo 'Please enter the correct password.' ; 
            include('login.php') ;
        }
    }

     else {
        echo 'Please enter the correct username.' ; 
        include('login.php') ;
    }

}

else {
    echo 'To access this area, please complete the login form.' ; 
    include('login.php') ;
}

?>