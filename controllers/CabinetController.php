<?php

class CabinetController
{
    public function actionIndex()
    {
        //Get user identifier from session
        $userId = User::checkLogged();

        //Getting user information from the database
        $user = User::getUserById($userId);

        require_once (ROOT . '/views/cabinet/index.php');

        return true;
    }

    public function actionEdit()
    {
        //Getting the user identifier from the session
        $userId = User::checkLogged();

        //Getting user information from the database
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'The name must not be shorter than two characters';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'The password must not be shorter than six characters';
            }
            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }
        require_once (ROOT . '/views/cabinet/edit.php');

        return true;

    }

}