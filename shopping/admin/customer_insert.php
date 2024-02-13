<?php /* get connection */
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    $a1 = $_POST['a1'];   
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $a4 = $_POST['a4'];
    $a5 = $_POST['a5'];
    /* run insert */
    $stmt = mysqli_query($conn, "INSERT INTO customer(IDCust, custName, sex, Address, Tel)
        VALUES('$a1', '$a2', '$a3', '$a4', '$a5');");

    /* check for errors */
    if (!$stmt) {
        /* error */
        echo "Error";
    } else {
        echo 'Insert data = is Successful.</marquee>';
    }
    echo "<a href='customer_index.php' 
    style='
    padding: 9px 14px;
    color: #ef476f;             
    text-decoration: none;
    margin-right: 5px;
    '>กลับหน้าหลัก</a>";
    /* close connection */
    // odbc_close($conn);
    mysqli_close($conn);
?>