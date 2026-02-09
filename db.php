<?php
mysqli_report(MYSQLI_REPORT_OFF);

$conn = mysqli_connect(
    "127.0.1.27",
    "root",
    "",
    "incident_system"
);

if (!$conn) {
    die("DB ERROR: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
