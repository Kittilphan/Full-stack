<?php /* get connection */
    $conn = mysqli_connect("localhost", "root", "", "mydb");

    /*SELECT*/
    if (isset($_GET['list_id_customer'])){
        $code = $_GET['list_id_customer'];
        $codesArray = explode(',', $code);
        echo "<center>";
        echo "<h4>จำนวนชุดข้อมูลที่จะลบ</h4><font size='8'>";
        echo count($codesArray);
        echo "</font><br>";
        echo "⚠️โปรดให้เเน่ใจที่จะต้องการลบข้อมูล⚠️<br><br>";
        echo "<form method='get' action='customer_delete.php'>";
        echo "<input type='hidden' name='list_id_customer' value={$_GET['list_id_customer']}>";
        echo "<input type='submit' value='ยืนยัน'>";
        echo "<a href='customer_index.php' 
        style='
        padding: 9px 14px;
        color: #ef476f;             
        text-decoration: none;
        margin-right: 5px;
        '>ยกเลิก</a>"; 
        echo "</form>\n";
        echo "</center>";
    }
    else {
        $code = $_GET['id_customer'];
        $cur = "SELECT * FROM Customer WHERE IDCust = '$code'";
        $msresults = mysqli_query($conn,$cur);
    
        if(mysqli_num_rows($msresults) > 0) {
            $row = mysqli_fetch_array($msresults);
            echo "<center>";
            echo "<form method='get' action='customer_delete.php'>";
            echo "<h1> Delete Customer Form </h1>";
            echo "<h2>รหัสลูกค้า ". $row['IDCust'] ."</h2><br>";
            echo "<input type='hidden' name='id_customer' value='" . $row['IDCust'] . "'>";
            echo "ชื่อ : {$row['CustName']}<br>";
            echo "เพศ : {$row['Sex']}<br>";
            echo "ที่อยู่ : {$row['Address']}<br>";
            echo "เบอร์โทรศัพท์ : {$row['Tel']}<br><br>";
            echo "⚠️โปรดให้เเน่ใจที่จะต้องการลบข้อมูล⚠️<br><br>";
            echo "<a href='customer_index.php' 
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
    }

    /* close connection */
    mysqli_close($conn);
?>

