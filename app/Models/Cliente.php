<?php
class Cliente extends Database
{
        public function get()
        {
                $sql = "SELECT * FROM clientes order by id";
                return $this->db->query($sql);
        }

        public function find($id)
        {
                $sql = 'SELECT * FROM clientes WHERE id = :id';

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                return $stmt->fetch();
        }

        public function store($data)
        {
                $sql = 'INSERT INTO clientes
                        (nome, email, telefone)
                        VALUES (
                                :nome, 
                                :email, 
                                :telefone
                        )';

                $stmt = $this->db->prepare($sql);
                $stmt->execute($data);
                return $this->db->lastInsertId();
        }

        public function update($data)
        {
                $sql = 'UPDATE clientes
                        SET  
                        nome = :nome, 
                        email = :email, 
                        telefone = :telefone 
                        WHERE id = :id';

                $stmt = $this->db->prepare($sql);
                return $stmt->execute($data);
        }

        public function delete($id)
        {
                $stmt = $this->db->prepare('DELETE FROM `clientes` WHERE `id` = :id');
                $stmt->execute(['id' => $id]);
        }
}
