<?php
session_start();

include "../connection.php";

$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count="";
$ans="";

$queno=$_GET["questionno"];

if(isset($_SESSION["answer"] [$queno]))
{
    $ans=$_SESSION["answer"] [$queno];
}
$res=mysqli_query($link,"select * from questions where quiz_name='$_SESSION[quiz_name]' && question_no=$_GET[questionno]");
$count=mysqli_num_rows($res);

if ($count == 0)
{
    echo "over";
}
else
{
    while($row=mysqli_fetch_array($res))
    {
        $question_no=$row["question_no"];
        $question=$row["question"];
        $opt1=$row["opt1"];
        $opt2=$row["opt2"];
        $opt3=$row["opt3"];
        $opt4=$row["opt4"];
    }
    ?>
    <br>
        <table>
            <tr>
                <td style="font-weight:bold; font-size: 20px; padding-left: 5px" colspan="2">
                    <?php echo "( ".$question_no." ) ".$question ;  ?>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="font-weight:bold; font-size: 10px; padding-left: 5px" colspan="2">
                    <input type="checkbox" name="c1" id="c1" value="<?php echo $opt1; ?>" onclick="checkclick(this.value,<?php echo $question_no ?> )"
                    <?php
                        if($ans==$opt1)
                        {
                            echo "checked";
                        }
                        
                    ?>>
                </td>
                <td style="padding-left: 10px;">
                    <?php
                        echo $opt1;
                    ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold; font-size: 10px; padding-left: 5px" colspan="2">
                    <input type="checkbox" name="c2" id="c2" value="<?php echo $opt2; ?>" onclick="checkclick(this.value,<?php echo $question_no ?> )"
                    <?php
                        if($ans==$opt2)
                        {
                            echo "checked";
                        }
                        
                    ?>>
                </td>
                <td style="padding-left: 10px;">
                    <?php
                        echo $opt2;
                    ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold; font-size: 10px; padding-left: 5px" colspan="2">
                    <input type="checkbox" name="c3" id="c3" value="<?php echo $opt3; ?>" onclick="checkclick(this.value,<?php echo $question_no ?> )"
                    <?php
                        if($ans==$opt3)
                        {
                            echo "checked";
                        }
                        
                    ?>>
                </td>
                <td style="padding-left: 10px;">
                    <?php
                        echo $opt3;
                    ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold; font-size: 10px; padding-left: 5px" colspan="2">
                    <input type="checkbox" name="c4" id="c4" value="<?php echo $opt4; ?>" onclick="checkclick(this.value,<?php echo $question_no ?> )"
                    <?php
                        if($ans==$opt4)
                        {
                            echo "checked";
                        }
                        
                    ?>>
                </td>
                <td style="padding-left: 10px;">
                    <?php
                        echo $opt4;
                    ?>
                </td>
            </tr>
        </table>
        

    <?php
}
?>