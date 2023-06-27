<?php
session_start();
error_reporting(E_ERROR);


?>
<?php
include "header.php";
include "connection.php";
?>
   <div class="row">
        <div class="col-lg-6 col-lg-push-3 " style="min-height: 500px;">
            <?php
                $res=mysqli_query($link,"select * from quiz_name");
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                    <input type="button" class="btn btn-success form-control" value="<?php echo $row["name"]; ?>" style="margin-top:10px; background-color:#666; border: solid 1px #666" onclick="set_type_session(this.value); ">
                    <?php
                }
            ?>
    </div>
  </div>
    
    <?php
include "footer.php";

?>

<script type="text/javascript">
function set_type_session(quiz_name){
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
           
            window.location="dashboard.php";
        }
    };
    xmlhttp.open("GET", "forajax/set_quiz_name_session.php?quiz_name=" + quiz_name, true);
    xmlhttp.send(null);
}



</script>