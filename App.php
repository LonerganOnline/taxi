<?php

/**
 * @author Mark
 */
include_once './Database.php';

class App {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->open();
    }

    public function getDrivers() {
        $stm = $this->conn->prepare("SELECT d.*, l.name AS license FROM driver AS d LEFT JOIN license AS l ON d.license = l.id");
        $stm->execute();

        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getDriverDrives($id) {
        $stm = $this->conn->prepare("SELECT CONCAT(d.first_name, ' ', d.last_name) AS driver, CONCAT(c.first_name, ' ', c.last_name) AS customer, r.time FROM ride AS r JOIN driver AS d ON r.driver_id = d.id JOIN customer AS c ON r.customer_id = c.id WHERE d.id=:id");
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getCustomers() {
        $stm = $this->conn->prepare("SELECT * FROM customer AS c");
        $stm->execute();

        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    } 

    public function getCustomerRides($id) {
        $stm = $this->conn->prepare("SELECT CONCAT(c.first_name, ' ', c.last_name) AS customer,CONCAT(d.first_name, ' ', d.last_name) AS driver, r.time FROM ride AS r JOIN driver AS d ON r.driver_id = d.id JOIN customer AS c ON r.customer_id = c.id WHERE c.id=:id");
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();

        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }

    public function getVehicles() {
        $stm = $this->conn->prepare("SELECT * FROM vehicle");
        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function getVehicle($id, $date) {
        $sql = "SELECT v.name, CONCAT(d.first_name, ' ', d.last_name) AS driver, dv.date FROM vehicle AS v JOIN driver_vehicle AS dv ON dv.vehicle_id = v.id JOIN driver AS d on d.id = dv.driver_id where v.id=:id";
        $sql = $date == "" ? $sql : $sql . " AND dv.date=:date";
        $stm = $this->conn->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        if($date != "") {
            $stm->bindParam(':date', $date, PDO::PARAM_STR);
        }  
        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
