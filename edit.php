<?php
session_start();
include "connection.php";
include "header.php";
$id = $_GET["id"];
$res = mysqli_query($link, "SELECT * FROM quiz_name WHERE id = $id");
while ($row = mysqli_fetch_array($res)) {
    $name = $row["name"];
}
?>

<div class="row">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <form action="" name="form1" method="post">
            <div class="quiz_name">
                <h4>Edit Quiz</h4>
                <hr>
                <p>Edit Quiz</p>
                <input type="text" name="name" placeholder="Quiz Name" value="<?php echo $name ?>">
                <button type="submit" name="submit">Edit Quiz</button>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {
    mysqli_query($link, "UPDATE quiz_name SET name = '$_POST[name]' WHERE id = $id") or die(mysqli_error($link));
?>
<script>
    alert("Quiz edited successfully");
    window.location.href = "add_edit_questions_user.php";
</script>
<?php
}
?>

<?php
include "footer.php";
?>