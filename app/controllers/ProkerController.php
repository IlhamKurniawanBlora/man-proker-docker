<?php
namespace controllers;

use core\Controller;
use models\Proker;

class ProkerController extends Controller
{
    private $prokerModel;

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /auth/login');
            exit;
        }

        $this->prokerModel = new Proker();
    }

    public function list()
    {
        $status = $_GET['status'] ?? 'all';

        if ($status === 'all') {
            $prokers = $this->prokerModel->getAll();
        } else {
            $prokers = $this->prokerModel->getByStatus($status);
        }

        $this->view('proker/index', compact('prokers', 'status'));
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'] ?? '';
            $deskripsi = $_POST['deskripsi'] ?? '';
            $status = $_POST['status'] ?? 'draft';
            $created_by = $_SESSION['user']['no'];

            $this->prokerModel->create($nama, $deskripsi, $status, $created_by);
            header('Location: /proker/list');
            exit;
        }

        $this->view('proker/create');
    }

    public function edit()
    {
        $no = $_GET['no'] ?? null;
        if (!$no) {
            echo "ID tidak ditemukan."; exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'] ?? '';
            $deskripsi = $_POST['deskripsi'] ?? '';
            $status = $_POST['status'] ?? 'draft';

            $this->prokerModel->update($no, $nama, $deskripsi, $status);
            header('Location: /proker/list');
            exit;
        }

        $proker = $this->prokerModel->find($no);
        $this->view('proker/edit', compact('proker'));
    }

    public function delete()
    {
        $no = $_GET['no'] ?? null;
        if ($no) {
            $this->prokerModel->delete($no);
        }
        header('Location: /proker/list');
        exit;
    }

}
