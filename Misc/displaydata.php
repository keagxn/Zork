<html>

<body>

<?php

//store connection in var
$conn = mysqli_connect('localhost', 'root', '', 'mybank') or DIE('Cannot connect to database. Bad username, password or database name.');

//query
$query = "SELECT * FROM `customer`" ;

"         SELECT * FROM `employee` WHERE FIRST_NAME LIKE 'S%' OR LAST_NAME LIKE 'S%' ;     "
        
            


//store SELECT ALL & connect to db
$result = mysqli_query($conn, $query) or DIE('Looks like there is an issue with your query') ;

echo '<h2> omg </h2>' ;
echo '<table border = "1">' ;
echo '<tr> <td> CUST_ID </td> <td> ADDRESS </td> <td> CITY </td> <td> FED_ID </td> </tr>' ;

//loop through database, display colum info 1 row at a time
while($row = mysqli_fetch_array($result)){

echo '<tr><td>' . $row['CUST_ID'] . '</td>' ;
echo '<td>' . $row['ADDRESS'] . '</td>' ;
echo '<td>' . round($row['CITY'], 5) . '</td>' ;
echo '<td>' . round($row['FED_ID'], 5) . '</td>' . '</td></tr>' ;

}

echo '</table>' ;

?>

</body>

</html>
