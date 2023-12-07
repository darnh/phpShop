<?php
        include_once ROOT.'/models/Category.php';
        include_once ROOT.'/models/Product.php';
    class SiteController {

        public function actionIndex() {

            //List of categories for the left menu
            $categories = Category::getCategoriesList();

            //List of recent products
            $latestProducts = Product::getLatestProducts(3);

            //List of products for the slider
            $sliderProducts = Product::getRecommendedProducts();

            //Connecting the view
            require_once(ROOT . '/views/site/index.php');
            return true;
        }

        public function actionContact() {

            $userEmail = '';
            $userText = '';
            $result = false;

            if (isset($_POST['submit'])) {
                $userEmail = $_POST['userEmail'];
                $userText = $_POST['userText'];

                $errors = false;

                //Field validation
                if (!User::checkEmail($userEmail)) {
                    $errors[] = 'Incorrect email';
                }
                if ($errors == false){
                    $adminEmail = 'php.start@mail.ru';
                    $message = "Text: {$userText}. From {$userEmail}";
                    $subject = 'Subject line';
                    $result = mail($adminEmail, $subject, $message);
                    $result = true;
                }
            }
            require_once (ROOT.'/views/site/contact.php');

            return true;
        }
    }