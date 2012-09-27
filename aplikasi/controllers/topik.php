<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topik extends CI_Controller {
	function __construct() {
        parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('m_topik');
    }
	
	function get() {
		echo $this->m_topik->m_getTopikMenu();
	}
	
	function getJumTopik() {
		$query = $this->db->select('id')->from('topik_grup')->where('is_title',1)->order_by('id')->get();
		$jum = $query->num_rows();
		echo '({total:' . $jum . ',data:' . json_encode($query->result_object()) . '})';
	}
	
	function getTreeTopik() {
		echo $this->m_topik->m_getTreeTopik();
	}
	
	function getTopikContent($id) {
		echo $this->m_topik->viewTopikContent($id);
	}
	
	function getGridTopik($id) {
		echo $this->m_topik->m_getGridTopik($id);
	}
}