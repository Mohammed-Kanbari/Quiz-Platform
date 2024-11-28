<!DOCTYPE html>
<html>
<head>
    <title>Quiz Selection</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background-color: #f7f7f7;
            border: 10px solid #2980b9; /* More subtle border color */
            box-sizing: border-box;
            border-radius: 15px; /* Smooth rounded corners */
            padding: 30px; /* Increased padding for more space */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow for professional look */
        }

        h1 {
            color: #2c3e50;
            font-size: 3em;
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Subtle text shadow for a sleek effect */
        }

        .button {
            display: inline-block;
            border-radius: 8px;
            background-color: #3498db;
            color: #FFFFFF;
            text-align: center;
            font-size: 24px;
            padding: 15px 25px;
            width: auto;
            min-width: 250px;
            margin: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
        }

        .button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .button span {
            display: inline-block;
            position: relative;
            transition: padding-right 0.3s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: opacity 0.3s, right 0.3s;
        }

        .button:hover span {
            padding-right: 30px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
</head>
<body>
    <?php
    include('aau_connection.php');

    $sql = "SELECT title FROM quizzes";
    $result = $con->query($sql);

    echo "<h1>The available quizzes</h1>";
    while ($row = $result->fetch_assoc()) {
        echo "<form action='Instructions.php' method='get'>
                <button class='button' name='quiz' value='" . $row['title'] . "'><span>" . $row['title'] . "</span></button>
              </form>";
    }
    ?>
</body>
</html>
