<?php
/*
if (!$this->pdo) {
    //echo "<h1>Connect Unsuccessful</h1>";
} else {
    //echo "<h1>Connect Successful</h1>";
    //print_r($this->pdo);
}*/
class UserModel
{
    // PREPARED STATEMENT TO PREVENT SQL INJECTION 
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    function createUserArtist($data, $id)
    {
        $this->addArtisKey(generateKey());
        $idKey = $this->pdo->lastInsertId();
        $keyEncrypt = $this->getArtisKeyByKeyId($idKey);
        foreach($data as $key => $value){
            if($key != 5){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        // Query INSERT untuk menyimpan data terenkripsi ke database
        $sql = '
        INSERT INTO artis (
            nama,
            tanggal_lahir,
            gender,
            asal_kota,
            no_hp,
            email,
            password,
            manager_id,
            two_step_auth
        ) VALUES (
            :nama,
            :tanggal_lahir,
            :gender,
            :asal_kota,
            :no_hp,
            :email,
            :password,
            :id,
            0
        )
        ';

        // Persiapkan statement
        $statement = $this->pdo->prepare($sql);

        // Binding parameter data terenkripsi ke query
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':nama', $data[0], PDO::PARAM_STR);
        $statement->bindParam(':tanggal_lahir', $data[1], PDO::PARAM_STR);
        $statement->bindParam(':gender', $data[2], PDO::PARAM_STR);
        $statement->bindParam(':asal_kota', $data[3], PDO::PARAM_STR);
        $statement->bindParam(':no_hp', $data[4], PDO::PARAM_STR);
        $statement->bindParam(':email', $data[5], PDO::PARAM_STR);
        $statement->bindParam(':password', $data[6], PDO::PARAM_STR);
        

        // Eksekusi query
        $statement->execute();
        $id = $this->pdo->lastInsertId();
        $this->updateArtisKey($idKey, $id);
        unset($keyEncrypt);
        return $id;
    }
    function createContractArtistManager($data){
        $this->addKontrakKey(generateKey());
        $idKey = $this->pdo->lastInsertId();
        $keyEncrypt = $this->getKontrakKeyByKeyId($idKey);
        foreach($data as $key => $value){
            if($key != "manager_id" && $key != "artis_id"){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        // Query INSERT untuk menyimpan data terenkripsi ke database
        $sql = '
        INSERT INTO kontrak (
            tanggal_awal,
            tanggal_akhir,
            deskripsi,
            manager_id,
            artis_id
        ) VALUES (
            :tanggal_awal,
            :tanggal_akhir,
            :deskripsi,
            :manager_id,
            :artis_id
        )
        ';

        // Persiapkan statement
        $statement = $this->pdo->prepare($sql);

        // Binding parameter data terenkripsi ke query
        $statement->bindParam(':tanggal_awal', $data['tanggal_awal'], PDO::PARAM_STR);
        $statement->bindParam(':tanggal_akhir', $data['tanggal_akhir'], PDO::PARAM_STR);
        $statement->bindParam(':deskripsi', $data['deskripsi'], PDO::PARAM_STR);
        $statement->bindParam(':manager_id', $data['manager_id'], PDO::PARAM_INT);
        $statement->bindParam(':artis_id', $data['artis_id'], PDO::PARAM_INT);
        

        // Eksekusi query
        $statement->execute();
        $id = $this->pdo->lastInsertId();
        $this->updateKontrakKey($idKey, $id);
        unset($keyEncrypt);
        return $id;
    }
    function createUserManager($data, $id)
    {
        $this->addManagerKey(generateKey());
        $idKey = $this->pdo->lastInsertId();
        $keyEncrypt = $this->getManagerKeyByKeyId($idKey);
        foreach($data as $key => $value){
            if($key != 5){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        // Query INSERT untuk menyimpan data terenkripsi ke database
        $sql = '
        INSERT INTO manager (
            nama,
            tanggal_lahir,
            gender,
            asal_kota,
            no_hp,
            email,
            password,
            admin_id,
            two_step_auth
        ) VALUES (
            :nama,
            :tanggal_lahir,
            :gender,
            :asal_kota,
            :no_hp,
            :email,
            :password,
            :id,
            0
        )
        ';

        // Persiapkan statement
        $statement = $this->pdo->prepare($sql);

        // Binding parameter data terenkripsi ke query
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':nama', $data[0], PDO::PARAM_STR);
        $statement->bindParam(':tanggal_lahir', $data[1], PDO::PARAM_STR);
        $statement->bindParam(':gender', $data[2], PDO::PARAM_STR);
        $statement->bindParam(':asal_kota', $data[3], PDO::PARAM_STR);
        $statement->bindParam(':no_hp', $data[4], PDO::PARAM_STR);
        $statement->bindParam(':email', $data[5], PDO::PARAM_STR);
        $statement->bindParam(':password', $data[6], PDO::PARAM_STR);
        

        // Eksekusi query
        $statement->execute();
        $id = $this->pdo->lastInsertId();
        $this->updateManagerKey($idKey, $id);
        unset($keyEncrypt);
        return $id;
    }
    function createUserAdmin()
    {
        $data = array(
            "nama"=>"Willy",
            "tanggal_lahir"=>"2000-06-22",
            "gender"=>"Laki-Laki",
            "asal_kota"=>"Surabaya",
            "no_hp"=>"089644334424",
            "email"=>"s160422011@student.ubaya.ac.id",
            "password"=>"yourpassword"
        );
        $this->addAdminKey(generateKey());
        $idKey = $this->pdo->lastInsertId();
        $keyEncrypt = $this->getAdminKeyByKeyId($idKey);
        foreach($data as $key => $value){
            if($key != "email"){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        // Query INSERT untuk menyimpan data terenkripsi ke database
        $sql = '
        INSERT INTO admin (
            nama,
            tanggal_lahir,
            gender,
            asal_kota,
            no_hp,
            email,
            password,
            two_step_auth
        ) VALUES (
            :nama,
            :tanggal_lahir,
            :gender,
            :asal_kota,
            :no_hp,
            :email,
            :password,
            0
        )
        ';

        // Persiapkan statement
        $statement = $this->pdo->prepare($sql);

        // Binding parameter data terenkripsi ke query
        $statement->bindParam(':nama', $data["nama"], PDO::PARAM_STR);
        $statement->bindParam(':tanggal_lahir', $data["tanggal_lahir"], PDO::PARAM_STR);
        $statement->bindParam(':gender', $data["gender"], PDO::PARAM_STR);
        $statement->bindParam(':asal_kota', $data["asal_kota"], PDO::PARAM_STR);
        $statement->bindParam(':no_hp', $data["no_hp"], PDO::PARAM_STR);    
        $statement->bindParam(':email', $data["email"], PDO::PARAM_STR);
        $statement->bindParam(':password', $data["password"], PDO::PARAM_STR);

        // Eksekusi query
        $statement->execute();
        $id = $this->pdo->lastInsertId();
        $this->updateAdminKey($idKey, $id);
        unset($keyEncrypt);
    }
    function createSchedule($data)
    {
        $this->addScheduleKey(generateKey());
        $idKey = $this->pdo->lastInsertId();
        $keyEncrypt = $this->getScheduleKeyByKeyId($idKey);
        foreach($data as $key => $value){
            $data[$key] = safeEncrypt($value, $keyEncrypt);
        }
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        // Query INSERT untuk menyimpan data terenkripsi ke database
        $sql = '
        INSERT INTO jadwal_acara (
            nama_acara,
            tanggal_waktu,
            lokasi,
            jenis_acara
        ) VALUES (
            :nama_acara,
            :tanggal_waktu,
            :lokasi,
            :jenis_acara
        )
        ';

        // Persiapkan statement
        $statement = $this->pdo->prepare($sql);

        // Binding parameter data terenkripsi ke query
        $statement->bindParam(':nama_acara', $data[0], PDO::PARAM_STR);
        $statement->bindParam(':tanggal_waktu', $data[1], PDO::PARAM_STR);
        $statement->bindParam(':lokasi', $data[2], PDO::PARAM_STR);
        $statement->bindParam(':jenis_acara', $data[3], PDO::PARAM_STR);
        

        // Eksekusi query
        $statement->execute();
        $id = $this->pdo->lastInsertId();
        $this->updateScheduleKey($idKey, $id);
        unset($keyEncrypt);
        return $id;
    }
    function deleteArtist($id)
    {
        $sql = '
        DELETE FROM artis_key WHERE artis_id = :id
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);
        
        $sql = '
        SELECT `id` FROM kontrak WHERE artis_id = :id
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);
        $idKontrak = $statement->fetch();

        $sql = '
        DELETE FROM kontrak_key WHERE id = :id
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $idKontrak['id'], PDO::PARAM_INT);
        $statement->execute(['id'=>$idKontrak['id']]);
        
        $sql = '
        DELETE FROM kontrak WHERE artis_id = :id
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);

        $sql = '
        DELETE FROM detail_acara WHERE artis_id = :id
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);

        $sql = '
        DELETE FROM artis WHERE id = :id
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);

        
    }
    function deleteManager($id)
    {
        $sql = '
        DELETE FROM manager_key WHERE manager_id = :id
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);

