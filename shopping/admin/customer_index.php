<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>

<body>
    <h1>User List</h1>
    <div style='display: flex; justify-content: space-between; background-color: red; padding: 20px; border: 5px solid blue;'>
        <div>
            <input type='checkbox' id='checkAll' onchange='checkAll()'>
            <label class="container">Check All</label>
            <form id='deleteForm' action='customer_delete_confirm.php' method='get' style='display: inline-block; margin-right: 5px;'>
                <input type='hidden' name='list_id_customer' id='selectedValues' value=''>
                <input type='hidden' name='total_id_customer' id='selectedTotal' value=''>
                <input type='submit' id='deleteButton' value='Delete User' style='background-color:#ef476f;' disabled />
            </form>
        </div>
        <div>
            <form action='customer_insert_form.html' method='post' style='display: inline-block; margin-right: 5px;'>
                <input type='submit' value='Add User' style='background-color:#4b93ff;' />
            </form>
            <br>
        </div>
    </div>

    <?php
    $cx =  mysqli_connect("localhost", "root", "", "mydb");
    $cur = "SELECT * FROM Customer";
    $msresults = mysqli_query($cx, $cur);

    echo "<center>";
    echo "<div>
        <table style='width: 100%; margin: auto; text-align: center; border-collapse: collapse; border: 1px solid #ccc;'>
            <tr style='background-color:#ef476f;'>  
                <th style='width: 60px;'><img src='http://localhost/phpmyadmin/themes/pmahomme/img/arrow_ltr.png'></th>                   
                <th style='padding:10px;'>ID</th>
                <th>User Name</th>
                <th>Sex</th>
                <th>Address</th>
                <th>Tel</th>
                <th>Action</th>
            </tr>";

    if (mysqli_num_rows($msresults) > 0) {
        while ($row = mysqli_fetch_array($msresults)) {
            echo "<tr style='border-bottom: 1px solid #ccc;'>
                    <td><input type='checkbox' name='checkbox[]' value='{$row['IDCust']}'></td>
                    <td style='padding:5px;'>{$row['IDCust']}</td>
                    <td>{$row['CustName']}</td>
                    <td>{$row['Sex']}</td>
                    <td>{$row['Address']}</td>
                    <td>{$row['Tel']}</td>
                    <td>
                        <form action='customer_update.php' method='get' style='display: inline-block;'>  
                            <input type='hidden' name='id_customer' value={$row['IDCust']}>
                            <input type='image' alt='update' src='pen-solid.svg' style='width: 20px; height: 20px;'/>
                        </form>
                        <form action='customer_delete_confirm.php' method='get' style='display: inline-block;'>
                            <input type='hidden' name='id_customer' value={$row['IDCust']}>
                            <input type='image' alt='delete' src='trash-solid.svg' style='width: 20px; height: 20px;'/>
                        </form>
                    </td>
                </tr>";
        }
    }

    echo "</table></div>";
    echo "</center>";
    mysqli_close($cx);
    ?>
<script>
    function updateDeleteButtonStatus() {
        var checkboxes = document.getElementsByName('checkbox[]');
        var deleteButton = document.getElementById('deleteButton');
        var selectedValuesInput = document.getElementById('selectedValues');


        var checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
        var enableDeleteButton = checkedCheckboxes.length > 0;

        deleteButton.disabled = !enableDeleteButton;

        // Update the hidden input field with the values of checked checkboxes
        var checkboxValues = checkedCheckboxes.map(checkbox => checkbox.value);
        selectedValuesInput.value = checkboxValues.join(',');
    }

    var individualCheckboxes = document.getElementsByName('checkbox[]');
    for (var i = 0; i < individualCheckboxes.length; i++) {
        individualCheckboxes[i].addEventListener('change', function () {
            updateDeleteButtonStatus(); // Update deleteButton's status
        });
    }
</script>
<script>
    function checkAll() {
        var checkboxes = document.getElementsByName('checkbox[]');
        var checkAllCheckbox = document.getElementById('checkAll');
        var deleteButton = document.getElementById('deleteButton');
        var checkboxValues = [];

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = checkAllCheckbox.checked;
            if (checkboxes[i].checked) {
                checkboxValues.push(checkboxes[i].value);
            }
        }

        // Join values into a comma-separated string
        document.getElementById('deleteForm').elements['selectedValues'].value = checkboxValues.join(',');
        var checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
        var enableDeleteButton = checkedCheckboxes.length > 0;

        deleteButton.disabled = !enableDeleteButton;
    }
</script>
</body>

</html>
