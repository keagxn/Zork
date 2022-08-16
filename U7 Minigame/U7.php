<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (isset($_POST['btnDelete'])){
        session_unset();
    }

}

    if(!isset($_SESSION['dicekept'])){ 

        $_SESSION['dicekept'] = array();

    }

if(isset($_SESSION['choice1']) && isset($_SESSION['choice2']) && isset($_SESSION['choice3'])){ 
    
    if(isset($_POST['btnradio']) && $_POST['btnradio'] == 'rad1'){ 

        $_SESSION ['kept1'] =  $_SESSION['choice1'] ;

        array_push($_SESSION['dicekept'] , $_SESSION['choice1']) ;

    }

    if(isset($_POST['btnradio']) && $_POST['btnradio'] == 'rad2'){ 

        array_push($_SESSION['dicekept'] , $_SESSION['choice2']) ;

    }

    if(isset($_POST['btnradio']) && $_POST['btnradio'] == 'rad3'){ 

        array_push($_SESSION['dicekept'] , $_SESSION['choice3']) ;

    }
}

    $_SESSION['choice1'] = rand(1, 6);

    $_SESSION['choice2'] = rand(1, 6);

    $_SESSION['choice3'] = rand(1, 6);

    //win condition, add game stop at lose after 2 moves

    if(isset($_SESSION['dicekept'][2])){

        $endgame = 'YE' ;

    }else{

        $endgame = 'NNNN' ;

    }

    if($endgame = 'YE'){

        if(array_sum($_SESSION['dicekept']) < 7){

            $win = 'W' ;

        } elseif(array_sum($_SESSION['dicekept']) == 7){

            $win = 'T' ;

        }else{

            $win = 'L' ;

        }

    }


?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" type="text/css" href="themes.css">

        <div class="p-3 mb-2 bg-dark text-cyan text-center"><h1> U7 </h1></div>

        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/dark.js"> </script>

        <!-- Styles -->
    <style>

        #chartdiv {
            width: 100%;
            height: 500px;
        }

        body {
            background-color: black;
            color: white;
            }

            .light-mode {
            background-color: white;
            color: black;
            }

    </style>
 
    </head>
    <body>
        <div class="container"> 
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                <div class="float-end">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                
                <input type="radio" class="btn-check" name="btnradio" value= "rad1" id="btnradio1" autocomplete="off">

                <label class="btn btn-outline-cyan" for="btnradio1">Keep First</label>

                <input type="radio" class="btn-check" name="btnradio" value= "rad2" id="btnradio2" autocomplete="off">
                  
                <label class="btn btn-outline-cyan" for="btnradio2">Keep Second</label>

                <input type="radio" class="btn-check" name="btnradio" value= "rad3" id="btnradio3" autocomplete="off">

                <label class="btn btn-outline-cyan" for="btnradio3">Keep Third</label>

            </div>
            <input class="btn btn-cyan" type="submit" name="choose" value="Choose">

            <input type='submit' name='btnDelete' value='reset' class="btn btn-cyan">
        </div>
            
        </form>

            <!-- ------------------------------------------------------------------- -->

            <h1>Roll a Dice</h1>

            <img src= "dice/<?php echo $_SESSION ['choice1']; ?>.jpg">

            <img src= "dice/<?php echo $_SESSION ['choice2']; ?>.jpg">

            <img src= "dice/<?php echo $_SESSION ['choice3']; ?>.jpg">

                <form method = "POST" action = "<?php echo $_SERVER ['PHP_SELF']; ?>">
                    <!-- <input type = "text" name = "number" placeholder = "<?php echo $_SESSION['a']; ?>" > -->

                    <!-- //choice buttons -->
                    <input type = "submit" name = "submitbutton" value = "Roll the homes">
                </form>

            <hr>

            <h2> Kept <h2>
            
            <img src= "dice/<?php echo $_SESSION['dicekept'][0]; ?>.jpg">

            <img src= "dice/<?php echo $_SESSION['dicekept'][1]; ?>.jpg">

            <img src= "dice/<?php echo $_SESSION['dicekept'][2]; ?>.jpg">

            <h2> DOne? <?php echo $endgame ; ?>  Win? <?php echo $win ; ?><h2>


    </body>
</html>