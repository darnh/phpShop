<?php

/*
 * The AdminBase abstract class contains common logic for controllers that are
 * are used in the admin panel
 */

abstract class AdminBase
{
/*
 * Method that checks if a user is an administrator
 * return boolean
 */
    public static function checkAdmin()
    {
        //Check if the user is authorised. If not, it will be redirected
        $userId = User::checkLogged();

        //Getting information about the current user
        $user = User::getUserById($userId);

        //If the current user's role is "admin", let him into the admin panel
        if ($user['role'] == 'admin') {
            return true;
        }
        //Otherwise terminate with a message about closed access
        die('Access denied');
    }
}