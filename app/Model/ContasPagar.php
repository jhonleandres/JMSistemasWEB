<?php

namespace Mini\Model;

use Mini\Core\Model;

class ContasPagar extends Model
{
    public function getAllContasPagar()
    {
        $sql = `SELECT  b.id, 
                        p.name as nameFornecedor, 
                        b.descrition, 
                        b.providerId, 
                        b.price, 
                        b.releaseDate, 
                        b.dueDate, 
                        b.status, 
                        b.created_at, 
                        b.updated_at 
                FROM billsToPay AS b
                INNER JOIN providers AS p
                ON b.providerId = p.id
                `;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function add( $descrition, $providerId, $price, $releaseDate, $dueDate, $status)
    {
        $sql = `INSERT INTO billsToPay (descrition, providerId, price, releaseDate, dueDate, status) VALUES (:nome, :email, :data_nasc, :cpf)`;
        $query = $this->db->prepare($sql);
        $parameters = array(':descrition' => $descrition, ':providerId' => $providerId, ':price' => $price, ':releaseDate' => $releaseDate, ':dueDate' => $dueDate, ':status' => $status);

        $query->execute($parameters);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM billsToPay WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function getContasPagar($cliente_id)
    {
        $sql = `SELECT  b.id, 
                        p.name as nameFornecedor, 
                        b.descrition, 
                        b.providerId, 
                        b.price, 
                        b.releaseDate, 
                        b.dueDate, 
                        b.status, 
                        b.created_at, 
                        b.updated_at 
                FROM billsToPay AS b
                INNER JOIN providers AS p
                ON b.providerId = p.id
                WHERE id = :id LIMIT 1`;
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($descrition, $providerId, $price, $releaseDate, $dueDate, $status, $id)
    {
        $sql = `UPDATE billsToPay SET descrition= :descrition, providerId= :providerId, price= :price, releaseDate= :releaseDate, dueDate= :dueDate, status= :status WHERE id = :cliente_id`;
        $query = $this->db->prepare($sql);
        $parameters = array(':descrition' => $descrition, ':providerId' => $providerId, ':price' => $price, 'releaseDate' => $releaseDate, ':dueDate' => $dueDate, ':status' => $status);


        $query->execute($parameters);
    }

}
