<?php
// Include the database connection file
require_once '../dbengine/dbconnect.php';

// Define variables to store user input
$username = $password = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute a SELECT statement to retrieve user data
    $sql = "SELECT  password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the username exists in the database
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, start a new session
            session_start();
            // Store user data in session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            // Redirect to the booking page
            header('Location: ../booking/index.php');
            exit();
        } else {
            // Password is incorrect
            $error = 'Invalid username or password.';
        }
    } else {
        // Username does not exist
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h1>User Login</h1>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" value="Login">
        <p>Don't have an account? <a href="registration.php">Register now</a>.</p>
    </form>
</body>
</html>
