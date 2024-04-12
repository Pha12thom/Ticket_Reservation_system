<?php
// Include the database connection file
require_once '../dbengine/dbconnect.php';

// Define variables to store user input
$fullnames = $username = $password = $confirmPassword = '';
$error = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input
    $fullnames = htmlspecialchars($_POST['fullnames']);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate user input
    if (empty($fullnames) || empty($username) || empty($password) || empty($confirmPassword)) {
        $error = 'Please fill in all fields.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match please try again';
        echo "<script>
        alert('$error');
        </script>";
    } else {
        // Insert the user data into the database table
        $sql = "INSERT INTO users (fullnames, username, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $fullnames, $username, $password);
        if ($stmt->execute()) {
            // Redirect to success page
            header('Location: login.php');
            exit();
        } else {
            $error = 'Registration failed. Please try again later.';
            echo "<script>alert('$error');</script>";	
        }
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

    <?php if (!empty($error)) : ?>
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
        <nav>
            
        </nav>

        <input type="submit" value="Register">
        <p>Already have an account? <a href="login.php">Login now</a>.</p>
    </form>
  
</body>
</html>
