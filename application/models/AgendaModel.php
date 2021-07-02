<?php
class AgendaModel extends CI_Model{
    
    public function get_agenda(){
        if(!empty($this->input->get("search"))){
          $this->db->like('title', $this->input->get("search"));
          $this->db->or_like('description', $this->input->get("search")); 
        }
        $query = $this->db->get("agenda");
        return $query->result();
    }
    public function insert_agenda()
    {    
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
			'schedule_date' => $this->input->post('schedule_date'),
			'status' => "upcoming",
			'created_date' => date('Y-m-d  H:i:s')
        );
        return $this->db->insert('agenda', $data);
    }
    public function update_agenda($id) 
    {
        $data=array(
            'title' => $this->input->post('title'),
            'description'=> $this->input->post('description'),
			'schedule_date' => $this->input->post('schedule_date'),
			'status' => $this->input->post('status'),
			'updated_date' => date('Y-m-d  H:i:s')
        );
        if($id==0){
            return $this->db->insert('agenda',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('agenda',$data);
        }        
    }
}
?>
