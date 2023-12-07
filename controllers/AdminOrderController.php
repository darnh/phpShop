<?php

/**
 * Controller AdminOrderController
 * Order management in the admin panel
 */
class AdminOrderController extends AdminBase
{

    /**
     * Action for the "Order Management" page
     */
    public function actionIndex()
    {
        // Access verification
        self::checkAdmin();

        // Getting a list of orders
        $ordersList = Order::getOrdersList();

        // Connecting the view
        require_once(ROOT . '/views/admin_order/index.php');
        return true;
    }

    /**
     * Action for the "Edit Order" page
     */
    public function actionUpdate($id)
    {
        // Access verification
        self::checkAdmin();

        // Retrieving data about a specific order
        $order = Order::getOrderById($id);

        // Form processing
        if (isset($_POST['submit'])) {
            // If the form has been sent
            // Get data from the form
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            // Save changes
            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

            // Redirect the user to the order management page
            header("Location: /admin/order/view/$id");
        }

        // Connecting the view
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }

    /**
     * Action for the "View Order" page
     */
    public function actionView($id)
    {
        // Access verification
        self::checkAdmin();

        // Retrieving data about a specific order
        $order = Order::getOrderById($id);

        // Get an array with identifiers and quantity of goods
        $productsQuantity = json_decode($order['products'], true);

        // Get an array with product identifiers
        $productsIds = array_keys($productsQuantity);

        // Getting the list of items in the order
        $products = Product::getProductByIds($productsIds);

        // Connecting the view
        require_once(ROOT . '/views/admin_order/view.php');
        return true;
    }

    /**
     * Action for the "Delete Order" page
     */
    public function actionDelete($id)
    {
        // Access verification
        self::checkAdmin();

        // Form processing
        if (isset($_POST['submit'])) {
            // If the form has been sent
            // Delete order
            Order::deleteOrderById($id);

            // Redirect the user to the product management page
            header("Location: /admin/order");
        }

        // Connecting the view
        require_once(ROOT . '/views/admin_order/delete.php');
        return true;
    }

}