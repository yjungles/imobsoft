<?php


class Mensalidade extends Database
{

    public function getByContratoId($id)
    {
        $sql = "SELECT * FROM mensalidades WHERE contrato_id = :id order by dt_vencimento";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM mensalidades WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function store($data)
    {
        $sql = 'INSERT INTO mensalidades
                        (dt_vencimento, val_mensalidade,contrato_id, is_paga)
                        VALUES (:dt_vencimento, :val_mensalidade, :contrato_id, :is_paga)';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($data)
    {
        $sql = 'UPDATE mensalidades
                SET  
                dt_vencimento = :dt_vencimento, 
                val_mensalidade = :val_mensalidade,
                contrato_id = :contrato_id, 
                is_paga = :is_paga
                        
                WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM `mensalidades` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
    }



    public function setPaga($id)
    {
        $sql = 'UPDATE mensalidades
                SET  
                is_paga = 1
                WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

}
