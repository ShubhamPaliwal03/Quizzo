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

        // retrieve total number of questions

        $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(ques) AS total FROM questions"));
        $total_questions = $data['total'];

        // initialize question number

        if (!isset($_POST['ques_number'])) 
        {
            $ques_number = 0;
        }
        else 
        {
            $ques_number = $_POST['ques_number'];
        }

        // handle answer submission

        if (isset($_POST['submit-answer-btn']) && isset($_POST['answer'])) 
        {
            $ques_id = $_POST['ques_id'];
            $selected_answer = $_POST['answer'];

            // update the selected answer

            $sql_update = "UPDATE `user_answers` SET selected_answer = '$selected_answer' WHERE ques_id = $ques_id";
            mysqli_query($conn, $sql_update);

            $ques_number++;

            if ($ques_number == $total_questions)
            {
                goto submit;
            }
        }

        // handle previous and next buttons

        if (isset($_POST['prev_btn'])) 
        {
            $ques_number = max(0, $ques_number - 1); // prevent going below 0
        }
        else if (isset($_POST['next_btn'])) 
        {
            $ques_number = min($total_questions - 1, $ques_number + 1); // prevent going beyond total questions
        }

        // handle quiz submission

        if (isset($_POST['submit-quiz-btn'])) 
        {
            submit:

            $correct_answers = 0;

            $sql_user_selections = "SELECT * FROM `user_answers`";
            $user_selections_result = mysqli_query($conn, $sql_user_selections);

            $sql_correct_answers = "SELECT ques_id, answer FROM `questions`";
            $correct_answers_result = mysqli_query($conn, $sql_correct_answers);

            while (($user_selections_data = mysqli_fetch_assoc($user_selections_result)) && ($correct_answers_data = mysqli_fetch_assoc($correct_answers_result))) 
            {
                $user_ques_id = $user_selections_data['ques_id'];
                $db_ques_id = $correct_answers_data['ques_id'];

                $user_selection = $user_selections_data['selected_answer'];
                $db_correct_answer = $correct_answers_data['answer'];

                if ($user_ques_id == $db_ques_id && $user_selection == $db_correct_answer) 
                {
                    $correct_answers++;
                }
            }

            // ensure no output before header call

            ob_start();
            header("Location: ./show_results.php?dhuohfs=498846&qofdgdfa=95340&ispfkpfj=$correct_answers"."42596&hisdfgfg=29316&iotkmopks=$total_questions"."96108&lfsdfnbodf=046841&fddgdfgdf=126802&bdg=797130&rwtfxfds=896743");
            ob_end_flush();
            exit();
        }

        // fetch current question

        if ($ques_number < $total_questions) 
        {
            $sql = "SELECT * FROM questions LIMIT $ques_number, 1";

            $record = mysqli_query($conn, $sql);

            if ($record && $data = mysqli_fetch_assoc($record)) 
            {
                $sql_check_answer = "SELECT selected_answer FROM `user_answers` WHERE ques_id = {$data['ques_id']}";
                $result_check_answer = mysqli_query($conn, $sql_check_answer);
                $data_check_answer = mysqli_fetch_assoc($result_check_answer);
                $answer = $data_check_answer['selected_answer'];
                ?>
                <div class="column-flex-container">
                    <h2>Q.<?php echo ($ques_number + 1) . " " . $data['ques']; ?></h2>
                    <br><br><br>
                    <form action="./quiz.php" method="post">
                        <label id="_a" onclick="highlightSelection(this.id)">
                            <div class="options <?php if ($answer === "a") echo("submitted"); ?>" id="border_container_a">
                                <input type="radio" name="answer" id="a" value="a">
                                <?php echo $data['a']; ?>
                            </div>
                        </label>
                        <br><br>
                        <label id="_b" onclick="highlightSelection(this.id)">
                            <div class="options <?php if ($answer === "b") echo("submitted"); ?>" id="border_container_b">
                                <input type="radio" name="answer" id="b" value="b">
                                <?php echo $data['b']; ?>
                            </div>
                        </label>
                        <br><br>
                        <label id="_c" onclick="highlightSelection(this.id)">
                            <div class="options <?php if ($answer === "c") echo("submitted"); ?>" id="border_container_c">
                                <input type="radio" name="answer" id="c" value="c">
                                <?php echo $data['c']; ?>
                            </div>
                        </label>
                        <br><br>
                        <label id="_d" onclick="highlightSelection(this.id)">
                            <div class="options <?php if ($answer === "d") echo("submitted"); ?>" id="border_container_d">
                                <input type="radio" name="answer" id="d" value="d">
                                <?php echo $data['d']; ?>
                            </div>
                        </label>
                        <input type="hidden" id="correct_answer" name="correct_answer" value="<?php echo $data['answer']; ?>">
                        <br><br>
                        <div class="buttons-container row-flex-container">
                            <input class="prev-next-btn" type="submit" value="Prev" name="prev_btn" <?php if ($ques_number === 0) echo('disabled'); ?>>
                            <input type="submit" id="submit_answer_button" name="submit-answer-btn" value="Submit Answer">
                            <input type="text" name="ques_id" value="<?php echo($data['ques_id']); ?>" hidden>
                            <input type="submit" id="submit-quiz-submit-button" class="submit-quiz-button" name="submit-quiz-btn" value="Submit Quiz" hidden>
                            <?php
                            if ($ques_number === $total_questions - 1) 
                            {
                                ?>
                                <input type="button" id="submit-quiz-confirm-button" class="submit-quiz-button" value="Submit Quiz" onclick="confirmSubmit()">
                                <?php
                            }
                            ?>
                            <input class="prev-next-btn" type="submit" value="Next" name="next_btn" <?php if ($ques_number === $total_questions - 1) echo('disabled'); ?>>
                            <input type="text" name="ques_number" value="<?php echo($ques_number); ?>" hidden>
                        </div>
                    </form>
                </div>
                <?php
            }
        }
    ?>
    <script type="text/javascript" src="./quiz_script.js"></script>
</body>
</html>