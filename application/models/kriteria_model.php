<?php

class Kriteria_model extends CI_Model
{
    protected $table = 'sub_kriteria';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllKriteria()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('kriteria', 'kriteria.id_kriteria = sub_kriteria.id_kriteria');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_importance()
    {
        $query = $this->db->get('importance_scale');
        return $query->result_array(); 
    }
}
