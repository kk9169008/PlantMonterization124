
<?php
 $page = "database";
 include "../includes/connect.php";
 include '../includes/header.php';
 include '../includes/nav.php';
?>

<?php 

    function outputTable($con, $activate) {
        
        //if($activate){
        $result = mysqli_query($con,"SELECT * FROM camera");

        echo "<table border='1' id='SStable'>
        <tr>
        <th>Camera_ID</th>
        <th>Camera_Name</th>
        <th>Num_Of_Camera</th>
        <th>Camera_Location</th>
        <th>Camera_Link</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['CameraID'] . "</td>";
        echo "<td>" . $row['CameraName'] . "</td>";
        echo "<td>" . $row['NumOfCamera'] . "</td>";
        echo "<td>" . $row['CameraLocation'] . "</td>";
        echo '<td><a href="database.php?cameraID=' . $row ['CameraID'] . '" type="button" class="btn btn-primary-outline event"><i>More details</i></a></td>';
        echo "</tr>";
        }
        echo "</table>";
       // }
    }

?>


<form action="wifiDetectionProcess.php" method="get">
    <input type="submit" name="detect" value="Run me now!">
    
    <?php 
     $updateStatus = true;
    outputTable($con, $updateStatus);
    ?>
</form>

