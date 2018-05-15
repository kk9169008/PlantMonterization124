<?php
session_start();
$classes = array("LKG-A","LKG-B");
$periods = array("1st Period","2nd Period","3rd Period","4th Period","5th Period");
$teachers = array("Teacher 1","Teacher 2","Teacher 3","Teacher 4","Teacher 5");
//unset($_SESSION['assigned_classes']);
$_SESSION['assigned_classes']['LKG-A'] = array();
$_SESSION['assigned_classes']['LKG-B'] = array();

//Set to session
if(isset($_POST['period'])){
	foreach($_POST['period'] as $key => $period){
		$_SESSION['assigned_classes'][$_POST['class'][$key]][$period] = $_POST['teacher'][$key];	
	}
}

//update
if(isset($_POST['update_teachers'])){
	echo "<pre>";
	print_r($_SESSION['assigned_classes']);
	echo "</pre>";
}

$content = "";
$content .= "<form action=\\"\\" method=\\"post\\">\\r";
$content .= "<table class=\\"table\\" width=\\"99%\\" cellspacing=\\"1\\" cellpadding=\\"1\\">
	<tr>
		<th align=\\"center\\" colspan=\\"7\\">Assign Teachers</th>
	</tr>
	<tr>
		<td align=\\"center\\" width=\\"34%\\" class=\\"heading\\">Period</td>
		<td align=\\"center\\" width=\\"33%\\" class=\\"heading\\">LKG-A</td>
		<td align=\\"center\\" width=\\"33%\\" class=\\"heading\\">LKG-B</td>
	</tr>\\r";

foreach($periods as $period){
	$content .= "<tr>
			<td align=\\"center\\">$period</td>\\r";
		foreach($classes as $class){
			$content .= "<td align=\\"center\\">\\r";
			
			$class_teacher = (array_key_exists($period,$_SESSION['assigned_classes'][$class]) ? "{$_SESSION['assigned_classes'][$class][$period]}" : '');
			$other_class = ($class=="LKG-A" ? "LKG-B" : "LKG-A");			
			$exclude_teacher = (array_key_exists($period,$_SESSION['assigned_classes'][$other_class]) ? "{$_SESSION['assigned_classes'][$other_class][$period]}" : '');
			
			$content .= "<input type=\\"hidden\\" name=\\"period[]\\" value=\\"$period\\" />\\r";
			$content .= "<input type=\\"hidden\\" name=\\"class[]\\" value=\\"$class\\" />\\r";
			$content .= "<select name=\\"teacher[]\\" onchange=\\"this.form.submit()\\">\\r";
			$content .= "<option value=\\"\\">Select</option>\\r";
			foreach($teachers as $teacher){
				if($teacher != $exclude_teacher){
					$selected_teacher = (isset($class_teacher) && $class_teacher==$teacher ? " selected=\\"selected\\"" :'');
					$content .= "<option value=\\"$teacher\\"$selected_teacher>$teacher</option>\\r";
				}
			}
			$content .= "</select>\\r";
			
			$content .= "</td>\\r";
		}	
	$content .= "</tr>\\r";		
}
	$content .= "<tr>
			<td align=\\"center\\" colspan=\\"3\\"><input type=\\"submit\\" name=\\"update_teachers\\" value=\\"Update Teacher Assignments\\" style=\\"width:100%;\\" /></td>
			</tr>\\r";


$content .= "</table>\\r";
$content .= "</form>\\r";
?>
<html>
<head>
<style type="text/css">
body {
margin: 0;
padding:5px;
font-weight: normal;
font-size:13px;
font-family: Arial;
}
.table {
	background-color:#EFEFEF;
	font-size:1em;
	color:#000000;
	padding:0;
	margin:0 auto 25px;
	border:1px solid #DDD7D0;
	-moz-border-radius: 6px 6px 6px 6px;
	-webkit-border-radius: 6px 6px 6px 6px;
	border-radius: 6px 6px 6px 6px;
	-moz-box-shadow: 1px 1px 4px #E9E4DD;
	-webkit-box-shadow: 1px 1px 4px #E9E4DD;
	box-shadow: 1px 1px 4px #E9E4DD;
}
.table th {
	font-size:1.2em;
	font-weight:bold;
	background-color:#EEF2F5; /* for non-css3 browsers */
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EEF2F5', endColorstr='#A7AAB2'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(#EEF2F5), to(#A7AAB2)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #EEF2F5, #A7AAB2); /* for firefox 3.6+ */; color:#171717;
	text-shadow: 1px 1px #E9E9E9;
	-moz-border-radius: 6px 6px 0 0;
	-webkit-border-radius: 6px 6px 0 0;
	border-radius: 6px 6px 0 0;
	padding:4px 0;
}

.table td {
	background-color:#FFFFFF;
	padding:1px 10px;
}
.table .heading{
	font-size:1.1em;
	background-color:#A7AAB2;
	padding:1px 10px;
	-moz-border-radius: 0 0 6px 6px;
	-webkit-border-radius: 0 0 6px 6px;
	border-radius: 0 0 6px 6px;
	border-bottom: 1px solid #808993;
}
</style>
</head>
<body>
<?php
echo $content;
?>
</body>
</html>
