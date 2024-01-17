<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantip but noob ver</title>
    <style>
        .PostTable {
            width: 40%;
            border-collapse: collapse;
        }
        .PostTable td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            background-color: #96EFFF;
        }
        .PostTable th {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            background-color: #5FBDFF;
        }
    </style>
</head>
<body bgcolor="#C5FFF8">
    <center>
        <h1>Pantip but noob ver</h1>
        <hr color="#000000">
        <form action="topic.php" method="POST">
            <table class="PostTable">
                <tr>
                    <th>รายชื่อกระทู้</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        $topicFiles = glob("topics/*.txt");

                        foreach ($topicFiles as $filename) {
                            $content = file_get_contents($filename);
                            $lines = explode("\n", $content);
                            
                            echo "<div>";
                            echo "<h2>" . htmlspecialchars($lines[0]) . "</h2>";
                            echo "<p>" . htmlspecialchars($lines[2]) . "</p>";
                            echo "<a href='view_topic.php?id=" . basename($filename, ".txt") . "'>ดูกระทู้</a>";
                            echo "<hr color=#000000>";
                            echo "</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        หัวข้อ : <br><textarea rows="2" cols="100" name="topicName"></textarea><br>
                        ข้อความ : <br><textarea rows="6" cols="100" name="message"></textarea><br>
                        โพสต์โดย : <br><textarea rows="2" cols="100" name="name"></textarea><br>
                        <center>
                            <input type="submit" value="โพสต์" style="margin: 10px;padding: 5px;">
                            <input type="reset" value="ยกเลิก" style="margin: 10px;padding: 5px;">
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
