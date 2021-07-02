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
   
   public function import()
	{ 	
		$this->load->view('includes/header');
		$this->load->view('agenda/import_data');
		$this->load->view('includes/footer');  
		if(isset($_POST["submit"]))
		{
			$agendaobj=new AgendaModel;
			$file = $_FILES['file']['tmp_name'];
			$handle = fopen($file, "r");
			$c = 0;//
			while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
			{
				$title = $filesop[0];
				$description = $filesop[1];
				$schedule_date = $filesop[2];
				$status = $filesop[3];
				if($c<>0){					/* SKIP THE FIRST ROW */
					$agendaobj->saverecords($title,$description,$schedule_date,$status);
				}
				$c = $c + 1;
			}
			echo "sucessfully import data !";
				
		}
	}
	
	public function export(){ 
		$agendaobj=new AgendaModel;
		/* file name */
		$filename = 'agenda_'.date('Ymd').'.csv'; 		
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
		
	   /* get data */
		$usersData = $agendaobj->get_agenda_array();
		/* file creation */
		$file = fopen('php://output','w'); 
		$header = array("Title","Description","Schedule Date","Status"); 
		fputcsv($file, $header);
		foreach ($usersData as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}