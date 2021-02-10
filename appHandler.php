<?php

require_once './App.php';

if (isset($_POST['action'])) {
    $app = new App();
    $action = filter_input(INPUT_POST, "action");
    switch ($action) {
        case "DRIVER_DRIVES":
            $driver = filter_input(INPUT_POST, "driver", FILTER_VALIDATE_INT);
            echo json_encode($app->getDriverDrives($driver));
            break;
        case "CUSTOMER_RIDES":
            $customer = filter_input(INPUT_POST, "customer", FILTER_VALIDATE_INT);
            echo json_encode($app->getCustomerRides($customer));
            break;
        case "VEHICLE_LOG":
            $vehicle = filter_input(INPUT_POST, "vehicle", FILTER_VALIDATE_INT);
            $date = filter_input(INPUT_POST, "date");
            echo json_encode($app->getVehicle($vehicle, $date));
            break;
        default:
            http_response_code(400);
            exit;
            break;
    }
}