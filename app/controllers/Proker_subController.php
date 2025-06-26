<?php
namespace controllers;

use core\Controller;
use models\ProkerSub;

class Proker_subController extends Controller
{
    private $subModel;

    public function __construct()
    {
        $this->subModel = new ProkerSub();
    }

    public function preview()
    {
        $proker_no = $_GET['no'] ?? null;
        if (!$proker_no) die("ID Proker tidak ditemukan.");

        $proker = $this->subModel->getProkerByNo($proker_no);
        $details = $this->subModel->getDetails($proker_no);
        $anggota = $this->subModel->getAnggota($proker_no);
        $timeline = $this->subModel->getTimeline($proker_no);

        $this->view('proker_sub/preview', compact('proker', 'details', 'anggota', 'timeline'));
    }

    public function manage()
    {
        $proker_no = $_GET['no'] ?? null;
        if (!$proker_no) die("ID Proker tidak ditemukan.");

        $section = $_GET['section'] ?? '';
        $action = $_GET['action'] ?? '';

        // --- DELETE ---
        if ($action === 'delete') {
            $id = $_GET['id'] ?? null;
            if ($id) {
                match ($section) {
                    'detail' => $this->subModel->deleteDetail($id),
                    'anggota' => $this->subModel->deleteAnggota($id),
                    'timeline' => $this->subModel->deleteTimeline($id),
                };
            }
            header("Location: /proker_sub/manage?no=$proker_no");
            exit;
        }

        // --- EDIT (via POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'edit') {
            $id = $_GET['id'] ?? null;
            switch ($section) {
                case 'detail':
                    $this->subModel->updateDetail($id, $_POST['detail_edit'] ?? '');
                    break;
                case 'anggota':
                    $this->subModel->updateAnggota($id, $_POST['anggota_edit'], $_POST['jabatan_edit']);
                    break;
                case 'timeline':
                    $this->subModel->updateTimeline($id, $_POST['tanggal_edit'], $_POST['kegiatan_edit'], $_POST['status_edit']);
                    break;
            }
            header("Location: /proker_sub/manage?no=$proker_no");
            exit;
        }

        // --- TAMBAH BARU ---
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === '') {
            switch ($section) {
                case 'detail':
                    $deskripsi = $_POST['detail'] ?? '';
                    if ($deskripsi) {
                        $this->subModel->addDetail($proker_no, $deskripsi);
                    }
                    break;

                case 'anggota':
                    $anggota = $_POST['anggota'] ?? '';
                    $jabatan = $_POST['jabatan'] ?? '';
                    if ($anggota && $jabatan) {
                        $this->subModel->addAnggota($proker_no, $anggota, $jabatan);
                    }
                    break;

                case 'timeline':
                    $tanggal = $_POST['tanggal'] ?? '';
                    $kegiatan = $_POST['kegiatan'] ?? '';
                    $status = $_POST['status'] ?? 'planned';
                    if ($tanggal && $kegiatan) {
                        $this->subModel->addTimeline($proker_no, $tanggal, $kegiatan, $status);
                    }
                    break;
            }

            header("Location: /proker_sub/manage?no=$proker_no");
            exit;
        }

        // --- GET DATA
        $details = $this->subModel->getDetails($proker_no);
        $anggota = $this->subModel->getAnggota($proker_no);
        $timeline = $this->subModel->getTimeline($proker_no);

        $this->view('proker_sub/manage', compact('proker_no', 'details', 'anggota', 'timeline'));
    }
}
