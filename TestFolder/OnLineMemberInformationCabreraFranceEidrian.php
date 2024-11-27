<html lang="en">
<head>
    <title>Member Information</title>
</head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            background-color: lightblue;
        }
        table {
            border: 1px solid;
            margin: 0 auto;
        }
        th, td{
            border: 1px solid;
            padding: 5px;
        }
    </style>
<body>
    <?php
        if(isset($_POST['submitBtn'])) {
           
            echo "<h1>CABRERA COOPERATIVE INCORPORATED</h1>";
            echo "<p>Pitogo St., Mandaluyong City</p>";
            echo "<p>Telephone #: 928-0000</p>";
            echo "<hr>";
            echo "<h1>Member Information</h1>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Name:</th>";
            echo "<td> {$_POST["txtLastName"]},{$_POST["txtFirstName"]},{$_POST["txtMidName"]} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Address:</th>";
            echo "<td> {$_POST["txtAddress"]} </td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<th>Contact Number:</th>";
            echo "<td> {$_POST["txtNumber"]} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Date of Birth:</th>";
            echo "<td> {$_POST["dateBDay"]} </td>";
            echo "</tr>";
            
            $gender = isset($_POST['rdoGender']) ? $_POST['rdoGender'] : '';
            echo "<tr>";
            echo "<th>Gender:</th>";
            echo "<td> {$_POST['rdoGender']} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Office Address:</th>";
            echo "<td> {$_POST["txtOffice"]} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Phone #:</th>";
            echo "<td> {$_POST["txtPhone"]} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Position:</th>";
            echo "<td> {$_POST["txtPosition"]} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Employment Status:</th>";
            echo "<td> {$_POST["lstEmployment"]} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Monthly Salary:</th>";
            echo "<td> {$_POST["lstSalary"]} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Co-Borrower:</th>";
            echo "<td> {$_POST["txtCoBorrower"]} </td>";
            echo "</tr>";

            echo "</table> <br> <br>";

            echo "<a href=\"OnLineCooperativeRegistrationCabreraFranceEidrian.php\" class=\"back-link\">Back to Form</a>";
        }
    ?>
</body>
</html>