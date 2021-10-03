<?php
session_start();
$_SESSION['startdate'] =  $_POST["startdate"];
$_SESSION['enddate'] =  $_POST["enddate"];

$report_pg=$_POST["report_type"];
if ($report_pg == "report_export_import")
        header("Location: report_export_import.php");
else if ($report_pg == "report_tariff")
        header("Location: report_tariff.php");
else
    echo "Please Enter the Complete Information";

?>
