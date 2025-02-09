<?php
namespace App\Controllers;

use App\Models\User;
use App\Libraries\Database;

class HomeController
{
    private $db;
    private $user;

    public function __construct()
    {
        $this->db = (new Database())->connect();
        $this->user = new User($this->db);
    }

    public function index()
    {
        require __DIR__ . '/../views/home.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->setFullName($_POST['full_name']);
            $this->user->setPassword($_POST['password']);
            $this->user->setEmail($_POST['email']);
            $this->user->setIdRole($_POST['id_role']); 
            $this->user->setStatus('active');

            try {
                $this->user->createUser();
                echo "تم إنشاء المستخدم بنجاح!";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        require __DIR__ . '/../views/register.php';
    }

    public function login()
    {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                try {
                    
                    $user = $this->user->signIn($email, $password);
    
                    
                    if ($user) {
                        
                        if (password_verify($password, $user['password'])) {
                            
                            $_SESSION['user'] = [
                                'id' => $user['id_user'],
                                'name' => $user['fullname'],
                                'email' => $user['email'],
                                'id_role' => $user['id_role']
                            ];
    
                            
                            switch ($user['id_role']) {
                                case 1:
                                    header("Location: /LigneYoudemy-mvc-/admin");
                                    break;
                                case 2:
                                    header("Location: /LigneYoudemy-mvc-/DashboardEnseignant");
                                    break;
                                case 3:
                                    header("Location: /LigneYoudemy-mvc-/home");
                                    break;
                                default:
                                    throw new Exception("Invalid role");
                            }
                            exit(); 
                        } else {
                            
                            throw new Exception("Invalid login credentials.");
                        }
                    } else {
                        
                        throw new Exception("User not found.");
                    }
                } catch (Exception $e) {
                    
                    $errorMessage = urlencode($e->getMessage());
                    header("Location: /LigneYoudemy-mvc-/login?msge=$errorMessage");
                    exit();
                }
            } else {
                
                $errorMessage = urlencode("Please provide both email and password.");
                header("Location: /LigneYoudemy-mvc-/login?msge=$errorMessage");
                exit();
            }
        }
    

        require __DIR__ . '/../views/login.php';
    }

    public function logout()
    {
        
        session_start();
    
        
        session_unset(); 
        session_destroy(); 
    
        
        header("Location: /LigneYoudemy-mvc-/public/");
        exit();
    }
    
    public function dashboardEnseignant()
    {
        
        require_once __DIR__ . '/../views/DashboardEnseignant.php';
    }

    

    public function dashboard()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
        }

        require __DIR__ . '/../views/dashboard.php';
    }

    public function notFound()
    {
        require __DIR__ . '/../views/404.php';
    }
}