<?php
// Include your database connection or any necessary setup files here

// Get the ID from the URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    // Handle the case where no ID is provided
    echo "Error: No ID provided.";
    exit;
}

// Fetch data from the database based on the ID
$result = $db->prepare("SELECT * FROM reported_offence WHERE id = :post_id");
$result->bindParam(':post_id', $id);
$result->execute();

// Check if a row is found
if ($row = $result->fetch()) {
    // Start building your printable report content
    $reportContent = "
        <html>
        <head>
            <title>Printable Report</title>
            <!-- Include any additional styles or meta tags if needed -->
        </head>
        <body>
            <h1>Offence Report</h1>
            <p><strong>Offense:</strong> {$row['offence']}</p>
            <p><strong>Offense ID:</strong> {$row['offence_id']}</p>
            <!-- Add more fields as needed -->

            <!-- You can customize the styling and layout based on your requirements -->
        </body>
        </html>
    ";

    // Output the report content
    echo $reportContent;
} else {
    // Handle the case where no data is found for the provided ID
    echo "Error: No data found for the provided ID.";
}

// Close any database connections or perform cleanup if needed
?>
