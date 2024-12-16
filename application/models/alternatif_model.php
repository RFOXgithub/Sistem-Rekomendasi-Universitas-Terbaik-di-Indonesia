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
        $this->db->update('alternatif', $data);
    }

    public function update_perhitungan($id_alternatif, $s_value, $v_value, $ranking)
    {
        $data = [
            's_value' => $s_value,
            'v_value' => $v_value,
            'ranking' => $ranking
        ];

        $this->db->where('id_alternatif', $id_alternatif);
        return $this->db->update('alternatif', $data);
    }

    public function getAHPData()
    {
        $query = $this->db->get('ahp_data');
        $result = $query->row_array();

        if (!empty($result)) {
            return [
                'matrix' => json_decode($result['matrix'], true),
                'normalized_matrix' => json_decode($result['normalized_matrix'], true),
                'weights' => json_decode($result['weights'], true),
                'cr' => $result['cr']
            ];
        }

        return [];
    }

    public function saveAHPData($matrix, $normalized_matrix, $weights, $cr)
    {
        $this->db->empty_table('ahp_data');
        $data = [
            'matrix' => json_encode($matrix),
            'normalized_matrix' => json_encode($normalized_matrix),
            'weights' => json_encode($weights),
            'cr' => $cr,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->db->insert('ahp_data', $data);
    }
}
