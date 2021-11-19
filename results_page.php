<?php
    //connect to database class
    include_once (dirname(__FILE__)).'/./controllers/input_controller.php';
    $searches = getInputs();

    function showRecentSearches() {
        $searches = getInputs();
        for ($i= sizeof($searches)-1; $i>-1; $i--) { 
            echo $searches[$i]['search_term'];
            echo '<br>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" src="./main.css" type="text/css"/>
    <title>Practical H, I, J, K</title>

</head>
<body style="display: flex; justify-content: center; align-items: center; background-color: lightblue; font-family: 'Lato', sans-serif;">
    <div class="container" style="background-color: white; padding: 50px; border-radius: 20px; margin-top: 100px;">
        <h1>Results Page!</h1>
        <div>
            <h3>Recent Searches ...</h4>
            <ul >
                <?php

                    if(isset($_POST['query'])) {  
                        $fname = $_POST['query'];
                        if ($fname != "") {
                            $res = createInput($fname);
                            $searches = array();
                        }
                        
                    }
                    showRecentSearches();
                ?>

            </ul>
            <div style="display: flex; justify-content: center; align-items: center">
                <form action="index.php">
                    <button type="submit" id="return_btn" style="background-color: lightblue; font-size: 15px; padding: 10px 12px; border: none; border-radius: 10px; ">Return to Main Page</button>
                </form>
            </div>
            

        </div>
    </div>

    
</body>
</html>