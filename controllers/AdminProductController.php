<?php
/*
 * Controller AdminProductController
 * Product management in the admin panel
 */
class AdminProductController extends AdminBase
{

    /*
     * Action for the "Manage Products" page
     */
    public function actionIndex()
    {
        //Access verification
        self::checkAdmin();

        //Getting the list of products
        $productsList = Product::getProductsList();

        //Подключаем вид
        require_once(ROOT. '/views/admin_product/index.php');
        return true;
    }

    /*
     * Action for the "Add product" page
     */
    public function actionCreate()
    {
        // Access verification
        self::checkAdmin();

        // Getting the list of categories for the drop-down list
        $categoryList = Category::getCategoriesListAdmin();

        // Form processing
        if (isset($_POST['submit'])) {
            // If the form has been sent
            // Get data from the form
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['status'] = $_POST['status'];

            // Error flag in the form
            $errors = false;

            // If necessary, you can validate the values in the desired way
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Fill in the blanks';
            }

            if ($errors == false) {
                // If there are no errors
                // Add a new product
                $id = Product::createProduct($options);

                // If a record is added
                if ($id) {
                    // Let's check if the image was loaded through the form
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        //  If it was downloaded, move it to the desired folder, give it a new name
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };

                // Redirect the user to the product management page
                header("Location: /admin/product");
            }
        }

        // Connecting the view
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    /**
     * Action for the "Edit product" page
     */
    public function actionUpdate($id)
    {
        // Access verification
        self::checkAdmin();

        // Getting the list of categories for the drop-down list
        $categoryList = Category::getCategoriesListAdmin();

        // Retrieving data about a specific order
        $product = Product::getProductById($id);

        // Form processing
        if (isset($_POST['submit'])) {
            // If the form is submitted
            // Get data from the edit form. If necessary, you can validate the values
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['status'] = $_POST['status'];

            // Save changes
            if (Product::updateProductById($id, $options)) {


                // If the record is saved
                //  Check if the image was loaded through the form
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // If it was downloaded, move it to the desired folder, give it a new name
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }
            }

            // Redirect the user to the product management page
            header("Location: /admin/product");
        }

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Connecting the view
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }

    /**
     * Action for the "Remove product" page
     */
    public function actionDelete($id)
    {
        // Access verification
        self::checkAdmin();

        // Form processing
        if (isset($_POST['submit'])) {
            // If the form has been submitted
            // Delete product
            Product::deleteProductById($id);

            // Redirect the user to the product management page
            header("Location: /admin/product");
        }

        // Connecting the view
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }

}