<?php
namespace App\Models;

use Exception; 
use PDO;
use PDOException;

class User
{
    private $id_user;
    private $FullName;
    private $Password;
    private $Email;
    private $id_role;
    private $image_user;
    private $s_status;
    private $bane;
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

  
    public function setId($id_user) { $this->id_user = $id_user; }
    public function getId() { return $this->id_user; }

    public function setFullName($FullName) { $this->FullName = $FullName; }
    public function getFullName() { return $this->FullName; }

    public function setPassword($Password) { $this->Password = $Password; }
    public function getPassword() { return $this->Password; }

    public function setEmail($Email) { $this->Email = $Email; }
    public function getEmail() { return $this->Email; }

    public function setIdRole($id_role) { $this->id_role = $id_role; }
    public function getIdRole() { return $this->id_role; }

    public function setImageUser($image_user) { $this->image_user = $image_user; }
    public function getImageUser() { return $this->image_user; }

    public function setStatus($s_status) { $this->s_status = $s_status; }
    public function getStatus() { return $this->s_status; }

    public function setBane($bane) { $this->bane = $bane; }
    public function getBane() { return $this->bane; }

    
    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    
    public function createUser()
    {
        try {
            
            if ($this->findByEmail($this->Email)) {
                throw new Exception("البريد الإلكتروني موجود مسبقًا");
            }

            $stmt = $this->conn->prepare(
                "INSERT INTO users (fullname, password, email, id_role, image_user) 
                 VALUES (:full_name, :password, :email, :id_role, :image_user)"
            );

          
            $stmt->bindValue(':full_name', $this->FullName);
            $stmt->bindValue(':password', $this->hashPassword($this->Password));
            $stmt->bindValue(':email', $this->Email);
            $stmt->bindValue(':id_role', $this->id_role);
            $stmt->bindValue(':image_user', $this->image_user);
            // $stmt->bindValue(':s_status', $this->s_status);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("حدث خطأ أثناء إنشاء المستخدم: " . $e->getMessage());
        }
    }

    
    public function findByEmail($email)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("حدث خطأ أثناء البحث عن المستخدم: " . $e->getMessage());
        }
    }

    
    public function signIn($email, $password)
    {
        $user = $this->findByEmail($email);
        if (!$user) {
            throw new Exception("البريد الإلكتروني غير صحيح");
        }
    
        if (!password_verify($password, $user['password'])) {
            throw new Exception("كلمة المرور غير صحيحة");
        }
    
        if ($user['s_status'] === 'disactive') {
            throw new Exception("الحساب معطل");
        }
    
        return $user;
    }
}