<?php

require_once 'Controller.php';

class HomeController extends Controller {
    private $carModel;

    public function __construct() {
        $this->carModel = $this->model('Car');
    }

    public function index() {
        $cars = $this->carModel->getCars();
        $data = [
            'title' => 'Welcome',
            'cars' => $cars
        ];
        $this->view('home/index', $data);
    }

    public function details($id) {
        $car = $this->carModel->getCarById($id);
        $data = [
            'title' => $car->brand . ' ' . $car->model,
            'car' => $car
        ];
        $this->view('home/details', $data);
    }
}
