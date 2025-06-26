<?php
namespace controllers;

use core\Controller;
use models\User;

class AuthController extends Controller
{
    private $userModel;

    /**
     * Initializes the controller by creating a new User model instance.
     */
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /proker/list');
                exit;
            } else {
                $error = 'Username atau password salah';
                return $this->view('auth/login', compact('error'));
            }
        }

        $this->view('auth/login');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm_password'] ?? '';

            if ($password !== $confirm) {
                $error = 'Konfirmasi password tidak cocok.';
                return $this->view('auth/register', compact('error'));
            }

            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $result = $this->userModel->create($username, $email, $hashed);

            if ($result) {
                header('Location: /auth/login');
                exit;
            } else {
                $error = 'Registrasi gagal. Username mungkin sudah terpakai.';
                return $this->view('auth/register', compact('error'));
            }
        }

        $this->view('auth/register');
    }


    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /auth/login');
        exit;
    }
}
