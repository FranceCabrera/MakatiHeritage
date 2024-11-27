<html>
    <head>

    </head>
    <body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            echo "<h2>Submitted Information:</h2>";
            echo "<p>Name: " .$_POST['txtName']."</p>";
            echo "<p>Age: " .$_POST['numAge']."</p>";
            echo "<p>Course: " .$_POST['txtCourse']."</p>";
        
            echo "Are you an officer of Comsoc?<br>";
        if(isset($_POST['yes']) && $_POST['yes'] == 'yes') {
            echo "Yes";
        } else {
            echo "No";
        }
        $Subject = '<br>';
        if (isset($_POST['chkSubject1'])) {
            $Subject .= 'Computer Programming<br>';
        }
        if (isset($_POST['chkSubject2'])) {
            $Subject .= 'Computer Graphics<br>';
        }
        if (isset($_POST['chkSubject3'])) {
            $Subject .= 'Web Based Application<br>';
        }
        echo "<p>Favorite Computer Subject(s): $Subject</p>";
        }
        echo "<h2>Submitted Information:</h2>";
        
        // Radio buttons for preference (assuming it's always set)
        $preference = $_POST['rdoPrefer'];
        echo "<p>Preference: $preference</p>";
        
        // Select menu for job preference after graduation
        $jobPreference = $_POST['lstJobPrefAfterGrad'];
        echo "<p>Job Preference After Graduation: $jobPreference</p>";
        
        $thesisTopic = $_POST['cmbPreferThesis'];
        echo "<p>Thesis Topic/Title Preference: $thesisTopic</p>";
        
        // Comments textarea
        $comments = $_POST['txtComments'];
        echo "<p>Comments: $comments</p>";
        ?>
    </body>
</html>