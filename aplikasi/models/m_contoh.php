<?php
class M_contoh extends CI_Model {
    var $per_page = 10;
	
	function __construct()
    {
        parent::__construct();
        $config['base_url'] = base_url().'/contoh/page';
        $config['total_rows'] = $this->db->count_all_results('quran_indo');
        $config['per_page'] = $this->per_page;
        $this->pagination->initialize($config);
    }
    
    public function paging() {
        return $this->pagination->create_links()."<br>";
    }
    
    public function getBukuTamu($halaman=null)
    {
		$query = $this->db->get('quran_indo', $this->per_page, $halaman);
        $text = "";
        foreach ($query->result() as $key) {
            $text .= $key->ID.". QS. (";
            $text .= $key->SuraID.":";
            $text .= $key->VerseID."). ";
            $text .= $key->AyahText."<br>";
        }
        return $text;
    }
}