<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        // Print the page title
        if (defined('TITLE')) {
            // If the title is defined
            print TITLE;
        } else {
            // If the title is not defined
            print "All about the main title of the page...";
        }
        ?>
    </title>
    <link rel="stylesheet" href="css/styles_css.css">
</head>
<body>
    <table class="banner">
        <tr>
            <td class="banner1">Welcome to <?php print ORGNAME ?> Students' Database</td>
        </tr>
    </table>
</body>
</html>
