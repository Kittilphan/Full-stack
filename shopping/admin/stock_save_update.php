<?php /* get connection */
    header( "location: ./stock_index.php");
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    $a1 = $_GET['a1'];
    $a2 = $_GET['a2'];
    $a3 = $_GET['a3'];
    $a4 = $_GET['a4'];

    /* run update */
    $stmt = mysqli_query($conn, "UPDATE stock SET ProductName = '$a2', ProductPerUnit ='$a3', StockQty ='$a4'
        WHERE IDProduct ='$a1'");

    /* check for errors */
    if (!$stmt) {
        /* error */
        echo "Error";
    } else {
        echo "Update data = <font color=red> '$a1' </font> is Successful.";
    }

    /* close connection */
    mysqli_close($conn);
?>