<?php

/*
 * class Cart
 * Component for basket operation
 */
class Cart
{
    /**
     * Adding an item to the basket (session)
     * @param int $id <p>id of item</p>
     * @return integer <p>Number of items in the basket</p>
     */
    public static function addProduct($id)
    {
        // Set $id to integer type
        $id = intval($id);

        //Empty array for items in the basket
        $productsInCart = array();

        //If there are already products in the basket (they are stored in the session)
        if (isset($_SESSION['products'])) {
            //Then we fill our array with goods
            $productsInCart = $_SESSION['products'];
        }

        //If the item is in the basket but has been added again, increase the quantity
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            //Add a new item to the basket
            $productsInCart[$id] = 1;
        }
        $_SESSION['products'] = $productsInCart;

        // Return the number of items in the basket
        return self::countItems();
    }

    /*
     * Counting the number of items in the basket(session)
     */
    public static function countItems()
    {
        // Checking the availability of goods in the basket
        if (isset($_SESSION['products'])) {
            // If there is an array with goods
            // Count and return their quantity
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            //If there are no goods, return 0
            return 0;
        }
    }

    /**
     * Returns an array with identifiers and the number of items in the basket<br/>
     *  If there are no items, returns false;
     * @return mixed: boolean or array
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    /**
     * Get the total value of transferred goods
     * @param array $products <p>Array with information about products</p>
     * @return integer <p>Total cost</p>
     */
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();
        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total +=$item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])){
            unset($_SESSION['products']);
        }
    }

    /**
     *Removes the item with the specified id from the basket
     * @param integer $id <p>item id</p>
     */
    public static function deleteProduct($id)
    {
        // Get an array with identifiers and the number of items in the basket
        $productsInCart = self::getProducts();

        // Remove the element with the specified id from the array
        unset($productsInCart[$id]);

        // Write the array of goods with the deleted item to the session
        $_SESSION['products'] = $productsInCart;
    }
}