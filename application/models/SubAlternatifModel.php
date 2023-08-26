<?php


class SubAlternatifModel extends CI_Model
{
    protected $table            = 'tb_sub_alternatif';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';


    public function getAll()
    {
        $this->db->select('tb_sub_alternatif.*, kode, nama_alternatif');
        $this->db->join('tb_alternatif', 'tb_sub_alternatif.id_alternatif = tb_alternatif.id');
        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->result_array();
        } else {
            $data = $this->db->get($this->table)->result();
        }
        return $data;
    }

    public function where($key, $value, $all = 'row')
    {
        $this->db->where($key, $value);

        if ($all == 'row') {
            if ($this->returnType == 'array') {
                $data = $this->db->get($this->table)->row_array();
            } else {
                $data = $this->db->get($this->table)->row();
            }
        } else if ($all == 'all') {
            if ($this->returnType == 'array') {
                $data = $this->db->get($this->table)->result_array();
            } else {
                $data = $this->db->get($this->table)->result();
            }
        }
        return $data;
    }

    public function find($id)
    {
        $this->db->where($this->primaryKey, $id);

        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->row_array();
        } else {
            $data = $this->db->get($this->table)->row();
        }
        return $data;
    }

    public function findAll()
    {
        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->result_array();
        } else {
            $data = $this->db->get($this->table)->result();
        }
        return $data;
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, $data);
    }


    public function delete($id)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->delete($this->table);
    }
}
