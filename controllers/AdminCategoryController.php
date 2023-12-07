<?php

/*
 * Controller AdminCategoryController
 * Managing product categories in the admin panel
 */

class AdminCategoryController extends AdminBase
{

    /*
     * Action for the "Manage Categories" page
     */
    public function actionIndex()
    {
        //Access verification
        self::checkAdmin();

        //Getting the list of categories
        $categoriesList = Category::getCategoriesListAdmin();

        //Connecting the view
        require_once (ROOT . '/views/admin_category/index.php');
        return true;
    }


    /*
     * Action for the "Add Category" page
     */
    public function actionCreate()
    {
        //Access verification
        self::checkAdmin();

        //Getting the list of categories
        $categoryList = Category::getCategoriesListAdmin();

        //Form processing
        if (isset($_POST['submit'])) {
            //If the form has been sent
            //Get data from the form
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            //Error flag in the form
            $errors = false;

            //If necessary, the value should be validated in the correct way
            if (!isset($name) || empty($name)) {
                $errors[] = 'Fill in the blanks';
            }
            if ($errors == false) {
                //If there are no errors
                //Adding a new category
                Category::createCategory($name, $sortOrder, $status);

                //Redirect the user to the category management page
                header("Location: /admin/category");
            }
        }
        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }

    /*
    * Action for edit category page
    */
    public function actionUpdate($id)
    {
        //Access verification
        self::checkAdmin();

        //Getting data about a specific category
        $category = Category::getCategoryById($id);

        //Form processing
        if (isset($_POST['submit'])) {
            //If the form has been sent
            //Get data from the form
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            //Save changes
           Category::updateCategoryById($id, $name, $sortOrder, $status);

            //Direct the user to the category management page
            header("Location: /admin/category");
        }
        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }

    /*
     * Action for the "Delete Category" page
     */
    public function actionDelete($id)
    {
        //Access verification
        self::checkAdmin();

        //Form processing
        if (isset($_POST['submit'])) {
            //Если форма отправлена
            //Удаление продукта
            Category::deleteCategoryById($id);

            //Direct the user to the category management page
            header("Location: /admin/category");
        }
        //Connect view
        require_once ROOT . '/views/admin_category/delete.php';
        return true;
    }


}
