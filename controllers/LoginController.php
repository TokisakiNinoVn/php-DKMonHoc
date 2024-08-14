<?php
class LoginController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function login($email, $password) {
        $user = $this->userModel->validateUser($email, $password);
        if ($user) {
            session_start();
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['name'] = $user['name'];
            header("Location: index.php?action=register");
            exit();
        } else {
            echo "Login failed. Please try again.";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>
