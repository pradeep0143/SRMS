<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>
    <?php
        include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
        {
            $class=$_GET['class'];
            $rn=$_GET['rn'];
        }

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }

        if($p1>=90) { $g1 = "S"; }
        elseif($p1<90&&$p1>=80) { $g1 = "A"; }
        elseif($p1<80&&$p1>=70) { $g1 = "B"; }
        elseif($p1<70&&$p1>=60) { $g1 = "C"; }
        elseif($p1<60&&$p1>=45) { $g1 = "D"; }
        elseif($p1<45&&$p1>=40) { $g1 = "E"; }
        else  { $g1 = "F"; }

        if($p2>=90) { $g2 = "S"; }
        elseif($p2<90&&$p2>=80) { $g2 = "A"; }
        elseif($p2<80&&$p2>=70) { $g2 = "B"; }
        elseif($p2<70&&$p2>=60) { $g2 = "C"; }
        elseif($p2<60&&$p2>=45) { $g2 = "D"; }
        elseif($p2<45&&$p2>=40) { $g2 = "E"; }
        else  { $g2 = "F"; }

        if($p3>=90) { $g3 = "S"; }
        elseif($p3<90&&$p3>=80) { $g3 = "A"; }
        elseif($p3<80&&$p3>=70) { $g3 = "B"; }
        elseif($p3<70&&$p3>=60) { $g3 = "C"; }
        elseif($p3<60&&$p3>=45) { $g3 = "D"; }
        elseif($p3<45&&$p3>=40) { $g3 = "E"; }
        else  { $g3 = "F"; }

        if($p4>=90) { $g4 = "S"; }
        elseif($p4<90&&$p4>=80) { $g4 = "A"; }
        elseif($p4<80&&$p4>=70) { $g4 = "B"; }
        elseif($p4<70&&$p4>=60) { $g4 = "C"; }
        elseif($p4<60&&$p4>=45) { $g4 = "D"; }
        elseif($p4<45&&$p4>=40) { $g4 = "E"; }
        else  { $g4 = "F"; }

        if($p5>=90) { $g5 = "S"; }
        elseif($p5<90&&$p5>=80) { $g5 = "A"; }
        elseif($p5<80&&$p5>=70) { $g5 = "B"; }
        elseif($p5<70&&$p5>=60) { $g5 = "C"; }
        elseif($p5<60&&$p5>=45) { $g5 = "D"; }
        elseif($p5<45&&$p5>=40) { $g5 = "E"; }
        else  { $g5 = "F"; }
    ?>

    <div class="container">
        
        <div class="main">
            <div class="s1">
            <table border="1" cellpadding="10" >
            
            <tr> 
                <td> Class </td> <td> RN </td> <td> Name </td>
            </tr>
            <tr> 
                <td> <?php echo $class; ?> </td> <td> <?php echo $rn; ?> </td> <td> <?php echo $name ?> </td>
            </tr>
            <tr> <td> Subjects </td> <td> Marks </td> <td> Grades </td> </tr>
                <tr> <td>paper1 </td> <td> <?php echo "$p1"; ?> </td> <td> <?php echo "$g1"; ?> </td> </tr>
                <tr> <td>paper2 </td> <td> <?php echo "$p2"; ?> </td> <td> <?php echo "$g2"; ?> </td> </tr>
                <tr> <td>paper3 </td> <td> <?php echo "$p3"; ?> </td> <td> <?php echo "$g3"; ?> </td> </tr>
                <tr> <td>paper4 </td> <td> <?php echo "$p4"; ?> </td> <td> <?php echo "$g4"; ?> </td> </tr>
                <tr> <td>paper5 </td> <td> <?php echo "$p5"; ?> </td> <td> <?php echo "$g5"; ?> </td> </tr>
                <tr> <td>Total Marks</td>  <td> <?php echo "$mark"; ?> </td> </tr>
                <tr> <td>Percentage</td>  <td> <?php echo "$percentage"; ?> </td> </tr>

            </table>
            
            </div>
                  
        </div>


        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>