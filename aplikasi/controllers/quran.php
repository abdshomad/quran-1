<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_quran');
        // $this->output->enable_profiler(TRUE);
        $this->load->library('user_agent');
        $this->load->library('email');
        $config_mail['mailtype'] = 'html';
        $this->email->initialize($config_mail);
    }

    function index() {
        //tipe agent
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = $this->agent->agent_string();
        }

        //insert data pengunjung
        $clientData = array(
            'VisIP' => $this->input->ip_address(),
            'VisRef' => $this->agent->referrer(),
            'VisUrl' => $_SERVER['REQUEST_URI'],
            'VisDate' => date('Y-m-d H:i:s'),
            'VisAgent' => $agent,
			'VisPlatform' => $this->agent->platform(),
			'VisAgentString' => $this->agent->agent_string()
        );
        $this->db->insert('logs', $clientData);

        //redirect ke mobile content kalo dari mobile browser
        if ($this->agent->is_mobile()) {
            redirect(base_url() . 'mobile/', 'refresh');
        } else {
            $data = array(
                'kataMutiara' => $this->m_quran->m_kataMutiara()
            );

            $this->load->view('v_quran', $data);
        }
    }

    function displayAyat($id = 1) {
        echo $this->m_quran->m_displayAyat($id);
    }

    function getAllAyat() {
        echo $this->m_quran->m_getAllAyat();
    }

    function menuQuran() {
        echo $this->m_quran->m_menuQuran();
    }

    function getPengunjung() {
        echo $this->m_quran->m_getPengunjung();
    }

    function statistik() {
        echo $this->m_quran->m_statistik();
    }

    function statistikLast() {
        echo $this->m_quran->m_statistikLast();
    }

    function bukuTamu($act = "insert") {
        switch ($act) {
            case "insert" : {
                    echo $this->m_quran->m_bukuTamu("insert");
                } break;
            case "read" : {
                    echo $this->m_quran->m_bukuTamu("read");
                } break;
        }
    }

    function randCapcha() {
        echo $this->m_quran->m_randCapcha();
    }

    function getAyatInfo() {
        echo $this->m_quran->m_getAyatInfo();
    }
	
	function getAyatId() {
        echo $this->m_quran->m_getAyatId();
    }

    function viewHosting() {
        $this->load->view('v_hosting');
    }

    function viewAyat($id) {
        $data['display'] = $this->m_quran->m_displayAyat($id);
        $data['judul'] = $this->m_quran->m_getJudulAyat($id);
        $nx = $id + 1;
        $pr = $id - 1;
        $navNx = '<a href="' . base_url() . 'quran/viewAyat/' . $nx . '">' . image_asset('Arrow_right.png') . '</a>';
        $navPr = '<a href="' . base_url() . 'quran/viewAyat/' . $pr . '">' . image_asset('Arrow_left.png') . '</a>';

        if ($id == 1) {
            $data['navi'] = $navNx;
        } elseif ($id == 6236) {
            $data['navi'] = $navPr;
        } else {
            $data['navi'] = $navPr . ' | ' . $navNx;
        }
        $this->load->view('v_ayat', $data);
    }

    function prakata() {
        $data['jumDownload'] = $this->db->count_all('download_stat');
        $this->load->view('v_prakata', $data);
    }

    function api() {
        $this->load->view('v_api');
    }

    function reff($type='') {
		$data = array('type'=>$type);
        $this->load->view('v_reff',$data);
    }

    function download() {
        echo $this->m_quran->m_download();
    }

    function test() {
        $this->load->view('v_test');
    }

    function gads() {
        $this->load->view('v_google_ads');
    }
	
	function getRandomKataMutiara() {
		$query = $this->db->order_by('kataId','random')
			->limit(1)
			->get('katamutiara');
		foreach ($query->result() as $row)
		{
		   echo '<marquee><b>'.$row->text.'</b></marquee>';
		}
	}
	
	function getListSurahId() {
		$arr = array();
		for($i=0;$i<=114;$i++) {
			$arr[]['id'] = $i;
		}
		echo '({rows:' . json_encode($arr) . '})';
	}
	
	function getListAyatId() {
		echo $this->m_quran->m_getListAyatId();
	}
	
	function getListPlatform() {
		echo $this->m_quran->m_getListPlatform();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/quran.php */