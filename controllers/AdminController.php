<?php

/*
 * Controller AdminController
 * Home page in admin panel
 */

class AdminController extends AdminBase
{
    /*
     * Action for the "Admin Panel" start page.
     */
    public function actionIndex()
    {
        //Access verification
        self::checkAdmin();

        //Connecting the view
        require_once (ROOT. '/views/admin/index.php');
        return true;
    }
}