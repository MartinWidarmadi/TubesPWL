<?php

class UserController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDaoImpl();
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
                $_SESSION['is_logged'] = true;
                $_SESSION['id'] = $userLogin->getId();
                $_SESSION['role'] = $userLogin->getRole();
                $_SESSION['nama'] = $userLogin->getNama();
                header('Location: index.php');
            } else {
                echo '<script>alert("Invalid email/password!!");</script>")';
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
            $gender = filter_input(INPUT_POST, 'gender');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $cpassword = filter_input(INPUT_POST, 'txtConfirm');
            $md5pass = md5($password);
            $md5cpass = md5($cpassword);

            if (empty($email) || empty($nama) || empty($gender) || empty($password) || empty($cpassword)) {
                echo "<div class='bg-danger py-2'> Please fill all the fields!</div>";
            } else if ($md5cpass != $md5pass) {
                echo "<div class='bg-danger py-2'> Please make sure the password is the same!</div>";
            } else {
                $user = new User();
                $user->setNama($nama);
                $user->setEmail($email);
                $user->setGender($gender);
                $user->setPassword($md5pass);
                $user->setRole('user');
                $result = $this->userDao->insertNewUser($user);

                if ($result) {
                    echo "<div class='bg-success py-2'>New user created!</div>";
                } else {
                    echo "<div class='bg-danger py-2'>Error on creating user</div>";
                }
            }
        }
        include_once 'view/signup-view.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php?menu=login');
    }
}
