<?php
 $page = "testinggrounds";
 include "../includes/connect.php";
 include '../includes/header.php';
 include '../includes/nav.php';
?>

<form action="testinggroundscapture.php" method="get">
  <input type="submit" value="Take image">
</form>

<form action="testinggroundslatestimgs.php" method="get">
  <input type="submit" value="See image">
</form>

<section >

<img src = "../imageStorage/IMG_700101_005814_0000_RGB.JPG" height="480" width="240">

<?php
$dirname = "../imageStorage/";
$images = glob($dirname."*.jpg");

foreach($images as $image) {
    echo '<img src="'.$image.'" height ="480" width="240"/><br />';
    echo '<p> image name' . $image . '</p>';
}
?>

</section>
