<?php
class BuatArtikel extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('ckeditor');
	    $this->load->library('ckfinder');
		$this->load->helper('form');
	    $this->ckeditor->basePath = base_url().'assets/ckeditor/';
	    $this->ckeditor->config['toolbar'] = 'Full';
	    $this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['skin'] = 'v2';
	    //konfigurasi ckfinder dengan ckeditor
	    $this->ckfinder->SetupCKEditor($this->ckeditor, base_url().'assets/ckfinder/');
    }
    
    function index() {
    	$data = array(
	    	'test'=>$this->input->post('text_editor')==''?'test': htmlentities($this->input->post('text_editor'), ENT_QUOTES)
    	);
	    $this->load->view('v_text_editor',$data);
	}
}
?>
