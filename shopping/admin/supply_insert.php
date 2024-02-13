<?php
    $connectdb = mysqli_connect("localhost", "root", "", "mydb");

    $idCust = $_POST["IDCust"];
    $idProducts = $_POST["IDProduct"];
    $qtys = $_POST["Amount"];

    // for ($i = 0; $i < count($idProducts); $i++) {
    //     $idProduct = $idProducts[$i];
    //     $qty = $qtys[$i];

        $query = "INSERT INTO supply (IDCust, IDProduct, Qty) VALUES ('$idCust','$idProducts','$qtys')";

        if (!mysqli_query($connectdb, $query)) {
            /* error */
            echo "Error";
        } else {
            // header("Location: ShowAllCustomer.php");
            echo "insert succeed";
        }
    // }
?>