<?php
$adminPassword = password_hash('lighthouse', PASSWORD_DEFAULT);
$employeePassword = password_hash('lighthouse', PASSWORD_DEFAULT);

echo "Admin Password Hash: " . $adminPassword . "\n";
echo "Employee Password Hash: " . $employeePassword . "\n";
?>
