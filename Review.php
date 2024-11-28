<?php
include('aau_connection.php');

if (isset($_POST['quizTitle'])) {
    $quizTitle = $_POST['quizTitle'];

    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Quiz Review</title>
        <style>
           body {
                font-family: 'Arial', sans-serif;
                background-color: #f1f1f1;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                flex-direction: column;
                box-sizing: border-box;
            }
            .container {
                background: #fff;
                padding: 40px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                max-width: 900px;
                width: 100%;
                text-align: left;
                box-sizing: border-box;
            }
            h1 {
                color: #2c3e50;
                font-size: 2.5em;
                margin-bottom: 20px;
                text-align: center;
                text-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
            }
            .question {
                margin-bottom: 25px;
            }
            .correct {
                color: #27ae60;
                font-weight: bold;
                background-color: #e8f5e9;
                padding: 5px;
                border-radius: 5px;
            }
            .wrong {
                color: #e74c3c;
                font-weight: bold;
                background-color: #fdecea;
                padding: 5px;
                border-radius: 5px;
            }
            .answer {
                margin: 5px 0;
                font-size: 1.1em;
            }
            .button {
                background-color: #3498db;
                color: white;
                border: none;
                padding: 12px 24px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 5px;
                transition: background-color 0.3s ease;
                text-align: center;
                display: inline-block;
                margin-top: 20px;
            }
            .button:hover {
                background-color: #2980b9;
            }
        </style>
    </head>
    <body>
    <div class='container'>
        <h1>Review of " . $quizTitle . "</h1>";

    // Get total marks and number of questions
    $sql = "SELECT total_marks FROM quizzes WHERE title='$quizTitle'";
    $result = $con->query($sql);
    $quiz_info = $result->fetch_assoc();
    $total_marks = $quiz_info['total_marks'];

    $sql_questions = "SELECT COUNT(*) AS total FROM $quizTitle";
    $result_questions = $con->query($sql_questions);
    $question_info = $result_questions->fetch_assoc();
    $number_of_questions = $question_info['total'];

    // Calculate marks per question
    $marks_per_question = $total_marks / $number_of_questions;

    // Fetch and display questions and answers
    $sql = "SELECT * FROM $quizTitle";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($question = $result->fetch_assoc()) {
            echo "<div class='question'>
                    <h3>Q" . $question['id'] . ": " . $question['question'] . "</h3>";
            $selected_option = isset($_POST['question_' . $question['id']]) ? $_POST['question_' . $question['id']] : null;
            $is_correct = $selected_option == $question['correct_option'];

            for ($i = 1; $i <= 4; $i++) {
                $option = "option" . $i;
                $class = "";

                if ($i == $question['correct_option']) {
                    $class = "correct";
                } elseif ($i == $selected_option) {
                    $class = "wrong";
                }

                if ($class == "wrong") {
                    echo "<p class='wrong'>" . $question[$option] . " (Your Answer)</p>";
                } elseif ($class == "correct") {
                    echo "<p class='correct'>" . $question[$option] . " (The Correct Answer)</p>";
                } else {
                    echo "<p>" . $question[$option] . "</p>";
                }
            }

            // Display marks for the question
            if ($is_correct) {
                echo "<p>Score: <span class='correct'>" . $marks_per_question . " out of " . $marks_per_question . "</span></p>";
            } elseif ($selected_option !== null) {
                echo "<p>Score: <span class='wrong'>0 out of " . $marks_per_question . "</span></p>";
            } else {
                echo "<p>Score: <span class='correct'>0 out of " . $marks_per_question . "</span></p>";
            }

            echo "</div>";
        }
    } else {
        echo "<p>No questions available for this quiz.</p>";
    }

     echo "<a href='AAU_QUIZ.php' class='button'>Back to Home</a>
    </div>
    </body>
    </html>";
} else {
    echo "No quiz selected.";
}
?>
