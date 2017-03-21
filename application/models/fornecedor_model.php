<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor_model extends CI_Model
{
	function add($table,$data,$returnId = false){

        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
                        if($returnId == true){
                            return $this->db->insert_id($table);
                        }
			return TRUE;
		}
		
		return FALSE;       
    }
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }

    public function get_all_est(){
		return $this->db->get('estados');
	}
	public function count_fornecedor()
	{
		return $this->db->count_all('fornecedor');
	}
	public function get_ativo()
	{
		return $this->db->get('fornecedorcompleto');
	}
}