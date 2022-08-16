<?php

//check submit

if(ISSET($_POST['submitbutton'])){

if(!empty($_POST["barname"]) AND !empty($_POST["weight"]) AND !empty($_POST["price"])){

    //$_POST VARS
    $bar = $_POST['barname'] ;
    $weight = $_POST['weight'] ;
    $price = $_POST['price'] ;

    //store connection in var
    $conn = mysqli_connect('localhost', 'root', '', 'candystore') or DIE('Cannot connect to database. Bad username, password or database name.');

    //query prep
    $query = "INSERT INTO `chocolatebars` (`candy_id`, `name`, `weight`, `price`) VALUES (NULL, '$bar', '$weight', '$price');";

    //use connection var to run query

    mysqli_query($conn, $query) or DIE('Looks like there is something wrong with your query. Try echoing it before this line.');

    mysqli_close($conn) ;

}   else{

    $msg = 'You did not enter values in all the fields!';

}

}

?>

<html>

<body>

<h1> Add A Chocolate Bar </h1>

<?php
    if(ISSET($msg)){

        ECHO '<font color = "red">' . $msg . '</font><br/>' ;

    }else{

        echo '<a href = "https://wompampsupport.azureedge.net/fetchimage?siteId=7575&v=2&jpgQuality=100&width=700&url=https%3A%2F%2Fi.kym-cdn.com%2Fentries%2Ficons%2Ffacebook%2F000%2F030%2F567%2Fcover8.jpg" alt="icon" >' ;

        echo '<h1>' . "CLICK ANYWHERE FOR" . '</h1>' ;


    }

?>

<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
    Chololate Bar Name : <input type = "text" name = "barname"> <br/>
    Weight(g) <input type = "text" name = "weight"> <br/>
    Price <input type = "text" name = "price"> <br/>
    <input type = "submit" value = "Add This Chocolate Bar!" name = "submitbutton">
    
</form>

<?php

//store connection in var
$conn = mysqli_connect('localhost', 'root', '', 'candystore') or DIE('Cannot connect to database. Bad username, password or database name.');

//query
$query = "SELECT * from `chocolatebars`" ;

//store SELECT ALL & connect to db
$result = mysqli_query($conn, $query) or DIE('Looks like there is an issue with your query') ;

echo '<h2> All Hail Big Bars O Chocolate </h2>' ;
echo '<table border = "1">' ;
echo '<tr> <td> candy_id </td> <td> name </td> <td> weight </td> <td> price </td> </tr>' ;

//loop through database, display colum info 1 row at a time
while($row = mysqli_fetch_array($result)){

echo '<tr><td>' . $row['candy_id'] . '</td>' ;
echo '<td>' . $row['name'] . '</td>' ;
echo '<td>' . round($row['weight'], 5) . '</td>' ;
echo '<td>' . round($row['price'], 5) . '</td>' . '</td></tr>' ;

}

echo '</table>' ;

?>

</body>

</html>
