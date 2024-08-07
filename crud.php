<?php

function performCrudOperation($mode, $tableName, $rows) {
    // Database connection details (replace with your actual database connection)
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Rows as an array
    $rowsArray = explode(',', $rows);

    // Perform CRUD operations based on the mode
    switch ($mode) {
        case 'create':
            // Assuming $rows contains comma-separated values
            $values = "'" . implode("','", $rowsArray) . "'";
            $sql = "INSERT INTO $tableName VALUES ($values)";
            break;

        case 'read':
            // Assuming $rows contains the condition for reading (e.g., WHERE clause)
            $sql = "SELECT * FROM $tableName WHERE $rows";
            break;

        case 'update':
            // Assuming $rows contains the update condition and values
            $updates = [];
            foreach ($rowsArray as $row) {
                $updates[] = "$row = ?";
            }
            $updatesString = implode(', ', $updates);
            $sql = "UPDATE $tableName SET $updatesString WHERE condition";
            break;

        case 'delete':
            // Assuming $rows contains the condition for deletion (e.g., WHERE clause)
            $sql = "DELETE FROM $tableName WHERE $rows";
            break;

        default:
            echo "Invalid CRUD operation mode";
            return;
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Close the connection
    $conn->close();
}

// Example usage:
// performCrudOperation('create', 'users', 'John,Doe,john@example.com');
// performCrudOperation('read', 'users', 'username = "john"');
// performCrudOperation('update', 'users', 'username = "john"', 'Doe', 'jane@example.com');
// performCrudOperation('delete', 'users', 'username = "john"');

?>
