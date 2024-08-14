<?php
require_once 'config.php';
require_once 'models/UserModel.php';
require_once 'models/CourseModel.php';
require_once 'models/RegistrationModel.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/CourseRegistrationController.php';

$db = new PDO('mysql:host=localhost;dbname=student_registration', 'root', '');

$userModel = new UserModel($db);
$courseModel = new CourseModel($db);
$registrationModel = new RegistrationModel($db);

$loginController = new LoginController($userModel);
$courseRegistrationController = new CourseRegistrationController($courseModel, $registrationModel);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginController->login($_POST['email'], $_POST['password']);
        } else {
            include 'views/login.php';
        }
        break;

    case 'register':
        $courseRegistrationController->showAvailableCourses();
        break;

    case 'registerCourse':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $courseRegistrationController->registerForCourse($_SESSION['userID'], $_POST['courseID']);
        }
        break;

    case 'showRegisteredCourses':
        session_start();
        $courseRegistrationController->showRegisteredCourses($_SESSION['userID']);
        break;

    case 'logout':
        $loginController->logout();
        break;

    default:
        include 'views/login.php';
}
?>
