
<?php
session_start();

if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] !== 'Admin') {
    
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Admin</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var showPasswordButton = document.getElementById("showPassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.innerText = "Hide Password";
            } else {
                passwordInput.type = "password";
                showPasswordButton.innerText = "Show Password";
            }
        }
    </script>
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-4 text-center">Edit Booking</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=booking&action=edit" class="bg-white p-3 border rounded">
                    <input type="hidden" name="BookingID" value="<?php echo $booking['BookingID']; ?>">

                    <div class="form-group">
                        <label for="UserID">User ID:</label>
                        <input type="number" class="form-control" name="UserID" value="<?php echo $booking['UserID']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="PropertyID">Property ID:</label>
                        <input type="number" class="form-control" name="PropertyID" value="<?php echo $booking['PropertyID']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="CheckInDate">Check-In Date:</label>
                        <input type="date" class="form-control" name="CheckInDate" value="<?php echo $booking['CheckInDate']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="CheckOutDate">Check-Out Date:</label>
                        <input type="date" class="form-control" name="CheckOutDate" value="<?php echo $booking['CheckOutDate']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="TotalPrice">Total Price:</label>
                        <input type="number" step="0.01" class="form-control" name="TotalPrice" value="<?php echo $booking['TotalPrice']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Status">Status:</label>
                        <select class="form-control" name="Status">
                            <option value="Pending" <?php if ($booking['Status'] === 'Pending') echo 'selected'; ?>>Pending</option>
                            <option value="Confirmed" <?php if ($booking['Status'] === 'Confirmed') echo 'selected'; ?>>Confirmed</option>
                            <option value="Cancelled" <?php if ($booking['Status'] === 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="saveBooking" value="Save">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=booking&action=list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>