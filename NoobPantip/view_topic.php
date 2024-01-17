<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Topic</title>
    <style>
        body {
            background-color: #C5FFF8;
        }

        center {
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <center>
        <h1>View Topic</h1>
        <hr>
        <?php
        if (isset($_GET['id'])) {
            $topicId = $_GET['id'];
            $filename = "topics/" . basename($topicId) . ".txt";

            if (file_exists($filename)) {
                $content = file_get_contents($filename);
                ?>
                <table>
                    <tr>
                        <th>เนื้อหา</th>
                    </tr>
                    <tr>
                        <td><?php echo nl2br(htmlspecialchars($content)); ?></td>
                    </tr>
                </table>
                <form action='delete_topic.php' method='post'>
                    <input type='hidden' name='id' value='<?php echo $topicId; ?>'>
                    <input type='submit' value='ลบกระทู้'>
                </form>
                <?php
            } else {
                echo "ไม่พบกระทู้";
            }
        } else {
            echo "ID ไม่ถูกต้อง";
        }
        ?>
        <br>
        <a href="homepage.php">กลับหน้าหลัก</a>
    </center>
</body>
</html>