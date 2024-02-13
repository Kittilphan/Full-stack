<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Form</title>
</head>
<body>
    <?php
        $conn =  mysqli_connect("localhost", "root", "", "mydb");
        $name = $_POST['name_product'];
        $cur = "SELECT * FROM stock WHERE ProductName = '$name'";
        $msresults = mysqli_query($conn,$cur);
     
        if(mysqli_num_rows($msresults) > 0) {
            $row = mysqli_fetch_array($msresults);
            echo "<center>";
            echo "<form method='post' action='supply_insert.php'>";
            echo "<h2>สินค้า ". $row['ProductName'] ."</h2><br>";
            echo "<input type='hidden' name='IDProduct' value='" . $row['IDProduct'] . "'><br>";
            echo "ราคา/ชิ้น : {$row['ProductPerUnit']}<br>";
            echo "จำนวนสินค้า : {$row['StockQty']}<br>";
            echo "กรอกจำนวนสินค้า<input type='text' name='Amount'><br><br>";
            echo "กรอกIDลูกค้า<input type='text' name='IDCust'><br><br>";
            echo "<a href='order_index.php' 
                     style='
                     padding: 9px 14px;
                     color: #ef476f;             
                     text-decoration: none;
                     margin-right: 5px;
                     '>ยกเลิก</a>";
            echo "<input type='submit' value='ยืนยัน'>";
            echo "</form>\n"; 
            echo "</center>";
        }
    ?>
    <!-- <center>
        <font size="7">กรุณากรอกรายละเอียด</font><hr color="blue">
        <div>
            <form method="post" action="supply_insert.php">
                <p></p>
                
    
                <label for="a3">จำนวนสินค้า:</label>
                <input type="text" id="a3" name="a3" size="1"> <br>
    
                <label for="a4">ที่อยู่:</label>
                <textarea id="a4" name="a4" rows="4" required></textarea> <br>
    
                <label for="a5">เบอร์โทรศัพท์:</label>
                <input type="text" id="a5" name="a5" size="10" maxlength="10" ><br><br>
    
                <input type="submit" value="ยืนยัน">
                <input type="reset" value="ยกเลิก">
            </form>
        </div>
    </center> -->
</body>
</html>