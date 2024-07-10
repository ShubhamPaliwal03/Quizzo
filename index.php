<?php
    if(isset($_POST['start']))
    {
        // reset the user_answers table for the new user =>

        include('./connect.php');

        // truncate the records of the previous user

        $sql_truncate = "truncate table `user_answers`";
        mysqli_query($conn, $sql_truncate);

        // add empty records for the new user

        $sql_select_questions = "select ques_id from `questions`";
        $results = mysqli_query($conn, $sql_select_questions);

        $sql_insert_multi = "";

        while($data = mysqli_fetch_assoc($results))
        {
            $ques_id = $data['ques_id'];

            $sql_insert_multi .= "insert into `user_answers` values ($ques_id, 'n');";
        }

        mysqli_multi_query($conn, $sql_insert_multi);

        // redirect to quiz webpage

        header("location:./quiz.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style type="text/css">

        body
        {
            overflow: hidden;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
        }

        #start-quiz-btn
        {
            padding: 1rem;
            font-size: 1.125rem; /* 18px */
            color: white;
            background-color: orange;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            transition: scale 0.5s;
            color: black;
            cursor: pointer;   
        }

        #start-quiz-btn:hover
        {
            scale : 1.1;
        }

    </style>
</head>
<body>
    <h1>Welcome! Ready to test your knowledge?</h1>
    <h2>Please Read the instructions carefully before starting the quiz!</h2>
    <h3>Instructions:</h3>
    <ul>
        <li><strong>After selecting the answer, to make your submission count, you will have to submit the particular question using the submit question button.</strong></li>
        <li>There is no time limit for solving a particular question.</li>
        <li><strong>You can move to next questions, or move to previous questions and change your selection, <span style="color: dodgerblue;">blue border indicates current selected (unsubmitted) answer</span>, and <span style="color: rgb(9, 191, 9);">green border indicates submitted answer</span>.</strong></li>
        <li><strong>If you don't submit your quiz before total time (20 mins), Your quiz will be auto submitted with whichever options you had selected.</strong></li>
        <li>You will see your score and the correct answers with their explanations after the quiz ends.</li>
        <li>All the best!</li>
    </ul>
    <form action="index.php" method="post">
        <input type="submit" name="start" value="Start Quiz" id="start-quiz-btn">
    </form>
</body>
</html>