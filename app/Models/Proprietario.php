<?php


class Proprietario extends Database
{
    public function get()
    {
        $sql = "SELECT id, nome, email, telefone, dia_repasse FROM proprietarios order by id";
        return $this->db->query($sql);
    }

    public function find($id)
    {
        $sql = 'SELECT id, nome, email, telefone, dia_repasse FROM proprietarios WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function store($data)
    {
        $sql = 'INSERT INTO proprietarios
                        (nome, email, telefone,dia_repasse)
                        VALUES (
                                :nome, 
                                :email, 
                                :telefone,
                                :dia_repasse
                        )';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($data)
    {
        $sql = 'UPDATE proprietarios
                        SET  
                        nome = :nome, 
                        email = :email, 
                        telefone = :telefone,
                        dia_repasse = :dia_repasse
                        WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM `proprietarios` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
    }
}
