<?php
 $page = "Scheduletest";
 include "../includes/connect.php";
 include '../includes/header.php';
 include '../includes/nav.php';
?>

<?php

    function outputTable($con, $activate) {
        
        $result = mysqli_query($con,"SELECT CameraName, CameraID FROM camera");

		while($row = mysqli_fetch_array($result))
		     {
		     echo "<option value=\"" . $row['CameraName'] . "\">" . $row['CameraName'] . "</option>";
		     }
    }

?>

<p>Please enter time as 24 hour time</p>

<form action="scheduleinsert.php" method="GET" id="submitTiming">
	<p>What Camera
	<select name="formCamera">
	<?php 
    $updateStatus = true;
    outputTable($con, $updateStatus);
    ?>
    </select>
	</p>
	 <p>What day?
	<select name="formDay">
	  <option value="">Select...</option>
	  <option value="Monday">Monday</option>
	  <option value="Tuesday">Tuesday</option>
	  <option value="Wenesday">Wednesday</option>
	  <option value="Thursday">Thurday</option>
	  <option value="Friday">Friday</option>
	  <option value="Saturday">Saturday</option>
	  <option value="Sunday">Sunday</option>
	</select>
</p>
Time Start: <input type="int" name="TimeStart"><br>
Time End: <input type="int" name="TimeEnd"><br>
RepsPerMinute: <input type="int" name="Reps" value="0">
<input type="submit" value="Submit">

</form>

<script type="text/javascript">
	function Print() {
			document.getElementById("submitTiming").submit();
		}
</script>
