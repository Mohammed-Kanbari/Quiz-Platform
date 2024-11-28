<?php
include('aau_connection.php');

if (isset($_GET['quiz'])) {
    $quizTitle = $_GET['quiz'];

    $sql = "SELECT * FROM quizzes WHERE title='$quizTitle'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Quiz Instructions</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background-color: #f1f1f1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    background-color: #ffffff;
                    padding: 40px;
                    max-width: 600px;
                    width: 90%;
                    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                    border-radius: 15px;
                    text-align: center;
                }

                h1 {
                    color: #34495e;
                    font-size: 2.8em;
                    margin-bottom: 20px;
                    font-weight: 700;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
                }

                p {
                    font-size: 1.125em;
                    color: #555;
                    line-height: 1.6;
                    margin-bottom: 20px;
                }

                .button {
                    background-color: #3498db;
                    color: white;
                    font-size: 18px;
                    padding: 15px 30px;
                    border: none;
                    border-radius: 8px;
                    text-decoration: none;
                    cursor: pointer;
                    margin: 20px 0;
                    transition: background-color 0.3s, transform 0.2s;
                }

                .button:hover {
                    background-color: #2980b9;
                    transform: translateY(-3px);
                }

                .button:active {
                    background-color: #2471a3;
                    transform: translateY(1px);
                }

                strong {
                    font-weight: 600;
                    color: #2c3e50;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Instructions for " . $quizTitle . "</h1>
                <p><strong>Description:</strong> " . $row['description'] . "</p>
                <p><strong>Time Limit:</strong> " . $row['time_limit'] . " minutes</p>
                <p><strong>Number of Questions:</strong> " . $row['totalquestions'] . "</p>
                <p><strong>Maximum Mark:</strong> " . $row['total_marks'] . "</p>
                <p><strong>Tips:</strong> " . $row['tips'] . "</p>
                <form action='QuizDetails.php' method='get'>
                    <input type='hidden' name='quiz' value='" . $quizTitle . "'>
                    <button class='button' type='submit'>Proceed to Exam</button>
                </form>
            </div>
        </body>
        </html>";
    } else {
        echo "No instructions found for this quiz.";
    }
} else {
    echo "No quiz selected.";
}
?>
