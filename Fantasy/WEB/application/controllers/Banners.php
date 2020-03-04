<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class banners extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Banners_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'banners/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'banners/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'banners/index.html';
            $config['first_url'] = base_url() . 'banners/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Banners_model->total_rows($q);
        $banners = $this->Banners_model->get_limit_data($config['per_page'], $start, $q);
       // echo "<prE>";print_r($banners);die();
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'banners_data' => $banners,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
			$this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('banner/banner_list', $data);
			$this->load->view('../modules/loggedin_template/footer');
    }

    public function read($id) 
    {
        $row = $this->Banners_model->get_by_id($id);
        if ($row) {
            $data = array(
		'banners_id' => $row->banners_id		
	    );
			$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('banners/banners_read', $data);
				$this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('banners'));
        }
    }

    public function create() 
    {       
        $data = array(
            'button' => 'Create',
            'action' => site_url('banners/create_action'),
	    'id' => set_value('id'),
	    
	);        
		$this->load->view('../modules/loggedin_template/header',$data);
        $this->load->view('banner/banner_form', $data);
			$this->load->view('../modules/loggedin_template/footer',$data);
    }
    
    public function create_action() 
    {
           if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $folder = "uploads/offers/";
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $folder . preg_replace('/\s+/', '_', $_FILES['image']['name']))) {
                $image = $_FILES['image']['name'];
                $image = preg_replace('/\s+/', '_', $image);
            }
            $data = array('banner_image'=>$image,'created_date'=>date("Y-m-d H:i:s"));

            $this->Banners_model->insert($data);
           // echo $this->db->last_query();die();
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('banners'));   
        }
    }
    
    public function update($id) 
    {
        $row = $this->Banners_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('banners/update_action'),
        		'id' => set_value('id', $row->id),
                'old_image' => set_value('id', $row->banner_image),
		
	    );
           
			$this->load->view('../modules/loggedin_template/header',$data);
            $this->load->view('banner/banner_form', $data);
				$this->load->view('../modules/loggedin_template/footer',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('banners'));
        }
    }
    
    public function update_action() 
    {
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $folder = "uploads/offers/";
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $folder . preg_replace('/\s+/', '_', $_FILES['image']['name']))) {
                $image = $_FILES['image']['name'];
                $image = preg_replace('/\s+/', '_', $image);
            }
        }
        else
       {
            $image = $this->input->post('old_image',TRUE);
       }     
           $data =  array('banner_image'=>$image);

            $this->Banners_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('banners'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Banners_model->get_by_id($id);

        if ($row) {
            $this->Banners_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('banners'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('banners'));
        }
    }

   

}
