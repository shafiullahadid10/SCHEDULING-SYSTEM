<?php
   include_once("header.php");
   include_once("navbar.php");
?>
<html>
<head>
<style>

body {
    background-image: url();
    background-color: white;
}
th {
    text-align: center;
}
tr {
     height: 30px;
}
td {
    padding-top: 5px;
    padding-left: 20px; 
    padding-bottom: 5px;    
    height: 20px;
}


</body>
</style>
</head>
<body><br>
<div class="container">

<body>
    <?php
     echo "<tr>
            <td>";
              
               $host       = "localhost"; 
               $username   = "root"; 
               $password   = "";
               $database   = "insertion"; 
               
          
               $connect=mysqli_connect($host,$username,$password,$database) or die(mysql_error()); 

                    $query = ("SELECT * FROM course");
                    $result = mysqli_query($connect, $query) or die(mysql_error());
                    echo "<div class='container'><table width='' class='table table-bordered' border='1' >
                            <tr>
                                <th>Code</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>";
                        while($row = mysqli_fetch_array($result))
                        {
                        echo "<tr>";
                        
                        echo "<td>" . $row['course_code'] . "</td>";
                        echo "<td>" . $row['course_name'] . "</td>";
                        echo "<td><form class='form-horizontal' method='post' action='corlist.php'>
                        <input name='course_id' type='hidden' value='".$row['course_id']."';>
                        <input type='submit' class='btn btn-danger' name='delete' value='Delete'>
                        </form></td>";
                        echo "</tr>";
                        }
                    echo "</table>";

            echo "</td>           
        </tr>";


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        echo '<script type="text/javascript">
                      alert("Successfuly Deleted");
                         location="list.php";
                           </script>';
    }
    if(isset($_POST['course_id']))
    {
    $course_id = $_POST['course_id'];
    $sql = mysqli_query($connect, "DELETE FROM course WHERE course_id='$course_id'");
    if(!$sql)
    {
        echo ("Could not delete rows" .mysqli_error());
    }
    
    }
    ?>
</fieldset>
</form>
</div>
</div>
</div>
</div>
    </body>
    </html>
    
<?php
   include_once("footer.php");

?>
