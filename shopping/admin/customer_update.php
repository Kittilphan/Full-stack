<?php /* get connection */
    $conn = mysqli_connect("localhost", "root", "", "mydb");
   
    /*SELECT*/
    $code = $_GET['id_customer'];
    $cur = "SELECT * FROM Customer WHERE IDCust = '$code'";
    $msresults = mysqli_query($conn,$cur);
    // date_default_timezone_set('Asia/Bangkok');
    //Select
    if(mysqli_num_rows($msresults) > 0) {
        $row = mysqli_fetch_array($msresults);
        
        echo "<form method='get' action='customer_save_update.php'>";
        echo "<center>";
    
        echo "<h1> Update Customer Form </h1>";
        echo "<h2>รหัสลูกค้า ". $row['IDCust'] ."</h2><br>";
        echo "<input type='hidden' name='a1' value='" . $row['IDCust'] . "'>";
        echo "ชื่อ <input type='text' name='a2' value='" . $row['CustName'] . "'><br>";
        echo "เพศ <input type='text' name='a3' value='" . $row['Sex'] . "'><br>";
        echo "ที่อยู่ <input type='text' name='a4' value='" . $row['Address'] . "'><br>";
        echo "เบอร์โทรศัพท์ <input type='text' name='a5' value='" . $row['Tel'] . "'><br><br>";
        echo "⚠️โปรดให้เเน่ใจที่จะต้องการอัปเดตข้อมูล⚠️<br><br>";
        echo "<input type='submit' value='ยืนยัน'>";
        echo "<input type='reset' value='รีเซ็ท'>";
    
        echo "</form>\n"; 
        echo "</center>";
    }

    /* close connection */
    mysqli_close($conn);
?>