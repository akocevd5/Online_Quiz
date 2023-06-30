<?php
session_start();
error_reporting(E_ERROR);

include "header.php";
include "connection.php";


function getRandomQuiz() {
    global $link;
    $query = "SELECT * FROM quiz_name ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_assoc($result);
}


$randomQuiz = getRandomQuiz();


if ($randomQuiz) {
    $_SESSION['quiz_name'] = $randomQuiz['name'];
    echo '<script>window.location="dashboard.php";</script>';
} else {
    echo '<div class="row">';
    echo '<div class="col-lg-6 col-lg-push-3" style="min-height: 500px;">';
    echo '<h3>No quizzes available</h3>';
    echo '</div>';
    echo '</div>';
}

include "footer.php";
?>