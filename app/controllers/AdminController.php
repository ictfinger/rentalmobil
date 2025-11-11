<?php

require_once 'Controller.php';

class AdminController extends Controller {
    private $carModel;

    public function __construct() {
        $this->carModel = $this->model('Car');
    }

    public function index() {
        $this->view('admin/index');
    }

    public function cars() {
        $cars = $this->carModel->getCars();
        $data = [
            'cars' => $cars
        ];
        $this->view('admin/cars', $data);
    }
}
