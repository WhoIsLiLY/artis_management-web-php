<?php
require_once dirname(__DIR__) . "\\models\\userModel.php";
Class UserController {
    private $model;

    public function __construct($pdo) {
        $this->model = new UserModel($pdo);
    }

    public function createUserArtist($data, $id) {
        return $this->model->createUserArtist($data, $id);
    }
    public function createContractArtistManager($data) {
        return $this->model->createContractArtistManager($data);
    }
    public function updateContractArtisManager($data) {
        return $this->model->updateContractArtisManager($data);
    }
    public function createUserManager($data, $id) {
        return $this->model->createUserManager($data, $id);
    }
    public function createUserAdmin() {
        return $this->model->createUserAdmin();
    }
    public function createSchedule($data){
        return $this->model->createSchedule($data);
    }
    public function deleteArtist($id) {
        return $this->model->deleteArtist($id);
    }
    public function deleteManager($id) {
        return $this->model->deleteManager($id);
    }
    public function deleteSchedule($id) {
        return $this->model->deleteSchedule($id);
    }
    public function getIdByEmail($email, $role){
        return $this->model->getIdByEmail($email, $role);
    }
    public function getEmailById($id, $role){
        return $this->model->getEmailById($id, $role);
    }
    public function getArtisKey($id) {
        return $this->model->getArtisKey($id);
    }
    public function getKontrakKey($id) {
        return $this->model->getKontrakKey($id);
    }
    public function getManagerKey($id) {
        return $this->model->getManagerKey($id);
    }
    public function getAdminKey($id) {
        return $this->model->getAdminKey($id);
    }
    public function getAdminById($id){
        return $this->model->getAdminById($id);
    }
    public function getManagerById($id){
        return $this->model->getManagerById($id);
    }
    public function updateManagerById($id, $data){
        return $this->model->updateManagerById($id, $data);
    }
    public function updateManagerAuthById($id, $data){
        return $this->model->updateManagerAuthById($id, $data);
    }
    public function updateAdminAuthById($id, $data){
        return $this->model->updateAdminAuthById($id, $data);
    }
    public function updateArtisAuthById($id, $data){
        return $this->model->updateArtisAuthById($id, $data);
    }
    public function getArtisById($id){
        return $this->model->getArtisById($id);
    }
    public function updateArtisById($id, $data){
        return $this->model->updateArtisById($id, $data);
    }

    public function getArtisData(){
        return $this->model->getArtisData();
    }
    public function getArtisDataByManager($id){
        return $this->model->getArtisDataByManager($id);
    }
    public function getManagerDataByAdmin($id){
        return $this->model->getManagerDataByAdmin($id);
    }
    public function getSchedule(){
        return $this->model->getSchedule();
    }
    public function getScheduleByArtis($id){
        return $this->model->GetScheduleByArtis($id);
    }
    public function getScheduleByManager($id){
        return $this->model->getArtisDataByManager($id);
    }
    public function getArtisNameById($id){
        return $this->model->getArtisNameById($id);
    }
    public function getManagerNameById($id){
        return $this->model->getManagerNameById($id);
    }
    public function getAdminNameById($id){
        return $this->model->getAdminNameById($id);
    }
    public function getAuth($id, $role) {
        return $this->model->getAuthByID($id, $role);
    }

    public function showContractArtistSide($email){
        return $this->model->showContractArtistSide($email);
    }

    public function showContractManagerSide($id){
        return $this->model->showContractManagerSide($id);
    }

    public function showContractAdminSide($email){
        return $this->model->showContractAdminSide($email);
    }
    public function getKontrakByArtisId($id){
        return $this->model->getKontrakByArtisId($id);
    }
    public function getKontrakByManagerId($id){
        return $this->model->getKontrakByManagerId($id);
    }
    public function addScheduleDetail($idJadwal, $idArtist){
        return $this->model->addScheduleDetail($idJadwal, $idArtist);
    }
}