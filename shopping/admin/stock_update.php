<?php /* get connection */
    $conn = mysqli_connect("localhost", "root", "", "mydb");
   
    /*SELECT*/
    $code = $_GET['id_stock'];
    $cur = "SELECT * FROM Stock WHERE IDProduct = '$code'";
    $msresults = mysqli_query($conn,$cur);
    // date_default_timezone_set('Asia/Bangkok');
    //Select
    if(mysqli_num_rows($msresults) > 0) {
        $row = mysqli_fetch_array($msresults);
        
        echo "<center>";
        echo "<form method='get' action='stock_save_update.php'>";
        echo "<h1> Update Stock Form </h1>";
        echo "<h2>รหัสลูกค้า ". $row['IDProduct'] ."</h2><br>";
        echo "<input type='hidden' name='a1' value='" . $row['IDProduct'] . "'>";
        echo "ชื่อสินค้า <input type='text' name='a2' value='" . $row['ProductName'] . "'><br>";
        echo "ราคา/ชิ้น <input type='text' name='a3' value='" . $row['ProductPerUnit'] . "'><br>";
        echo "จำนวนสินค้า<input type='text' name='a4' value='" . $row['StockQty'] . "'><br>";
        echo "⚠️โปรดให้เเน่ใจที่จะต้องการอัปเดตข้อมูล⚠️<br><br>";
        echo "<input type='submit' value='ยืนยัน'>";
        echo "<input type='reset' value='รีเซ็ท'>";
        echo "</form>\n"; 
        echo "</center>";
    }

    /* close connection */
    mysqli_close($conn);
?>