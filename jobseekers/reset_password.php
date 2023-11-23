<?
// Check the token provided in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists in the database and fetch user details
    // Code to retrieve user details based on the provided token

    if ($userDetails) {
        // Display a form to reset the password
        echo "<form action='update_password.php' method='post'>
                <input type='hidden' name='token' value='$token'>
                <input type='password' name='new_password' placeholder='Enter new password' required>
                <button type='submit'>Reset Password</button>
              </form>";
    } else {
        echo "Invalid or expired token";
    }
}
?>