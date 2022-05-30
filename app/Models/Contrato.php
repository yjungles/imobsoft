<?php


class Contrato extends Database
{
    public function get()
    {
        $sql = "SELECT cc.*, 
        p.nome as proprietario_nome,
        i.nome as imovel_nome,
        c.nome as cliente_nome 
        FROM contratos cc 
        LEFT JOIN clientes c
        ON cc.cliente_id = c.id
        LEFT JOIN imoveis i 
        ON cc.imovel_id = i.id
        LEFT JOIN proprietarios p 
        ON i.proprietario_id = p.id
        order by id";

        return $this->db->query($sql);
    }

    public function find($id)
    {
        $sql = '
        SELECT cc.*, 
        p.nome as proprietario_nome,
        i.nome as imovel_nome,
        c.nome as cliente_nome 
        FROM contratos cc 
        LEFT JOIN clientes c
        ON cc.cliente_id = c.id
        LEFT JOIN imoveis i 
        ON cc.imovel_id = i.id
        LEFT JOIN proprietarios p 
        ON i.proprietario_id = p.id
        
        WHERE cc.id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function store($data)
    {
        $sql = 'INSERT INTO contratos
                        (dt_inicio, dt_fim, tx_administracao, val_aluguel, val_condominio, val_iptu, cliente_id, imovel_id)
                        VALUES (:dt_inicio, :dt_fim, :tx_administracao, :val_aluguel, :val_condominio, :val_iptu, :cliente_id, :imovel_id)';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($data)
    {
        $sql = 'UPDATE contratos
                SET  
                     dt_inicio = :dt_inicio, 
                     dt_fim = :dt_fim, 
                     tx_administracao = :tx_administracao, 
                     val_aluguel = :val_aluguel, 
                     val_condominio = :val_condominio, 
                     val_iptu = :val_iptu, 
                     cliente_id = :cliente_id, 
                     imovel_id = :imovel_id
                        
                WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM `contratos` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
    }
}
