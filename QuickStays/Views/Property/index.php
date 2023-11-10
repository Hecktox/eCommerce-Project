<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
 Philippe Ton-That
 2033640
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Header -->
    <?php
    session_start();
    // Check if the user is logged in
    if (isset($_SESSION['user_email'])) {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="/eCommerce-Project/QuickStays">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        echo '      <li class="nav-item dropdown">';
        echo '        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo '          ' . htmlspecialchars($_SESSION['user_email']) . '';
        echo '        </a>';
        echo '        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=logout">Log out</a>';
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    } else {
        // User is not logged in, show the Login and Sign up links
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="/eCommerce-Project/QuickStays/Views/User/index.php">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        echo '      <li class="nav-item dropdown">';
        echo '        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo '          Account';
        echo '        </a>';
        echo '        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=login">Login</a>';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=register">Sign Up</a>';
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    }
    ?>
    <div class="container my-4">
        <h2 class="text-center mb-4">Search Results</h2>

        <?php if (!empty($searchResults)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">PropertyID</th>
                            <th scope="col">PropertyName</th>
                            <th scope="col">Country</th>
                            <th scope="col">City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($searchResults as $property): ?>
                            <tr>
                                <td>
                                    <?php echo $property['PropertyID']; ?>
                                </td>
                                <td><a
                                        href="/eCommerce-Project/QuickStays/index.php?entity=property&action=book&PropertyID=<?php echo $property['PropertyID']; ?>">
                                        <?php echo $property['PropertyName']; ?>
                                    </a></td>
                                <td>
                                    <?php echo $property['Country']; ?>
                                </td>
                                <td>
                                    <?php echo $property['City']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                No properties found matching the search criteria.
            </div>
        <?php endif; ?>
    </div>
</body>

</html>