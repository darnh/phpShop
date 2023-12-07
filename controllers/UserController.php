<?php

class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            if (!User::checkName($name)) {
                $errors[] = 'The name must not be shorter than two characters';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Incorrect email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'The password must not be shorter than six characters';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'This kind of email is already in use';
            }
            if ($errors == false) {
               $result = User::register($name, $email, $password);
            }
        }
        require_once(ROOT.'/views/user/register.php');

        return true;
    }


    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            //Field validation
            if (!User::checkEmail($email)){
                $errors[] = 'Incorrect email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'The password must not be shorter than six characters';
            }

            //Check if the user exists
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                //if the data is incorrect, we show an error
                $errors[] = 'Incorrect login details';
            } else {
                //If the data is correct, remember the user(session)
                User::auth($userId);

                //Redirect the user to the closed part - the cabinet
                header("Location: /cabinet/");
            }
        }
        require_once (ROOT . '/views/user/login.php');

        return true;

    }

    /*
     * Deleting user data from a session
     */
    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header("location: /");
    }
}