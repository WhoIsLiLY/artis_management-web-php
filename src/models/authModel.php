<?php
/*
if (!$this->pdo) {
    //echo "<h1>Connect Unsuccessful</h1>";
} else {
    //echo "<h1>Connect Successful</h1>";
    //print_r($this->pdo);
}*/
class AuthModel
{
    // PREPARED STATEMENT TO PREVENT SQL INJECTION 
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
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
    function getArtisKey($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM artis_key WHERE artis_id = :id LIMIT 1");
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
    function getManagerKey($id)
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM manager_key WHERE manager_id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $managerKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $managerKey['key'];
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
        if ($role == "user")
        {
            $user_data = $this->getUserByEmail($email);
            if($user_data){
                $user_data['password'] = safeDecrypt($user_data['password'], $this->getArtisKey($user_data['id']));
                if ($user_data && $password == $user_data['password']) {
                    return $user_data["id"];
                }
            }else return false;
        }
        else if ($role == "manager") 
        {
            $user_data = $this->getManagerByEmail($email);
            if($user_data){
                $user_data['password'] = safeDecrypt($user_data['password'], $this->getManagerKey($user_data['id']));
                if ($user_data && $password == $user_data['password']) {
                    return $user_data["id"];
                }
            }else return false;
        }
        else if ($role == "admin") 
        {
            $user_data = $this->getAdminByEmail($email);
            if($user_data){
                $user_data['password'] = safeDecrypt($user_data['password'], $this->getAdminKey($user_data['id']));
                if ($user_data && $password == $user_data['password']) {
                    return $user_data["id"];
                }
            }else return false;
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

    function addTokenKey($key)
    {
        $sql = '
            INSERT INTO token_key (`key`) VALUES (:key)
            ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':key', $key, PDO::PARAM_STR);
        $statement->execute(["key"=> $key]);
    }
    function getTokenKey()
    {
        $statement = $this->pdo->prepare("SELECT `key` FROM token_key ORDER BY id DESC LIMIT 1");
        $statement->execute();
        $tokenKey = $statement->fetch(PDO::FETCH_ASSOC);
        return $tokenKey['key'];
    }
    function deleteTokenKey($id)
    {
        $sql = '
            DELETE FROM token_key WHERE artist_id = :id;
            ';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR); 
        $statement->execute(["id"=> $id]);
    }
}
