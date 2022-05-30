<?php


class Repasse extends Database
{
    public function getByContratoId($id)
    {
        $sql = "SELECT * FROM repasses WHERE contrato_id = :id order by dt_repasse";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM repasses WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function store($data)
    {
        $sql = 'INSERT INTO repasses
                        (dt_repasse, val_repasse, contrato_id, is_repassada)
                        VALUES (:dt_repasse, :val_repasse, :contrato_id, :is_repassada)';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($data)
    {
        $sql = 'UPDATE repasses
                SET  
                dt_repasse = :dt_repasse, 
                val_repasse = :val_repasse,
                contrato_id = :contrato_id, 
                is_repassada = :is_repassada
                        
                WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function setRepassado($id)
    {
        $sql = 'UPDATE repasses
                SET  
                is_repassada = 1
                WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM `repasses` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
    }
}
