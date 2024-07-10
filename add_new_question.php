<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding New Question To Questions Database</title>
</head>
<body>
    <?php
        if(isset($_POST['submit']))
        {
            $username = "root";
            $password = "";
            $servername = "localhost";
            $dbname = "quiz_application";
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            $ques = $_POST['question'];
            $optionA = $_POST['optionA'];
            $optionB = $_POST['optionB'];
            $optionC = $_POST['optionC'];
            $optionD = $_POST['optionD'];
            $answer = $_POST['answer'];
            $explanation = $_POST['explanation'];
            
            $sql = "insert into questions (ques, a, b, c, d, answer, explanation) values('$ques', '$optionA', '$optionB', '$optionC', '$optionD', '$answer', '$explanation')";
            
            if(mysqli_query($conn, $sql))
            {
                echo "Question Added Successfully...";
            }
            else
            {
                echo "Something Went Wrong :(";
            }

            header('refresh:1;url=./admin_panel.php');
        }
        else
        {
            ?>
                <form method="post" action="add_new_question.php">

                    <div id="ques_textarea">
                        <textarea name="question" id="ques" cols="50" rows="20" placeholder="Enter Your Question Here" style="width: 1513px; height: 113px;"></textarea>
                    </div>
                    <div id="options_textareas">
                        <textarea name="optionA" id="optionA" cols="30" rows="10" placeholder="Enter Option A" style="width: 1513px; height: 113px;"></textarea>
                        <textarea name="optionB" id="optionB" cols="30" rows="10" placeholder="Enter Option B" style="width: 1513px; height: 113px;"></textarea>
                        <textarea name="optionC" id="optionC" cols="30" rows="10" placeholder="Enter Option C" style="width: 1513px; height: 113px;"></textarea>
                        <textarea name="optionD" id="optionD" cols="30" rows="10" placeholder="Enter Option D" style="width: 1513px; height: 113px;"></textarea>
                    </div>
                    <div id="answer_selection">
                        Select The Correct Option For Your Question : 
                        <select name="answer" id="ans">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select><br>
                    </div>
                    <div id="explanation_textarea">
                        <textarea name="explanation" id="expl" cols="30" rows="10" placeholder="Enter Explanation Of This Question" style="width: 1513px; height: 113px;"></textarea><br>
                    </div>

                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">

                </form>
            <?php
        }
    ?>
</body>
</html>