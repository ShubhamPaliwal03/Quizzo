<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Quiz Application</title>
    <style>
        body
        {
            background-color: black;
        }
        #outer
        {
            display: flex;
            flex-direction: row;
            justify-content: center;
            position: relative;
            top: 15vh;
        }
        button
        {
            padding: 20px;
            font-size: 20px;
            height: 150px;
            width: 150px;
            transition: scale 0.5s;
            background-color: orange;
            border-radius: 10px;
        }
        button:hover
        {
            scale: 1.1;
        }
        #inner1, #inner2
        {
            display: flex;
            flex-direction: column;
        }
        div
        {
            margin-left: 10px;
            margin-bottom: 20px;
        }
        #heading
        {   
            font-size: 50px;
            text-decoration: underline;
        }
        #heading_div
        {
            margin: 0px auto;
            width: 700px;
            color: white;
        }
    </style>
</head>
<body>
    <div id="heading_div">
        <p id="heading">Admin Panel - Quiz Application</p>
    </div>    
    <div id="outer">
        <div id="inner1">
            <div>
                <a href="add_new_question.php"><button>Add New Question</button></a>
            </div>
            <div>
                <button>Update A Question</button>
            </div>
        </div>
        <div id="inner2">
            <div>
                <button>Delete A Question</button>
            </div>
            <div>
                <button>Show All Questions</button>
            </div>
        </div>
    </div>
</body>
</html>