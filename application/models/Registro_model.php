<?php
class Registro_model extends CI_Model{
    
    function insertar($data){
        $this->db->insert('usuario', $data);
        
        return $this->db->insert_id();

    }
   
    function verificar_email($key){
        $this->db->where('verification_key', $key);
        $this->db->where('is_email_verified', 'no');
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0)
        {
            $data = array(
                'is_email_verified' => 'yes'
            );
            $this->db->where('verification_key', $key);
            $this->db->update('user',$data);
        }
        else
        {
            return false;
        }
    }
}
?>