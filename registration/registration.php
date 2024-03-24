<?php
// Include the database connection file
require_once '../dbengine/dbconnect.php';

// Define variables to store user input
$fullnames = $username = $password = $confirmPassword = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $fullnames = $_POST['fullnames'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate user input (you can add more validation rules as needed)
    if (empty($fullnames) || empty($username) || empty($password) || empty($confirmPassword)) {
        $error = 'Please fill in all fields.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $sql = "INSERT INTO users (fullnames, username, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $fullnames, $username, $hashedPassword);
        $stmt->execute();

        // Redirect to a success page or perform any other necessary actions
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <h1>User Registration</h1>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="fullnames">Full Names:</label>
        <input type="text" name="fullnames" id="fullnames" value="<?php echo $fullnames; ?>"><br>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="confirmPassword" id="confirmPassword"><br>

        <input type="submit" value="Register">
        <p>have an account? <a href="login.php">Login now</a>.</p>
    </form>
  
</body>
</html>