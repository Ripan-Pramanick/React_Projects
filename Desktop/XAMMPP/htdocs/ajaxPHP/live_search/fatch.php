<?php
$conn = new mysqli("localhost", "root", "", "practisdb");

// Check canection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, name, email, phone FROM live_search");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
    ?>
    <tr>
        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No users found.</td>
    </tr>
    <?php
}
$conn->close();
?>