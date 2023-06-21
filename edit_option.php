<?php
session_start();
include "header.php";
include "connection.php";
$id = $_GET["id"];
$id1 = $_GET["id1"];
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$res = mysqli_query($link, "SELECT * FROM questions WHERE id = $id");
while ($row = mysqli_fetch_array($res)) {
    $question = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $answer = $row["answer"];
}
?>

<div class="row">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <h1> Edit questions </h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question" value="<?php echo $question; ?>">
            </div>
            <div class="form-group">
                <label for="opt1">Option1</label>
                <input type="text" class="form-control" id="opt1" name="opt1" value="<?php echo $opt1; ?>">
            </div>
            <div class="form-group">
                <label for="opt2">Option2</label>
                <input type="text" class="form-control" id="opt2" name="opt2" value="<?php echo $opt2; ?>">
            </div>
            <div class="form-group">
                <label for="opt3">Option3</label>
                <input type="text" class="form-control" id="opt3" name="opt3" value="<?php echo $opt3; ?>">
            </div>
            <div class="form-group">
                <label for="opt4">Option4</label>
                <input type="text" class="form-control" id="opt4" name="opt4" value="<?php echo $opt4; ?>">
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <input type="text" class="form-control" id="answer" name="answer" value="<?php echo $answer; ?>">
            </div>

            <button type="submit" name="submit" class="btn btn-default">Edit Question</button>
        </form>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {
    mysqli_query($link, "UPDATE questions SET question = '$_POST[question]', opt1 = '$_POST[opt1]', opt2 = '$_POST[opt2]', opt3 = '$_POST[opt3]', opt4 = '$_POST[opt4]', answer = '$_POST[answer]' WHERE id = $id") or die(mysqli_error($link));
?>

    <script type="text/javascript">
        alert("Question updated successfully");
        window.location.href = "add_edit_questions.php?id=<?php echo $id1; ?>";
        
    </script>

<?php
}
include "footer.php";
?>