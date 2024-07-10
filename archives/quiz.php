<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./quiz_style.css">
    <title>Programming Quiz - Check Your Knowledge</title>
</head>
<body>
    <?php
        include('./connect.php');

        if(!isset($_POST['ques_number']))
        {
            // initialize the question number with 0
            
            $ques_number = 0;
        }
        else
        {
            $ques_number = $_POST['ques_number'];
        }

        if(isset($_POST['submit-answer-btn']) && isset($_POST['answer']))
        {
            $ques_id = $_POST['ques_id'];
            $selected_answer = $_POST['answer'];

            // update the selected answer with the latest selection

            $sql_update = "update table `user_answers` set user_answer = '$selected_answer' where ques_id = $ques_id";
            mysqli_query($conn, $sql_update);

            $ques_number++;
        }

        // retrieve the count of questions present in the quiz from the database

        $data = mysqli_fetch_assoc(mysqli_query($conn, "select COUNT(ques) as total from questions"));
        $total_questions = $data['total'];

        if(isset($_POST['prev_btn']))
        {
            $ques_number--;
        }
        else if(isset($_POST['next_btn']))
        {
            $ques_number++;
        }

        if(isset($_POST['submit-quiz-btn']))
        {
            // fetch the user selections from the 'user_answers' table of the database,
            // and compare them with the correct answers from the 'questions' table of the database
            // and calculate the final score.

            $correct_answers = 0;

            $sql_user_selections = "select * from `user_answers`";
            $user_selections_result = mysqli_query($conn, $sql_user_selections);

            $sql_correct_answers = "select ques_id, answer from `questions`";
            $correct_answers_result = mysqli_query($conn, $sql_correct_answers);

            while($user_selections_data = mysqli_fetch_assoc($user_selections_result) && $correct_answers_data = mysqli_fetch_assoc($correct_answers_result))
            {
                $user_ques_id = $user_selections_data['ques_id'];
                $db_ques_id = $correct_answers_data['ques_id'];

                $user_selection = $user_selections_data['selected_answer'];
                $db_correct_answer = $correct_answers_data['answer'];

                if($user_ques_id === $db_ques_id && $user_selection === $db_correct_answer)
                {
                    $correct_answers++;
                }
            }

            header("location:./show_results.php?dhuohfs=498846&qofdgdfa=95340&ispfkpfj=$correct_answers"."42596&hisdfgfg=29316&iotkmopks=$total_questions"."96108&lfsdfnbodf=046841&fddgdfgdf=126802&bdg=797130&rwtfxfds=896743");
        }
        else if($ques_number < $total_questions)
        {
            // fetch 1 record at a time from the database, starting from the given question number,
            // ie., it returns the details of a particular question_number 
            // (not in sync with ques_id of the questions table, because that is set to auto increment)

            $sql = "select * from questions limit $ques_number, 1";
            $record = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($record);

            $sql_check_answer = "select selected_answer from `user_answers` where ques_id = $data[ques_id]";
            $result_check_answer = mysqli_query($conn, $sql_check_answer);
            $data_check_answer = mysqli_fetch_assoc($result_check_answer);
            $answer = $data_check_answer['selected_answer'];
            
            ?>
            <div class="column-flex-container">
                <h2>Q.<?php echo ($ques_number+1)." ".$data['ques'];?></h2>
                <br><br><br>
                <label id="_a" onclick="highlightSelection(this.id)">
                    <div class="options <?php if($answer === "a") echo("submitted");?>" id="border_container_a">
                        <input type="radio" name="answer" id="a" value="a">
                        <?php echo $data['a'];?>
                    </div>
                </label>
                <br><br>
                <label id="_b" onclick="highlightSelection(this.id)">
                    <div class="options <?php if($answer === "b") echo("submitted");?>" id="border_container_b">
                        <input type="radio" name="answer" id="b" value="b">
                        <?php echo $data['b'];?>
                    </div>
                </label>
                <br><br>
                <label id="_c" onclick="highlightSelection(this.id)">
                    <div class="options <?php if($answer === "c") echo("submitted");?>" id="border_container_c">
                        <input type="radio" name="answer" id="c" value="c">
                        <?php echo $data['c'];?>
                    </div>
                </label>
                <br><br>
                <label id="_d" onclick="highlightSelection(this.id)">
                    <div class="options <?php if($answer === "d") echo("submitted");?>" id="border_container_d">
                        <input type="radio" name="answer" id="d" value="d">
                        <?php echo $data['d'];?>
                    </div>
                </label>
                <input type="hidden" id="correct_answer" name="correct_answer" value="<?php echo $data['answer'];?>">
                <br><br>
                <form action="./quiz.php" method="post">
                    <div class="buttons-container row-flex-container">
                        <input class="prev-next-btn" type="submit" value="Prev" name="prev_btn" <?php if($ques_number === 0) echo('disabled');?>>
                        <input type="submit" id="submit_answer_button" name="submit-answer-btn" value="Submit Answer">
                        <input type="text" name="ques_id" value="<?php echo($data['ques_id']);?>" hidden>
                        <input type="submit" id="submit-quiz-submit-button" class="submit-quiz-button" name="submit-quiz-btn" value="Submit Quiz" hidden>
                        <?php
                            if($ques_number === $total_questions - 1)
                            {
                                ?>
                                    <input type="button" id="submit-quiz-confirm-button" class="submit-quiz-button" value="Submit Quiz" onclick="confirmSubmit()">
                                <?php
                            }
                        ?>
                        <input class="prev-next-btn" type="submit" value="Next" name="next_btn" <?php if($ques_number === $total_questions - 1) echo('disabled');?>>
                        <input type="text" name="ques_number" value="<?php echo($ques_number);?>" hidden>
                    </div>
                </form>
            </div>
            <?php
        }
    ?>
    <script type="text/javascript" src="./quiz_script.js"></script>
</body>
</html>