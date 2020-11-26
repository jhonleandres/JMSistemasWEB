<?php

namespace Mini\Model;

use Mini\Core\Model;

class Fornecedor extends Model
{
    public function getAllFornecedores()
    {
        $sql = `SELECT id, name FROM providers`;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function add($name)
    {
        $sql = `INSERT INTO providers (name) VALUES (:name)`;
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name);

        $query->execute($parameters);
    }

    public function delete($fornecedor_id)
    {
        $sql = "DELETE FROM providers WHERE id = :fornecedor_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':fornecedor_id' => $fornecedor_id);

        $query->execute($parameters);
    }

    public function getFuncionario($funcionario_id)
    {
        $sql = `SELECT id, name FROM providers WHERE id = :fornecedor_id LIMIT 1`;
        $query = $this->db->prepare($sql);
        $parameters = array('fornecedor_id' => $fornecedor_id);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($name, $fornecedor_id)
    {
        $sql = `UPDATE providers SET name = :name WHERE id = :fornecedor_id`;
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':fornecedor_id' => $fornecedor_id);

        $query->execute($parameters);
    }

}
