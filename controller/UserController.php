<?php

class UserController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDaoImpl;
    }

    public function index()
    {

        $loginSubmit = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($loginSubmit)) {
            $email = filter_input(INPUT_POST, 'txtEmail');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $md5Password = md5($password);
            $userLogin = $this->userDao->userLogin($email, $md5Password);

            if ($userLogin) {
                $_SESSION['web_user'] = true;
                $_SESSION['id'] = $userLogin->getId();
                $_SESSION['role'] = $userLogin->getRole();
                $_SESSION['nama'] = $userLogin->getNama();
                header('Location: index.php');
            } else {
                echo '<div class="bg-danger py-2 px-2 fw-bold">Invalid login</div>';
            }
        }

        include_once 'view/login-view.php';
    }

    public function signUp()
    {
        $signSubmit = filter_input(INPUT_POST, 'btnSignUp');
        if (isset($signSubmit)) {
            $email = filter_input(INPUT_POST, 'txtEmail');
            $nama = filter_input(INPUT_POST, 'txtNama');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
}
