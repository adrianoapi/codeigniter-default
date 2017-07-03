<?php

class Usuarios_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function GetAll($sort = 'id', $order = 'asc', $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);
        if ($limit)
            $this->db->limit($limit, $offset);
        $query = $this->db->get('produtos');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function CountAll()
    {
        return $this->db->count_all('produtos');
    }

    public function listar_usuarios()
    {
        return $this->db->get('produtos')->result();
    }

}
