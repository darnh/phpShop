<?php
    include_once ROOT . '/components/Db.php';
class Category
{
    public static function getCategoriesList(){

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM category ORDER BY sort_order ASC');
      //  $result = $db->query('SELECT id, name FROM categories ORDER BY sort_order ASC LIMIT 3');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }

    /*Return the category array for the list in the admin panel <br/>
     *(both enabled and disabled categories are included in the result)
     * return array <p>Category array</p>
     */
    public static function getCategoriesListAdmin()
    {
        //Database connection
        $db = Db::getConnection();

        //Database query
        $result = $db->query('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC');

        //Receipt and return of results
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Deletes the category with the given id
     * @param integer $id
     * @return boolean <p>Result of method execution</p>
     */
    public static function deleteCategoryById($id)
    {
        // Database connection
        $db = Db::getConnection();

        // Database query text
        $sql = 'DELETE FROM category WHERE id = :id';

        // Receive and return results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Editing a category with a specified id
     * @param integer $id <p>id categories</p>
     * @param string $name <p>Title</p>
     * @param integer $sortOrder <p>Serial number</p>
     * @param integer $status <p>Status <i>(included "1", off "0")</i></p>
     * @return boolean <p>Result of method execution</p>
     */
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        // Database connection
        $db = Db::getConnection();

        // Database query text
        $sql = "UPDATE category
            SET 
                name = :name, 
                sort_order = :sort_order, 
                status = :status
            WHERE id = :id";

        // Receive and return results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }


    /**
     * Returns the category with the specified id
     * @param integer $id <p>Category id</p>
     * @return array <p>Array with category information</p>
     */
    public static function getCategoryById($id)
    {
        // Connect to the database
        $db = Db::getConnection();

        // Database query text
        $sql = 'SELECT * FROM category WHERE id = :id';

        // Prepared query is used
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
     * Returns the textual explanation of the status for the category :<br/>
     * <i>0 - Hidden, 1 - Displayed</i>
     * @param integer $status <p>Status</p>
     * @return string <p>Textual explanation</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Displayed';
                break;
            case '0':
                return 'Hidden';
                break;
        }
    }

    /**
     * Adds a new category
     * @param string $name <p>Name</p>
     * @param integer $sortOrder <p>Order number</p>
     * @param integer $status <p>Status <i>(enabled "1", disabled "0")</i></p>
     * @return boolean <p>Result of adding a record to the table</p>
     */
    public static function createCategory($name, $sortOrder, $status)
    {
        // Connect to the database
        $db = Db::getConnection();

        // Database query text
        $sql = 'INSERT INTO category (name, sort_order, status) '
            . 'VALUES (:name, :sort_order, :status)';

        // Get and return results. Prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

}
