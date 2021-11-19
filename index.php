<?php
    //connect to database class
    include_once (dirname(__FILE__)).'/./controllers/input_controller.php';
    $searches = getInputs();

    function showRecentSearches() {
        $searches = getInputs();
        for ($i= sizeof($searches)-1; $i>-1; $i--) { 
            echo $searches[$i]['search_term'];
            $id = $searches[$i]['lab_id'];            
            echo "<div style='display: inline; float: right;'><form method='post' action='index.php?itemToUpdate=$id' style='display: inline;'><input type='text' name='newSearch' value='' style='width: 120px;'/><input type=submit value='Update'></form>";
            echo "<a href='index.php?itemToDelete=$id' ><button name='delete' > Delete </button></a></div>";
            echo '<br>';
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
    <link rel="stylesheet" src="main.css" type="text/css"/>
    <title>Practical H, I, J, K</title>

</head>
<body style="display: flex; justify-content: center; align-items: center; background-color: lightgray; font-family: 'Lato', sans-serif;">
    <div class="container" style="background-color: white; padding: 50px; border-radius: 20px; margin-top: 100px;">
        <h1>Welcome to my Web Tech Practicals!</h1>
        <h2>This is Lorraine Makuyana &#128578;</h2>
        <br>
        <form method="post" action="#">

            <label for="input"><h4>Enter search word to show results on this page</h4></label>
            <input id="input" type="text" name="query" value="">

            <input type=submit>

        </form>
        <br><br>
        <form method="post" action="#">

            <label for="to_find"><h4>Enter search word to check history</h4></label>
            <input id="to_find" type="text" name="find" value="">

            <input type=submit value="Check">

        </form>
        <br>
        <div>
            <h3>Recent Searches ...</h4>
            <ul>
                <?php

                    if(isset($_POST['query'])) {  
                        $fname = $_POST['query'];
                        if ($fname != "") {
                            $res = createInput($fname);
                            $searches = array();
                        }
                        
                    }

                    if(isset($_POST['find'])) {  
                        $to_find = $_POST['find'];
                        if ($to_find != "") {
                            $res = getSearch($to_find);
                            if ($res) {
                                ?>
                                <script>
                                    alert("This term has previously been searched for.")
                                </script>
                                <?php
                            } else {
                                ?>
                                <script>
                                    alert("This term has not been searched for yet.")
                                </script>
                                <?php
                            }
                        }
                    }

                    if(isset($_GET['itemToDelete'])) {
                        $id = $_GET['itemToDelete'];
                        $res = deleteSearch($id); 
                        if ($res) {
                            $searches = array();
                            showRecentSearches();
                        } else {
                            echo "Delete failed";
                        }
                    }

                    if(isset($_GET['itemToUpdate'])) {
                        $id = $_GET['itemToUpdate'];
                        if(isset($_POST['newSearch'])) {
                            $input = $_POST['newSearch'];
                            $res = updateSearch($id, $input); 
                            echo $res;
                            if ($res) {
                                $searches = array();
                                showRecentSearches();
                            } else {
                                echo "Update failed";
                            }
                        } else {
                            echo "You did not specify an input";
                            echo '<br>';
                        }
                    }

                    showRecentSearches();
                ?>

            </ul>
            

        </div>
    </div>

    
</body>
</html>