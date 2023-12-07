<?php

class Product
{

    const SHOW_BY_DEFAULT = 6;

    /**
     * Returns an array of products
     */

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image FROM product '
            . 'WHERE status = "1"'
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price FROM product "
                . "WHERE status = '1' AND category_id = '$categoryId' "
                . "ORDER BY id ASC "
                . "LIMIT " . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $i++;
            }
            return $products;
        }
    }

    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    /**
     * Returns the total number of products in a category
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1" AND category_id ="' . $categoryId . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    /*
     * Returns a list of products with specified identifiers
     * param array $idsArray <p>Array with identifiers</p>
     * return array <p>Array with a list of products</p>
     */
    public static function getProductByIds($idsArray)
    {

        //Connect to the database
        $db = Db::getConnection();

        //Transform the array into a string to form conditions in the query
        $idsString = implode(',', $idsArray);

        //Database query text
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString) ";

        $result = $db->query($sql);

        //Specify that we want to get the data as an associative array
        $result->setFetchMode(PDO::FETCH_ASSOC);

        //Get and return results
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['code'] = $row['code'];
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    /*
     * Returns a list of recommended products
     * return array <p>Array with products</p>
     */
    public static function getRecommendedProducts()
    {
        //Connect to the database
        $db = Db::getConnection();

        //Get and return results
        $result = $db->query('SELECT id, name, price FROM product '
            . 'WHERE status = "1" '
            . 'ORDER BY id DESC');
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    /*
     * Returns a list of products
     * return array <p>Array with products</p>
     */
    public static function getProductsList()
    {
        //Connect to the database
        $db = Db::getConnection();
        //Get and return results
        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['price'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    /*
     * Delete a product with the specified id
     * param integer $id <p>Product id</p>
     * return boolean <p>Result of the method execution</p>
     */
    public static function deleteProductById($id)
    {
        //Connect to the database
        $db = Db::getConnection();

        //Database query text
        $sql = 'DELETE FROM product WHERE id = :id';

        //Get and return results. Prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    /*
     * Edit a product with the specified id
     * param integer $id <p>Product id</p>
     * param array options <p>Array with information about the product</p>
     * return boolean <p>Result of the method execution</p>
     */
    public static function updateProductById($id, $options)
    {
        // Connect to the database
        $db = Db::getConnection();

        // Database query text
        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                status = :status
            WHERE id = :id";

        // Get and return results. Prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Adds a new product
     * @param array $options <p>Array with information about the product</p>
     * @return integer <p>id of the added record in the table</p>
     */
    public static function createProduct($options)
    {
        // Connect to the database
        $db = Db::getConnection();

        // Database query text
        $sql = 'INSERT INTO product '
            . '(name, code, price, category_id, brand, availability,'
            . ' status)'
            . 'VALUES '
            . '(:name, :code, :price, :category_id, :brand, :availability,'
            . ' :status)';

        // Get and return results. Prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // If the query is successful, return the id of the added record
            return $db->lastInsertId();
        }
        // Otherwise, return 0
        return 0;
    }

    /**
     * Returns the textual explanation of the product availability:<br/>
     * <i>0 - On order, 1 - In stock</i>
     * @param integer $availability <p>Status</p>
     * @return string <p>Textual explanation</p>
     */
    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'In stock';
                break;
            case '0':
                return 'On order';
                break;
        }
    }

    /**
     * Returns the path to the image
     * @param integer $id
     * @return string <p>Path to the image</p>
     */
    public static function getImage($id)
    {
        // Name of the placeholder image
        $noImage = 'no-image.jpg';

        // Path to the folder with products
        $path = '/upload/images/products/';

        // Path to the product image
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // If the image for the product exists
            // Return the path to the product image
            return $_SERVER['DOCUMENT_ROOT'] . $pathToProductImage;
        }

        // Return the path to the placeholder image
        return $path . $noImage;
    }

}

