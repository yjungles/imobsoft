<?php


class Imovel extends Database
{

    public function get()
    {
        $sql = "SELECT i.*, p.nome as proprietario_nome 
        FROM imoveis i 
        LEFT JOIN proprietarios p 
        ON i.proprietario_id = p.id
        order by id";
        return $this->db->query($sql);
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM imoveis WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function store($data)
    {
        $sql = 'INSERT INTO imoveis
                (nome, endereco, proprietario_id)
                VALUES (
                    :nome,
                    :endereco, 
                    :proprietario_id
                )';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($data)
    {
        $sql = 'UPDATE imoveis
                SET 
                nome = :nome,
                endereco = :endereco, 
                proprietario_id = :proprietario_id
                WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM `imoveis` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
    }
}
