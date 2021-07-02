<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agenda extends CI_Controller {
   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('AgendaModel');         
   }
   public function index()
   {
       $agenda=new AgendaModel;
       $data['data']=$agenda->get_agenda();
       $this->load->view('includes/header');       
       $this->load->view('agenda/list',$data);
       $this->load->view('includes/footer');
   }
   public function create()
   {
      $this->load->view('includes/header');
      $this->load->view('agenda/create');
      $this->load->view('includes/footer');      
   }
   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store()
   {
       $agenda=new AgendaModel;
       $agenda->insert_agenda();
       redirect(base_url('agenda'));
    }
   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       $agendaarr = $this->db->get_where('agenda', array('id' => $id))->row();
       $this->load->view('includes/header');
       $this->load->view('agenda/edit',array('agendaarr'=>$agendaarr));
       $this->load->view('includes/footer');   
   }
   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id)
   {
       $agendaobj=new AgendaModel;
       $agendaobj->update_agenda($id);
       redirect(base_url('agenda'));
   }
   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $this->db->where('id', $id);
       $this->db->delete('agenda');
       redirect(base_url('agenda'));
   }
}