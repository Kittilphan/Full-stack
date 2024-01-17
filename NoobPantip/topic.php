<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topicName = $_POST['topicName'];
    $message = $_POST['message'];
    $name = $_POST['name'];
    $counterFile = "counter.txt";

    if (!file_exists($counterFile)) {
        file_put_contents($counterFile, 1);
    }

    $counter = file_get_contents($counterFile);
    $filename = "topics/$counter.txt";
    $counter++;

    file_put_contents($counterFile, $counter);
    $fs = fopen($filename, "w");

    fputs($fs, "หัวข้อ : $topicName\n");
    fputs($fs, "ข้อความ : $message\n");
    fputs($fs, "โพสต์โดย : $name\n");
    fputs($fs, "วันเวลา : " . date("Y-M-d H:i:s") . "\n");
    fclose($fs);

    header("location:./homepage.php");
}
?>
