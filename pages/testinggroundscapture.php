<?php

$command = escapeshellcmd('python ../python/testcapture.py');
$output = shell_exec($command);
echo $output;

echo "<script> location.href='testinggrounds.php'; </script>";
        exit;

?>

