<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $topicId = $_POST['id'];
    $filename = "topics/$topicId.txt";
    
    if (file_exists($filename)) {
        unlink($filename);
        echo "ลบกระทู้แล้ว";
    } else {
        echo "ไม่พบกระทู้";
    }
} else {
    echo "คำขอไม่ถูกต้อง";
}
?>
