<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Results</title>
    <link rel="stylesheet" href="./show_results_style.css">
</head>
<body>
<?php
    if(isset($_GET['ispfkpfj']) && isset($_GET['iotkmopks']))
    {
        $url_param_1 = $_GET['ispfkpfj'];
        $correct_answers = substr($url_param_1, 0, strlen($url_param_1) - 5);

        $url_param_2 = $_GET['iotkmopks'];
        $total_questions = substr($url_param_2, 0, strlen($url_param_2) - 5);

        ?>
            <div class="column-flex-container">
                <h1>Quiz Completed!</h1>
                <h2 style="color: rgb(9, 191, 9);">Your Score is : <?php echo($correct_answers);?> / <?php echo($total_questions); ?></h2>
            </div>
        <?php
    }
    else
    {
        echo("<h1>Access Denied...Request From Unknown Source...</h1>");
    }
?>  
</body>
</html>