        $sql = '
        DELETE FROM manager WHERE id = :id
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);

    }
    function deleteSchedule($id)
    {
        $sql = '
        DELETE FROM acara_key WHERE jadwal_acara_id = :id
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);

        $sql = '
        DELETE FROM jadwal_acara WHERE id = :id
        ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id'=>$id]);

    }
    //LOGIN USER AUTHENTICATION
    function getUserByEmail($email)
    {
        // Prepare and execute the query for the artist table
        $statement = $this->pdo->prepare("SELECT id, password FROM artis WHERE email = :email LIMIT 1");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute(['email' => $email]);
        $artist = $statement->fetch();
        return $artist;
    }
    function getAdminByEmail($email)
    {
        // Prepare and execute the query for the admin table
        $statement = $this->pdo->prepare("SELECT * FROM admin WHERE email = :email LIMIT 1");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute(['email' => $email]);
        $admin = $statement->fetch();
        return $admin;
    }
    function getManagerByEmail($email)
    {
        // Prepare and execute the query for the manager table
        $statement = $this->pdo->prepare("SELECT * FROM manager WHERE email = :email LIMIT 1");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute(['email' => $email]);
        $manager = $statement->fetch();
        return $manager;
    }
    function loginUser($email, $password, $role)
    {
        $user_data = false;
        if ($role == "user") $user_data = $this->getUserByEmail($email);
        else if ($role == "manager") $user_data = $this->getManagerByEmail($email);
        else if ($role == "admin") $user_data = $this->getAdminByEmail($email);
        //echo "pass: " . $user_data['password'] . " $password"; // $2y$10$K3HroGvyF1P72QgCT.5DSeCyLU.nQsGRx5h9P
        if ($user_data && $password == $user_data['password']) {
            //echo"success";
            return $user_data["id"];
        }
        return false;
    }
    function addOtpKey($key)
    {
        $sql = '
            INSERT INTO otp_key (`key`) VALUES (:key)
            ';

            $statement = $this->pdo->prepare($sql);
            $statement->bindParam(':key', $key, PDO::PARAM_STR); 
            $statement->execute(["key"=> $key]);
    }
    function getOtpKey()
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM otp_key ORDER BY id DESC LIMIT 1");
        $statement->execute();
        $otpKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $otpKey['key'];
    }
    // 123456
    // GET DATA BY ID ETC
    function getAuthByID($id, $role)
    {
        // Prepare and execute the query for the artist table
        $statement = $this->pdo->prepare("SELECT two_step_auth FROM $role WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute(['id' => $id]);
        $artist = $statement->fetch();
        return $artist["two_step_auth"];
    }
    
    function getIdByEmail($email, $role)
    {
        // Prepare and execute the query for the artist table
        $statement = $this->pdo->prepare("SELECT id FROM $role WHERE email = :email LIMIT 1");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute(['email' => $email]);
        $artist = $statement->fetch();
        return $artist["id"];
    }
    function getEmailById($id, $role)
    {
        // Prepare and execute the query for the artist table
        $statement = $this->pdo->prepare("SELECT email FROM $role WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute(['id' => $id]);
        $artist = $statement->fetch();
        return $artist["email"];
    }
    function addArtisKey($key)
    {
        $sql = '
        INSERT INTO artis_key (`key`) VALUES (:key)
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':key', $key, PDO::PARAM_STR);
        $statement->execute(["key" => $key]); // Pass an array with both bindings
    }
    function updateArtisKey($idKey, $id)
    {
        $sql = 'UPDATE artis_key SET `artis_id` = :id WHERE `id` = :idKey';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':idKey', $idKey, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter for ':id'
        $statement->execute(["idKey" => $idKey, "id" => $id]); // Pass an array with both bindings
    }
    function getArtisKeyByKeyId($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM artis_key WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $artisKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $artisKey['key'];
    }
    function getArtisKey($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM artis_key WHERE artis_id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $artisKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $artisKey['key'];
    }

    function addKontrakKey($key)
    {
        $sql = '
        INSERT INTO kontrak_key (`key`) VALUES (:key)
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':key', $key, PDO::PARAM_STR);
        $statement->execute(["key" => $key]); // Pass an array with both bindings
    }
    function updateKontrakKey($idKey, $id)
    {
        $sql = 'UPDATE kontrak_key SET `kontrak_id` = :id WHERE `id` = :idKey';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':idKey', $idKey, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter for ':id'
        $statement->execute(["idKey" => $idKey, "id" => $id]); // Pass an array with both bindings
    }
    function getKontrakKeyByKeyId($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM kontrak_key WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $kontrakKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $kontrakKey['key'];
    }
    function getKontrakKey($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM kontrak_key WHERE kontrak_id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $kontrakKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $kontrakKey['key'];
    }
    function addManagerKey($key)
    {
        $sql = '
        INSERT INTO manager_key (`key`) VALUES (:key)
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':key', $key, PDO::PARAM_STR);
        $statement->execute(["key" => $key]); // Pass an array with both bindings
    }
    function updateManagerKey($idKey, $id)
    {
        $sql = 'UPDATE manager_key SET `manager_id` = :id WHERE `id` = :idKey';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':idKey', $idKey, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter for ':id'
        $statement->execute(["idKey" => $idKey, "id" => $id]); // Pass an array with both bindings
    }
    function getManagerKeyByKeyId($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM manager_key WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $managerKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $managerKey['key'];
    }
    function getManagerKey($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM manager_key WHERE manager_id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $managerKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $managerKey['key'];
    }
    function addScheduleKey($key)
    {
        $sql = '
        INSERT INTO acara_key (`key`) VALUES (:key)
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':key', $key, PDO::PARAM_STR);
        $statement->execute(["key" => $key]); // Pass an array with both bindings
    }
    function updateScheduleKey($idKey, $id)
    {
        $sql = 'UPDATE acara_key SET `jadwal_acara_id` = :id WHERE `id` = :idKey';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':idKey', $idKey, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter for ':id'
        $statement->execute(["idKey" => $idKey, "id" => $id]); // Pass an array with both bindings
    }
    function getScheduleKeyByKeyId($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM acara_key WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $acaraKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $acaraKey['key'];
    }
    function getScheduleKey($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM acara_key WHERE jadwal_acara_id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $managerKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $managerKey['key'];
    }
    function getManagerById($id){
        $statement = $this->pdo->prepare("SELECT `nama`, `tanggal_lahir`, `gender`, `asal_kota`, `no_hp`, `email` FROM manager WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $manager = $statement->fetch(PDO::FETCH_ASSOC);
        $keyEncrypt = $this->getManagerKey($id);
        foreach($manager as $key => $value){
            if($key != "email"){
                //echo $key . " " . $value;
                //echo $values[$key] . " " . $value;
                $manager[$key] = safeDecrypt($manager[$key], $keyEncrypt);
            }
        }
        return $manager;
    }
    function getAdminById($id){
        $statement = $this->pdo->prepare("SELECT `nama`, `tanggal_lahir`, `gender`, `asal_kota`, `no_hp`, `email` FROM admin WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $manager = $statement->fetch(PDO::FETCH_ASSOC);
        $keyEncrypt = $this->getAdminKey($id);
        foreach($manager as $key => $value){
            if($key != "email"){
                //echo $key . " " . $value;
                //echo $values[$key] . " " . $value;
                $manager[$key] = safeDecrypt($manager[$key], $keyEncrypt);
            }
        }
        return $manager;
    }
    function updateManagerById($id, $data){
        $stmt = $this->pdo->prepare("UPDATE manager 
                       SET 
                           nama = :nama_baru, 
                           tanggal_lahir = :tanggal_lahir_baru, 
                           gender = :gender_baru, 
                           asal_kota = :asal_kota_baru, 
                           no_hp = :no_hp_baru, 
                           email = :email_baru 
                       WHERE 
                           id = :id");
        $keyEncrypt = $this->getManagerKey($id);
        foreach($data as $key => $value){
            if($key != 5){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        // Bind parameters
        $stmt->bindParam(':nama_baru', $data[0]);
        $stmt->bindParam(':tanggal_lahir_baru', $data[1]);
        $stmt->bindParam(':gender_baru', $data[2]);
        $stmt->bindParam(':asal_kota_baru', $data[3]);
        $stmt->bindParam(':no_hp_baru', $data[4]);
        $stmt->bindParam(':email_baru', $data[5]);
        $stmt->bindParam(':id', $id);

        // Execute statement
        $stmt->execute();
    }
    function updateManagerAuthById($id, $data){
        $stmt = $this->pdo->prepare("UPDATE manager 
                       SET 
                           nama = :nama_baru, 
                           tanggal_lahir = :tanggal_lahir_baru, 
                           gender = :gender_baru, 
                           asal_kota = :asal_kota_baru, 
                           no_hp = :no_hp,
                           email = :email_baru,
                           two_step_auth = :auth
                       WHERE 
                           id = :id");
        $keyEncrypt = $this->getManagerKey($id);
        foreach($data as $key => $value){
            if($key != 3 && $key != 6){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        // Bind parameters
        $stmt->bindParam(':nama_baru', $data[0]);
        $stmt->bindParam(':tanggal_lahir_baru', $data[1]);
        $stmt->bindParam(':gender_baru', $data[2]);
        $stmt->bindParam(':asal_kota_baru', $data[4]);
        $stmt->bindParam(':no_hp', $data[5]);
        $stmt->bindParam(':email_baru', $data[6]);
        $stmt->bindParam(':auth', $data[3]);
        $stmt->bindParam(':id', $id);

        // Execute statement
        $stmt->execute();
    }
    function updateAdminAuthById($id, $data){
        $stmt = $this->pdo->prepare("UPDATE admin 
                       SET 
                           nama = :nama_baru, 
                           tanggal_lahir = :tanggal_lahir_baru, 
                           gender = :gender_baru, 
                           asal_kota = :asal_kota_baru, 
                           no_hp = :no_hp,
                           email = :email_baru,
                           two_step_auth = :auth
                       WHERE 
                           id = :id");
        $keyEncrypt = $this->getAdminKey($id);
        foreach($data as $key => $value){
            if($key != 3 && $key != 6){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        // Bind parameters
        $stmt->bindParam(':nama_baru', $data[0]);
        $stmt->bindParam(':tanggal_lahir_baru', $data[1]);
        $stmt->bindParam(':gender_baru', $data[2]);
        $stmt->bindParam(':asal_kota_baru', $data[4]);
        $stmt->bindParam(':no_hp', $data[5]);
        $stmt->bindParam(':email_baru', $data[6]);
        $stmt->bindParam(':auth', $data[3]);
        $stmt->bindParam(':id', $id);

        // Execute statement
        $stmt->execute();
    }
    function updateArtisAuthById($id, $data){
        $stmt = $this->pdo->prepare("UPDATE artis
                       SET 
                           nama = :nama_baru, 
                           tanggal_lahir = :tanggal_lahir_baru, 
                           gender = :gender_baru, 
                           asal_kota = :asal_kota_baru, 
                           no_hp = :no_hp,
                           email = :email_baru,
                           two_step_auth = :auth
                       WHERE 
                           id = :id");
        $keyEncrypt = $this->getArtisKey($id);
        foreach($data as $key => $value){
            if($key != 3 && $key != 6){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        // Bind parameters
        $stmt->bindParam(':nama_baru', $data[0]);
        $stmt->bindParam(':tanggal_lahir_baru', $data[1]);
        $stmt->bindParam(':gender_baru', $data[2]);
        $stmt->bindParam(':asal_kota_baru', $data[4]);
        $stmt->bindParam(':no_hp', $data[5]);
        $stmt->bindParam(':email_baru', $data[6]);
        $stmt->bindParam(':auth', $data[3]);
        $stmt->bindParam(':id', $id);

        // Execute statement
        $stmt->execute();
    }
    function updateContractArtisManager($data){
        $stmt = $this->pdo->prepare("UPDATE kontrak
                       SET 
                        tanggal_awal = :tanggal_awal,
                        tanggal_akhir = :tanggal_akhir,
                        deskripsi = :deskripsi,
                        manager_id = :manager_id,
                        artis_id = :artis_id
                       WHERE 
                           id = :id");
        $keyEncrypt = $this->getKontrakKey($data['id']);
        foreach($data as $key => $value){
            if($key != 'id' && $key != "manager_id" && $key != "artis_id"){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        // Bind parameters
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':tanggal_awal', $data['tanggal_awal']);
        $stmt->bindParam(':tanggal_akhir', $data['tanggal_akhir']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':manager_id', $data['manager_id']);
        $stmt->bindParam(':artis_id', $data['artis_id']);

        // Execute statement
        $stmt->execute();
    }
    function getArtisById($id){
        $statement = $this->pdo->prepare("SELECT `nama`, `tanggal_lahir`, `gender`, `asal_kota`, `no_hp`, `email` FROM artis WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $artis = $statement->fetch(PDO::FETCH_ASSOC);
        $keyEncrypt = $this->getArtisKey($id);
        foreach($artis as $key => $value){
            if($key != "email"){
                //echo $key . " " . $value;
                //echo $values[$key] . " " . $value;
                $artis[$key] = safeDecrypt($artis[$key], $keyEncrypt);
            }
        }
        //print_r($artis);
        return $artis;
    }
    function updateArtisById($id, $data){
        $stmt = $this->pdo->prepare("UPDATE artis
                       SET 
                           nama = :nama_baru, 
                           tanggal_lahir = :tanggal_lahir_baru, 
                           gender = :gender_baru, 
                           asal_kota = :asal_kota_baru, 
                           no_hp = :no_hp_baru, 
                           email = :email_baru 
                       WHERE 
                           id = :id");
        $keyEncrypt = $this->getArtisKey($id);
        foreach($data as $key => $value){
            if($key != 5){
                $data[$key] = safeEncrypt($value, $keyEncrypt);
                //$data[$key] = safeDecrypt($data[$key], $keyEncrypt);
            }
        }
        // Bind parameters
        $stmt->bindParam(':nama_baru', $data[0]);
        $stmt->bindParam(':tanggal_lahir_baru', $data[1]);
        $stmt->bindParam(':gender_baru', $data[2]);
        $stmt->bindParam(':asal_kota_baru', $data[3]);
        $stmt->bindParam(':no_hp_baru', $data[4]);
        $stmt->bindParam(':email_baru', $data[5]);
        $stmt->bindParam(':id', $id);

        // Execute statement
        $stmt->execute();
    }
    function getKontrakByArtisId($id){
        $statement = $this->pdo->prepare("select k.id, a.nama as 'nama_artis', m.nama as 'nama_manager', k.tanggal_awal, k.tanggal_akhir, k.deskripsi, k.artis_id, k.manager_id from kontrak k inner join artis a on k.artis_id = a.id inner join manager m on k.manager_id = m.id where a.id = :id;");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $kontrak = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $keyEncrypt = $this->getKontrakKey($kontrak[0]['id']);
        foreach($kontrak as $keys => $values){
            foreach($values as $key => $value){
                if($key != "id" && $key != "nama_artis" && $key != "nama_manager" && $key != "artis_id" && $key != "manager_id"){
                    //echo $key . " " . $value;
                    //echo $values[$key] . " " . $value;
                    $values[$key] = safeDecrypt($values[$key], $keyEncrypt);
                }
            }
            $kontrak[$keys] = $values;
            $kontrak[$keys]["nama_artis"] = safeDecrypt($kontrak[$keys]["nama_artis"], $this->getArtisKey($kontrak[$keys]['artis_id']));
            $kontrak[$keys]["nama_manager"] = safeDecrypt($kontrak[$keys]["nama_manager"], $this->getManagerKey($kontrak[$keys]['manager_id']));
        }
        return $kontrak;
    }
    function getKontrakByManagerId($id){
        $statement = $this->pdo->prepare("select k.id, a.nama as 'nama_artis', m.nama as 'nama_manager', k.tanggal_awal, k.tanggal_akhir, k.deskripsi, k.artis_id, k.manager_id from kontrak k inner join artis a on k.artis_id = a.id inner join manager m on k.manager_id = m.id where m.id = :id;");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $kontraks = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($kontraks as $keys => $values){
            $keyEncrypt = $this->getKontrakKey($kontraks[$keys]["id"]);
            //echo $keyEncrypt." PEMISAH ";
            foreach($values as $key => $value){
                if($key != "id" && $key != "nama_artis" && $key != "nama_manager" && $key != "artis_id" && $key != "manager_id"){
                    //echo $key . " " . $value;
                    //echo $values[$key] . " " . $value;
                    $values[$key] = safeDecrypt($values[$key], $keyEncrypt);
                }
            }
            $kontraks[$keys] = $values;
            $kontraks[$keys]['nama_artis'] = safeDecrypt($kontraks[$keys]['nama_artis'], $this->getArtisKey($kontraks[$keys]['artis_id']));
            $kontraks[$keys]['nama_manager'] = safeDecrypt($kontraks[$keys]['nama_manager'], $this->getManagerKey($kontraks[$keys]['manager_id']));
        }
        return $kontraks;
    }
    function addAdminKey($key)
    {
        $sql = '
        INSERT INTO admin_key (`key`) VALUES (:key)
        ';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':key', $key, PDO::PARAM_STR);
        $statement->execute(["key" => $key]); // Pass an array with both bindings
    }
    function updateAdminKey($idKey, $id)
    {
        $sql = 'UPDATE admin_key SET `admin_id` = :id WHERE `id` = :idKey';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':idKey', $idKey, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT); // Bind parameter for ':id'
        $statement->execute(["idKey" => $idKey, "id" => $id]); // Pass an array with both bindings
    }
    function getAdminKeyByKeyId($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM admin_key WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $artisKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $artisKey['key'];
    }
    function getAdminKey($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM admin_key WHERE admin_id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $artisKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $artisKey['key'];
    }

    function getArtisData()
    {
        $sql = "SELECT a.id, m.id as id_manager, a.nama as nama_artis,  a.tanggal_lahir, a.gender, a.asal_kota, a.no_hp as hp_artis, a.email, m.nama as nama_manager, m.no_hp as hp_manager
                FROM artis a
                INNER JOIN manager m
                ON a.manager_id = m.id
                ORDER BY nama_artis ASC;";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $artists = $statement->fetchAll(PDO::FETCH_ASSOC);
        //echo "<pre>";
        //print_r($artists);
        //echo "</pre>";
        foreach($artists as $keys => $values){
            $keyEncrypt = $this->getArtisKey($artists[$keys]["id"]);
            //echo $keyEncrypt." PEMISAH ";
            foreach($values as $key => $value){
                if($key != "id" && $key != "id_manager" && $key != "nama_manager" && $key != "hp_manager" && $key != "email"){
                    //echo $key . " " . $value;
                    //echo $values[$key] . " " . $value;
                    $values[$key] = safeDecrypt($values[$key], $keyEncrypt);
                }
            }
            $artists[$keys] = $values;
            $artists[$keys]['nama_manager'] = safeDecrypt($artists[$keys]['nama_manager'], $this->getManagerKey($artists[$keys]['id_manager']));
            $artists[$keys]['hp_manager'] = safeDecrypt($artists[$keys]['hp_manager'], $this->getManagerKey($artists[$keys]['id_manager']));
        }
        return $artists;
    }

    function getArtisDataByManager($id){
        $sql = "SELECT a.id as id, a.nama as nama_artis, a.tanggal_lahir, a.gender, a.asal_kota, a.no_hp as hp_artis, 
                a.email, m.nama as nama_manager, m.no_hp as hp_manager
                FROM artis a
                INNER JOIN manager m
                ON a.manager_id = $id
                ORDER BY a.id ASC";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $artist = $statement->fetchAll(PDO::FETCH_ASSOC);
        //echo "<pre>";
        //print_r($artist);
        //echo "</pre>";
        //echo "<pre>";
        //print_r($artist[0]);
        //echo "</pre>";
        
        foreach($artist as $keys => $values){
            $keyEncrypt = $this->getArtisKey($artist[$keys]["id"]);
            //echo $keyEncrypt." PEMISAH ";
            foreach($values as $key => $value){
                if($key != "id" && $key != "manager_id" && $key != "two_step_auth" &&  $key != "nama_manager" &&  $key != "hp_manager" && $key != "email"){
                    //echo $key . " " . $value;
                    //echo $values[$key] . " " . $value;
                    $values[$key] = safeDecrypt($values[$key], $keyEncrypt);
                }
            }
            $artist[$keys] = $values;
        }
        //echo "<pre>";
        //print_r($artist);
        //echo "</pre>";
        return $artist;
    }
    function getManagerDataByAdmin($id){
        $sql = "SELECT m.id as id, m.nama as nama_manager, m.tanggal_lahir, m.gender, m.asal_kota, m.no_hp as hp_manager, 
                m.email, a.nama as nama_admin, a.no_hp as hp_admin
                FROM manager m
                INNER JOIN admin a
                ON m.admin_id = a.id
                WHERE a.id = $id
                ORDER BY m.id ASC";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $managers = $statement->fetchAll(PDO::FETCH_ASSOC);
        //echo "<pre>";
        //print_r($managers);
        //echo "</pre>";
        //echo "<pre>";
        //print_r($artist[0]);
        //echo "</pre>";
        
        foreach($managers as $keys => $values){
            $keyEncrypt = $this->getManagerKey($managers[$keys]["id"]);
            //echo $keyEncrypt." PEMISAH ";
            foreach($values as $key => $value){
                if($key != "id" && $key != "admin_id" && $key != "two_step_auth" &&  $key != "nama_admin" &&  $key != "hp_admin" && $key != "email"){
                    //echo $key . " " . $value;
                    //echo $values[$key] . " " . $value;
                    $values[$key] = safeDecrypt($values[$key], $keyEncrypt);
                }
            }
            $managers[$keys] = $values;
        }
        //echo "<pre>";
        //print_r($artist);
        //echo "</pre>";
        return $managers;
    }
    function getManagerNameById($id){
        $statement = $this->pdo->prepare("SELECT `nama` FROM manager WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id' => $id]);
        $manager = $statement->fetch();

        $manager['nama'] = safeDecrypt($manager['nama'], $this->getManagerKey($id));
        //$manager['nama'] = safeDecrypt($manager['nama'], $this->getManagerKey());
        return $manager['nama'];
    }
    function getArtisNameById($id){
        $statement = $this->pdo->prepare("SELECT `nama` FROM artis WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id' => $id]);
        $artis = $statement->fetch();

        $artis['nama'] = safeDecrypt($artis['nama'], $this->getArtisKey($id));
        //$manager['nama'] = safeDecrypt($manager['nama'], $this->getManagerKey());
        return $artis['nama'];
    }
    function getAdminNameById($id){
        $statement = $this->pdo->prepare("SELECT `nama` FROM admin WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute(['id' => $id]);
        $admin = $statement->fetch();

        $admin['nama'] = safeDecrypt($admin['nama'], $this->getAdminKey($id));
        //$manager['nama'] = safeDecrypt($manager['nama'], $this->getManagerKey());
        return $admin['nama'];
    }
    function GetScheduleByManager(){
        $sql = "SELECT ar.nama as nama_artis, ja.nama_acara, je.nama as jenis_acara, ja.tanggal_waktu, ja. lokasi, da.keterangan
                FROM detail_acara as da 
                INNER JOIN artis as ar
                ON da.artis_id = ar.id
                INNER JOIN jadwal_acara as ja
                ON da.jadwal_acara_id = ja.id
                INNER JOIN jenis_acara as je
                ON ja.jenis_acara_id = je.id
                ORDER BY nama_artis ASC";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $schedule = $statement->fetch(PDO::FETCH_ASSOC);
        return $schedule;
    }

    function GetScheduleByArtis($id){
        $sql = "select d.jadwal_acara_id, j.nama_acara, j.tanggal_waktu, j.lokasi, j.jenis_acara from detail_acara d inner join jadwal_acara j on j.id = d.jadwal_acara_id where d.artis_id = :id;";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute(['id' => $id]);
        $schedules = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($schedules as $keys => $values){
            $keyEncrypt = $this->getScheduleKey($schedules[$keys]["jadwal_acara_id"]);
            //echo $keyEncrypt." PEMISAH ";
            foreach($values as $key => $value){
                if($key != "jadwal_acara_id"){
                    //echo $key . " " . $value;
                    //echo $values[$key] . " " . $value;
                    $values[$key] = safeDecrypt($values[$key], $keyEncrypt);
                }
            }
            $schedules[$keys] = $values;
        }
        return $schedules;
    }
    function getSchedule(){
        $sql = "SELECT * 
                FROM jadwal_acara
                ORDER BY id ASC";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $schedules = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($schedules as $keys => $values){
            $keyEncrypt = $this->getScheduleKey($schedules[$keys]["id"]);
            //echo $keyEncrypt." PEMISAH ";
            foreach($values as $key => $value){
                if($key != "id"){
                    //echo $key . " " . $value;
                    //echo $values[$key] . " " . $value;
                    $values[$key] = safeDecrypt($values[$key], $keyEncrypt);
                }
            }
            $schedules[$keys] = $values;
        }
        //echo "<pre>";
        //print_r($artist);
        //echo "</pre>";
        return $schedules;
    }
    function showContractArtistSide($email){
        $sql = "SELECT ar.nama as nama_artis, ma.nama as nama_manager, k.tanggal_awal, k.tanggal_akhir, k.deskripsi
                FROM kontrak k 
                INNER JOIN artis ar ON k.artis_id = a.id 
                INNER JOIN manager ma ON k.manager_id = ma.id
                WHERE ar.email = $email";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $contract = $statement->fetch();
        return $contract;
    }

    function showContractManagerSide($id){
        $sql = "SELECT ar.nama nama_artis, ma.nama nama_manager, k.tanggal_awal, k.tanggal_akhir, k.deskripsi
                FROM kontrak k 
                INNER JOIN artis ar ON k.artis_id = ar.id 
                INNER JOIN manager ma ON k.manager_id = ma.id
                WHERE ma.id = $id
                ORDER BY nama_artis ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $contract = $statement->fetch();
        return $contract;
    }

    function showContractAdminSide($email){
        $sql = "SELECT ma.nama as nama_manager, a.nama as nama_admin, k.tanggal_awal, k.tanggal_akhir, k.deskripsi
                FROM kontrak k 
                INNER JOIN manager ma ON k.manager_id = ma.id
                INNER JOIN admin a ON ma.admin_id = a.id
                WHERE a.email = $email
                ORDER BY nama_manager ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $contract = $statement->fetch();
        return $contract;
    }
    function addScheduleDetail($idJadwal, $idArtist){
        $sql = "insert into detail_acara(jadwal_acara_id, artis_id) values (:idJadwal, :idArtist)";
        // Persiapkan statement
        $statement = $this->pdo->prepare($sql);

        // Binding parameter data terenkripsi ke query
        $statement->bindParam(':idJadwal', $idJadwal, PDO::PARAM_INT);
        $statement->bindParam(':idArtist', $idArtist, PDO::PARAM_INT);
        
        // Eksekusi query
        $statement->execute();
    }
}
