<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <div style="width: 1550px;  display:flex; flex-flow: row wrap; ">
            <?php
                $cx =  mysqli_connect("localhost", "root", "", "mydb");
                $cur = "SELECT * FROM stock";
                $msresults = mysqli_query($cx, $cur);
                for ($i = 0; $i < 10; $i++) {
                    if (mysqli_num_rows($msresults) > 0) {
                        while ($row = mysqli_fetch_array($msresults)) {
                            echo "<div style='border: 1px solid red ; height:200px; margin: 10px; flex: 0 1 18%;'>
                                <p>
                                    {$row['ProductName']}
                                </p>
                                <p>
                                    ราคา {$row['ProductPerUnit']}
                                </p>
                                <p>
                                    จำนวน {$row['StockQty']}
                                </p>
                                <form method='post' action='order_form.php'>
                                    <input type='hidden' name='name_product' value='{$row['ProductName']}'>
                                    <input type='submit' value='ซื้อสินค้า'>
                                </form>
                            </div>";
                        }
                    }
                }
            ?>
        </div>
    </center>
</body>
</html> 

