<?php
require_once("./connect_db.php");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['stu_id'])) {
        $id=$_GET['stu_id'];
        
        global $con;
        $stmt = $con->prepare('DELETE FROM students WHERE id=?');
        $stmt->execute(array($id));

        header('location:index.php');
    }
}