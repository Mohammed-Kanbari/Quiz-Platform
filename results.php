<?php
include('aau_connection.php');

$quizTitle = $_POST['quizTitle'];
$score = 0;
$number_of_questions = 0;

// Get the number of questions in the quiz
$sql_questions = "SELECT COUNT(*) AS total FROM $quizTitle";
$result_questions = $con->query($sql_questions);
if ($result_questions->num_rows > 0) {
    $row = $result_questions->fetch_assoc();
    $number_of_questions = $row['total'];
}

// Get the total marks for the quiz
$sql = "SELECT total_marks FROM quizzes WHERE title='$quizTitle'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$total_marks = $row['total_marks'];

// Calculate marks per question
$marks_per_question = $total_marks / $number_of_questions;

foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') === 0) {
        $question_id = str_replace('question_', '', $key);
        $selected_option = $value;

        $sql = "SELECT correct_option FROM $quizTitle WHERE id='$question_id'";
        $result = $con->query($sql);
        $question = $result->fetch_assoc();

        if ($question['correct_option'] == $selected_option) {
            $score += $marks_per_question;
        }
    }
}

echo "<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #e9ecf2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
    border: 10px solid #5dade2;
    box-sizing: border-box;
    border-style: outset;
    overflow: hidden;
}

.container {
    text-align: center;
    background: #ffffff;
    padding: 40px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    max-width: 500px;
    width: 90%;
}

h1 {
    color: #1a2c42;
    font-size: 2.8em;
    margin-bottom: 15px;
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
    font-weight: 600;
    letter-spacing: 1px;
}

p {
    color: #6c757d;
    font-size: 1.125em;
    line-height: 1.6;
    margin-bottom: 20px;
}

.score {
    font-size: 1.5em;
    color: #28a745;
    font-weight: 700;
}

.button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 1em;
    cursor: pointer;
    border-radius: 8px;
    margin: 25px 0;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 3px 10px rgba(0, 123, 255, 0.3);
}

.button:hover {
    background-color: #0056b3;
    transform: translateY(-3px);
}

.button:active {
    background-color: #004494;
    transform: translateY(1px);
}

    </style>
</head>
<body>
<div class='container'>
    <h1>" . $quizTitle . " Result</h1>
    <p class='score'>Your score: " . $score . " out of $total_marks</p>
    <form action='Review.php' method='post'>
        <input type='hidden' name='quizTitle' value='" . $quizTitle . "'>";
foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') === 0) {
        echo "<input type='hidden' name='" . $key . "' value='" . $value . "'>";
    }
}
echo "<button class='button' type='submit'>See Quiz Review</button>
    </form>
</div>
</body>
</html>";
?>
