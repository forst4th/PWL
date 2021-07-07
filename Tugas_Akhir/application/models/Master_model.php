<?php
class Master_model extends CI_Model
{
	function view_by_id($table = '', $condition = '', $row = 'row')
    {
        if ($row == 'row') {
            if ($condition) {
                return $this->db->where($condition)->get($table)->row();
            } else {
                return $this->db->get($table)->row();
            }
        } else {
            if ($condition) {
                return $this->db->where($condition)->get($table)->result();
            } else {
                return $this->db->get($table)->result();
            }
        }
    }

    function process_data($table='', $data='', $condition='') 
    {
        if($condition) {
            $this->db->where($condition)->update($table, $data);
            return $this->db->affected_rows();
        } else {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
        
    }

    function get_pembelian($id='')
    {
        $condition = '';
        if(!empty($id)){
            $condition = 'and p.id = '.$id;
        }
        $query = $this->db->query("SELECT p.*, o.nama as obat, o.harga_beli, o.harga_jual, s.nama as supplier 
                                from tb_pembelian p
                                join ms_obat o
                                on p.id_obat = o.id
                                join ms_supplier s
                                on p.id_supplier = s.id
                                where 1=1
                                $condition
                            ");
        return $query;
    }

    function get_penjualan($id='')
    {
        $condition = '';
        if(!empty($id)){
            $condition = 'and p.id = '.$id;
        }
        $query = $this->db->query("SELECT p.*, o.nama as obat, o.harga_beli, o.harga_jual
                                from tb_penjualan p
                                join ms_obat o
                                on p.id_obat = o.id
                                where 1=1
                                $condition
                            ");
        return $query;
    }
}