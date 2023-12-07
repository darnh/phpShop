<?php

class CartController
{
        public function actionAdd($id)
        {
            //Add item to basket
            Cart::addProduct($id);

            //Bringing the user back to the page
            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");
        }

        public function actionDelete($id)
        {
            //Removing an item from the basket
            Cart::deleteProduct($id);

            //Bringing the user back to the page
            header("Location: /cart/");
        }

        public function actionAddAjax($id)
        {
            //Add item to basket
            echo Cart::addProduct($id);
            return true;
        }

        public function actionIndex()
        {
            $categories = array();
            $categories = Category::getCategoriesList();

            $productsInCart = false;

            //Let's get the data from the shopping basket
            $productsInCart = Cart::getProducts();

            if ($productsInCart){
                //Get complete information about the items for the list
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductByIds($productsIds);

                //Get the total cost of goods
                $totalPrice = Cart::getTotalPrice($products);
            }
            require_once(ROOT. '/views/cart/index.php');

            return true;
        }

        public function actionCheckout()
        {
            // List of categories for the left menu
            $categories = array();
            $categories = Category::getCategoriesList();

            // Successful order placement status
            $result = false;

            //Has the form been sent?
            if (isset($_POST['submit'])) {
                // Has the form been sent? - Yes

                //Read the form data
                $userName = $_POST['userName'];
                $userPhone = $_POST['userPhone'];
                $userComment = $_POST['userComment'];

                //Field validation
                $errors = false;
                if (!User::checkName($userName))
                    $errors[] = 'Wrong name';
                if (!User::checkPhone($userPhone))
                    $errors[] = 'Wrong phone';

                //Is the form filled out correctly?
                if ($errors == false) {
                    //Is the form filled out correctly? - Yes
                    //Save the order in the database

                    //Collecting order information
                    $productsInCart = Cart::getProducts();
                    if (User::isGuest()) {
                        $userId = false;
                    } else {
                        $userId = User::checkLogged();
                    }

                    //Saving the order to the database
                    $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                    if ($result){
                    //Notify the administrator of a new order
                        $adminEmail = 'php.start@mail.ru';
                        $message = 'localhost/admin/orders';
                        $subject = 'Новый заказ';
                        mail($adminEmail, $subject, $message);

                        //Clearing the basket
                        Cart::clear();
                    }
                } else {
                    //Is the form filled out correctly? - No

                    //Totals: total value, number of items
                    $productsInCart = Cart::getProducts();
                    $productsIds = array_keys($productsInCart);
                    $products = Product::getProductByIds($productsIds);
                    $totalPrice = Cart::getTotalPrice($products);
                    $totalQuantity = Cart::countItems();

                }

            } else {
                // Has the form been sent? - No

                //Retrieving data from the shopping basket
                $productsInCart = Cart::getProducts();

                // Are there any items in the basket?
                if($productsInCart == false){
                    // Are there any items in your basket? - No
                    //Send the user to the main page to search for goods
                    header("Location: /");
                } else {
                    // Are there any items in your basket? - Yes

                    //Totals: total value, quantity of goods
                    $productsIds = array_keys($productsInCart);
                    $products = Product::getProductByIds($productsIds);
                    $totalPrice = Cart::getTotalPrice($products);
                    $totalQuantity = Cart::countItems();

                    $userName = false;
                    $userPhone = false;
                    $userComment = false;

                    ////Is the user authorised?
                    if (User::isGuest()) {
                        //No
                        // Value for the form is empty
                    } else {
                        // Yes, authorised
                        //Get information about the user from the database by id
                        $userId = User::checkLogged();
                        $user = User::getUserById($userId);
                        //Paste into the form
                        $userName = $user['name'];
                    }

                }
            }
            require_once(ROOT. '/views/cart/checkout.php');

            return true;
        }
}
