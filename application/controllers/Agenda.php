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
	 $this->load->library('form_validation'); 	
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
	   $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required',
				'errors' => array(
                    'required' => 'You must provide a title.',
                ),
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a description.',
                ),
            ),
            array(
                'field' => 'schedule_date',
                'label' => 'Schedule Date',
                'rules' => 'required|callback_date_valid',
				'errors' => array(
                    'required' => 'You must provide a description.',
					 'date_valid' => 'Schedule time must be greater then current time',
                ),
            )
        );
		 $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/header');
			$this->load->view('agenda/createerror');
			$this->load->view('includes/footer');  
			
		}else{
			 $agenda=new AgendaModel;
			$agenda->insert_agenda();
			redirect(base_url('agenda'));
		}	
			


      
    }
	
	function date_valid($date){
	$month = substr($date, 0, 2);
	$day = substr($date, 3, 2);
	$year = substr($date, 6, 4);
	$hour = (int)substr($date, 11, 1);
	$min =  substr($date, 13, 2);
	$ampm =  substr($date, 16, 2);
	 if($ampm=='PM')
	 {
		$hour =$hour+12;
	 }	
	$datenew=$year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':00';
	$mydate=strtotime($datenew);
	$cur_date=time();
	if($mydate>$cur_date){
		return true;
	}
	
	return false;	
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
	     $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required',
				'errors' => array(
                    'required' => 'You must provide a title.',
                ),
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a description.',
                ),
            ),
            array(
                'field' => 'schedule_date',
                'label' => 'Schedule Date',
                'rules' => 'required|callback_date_valid',
				'errors' => array(
                    'required' => 'You must provide a description.',
					 'date_valid' => 'Schedule time must be greater then current time',
                ),
            ),
			 array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must select a status.',
                ),
            ),
        );
		 $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/header');
			$this->load->view('agenda/createerror');
			$this->load->view('includes/footer');  
		}else{	
		   $agendaobj=new AgendaModel;
		   $agendaobj->update_agenda($id);
		   redirect(base_url('agenda'));
		}
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