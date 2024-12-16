<?php

class Alternatif_model extends CI_Model
{
    protected $table = 'alternatif';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllAlternatif()
    {
        $query = $this->db->get('alternatif');
        return $query->result();
    }

    public function insertAlternatif($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where('id_alternatif', $id);
        $this->db->delete('alternatif');
    }

    public function get_by_id($id)
    {
        $this->db->where('id_alternatif', $id);
        $query = $this->db->get('alternatif');
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_alternatif', $id);
        $this->db->update('alternatif', $data); // Update data berdasarkan ID
    }
}
