<?php
// A simple test script to check core functionality

// Load config
require_once 'config/config.php';
// Load helpers
require_once 'app/helpers/utils.php';
// Load libraries
require_once 'app/libraries/Database.php';
require_once 'app/models/Car.php';

echo "Running tests...\n";

// Test Database Connection
echo "Testing database connection...";
$db = new Database();
if ($db) {
    echo "Success!\n";
} else {
    echo "Failed!\n";
    exit;
}

// Test Car Model
echo "Testing Car Model - getCars()...";
$carModel = new Car();
$cars = $carModel->getCars();

if ($cars) {
    echo "Success! Found " . count($cars) . " cars.\n";
    // print_r($cars);
} else {
    echo "Failed or no cars found.\n";
}

// Test fetching a single car
echo "Testing Car Model - getCarById(1)...";
$car = $carModel->getCarById(1);
if ($car) {
    echo "Success! Found car: " . $car->brand . " " . $car->model . "\n";
    // print_r($car);
} else {
    echo "Failed to fetch car with ID 1.\n";
}

echo "\nTests finished.\n";
