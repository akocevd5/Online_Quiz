<?php
session_start();
include "header.php";
include "connection.php";

$id = $_GET["id"];

$quiz_name = '';

$res = mysqli_query($link, "SELECT * FROM quiz_name WHERE id = $id");
while ($row = mysqli_fetch_array($res)) {
    $quiz_name = $row["name"];
}
?>

<div class="row">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <h1> Add Questions inside <?php echo $quiz_name ?></h1>
        <form action="" method="post">
            <!-- Form inputs here -->
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question">
            </div>
            <div class="form-group">
                <label for="opt1">Option1</label>
                <input type="text" class="form-control" id="opt1" name="opt1">
            </div>
            <div class="form-group">
                <label for="opt2">Option2</label>
                <input type="text" class="form-control" id="opt2" name="opt2">
            </div>
            <div class="form-group">
                <label for="opt3">Option3</label>
                <input type="text" class="form-control" id="opt3" name="opt3">
            </div>
            <div class="form-group">
                <label for="opt4">Option4</label>
                <input type="text" class="form-control" id="opt4" name="opt4">
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <input type="text" class="form-control" id="answer" name="answer">
            </div>

            <button type="submit" name="submit" class="btn btn-default">Add Question</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>No</td>
                        <th>Questions</th>
                        <th>Opt1</th>
                        <th>Opt2</th>
                        <th>Opt3</th>
                        <th>Opt4</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php

                    $res = mysqli_query($link, "SELECT * FROM questions WHERE quiz_name='$quiz_name' ORDER BY question_no ASC");
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>" . $row["question_no"] . "</td>";
                        echo "<td>" . $row["question"] . "</td>";
                        echo "<td>" . $row["opt1"] . "</td>";
                        echo "<td>" . $row["opt2"] . "</td>";
                        echo "<td>" . $row["opt3"] . "</td>";
                        echo "<td>" . $row["opt4"] . "</td>";
                        echo "<td><a href='edit_option.php?id=" . $row["id"] . "&id1=" . $id . "'>Edit</a></td>";
                        echo "<td><a href='delete_option.php?id=" . $row["id"] . "&id1=" . $id . "'>Delete</a></td>";
                        echo "</tr>";
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {
    $loop = 0;
    $count = 0;

    $res = mysqli_query($link, "SELECT * FROM questions WHERE quiz_name = '$quiz_name' ORDER BY id ASC") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count == 0) {
        echo "nesto";
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "UPDATE questions SET question_no = '$loop' WHERE id = $row[id]");
        }
    }

    $loop = $loop + 1;
    mysqli_query($link, "INSERT INTO questions VALUES (NULL, '$loop', '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$quiz_name')") or die(mysqli_error($link));
?>

    <script type="text/javascript">
        alert("Question added successfully");
        window.location.href = window.location.href;
    </script>

<?php
} 
include "footer.php";
?>