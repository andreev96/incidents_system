<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
    "127.0.1.27",
    "root",
    "",
    "incident_system"
);
if (!$conn) {
    die("ERROR: " . mysqli_connect_error());
}

echo "MYSQL OK";
echo password_hash("ZxcGhoul1000-7", PASSWORD_DEFAULT);
