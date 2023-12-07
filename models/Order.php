<?php

class Order
{
    /*
     * Save the order
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        $products = json_encode($products);

        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
            . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Returns the list of orders
     * @return array <p>List of orders</p>
     */
    public static function getOrdersList()
    {
        // Connect to the database
        $db = Db::getConnection();

        // Get and return results
        $result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    /*
     * Returns the textual explanation of the order status :<br/>
     * <i>1 - New order 2 - In processing 3 - Being delivered 4 - Closed</i>
     * param integer $status <p>Status</p>
     * return string <p>Textual explanation</p>
     */
    public static function getStatusText($status)
    {
        switch ($status){
            case '1':
                return 'New order';
                break;
            case '2':
                return 'In processing';
                break;
            case '3':
                return 'Being delivered';
                break;
            case '4':
                return 'Closed';
                break;
        }
    }

    /*
     * Returns the order with the specified id
     * param integer $id <p>id</p>
     * return array <p>Array with order information</p>
     */
    public static function getOrderById($id)
    {
        // Connect to the database
        $db = Db::getConnection();

        // Database query text
        $sql = 'SELECT * FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Specify that we want to get the data as an associative array
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Execute the query
        $result->execute();

        // Return the data
        return $result->fetch();
    }

    /**
     * Deletes the order with the specified id
     * @param integer $id <p>Order id</p>
     * @return boolean <p>Result of the method execution</p>
     */
    public static function deleteOrderById($id)
    {
        // Connect to the database
        $db = Db::getConnection();

        // Database query text
        $sql = 'DELETE FROM product_order WHERE id = :id';

        // Get and return results. Prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Edits the order with the specified id
     * @param integer $id <p>Order id</p>
     * @param string $userName <p>Customer's name</p>
     * @param string $userPhone <p>Customer's phone</p>
     * @param string $userComment <p>Customer's comment</p>
     * @param string $date <p>Order date</p>
     * @param integer $status <p>Status <i>(enabled "1", disabled "0")</i></p>
     * @return boolean <p>Result of the method execution</p>
     */
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        // Connect to the database
        $db = Db::getConnection();

        // Database query text
        $sql = "UPDATE product_order
            SET 
                user_name = :user_name, 
                user_phone = :user_phone, 
                user_comment = :user_comment, 
                date = :date, 
                status = :status 
            WHERE id = :id";

        // Get and return results. Prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}
