<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>STUDENTS SORTED LIST</title>
</head>
<body>
        
    <div class="main">
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class`,`marks`  FROM `result`  ORDER BY  class, marks DESC ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) 
            {
               echo "<table>
                <caption>STUDENTS SORTED LIST</caption>
                <tr>
                <th>NAME</th>
                <th>ROLL NO</th>
                <th>CLASS</th>
                <th>MARKS</th>
                </tr>";

                while($row = mysqli_fetch_assoc($result))
                  {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "<td>" . $row['marks'] . "</td>";
                   
                  }
			
			
        }
     echo "</table>";
             
        ?>
    </div>

    <div class="footer">
        <!-- <span>Designed & Coded By Jibin Thomas</span> -->
    </div>
</body>
</html>
