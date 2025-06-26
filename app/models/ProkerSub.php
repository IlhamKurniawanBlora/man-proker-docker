<?php
namespace models;

use core\Model;

class ProkerSub extends Model
{
    // ----- DETAILS -----
    public function getDetails($proker_no): array
    {
        $stmt = $this->db->prepare("SELECT * FROM proker_details WHERE proker_no = ? AND deleted_at IS NULL");
        $stmt->execute([$proker_no]);
        return $stmt->fetchAll();
    }

    public function addDetail($proker_no, $deskripsi)
    {
        $stmt = $this->db->prepare("INSERT INTO proker_details (proker_no, deskripsi) VALUES (?, ?)");
        return $stmt->execute([$proker_no, $deskripsi]);
    }

    // ----- ANGGOTA -----
    public function getAnggota($proker_no): array
    {
        $stmt = $this->db->prepare("SELECT * FROM proker_anggota WHERE proker_no = ? AND deleted_at IS NULL");
        $stmt->execute([$proker_no]);
        return $stmt->fetchAll();
    }

    public function addAnggota($proker_no, $anggota, $jabatan)
    {
        $stmt = $this->db->prepare("INSERT INTO proker_anggota (proker_no, anggota, jabatan) VALUES (?, ?, ?)");
        return $stmt->execute([$proker_no, $anggota, $jabatan]);
    }

    // ----- TIMELINE -----
    public function getTimeline($proker_no): array
    {
        $stmt = $this->db->prepare("SELECT * FROM proker_timeline WHERE proker_no = ? AND deleted_at IS NULL ORDER BY tanggal ASC");
        $stmt->execute([$proker_no]);
        return $stmt->fetchAll();
    }

    public function addTimeline($proker_no, $tanggal, $kegiatan, $status)
    {
        $stmt = $this->db->prepare("INSERT INTO proker_timeline (proker_no, tanggal, kegiatan, status) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$proker_no, $tanggal, $kegiatan, $status]);
    }

    // --- DELETE ---
    public function deleteDetail($id)
    {
        $stmt = $this->db->prepare("UPDATE proker_details SET deleted_at = NOW() WHERE no = ?");
        return $stmt->execute([$id]);
    }

    public function deleteAnggota($id)
    {
        $stmt = $this->db->prepare("UPDATE proker_anggota SET deleted_at = NOW() WHERE no = ?");
        return $stmt->execute([$id]);
    }

    public function deleteTimeline($id)
    {
        $stmt = $this->db->prepare("UPDATE proker_timeline SET deleted_at = NOW() WHERE no = ?");
        return $stmt->execute([$id]);
    }

    // --- UPDATE ---
    public function updateDetail($id, $deskripsi)
    {
        $stmt = $this->db->prepare("UPDATE proker_details SET deskripsi = ? WHERE no = ?");
        return $stmt->execute([$deskripsi, $id]);
    }

    public function updateAnggota($id, $anggota, $jabatan)
    {
        $stmt = $this->db->prepare("UPDATE proker_anggota SET anggota = ?, jabatan = ? WHERE no = ?");
        return $stmt->execute([$anggota, $jabatan, $id]);
    }

    public function updateTimeline($id, $tanggal, $kegiatan, $status)
    {
        $stmt = $this->db->prepare("UPDATE proker_timeline SET tanggal = ?, kegiatan = ?, status = ? WHERE no = ?");
        return $stmt->execute([$tanggal, $kegiatan, $status, $id]);
    }

    public function getProkerByNo($no)
    {
        $stmt = $this->db->prepare("SELECT p.*, u.username AS created_by_name 
            FROM prokers p 
            LEFT JOIN users u ON p.created_by = u.no 
            WHERE p.no = ? AND p.deleted_at IS NULL");
        $stmt->execute([$no]);
        return $stmt->fetch();
    }

}
