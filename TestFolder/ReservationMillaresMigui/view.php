<?php include('header.php'); ?>
    <main>
        <h2>View Registered Guests</h2>
        <form action="view.php" method="get">
            <label for="sort">Sort by:</label>
            <select id="sort" name="sort">
                <option value="emailAdd" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'email_Add') echo 'selected'; ?>>Email</option>
                <option value="lname" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'lname') echo 'selected'; ?>>Name</option>
            </select>
            <input type="submit" value="Sort">
        </form>
        <form action="view.php" method="get">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Enter name or email" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <input type="submit" value="Search">
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date Registered</th>
            </tr>
            <?php
            include('config.php');

            $dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

            if (!$dbConn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $search = isset($_GET['search']) ? $_GET['search'] : '';

            $sql = "SELECT Id, CONCAT(lname, ', ', fname) AS name, email_Add, date_Reg FROM reservationmigui";
            if ($search) {
                $sql .= " WHERE lname LIKE '$search%' OR fname LIKE '$search%' OR email_Add LIKE '$search%'";
            }

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                $sql .= " ORDER BY $sort";
            } else {
                $sql .= " ORDER BY Id"; 
            }

            $result = mysqli_query($dbConn, $sql);

            if (mysqli_num_rows($result) > 0) {
                
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["userID"]; ?></td>
                        <td><?php echo ucwords(strtolower($row["name"])); ?></td>
                        <td><?php echo strtolower($row["emailAdd"]); ?></td>
                        <td><?php echo $row["dateReg"]; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='4'>No results</td></tr>";
            }

            mysqli_close($dbConn);
            ?>
        </table>
    </main>
<?php include('footer.php'); ?>
