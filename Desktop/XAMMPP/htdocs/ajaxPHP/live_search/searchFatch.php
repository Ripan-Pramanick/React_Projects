<?php 

// Establish a connection to the database
$conn = new mysqli("localhost", "root", "", "practisdb");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Corrected syntax for checking if a query was submitted.
if (isset($_POST['query'])) {
    // Sanitize the search term to prevent issues.
    $search = $_POST['query'];

    // Use prepared statements for a significant security improvement against SQL injection.
    $stmt = $conn->prepare("SELECT * FROM `live_search` WHERE `name` LIKE ? OR `email` LIKE ? OR `phone` LIKE ?");
    
    // Bind the parameters to the statement. The 's' indicates a string type.
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();
} else {
    // If no query is submitted, select all records
    $sql = "SELECT * FROM `live_search`";
    $result = $conn->query($sql);
}

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Directly output the table rows, since the rest of the file likely contains the <table> tags
    while ($row = $result->fetch_assoc()) {
        // Sanitize the output using htmlspecialchars() to prevent XSS attacks.
        ?>
        <tr>
            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900"><?php echo htmlspecialchars($row['id']); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($row['name']); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($row['email']); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($row['phone']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200">Edit</a>
                <a href="delete-inline.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="text-red-600 hover:text-red-900 transition-colors duration-200">Delete</a>
            </td>
        </tr>
        <?php
    }
} else {
    // If no record is found, display a message within a table row, assuming the HTML table exists.
    ?>
    <tr>
        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No Record Found!</td>
    </tr>
    <?php
}

// Close the database connection
$conn->close();

?>