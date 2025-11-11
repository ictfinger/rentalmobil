<?php

require_once 'Controller.php';

class BookingsController extends Controller {
    private $carModel;
    private $userModel;
    private $bookingModel;

    public function __construct() {
        $this->carModel = $this->model('Car');
        $this->userModel = $this->model('User');
        $this->bookingModel = $this->model('Booking');
    }

    public function book($car_id) {
        $car = $this->carModel->getCarById($car_id);
        $data = [
            'car' => $car
        ];
        $this->view('bookings/book', $data);
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Customer data
            $userData = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'phone_number' => trim($_POST['phone']),
                'password' => password_hash('password', PASSWORD_DEFAULT) // Dummy password for now
            ];

            // Register customer if not exists
            if (!$this->userModel->findUserByEmail($userData['email'])) {
                $this->userModel->register($userData);
            }

            // Get customer id (this is a simplified approach)
            // A more robust solution would be to get the last inserted id or query by email
            $user = $this->userModel->findUserByEmail($userData['email']);
            $userId = $user->id;


            // Booking data
            $car = $this->carModel->getCarById($_POST['car_id']);
            $startDate = new DateTime($_POST['start_date']);
            $endDate = new DateTime($_POST['end_date']);
            $days = $endDate->diff($startDate)->format("%a");
            $totalPrice = $days * $car->price_per_day;

            $bookingData = [
                'customer_id' => $userId,
                'car_id' => $_POST['car_id'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'total_price' => $totalPrice
            ];

            // Create booking
            if ($this->bookingModel->createBooking($bookingData)) {
                // For now, just a success message
                echo 'Booking successful!';
            } else {
                die('Something went wrong');
            }
        } else {
            // Redirect to home if not a POST request
            header('Location: ' . URLROOT);
        }
    }
}
