<?php

class Operations
{
    public static function getProducts()
    {
        $conn = Database::getConnect();
        $sql = "SELECT * FROM `products` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    public static function getProductChecker($conn)
    {
        $sql = "SELECT * FROM `products` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    public static function getGallery($conn)
    {
        $sql = "SELECT * FROM `gallery` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }

    public static function getProductPage($page, $conn)
    {
        $sql = "SELECT * FROM `products` WHERE `category` = '$page'";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    
    public static function getProduct($conn)
    {
        $getID = $_GET['edit_id'];
        $sql = "SELECT * FROM `products` WHERE `id` = '$getID'";
        $result = $conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }

    public static function getSingleProduct()
    {
        $getData = $_GET['data'];
        $conn = Database::getConnect();
        $sql = "SELECT * FROM `products` WHERE `category` = '$getData'";
        $result = $conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }
}

?>