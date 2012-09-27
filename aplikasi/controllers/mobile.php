<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->model('m_quran');
    }
	
	public function index()
	{
		//echo '<a href="tel:+6285720211699">TELEPON</a>';
		echo "Mobile version untuk website ini masih dalam tahap pengembangan, harap kunjungi aplikasi website ini dengan menggunakan browser PC";
	}
}