<?php
namespace models;

use core\Model;

class Proker extends Model
{
    public function getAll(): array
    {
        $stmt = $this->db->query("
            SELECT p.*, u.username AS creator 
            FROM prokers p 
            LEFT JOIN users u ON p.created_by = u.no 
            WHERE p.deleted_at IS NULL 
            ORDER BY p.created_at DESC
        ");

        return $stmt->fetchAll();
    }

    public function getByStatus($status): array
    {
        $stmt = $this->db->prepare("
            SELECT p.*, u.username AS creator 
            FROM prokers p 
            LEFT JOIN users u ON p.created_by = u.no 
            WHERE p.deleted_at IS NULL AND p.status = ? 
            ORDER BY p.created_at DESC
        ");
        $stmt->execute([$status]);
        return $stmt->fetchAll();
    }

    public function create($nama, $deskripsi, $status, $created_by)
    {
        $stmt = $this->db->prepare("INSERT INTO prokers (nama, deskripsi, status, created_by) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nama, $deskripsi, $status, $created_by]);
    }

    public function find($no)
    {
        $stmt = $this->db->prepare("SELECT * FROM prokers WHERE no = ?");
        $stmt->execute([$no]);
        return $stmt->fetch();
    }

    public function update($no, $nama, $deskripsi, $status)
    {
        $stmt = $this->db->prepare("UPDATE prokers SET nama = ?, deskripsi = ?, status = ? WHERE no = ?");
        return $stmt->execute([$nama, $deskripsi, $status, $no]);
    }

    public function delete($no)
    {
        $stmt = $this->db->prepare("DELETE FROM prokers WHERE no = ?");
        return $stmt->execute([$no]);
    }

}
