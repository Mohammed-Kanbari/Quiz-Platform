<?php
include('aau_connection.php');

if (isset($_GET['quiz'])) {
    $quizTitle = $_GET['quiz'];

    $sql = "SELECT * FROM quizzes WHERE title='$quizTitle'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Determine time limit based on quiz title
        if ($quizTitle == 'Quiz1' || $quizTitle == 'Quiz2') {
            $timeLimit = 30 * 60; // 30 minutes in seconds
        } else {
            $timeLimit = 60 * 60; // 60 minutes in seconds
        }

        // Get the number of questions
        $sql_questions = "SELECT COUNT(*) AS total FROM $quizTitle";
        $result_questions = $con->query($sql_questions);
        $number_of_questions = $result_questions->fetch_assoc()['total'];

        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Quiz</title>
            <style>
               body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Align items to the top of the page */
    min-height: 100vh;
    background-color: #f4f4f9;
    border: 20px solid #3498db;
    box-sizing: border-box;
    border-style: ridge;
}

.container {
    background: #fff;
    padding: 30px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    max-width: 800px; /* Increased width for better layout */
    text-align: left;
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Align contents to the left */
}

h1 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

p {
    margin: 10px 0;
    color: #555;
}

form {
    text-align: left;
    width: 100%; /* Ensure form takes full width */
}

.question {
    margin-bottom: 20px; /* Spacing between questions */
}

.question h3 {
    margin-bottom: 10px;
}

button {
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 20px;
    transition: background-color 0.3s ease;
    margin-left: auto; 
    margin-right: auto;
}

button:hover {
    background-color: #45a049;
}

.timer {
    font-size: 20px;
    color: red;
    position: fixed;
    top: 10px;
    right: 10px;
    background-color: #fff;
    padding: 10px;
    border: 2px solid #333;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.progress-bar-container {
    background-color: #e0e0e0; 
    border-radius: 30px; 
    margin: 25px 0;
    height: 30px; 
    width: 100%;
    overflow: hidden;
    border: 2px solid #ddd; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}

.progress-bar {
    height: 100%;
    width: 0%; 
    background-color: #3498db; 
    text-align: center;
    line-height: 30px; 
    color: white;
    font-weight: bold;
    border-radius: 30px 0 0 30px; 
    transition: width 0.4s ease-out; 
}

            </style>
            <script>
                let timeLimit = $timeLimit;
                function startTimer() {
                    let timer = document.getElementById('timer');
                    setInterval(function() {
                        let minutes = Math.floor(timeLimit / 60);
                        let seconds = timeLimit % 60;
                        timer.innerHTML = minutes + ' minutes ' + seconds + ' seconds remaining';
                        if (timeLimit > 0) {
                            timeLimit--;
                        } else {
                            alert('Time is up!');
                            document.getElementById('quiz-form').submit();
                        }
                    }, 1000);
                }
                function updateProgress() {
                    const totalQuestions = document.querySelectorAll('.question').length;
                    const answeredQuestions = document.querySelectorAll('.question input:checked').length;
                    const progress = (answeredQuestions / totalQuestions) * 100;
                    document.getElementById('progress-bar').style.width = progress + '%';
                    document.getElementById('progress-bar').innerText = Math.round(progress) + '%';
                }
            </script>
        </head>
        <body onload='startTimer()'>
        <div class='container'>
            <h1>" . $quizTitle . "</h1>
            <div class='timer' id='timer'></div>
            <div class='progress-bar-container'>
                <div class='progress-bar' id='progress-bar'>0%</div>
            </div>
            <form id='quiz-form' action='results.php' method='post'>
                <input type='hidden' name='quizTitle' value='" . $quizTitle . "'>";
            
            $sql_questions = "SELECT * FROM $quizTitle";
            $result_questions = $con->query($sql_questions);

            if ($result_questions->num_rows > 0) {
                while ($question = $result_questions->fetch_assoc()) {
                    echo "<div class='question'>
                            <h3>Q" . $question['id'] . ": " . $question['question'] . "</h3>";
                    for ($i = 1; $i <= 4; $i++) {
                        $option = "option" . $i;
                        echo "<input type='radio' name='question_" . $question['id'] . "' value='$i' onclick='updateProgress()'> " . $question[$option] . "<br>";
                    }
                    echo "</div>";
                }
                echo "<button type='submit'>Finish quiz</button>";
                echo "</form>";
            } else {
                echo "No questions available for this quiz.";
            }
            echo "</div>
        </body>
        </html>";
    } else {
        echo "No instructions found for this quiz.";
    }
} else {
    echo "No quiz selected.";
}
?>
