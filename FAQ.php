<?php
    include('includes/header.php'); 

    // Check if the user is logged in
if (!isset($_SESSION['role'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <title>FAQ Page with Form</title>
    <style>
        body {
            /* line-height: 1.6; */
            /* background-color: #f8f8f8; */
            margin: 0;
            padding: 0;
            color: #333;
        }
        .containerr {
            max-width: 800px; 
            margin: auto; 
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        .faq-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .question {
            font-weight: bold;
            cursor: pointer;
            color: #666666;
        }
        .answer {
            display: none;
            margin-top: 10px;
        }
        formm {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        textarea {
            width: 100%;
            height: 100px;
            resize: vertical;
            padding: 10px;
            border: 1px solid;
            border-radius: 3px;
            margin-bottom: 10px;
        }
        /* button {
            background-color: light;
            color: #fff;
            border: 1px solid black;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
            
        }
        button:hover {
            background-color: black;
        } */
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="containerr">
<br>
<h1>Frequently Asked Questions</h1>
<br>
<?php


    // Define FAQ items as an associative array where the keys are questions and the values are answers
    $faq = array(
        "What is your return policy?" => "Our return policy allows returns within 30 days of purchase for a full refund.",
        "How can I contact customer support?" => "You can contact our customer support team by emailing support@example.com or calling 1-800-123-4567.",
        "Do you offer international shipping?" => "Yes, we offer international shipping to select countries. Please check our shipping page for more details."
    );

    arsort($faq);

    // Loop through the FAQ array and display each question and answer
    foreach ($faq as $question => $answer) {
        echo '<div class="faq-item">';
        echo '<div class="question" onclick="toggleAnswer(this)">' . $question . '</div>';
        echo '<div class="answer">' . $answer . '</div>';
        echo '</div>';
    }
    ?>
<br>
<br>
    <h2>Submit a Question</h2>

    <form  class="formm" method="post">
        <label for="question">Your Question:</label>
        <textarea id="question" name="question" required></textarea>
        <button type="submit" class="btn btn-outline-dark" >Submit</button>
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the submitted question
        $newQuestion = $_POST["question"];

        // Add the new question to the FAQ array
        $faq[$newQuestion] = "This question will be answered soon.";

        // Display a success message
        echo '<div class="success-message">Your question has been submitted successfully! It will be answered soon.</div>';
    }
    ?>

</div>

<script>
    function toggleAnswer(question) {
        var answer = question.nextElementSibling;
        if (answer.style.display === "none") {
            answer.style.display = "block";
        } else {
            answer.style.display = "none";
        }
    }
</script>


</body>
</html>
<?php include('includes/footer.php'); ?>
