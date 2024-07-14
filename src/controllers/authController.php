<?php
require_once dirname(__DIR__) . "\\models\\authModel.php";
Class AuthController {
    private $model;

    public function __construct($pdo) {
        $this->model = new AuthModel($pdo);
    }
    public function addOtpKey($key) {
        return $this->model->addOtpKey($key);
    }
    public function getOtpKey() {
        return $this->model->getOtpKey();
    }
    public function addTokenKey($key) {
        return $this->model->addTokenKey($key);
    }
    public function getTokenKey() {
        return $this->model->getTokenKey();
    }
    public function loginUser($email, $password, $role) {
        return $this->model->loginUser($email, $password, $role);
    }
}