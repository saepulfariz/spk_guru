<?php


class BobotAlternatifModel extends CI_Model
{
    protected $table            = 'tb_rel_alternatif';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';


    public function getAll($id_guru = null)
    {
        $this->db->select('tb_rel_alternatif.*, tb_guru.*');
        if ($id_guru != null) {
            $this->db->where('id_guru', $id_guru);
        }
        $this->db->join('tb_guru', 'tb_rel_alternatif.id_guru = tb_guru.id');
        $this->db->group_by('id_guru');
        $this->db->order_by('id_guru', 'DESC');
        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->result_array();
            $data_alternatif = $this->db->get('tb_alternatif')->result_array();
        } else {
            $data = $this->db->get($this->table)->result();
            $data_alternatif = $this->db->get('tb_alternatif')->result();
        }
        return $data;
    }

    public function where($key, $value)
    {
        $this->db->where($key, $value);

        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->row_array();
        } else {
            $data = $this->db->get($this->table)->row();
        }
        return $data;
    }

    public function whereAlternatif($id_guru, $id_alternatif)
    {
        $this->db->where('id_guru', $id_guru);
        $this->db->where('id_alternatif', $id_alternatif);

        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->row_array();
        } else {
            $data = $this->db->get($this->table)->row();
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
        $this->db->order_by('id', 'DESC');
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

    public function updateBobot($id_guru, $id_alternatif, $data)
    {
        $this->db->where('id_guru', $id_guru);
        $this->db->where('id_alternatif', $id_alternatif);
        return $this->db->update($this->table, $data);
    }


    public function delete($id)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->delete($this->table);
    }

    public function deleteBobot($id_guru)
    {
        $this->db->where('id_guru', $id_guru);
        return $this->db->delete($this->table);
    }
}
