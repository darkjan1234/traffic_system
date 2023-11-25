<?php 
include "connect.php";

$currentMonth = date('Y-m');
$result = $db->prepare("SELECT COUNT(id) AS totalReports FROM reported_offence WHERE DATE_FORMAT(date, '%Y-%m') = :current_month");
$result->bindParam(':current_month', $currentMonth);
$result->execute();

if ($row = $result->fetch()) {
    $totalReports = $row['totalReports'];
} else {
    $totalReports = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Monthly Report - <?php echo date('F Y'); ?></h1>
        
        <div class="alert alert-primary" role="alert">
            Total Reports for <?php echo date('F Y'); ?>: <?php echo $totalReports; ?>
        </div>

        <!-- You can include more summary information as needed -->

        <!-- Include Bootstrap JS and Popper.js (for Bootstrap dropdowns) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </div>
</body>
</html>
