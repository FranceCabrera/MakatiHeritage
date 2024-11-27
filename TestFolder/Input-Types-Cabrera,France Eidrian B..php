<!DOCTYPE html>
<html lang="en">
<head>
    <title>Input Types Exercise</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
            margin: 0;
            padding: 0;
        }
    </style>
<body>
    <form action="RegistrationCabrera.php" method="POST">
        <p>
            <label for="Name">
                Enter your name: 
                <input type="text" name="txtName" required>
            </label>
        </p>

        <p>
            <label for="Age">
                Enter your age: 
                <input type="number" name="numAge"  required>
            </label>
        </p>

        <p>
            <label for="Course">
                Enter your course: 
                <input type="text" name="txtCourse" required>
            </label>
        </p>
        <p>
            <label>Are you an officer of COMSOC?</label>
        </p>
            <input type="checkbox" name="chkYes" value="Yes"> Yes

        
        <p>What is your favorite computer subject?</p>
            <input type="checkbox" name="chkSubject1">
            <label>Computer Programming<br></label>

            <input type="checkbox" name="chkSubject2">
            <label>Computer Graphics<br></label>

            <input type="checkbox" name="chkSubject3">
            <label>Web Based Application</label>

        <p>What do you prefer most?</p>
            <label>
            <input type="radio" name="rdoPrefer" value="Microsoft" required>Microsoft<br></label>

            <label>
            <input type="radio" name="rdoPrefer" value="Open Source" required>Open Source <br></label>

            <label>
            <input type="radio" name="rdoPrefer" value="No Comment" required>No comment <br></label>
            <label>What do you prefer after graduation?<br></label>
                <select id="lstJobPref" name="lstJobPrefAfterGrad">
                <option value="OfficeEmployee" >Office Employee</option>
                <option value="Programmer/Analyst" >Programmer/Analyst</option>
                <option value="Call CenterAgent"  >Call Center Agent</option>
                <option value="Instructor">Computer Instructor</option>
                </select>
            </label>
        </p>
        <label for="lblPreferThesis">Which do you prefer for a thesis topic/title?<br></label>
        <select name="cmbPreferThesis" id="cmbPreferThesis" >
            <option value="Web Based/On-line Application" selected="selected">Web Based/On-line Application</option>
            <option value="Network Based Application">Network Based Application</option>
            <option value="System/Software Application">System/Software Application</option>
            <option value="Computer Aided Instructor">Computer Aided Instructor</option>
        </select>
        <p>
        <label>Enter your thoughts here....<br>
            <textarea name="txtComments" maxlength="500"></textarea>
        </label></p>
        <p><button>Submit</button>
        <button>Clear</button></p>
    </form>
</body>
</html>