<!DOCTYPE html>
<html lang="en">
<head>
</head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: lightblue;
        }
    </style>
<body>
    <form action="OnLineMemberInformationCabreraFranceEidrian.php" method="post">

        <h1>CABRERA COOPERATIVE INCORPORATED</h1>
        <p>Pitogo St., Mandaluyong City</p>
        <p>Telephone #: 928-0000</p>
        <hr>
        <h2>REGISTRATION FORM:</h2>
        <label>Complete Name: 
            <input type="text" name="txtLastName" value="Last Name"> 
        </label>
        <label>
            <input type="text" name="txtFirstName" value="First Name"> 
        </label>
        <label>
            <input type="text" name="txtMidName" value="Middle Name"> 
        </label>
        <br><br>    
        <label>
            Address:
            <input type="text" name="txtAddress" value="Address">
        </label>
        <br><br>
        <label>
            Contact Number:
            <input type="number" name="txtNumber" value="Contact Number">
        </label>

        <br><br>

        <label>
            Date of Birth:
            <input type="date" name="dateBDay" value="Birthday">
        </label>
        <br><br>
        <label for="">
            Gender: 
           <input type="radio" name="rdoGender" value="Male">Male 
           <input type="radio" name="rdoGender" value="Female">Female 
        </label>
        <br><br>
        <label>
            Office Address:
            <input type="text" name="txtOffice" value="Office Address">
        </label>
        <label>
            Phone Number:
            <input type="number" name="txtPhone" value="Phone Number">
        </label>
        <br><br>
        <label>
            Position:
            <input type="text" name="txtPosition" value="Position">
        </label>
        <label>
            Employment Status:
            <select name="lstEmployment" id="lstEmployStatus">
                <option value="Permanent" selected>Permanent</option>
                <option value="Casual">Casual</option>
            </select>
        </label>
        <br><br>
        <label>
            Monthly Salary:
            <select name="lstSalary" id="lstMonthSalary">
                <option value="Below Php10,000.00" selected>Below Php10,000.00</option>
                <option value="Php10,000.00 - Php20,000.00">Php10,000.00 - Php20,000.00</option>
                <option value="Above Php20,000.00">Above Php20,000.0</option>
            </select>
        </label>
        <br><br>
        <label>
            Co-Borrower:
            <input type="text" name="txtCoBorrower" value="Co-Borrower">
        </label>
        <br><br>
        <input type="submit" name="submitBtn" value="SUBMIT REGISTRATION">
        <input type="reset" name="reset" value="CLEAR FORM">
    </form>
</body>
</html>