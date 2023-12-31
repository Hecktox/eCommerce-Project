

<?php
require_once 'Models/AdminModel.php';

class AdminController
{
    public function index()
    {
        include 'Views/Admin/index.php';
    }

    public function list()
    {
        $adminModel = new AdminModel();
        $admins = $adminModel->getAdmins();
        include 'Views/Admin/list.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveAdmin'])) {
            $adminID = $_POST['adminID'];
            $adminModel = new AdminModel();
            $admin = $adminModel->getAdminByID($adminID);

            if ($admin) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $isMaster = $_POST['isMaster'];

                $adminModel->updateAdmin($adminID, $firstName, $lastName, $email, $password, $isMaster);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=admin&action=list');
                exit();
            } else {
                echo "<p>Admin not found!</p>";
            }
        } elseif (isset($_GET['adminID'])) {
            $adminID = $_GET['adminID'];
            $adminModel = new AdminModel();
            $admin = $adminModel->getAdminByID($adminID);

            if ($admin) {
                include 'Views/Admin/edit.php';
            } else {
                echo "<p>Admin not found!</p>";
            }
        } else {
            echo "<p>Invalid admin ID!</p>";
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addAdmin'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $isMaster = isset($_POST['isMaster']) ? 1 : 0;

            $adminModel = new AdminModel();
            $adminModel->addAdmin($firstName, $lastName, $email, $password, $isMaster);

            header('Location: /eCommerce-Project/QuickStays/index.php?entity=admin&action=list');
            exit();
        } else {
            include 'Views/Admin/add.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['adminID'])) {
            $adminID = $_GET['adminID'];
            $adminModel = new AdminModel();
            $admin = $adminModel->getAdminByID($adminID);

            if ($admin) {
                $adminModel->deleteAdmin($adminID);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=admin&action=list');
                exit();
            } else {
                echo "<p>Admin not found!</p>";
            }
        } else {
            echo "<p>Invalid admin ID!</p>";
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerAdmin'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $isMaster = $_POST['isMaster'];

            $adminModel = new AdminModel();
            $adminModel->addAdmin($firstName, $lastName, $email, $password, $isMaster);

            header('Location: /eCommerce-Project/QuickStays/index.php?entity=admin&action=index');
            exit();
        } else {
            include 'Views/Admin/register.php';
        }
    }
}
?>