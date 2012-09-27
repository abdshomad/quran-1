<?php

class M_quran extends CI_Model {
    function m_displayAyat($id = 0) {
		$cariKata = $this->input->post('cariKata') == '' ? '' : $this->input->post('cariKata');
        $query = $this->db->select('*')->from('quran_indo a')->join('surah b', 'a.SuraID=b.id')->where(array('a.ID' => $id))->get();
        foreach ($query->result() as $key) {
			$hasil = $key->AyahText;
			if($cariKata != '') {
				$arrKata = explode(" ",$cariKata);
				foreach ($arrKata as $v) {
					$hasil = str_replace($v, '<font color="blue"><u>'.$v.'</u></font>', $hasil);
				}
			}
            $text = '<div align="right">' . quran_img($key->img) . '</div>
					<hr noshade size=1>
						' . quran_mp3($key->mp3) . '
					<hr noshade size=1>
						<font size=4>"' . $hasil . '"</font>
					<hr noshade size=1>
						MP3 : <a href="' . path_asset("quran_" . $key->mp3) . '">DOWNLOAD</a><br>
						IMG : <a href="http://www.everyayah.com/data/quranpngs/' . $key->SuraID . '_' . $key->VerseID . '.png" target="_blank">DOWNLOAD</a><br>
						LINK : <a href="' . base_url() . 'quran/viewAyat/' . $key->ID . '" target="_blank">' . base_url() . 'quran/viewAyat/' . $key->ID . '</a>';
        }
        return $text;
    }

    function m_getAllAyat() {
        $kata = $this->input->post('kata') == '' ? '' : $this->input->post('kata');
        $SuraID = $this->input->post('SuraID') == '' ? 0 : $this->input->post('SuraID');
        $juzID = $this->input->post('juzID') == '' ? 0 : $this->input->post('juzID');
        $start = ($this->input->post('page') - 1) * $this->input->post('limit');

        $this->db->start_cache();
        if ($kata != "") {
            $this->db->select("*, CONCAT('QS. [',a.SuraID,':',a.VerseID,']') as qs", false);
        } else {
            $this->db->select("*, CONCAT('QS. [',a.SuraID,':',a.VerseID,']') as qs", false);
        }

        if ($this->input->post('sesuai') == 'true') {
            $this->db->like('a.AyahText', $kata, 'both');
        } else {
            $pieces = explode(" ", $kata);
            foreach ($pieces as &$val) {
                $this->db->like('a.AyahText', $val, 'both');
            }
        }
        $this->db->get('quran_indo a');
        $this->db->join('surah b', 'a.SuraID=b.id');
        if ($SuraID != 0) {
            $this->db->where('a.SuraID', $SuraID);
        }
		if ($juzID != 0) {
			switch($juzID) {
				case 1 : $this->db->where(array('a.ID >= '=> 1,'a.ID < '=> 149));
					break;
				case 2 : $this->db->where(array('a.ID >= '=> 149,'a.ID < '=> 260));
					break;
				case 3 : $this->db->where(array('a.ID >= '=> 260,'a.ID < '=> 385));
					break;
				case 4 : $this->db->where(array('a.ID >= '=> 385,'a.ID < '=> 517));
					break;
				case 5 : $this->db->where(array('a.ID >= '=> 517,'a.ID < '=> 641));
					break;
				case 6 : $this->db->where(array('a.ID >= '=> 641,'a.ID < '=> 752));
					break;
				case 7 : $this->db->where(array('a.ID >= '=> 752,'a.ID < '=> 800));
					break;
				case 8 : $this->db->where(array('a.ID >= '=> 800,'a.ID < '=> 1042));
					break;
				case 9 : $this->db->where(array('a.ID >= '=> 1042,'a.ID < '=> 1201));
					break;
				case 10 : $this->db->where(array('a.ID >= '=> 1201,'a.ID < '=> 1329));
					break;
				case 11 : $this->db->where(array('a.ID >= '=> 1329,'a.ID < '=> 1479));
					break;
				case 12 : $this->db->where(array('a.ID >= '=> 1479,'a.ID < '=> 1649));
					break;
				case 13 : $this->db->where(array('a.ID >= '=> 1649,'a.ID < '=> 1804));
					break;
				case 14 : $this->db->where(array('a.ID >= '=> 1804,'a.ID < '=> 2030));
					break;
				case 15 : $this->db->where(array('a.ID >= '=> 2030,'a.ID < '=> 2215));
					break;
				case 16 : $this->db->where(array('a.ID >= '=> 2215,'a.ID < '=> 2484));
					break;
				case 17 : $this->db->where(array('a.ID >= '=> 2484,'a.ID < '=> 2674));
					break;
				case 18 : $this->db->where(array('a.ID >= '=> 2674,'a.ID < '=> 2876));
					break;
				case 19 : $this->db->where(array('a.ID >= '=> 2876,'a.ID < '=> 3219));
					break;
				case 20 : $this->db->where(array('a.ID >= '=> 3219,'a.ID < '=> 3385));
					break;
				case 21 : $this->db->where(array('a.ID >= '=> 3385,'a.ID < '=> 3564));
					break;
				case 22 : $this->db->where(array('a.ID >= '=> 3564,'a.ID < '=> 3727));
					break;
				case 23 : $this->db->where(array('a.ID >= '=> 3727,'a.ID < '=> 4090));
					break;
				case 24 : $this->db->where(array('a.ID >= '=> 4090,'a.ID < '=> 4265));
					break;
				case 25 : $this->db->where(array('a.ID >= '=> 4265,'a.ID < '=> 4511));
					break;
				case 26 : $this->db->where(array('a.ID >= '=> 4511,'a.ID < '=> 4706));
					break;
				case 27 : $this->db->where(array('a.ID >= '=> 4706,'a.ID < '=> 5105));
					break;
				case 28 : $this->db->where(array('a.ID >= '=> 5105,'a.ID < '=> 5242));
					break;
				case 29 : $this->db->where(array('a.ID >= '=> 5242,'a.ID < '=> 5673));
					break;
				case 30 : $this->db->where(array('a.ID >= '=> 5673));
					break;
			}
        }
        $this->db->stop_cache();

        $total = $this->db->get()->num_rows();

        $this->db->limit($this->input->post('limit'), $start);

        $query = $this->db->get();

        // $total = $this->db->select('*')->from('quran_indo')->like('AyahText', $kata, 'both')->get()->num_rows();
        return '({total:' . $total . ',data:' . json_encode($query->result_object()) . '})';
    }

    function m_getPengunjung() {
        $sort = $this->input->post('sort') != '' ? $this->input->post('sort') : 'VisDate';
        $dir = $this->input->post('dir') != '' ? $this->input->post('dir') : 'DESC';
		$filters = $this->input->post('filter') != '' ? $this->input->post('filter') : null;

        $start = ($this->input->post('page') - 1) * $this->input->post('limit');
        $this->db->start_cache();
        $this->db->select('*')->from('logs')->order_by($sort, $dir);

        if ($this->input->post('tglKunjung') != '') {
            $tglKunjung = substr($this->input->post('tglKunjung'), 0, 10);
            $this->db->like('VisDate', date('Y-m-d', strtotime($tglKunjung)), 'after');
        }
		
		if (is_array($filters)) {
			$encoded = false;
		} else {
			$encoded = true;
			$filters = json_decode($filters);
		}

		if (is_array($filters)) {
			for ($i=0;$i<count($filters);$i++){
				$filter = $filters[$i];

				// assign filter data (location depends if encoded or not)
				if ($encoded) {
					$field = $filter->field;
					$value = $filter->value;
					$compare = isset($filter->comparison) ? $filter->comparison : null;
					$filterType = $filter->type;
				} else {
					$field = $filter['field'];
					$value = $filter['data']['value'];
					$compare = isset($filter['data']['comparison']) ? $filter['data']['comparison'] : null;
					$filterType = $filter['data']['type'];
				}

				switch($filterType){
					case 'string' : 
						$this->db->like($field,$value);
					break;
					case 'list' :
						if (strstr($value,',')){
							$fi = explode(',',$value);
							for ($q=0;$q<count($fi);$q++){
								$fi[$q] = "'".$fi[$q]."'";
							}
							$value = implode(',',$fi);
							$this->db->where_in($field, $value);
						}else{
							$this->db->where($field,$value);
						}
					break;
					case 'boolean' : $this->db->where($field,$value); Break;
					case 'numeric' :
						switch ($compare) {
							case 'eq' : $this->db->where($field,$value); Break;
							case 'lt' : $this->db->where($field.' < ',$value); Break;
							case 'gt' : $this->db->where($field.' > ',$value); Break;
						}
					Break;
					case 'date' :
						switch ($compare) {
							case 'eq' : $this->db->like($field,date('Y-m-d',strtotime($value)),'after'); Break;
							case 'lt' : $this->db->where($field.' < ',date('Y-m-d',strtotime($value))); Break;
							case 'gt' : $this->db->where($field.' > ',date('Y-m-d',strtotime($value))); Break;
						}
					Break;
				}
			}
		}

        $total = $this->db->get()->num_rows();
        $this->db->stop_cache();

        $this->db->limit($this->input->post('limit'), $start);
        $query = $this->db->get();

        return '({total:' . $total . ',data:' . json_encode($query->result_object()) . '})';
    }

    function m_statistik() {
        $tipe = $this->input->post('tipe') == '' ? 'harian' : $this->input->post('tipe');
        $chartVar = $this->input->post('chartVar') == '' ? '0' : $this->input->post('chartVar');
        $lim = $this->input->post('limit') == '' ? '0' : $this->input->post('limit');

        if ($chartVar == 0) {
            $limit1 = 0;
            $limit2 = $lim;
        } else {
            $limit1 = (($chartVar * -1) * $lim) + 1;
            $limit2 = (($chartVar * -1) + 1) * $lim;
        }

        switch ($tipe) {
            case 'harian' : {
                    $result = $this->db->query("
					SELECT DATE_FORMAT(VisDate,'%W, %d-%b-%Y') as judul,
						count(*) as jumlah
					FROM logs a
					WHERE (DATEDIFF(NOW(),DATE(VisDate)) >= " . $limit1 . ")
						AND (DATEDIFF(NOW(),DATE(VisDate)) <= " . $limit2 . ")
					GROUP BY DATE(VisDate)
					ORDER BY VisDate
				");
                    $hasil = json_encode($result->result_object());
                } break;
            case 'bulanan' : {
                    $arr = array();
                    for ($i = $limit2; $i >= $limit1; $i--) {
                        if (date("d") >= 28) {
                            $yearMon = date("Y-m", strtotime("-20 day -" . $i . " month"));
                        } else {
                            $yearMon = date("Y-m", strtotime("-" . $i . " month"));
                        }

                        $query = $this->db->query("
						SELECT DATE_FORMAT(VisDate,'%M-%Y') as judul,
							count(*) as jumlah
						FROM logs a
						WHERE a.VisDate LIKE '" . $yearMon . "%'
						GROUP BY MONTH(a.VisDate)
					");
                        foreach ($query->result() as $row) {
                            $arr[] = array(
                                'judul' => $row->judul,
                                'jumlah' => $row->jumlah
                            );
                        }
                    }
                    $hasil = json_encode($arr);
                } break;
            case 'tahunan' : {
                    $arr = array();
                    for ($i = $limit2; $i >= $limit1; $i--) {
                        $year = date("Y", strtotime("-" . $i . " year"));
                        $query = $this->db->query("
						SELECT YEAR(a.VisDate) as judul,
							count(*) as jumlah
						FROM logs a
						WHERE a.VisDate LIKE '" . $year . "%'
						GROUP BY YEAR(a.VisDate)
					");
                        foreach ($query->result() as $row) {
                            $arr[] = array(
                                'judul' => $row->judul,
                                'jumlah' => $row->jumlah
                            );
                        }
                    }
                    $hasil = json_encode($arr);
                } break;
        }

        return '({rows:' . $hasil . '})';
    }

    function m_statistikLast() {
        $tipe = $this->input->post('tipe') == '' ? 'harian' : $this->input->post('tipe');
        $chartVar = $this->input->post('chartVar') == '' ? '0' : $this->input->post('chartVar');
        $lim = $this->input->post('limit') == '' ? '0' : $this->input->post('limit');

        $limit1 = (($chartVar * -1) * $lim) + 1;
        $limit2 = (($chartVar * -1) + 1) * $lim;

        $jum = 0;
        switch ($tipe) {
            case 'harian' : {
                    $query = $this->db->query("
					SELECT COUNT(*) AS jum 
					FROM logs 
					WHERE DATEDIFF(NOW(),DATE(VisDate)) <= " . $limit2 . "
					GROUP BY DATE(VisDate)
				");
                    foreach ($query->result() as $row) {
                        $jum = $row->jum;
                    }
                } break;
            case 'bulanan' : {
                    $limit2 = $limit2++;
                    if (date("d") >= 28) {
                        $yearMon = date("Y-m", strtotime("-20 day -" . $limit2 . " month"));
                    } else {
                        $yearMon = date("Y-m", strtotime("-" . $limit2 . " month"));
                    }
                    $query = $this->db->query("
					SELECT COUNT(*) AS jum
					FROM logs
					WHERE VisDate LIKE '" . $yearMon . "%'
					GROUP BY MONTH(VisDate)
				");
                    foreach ($query->result() as $row) {
                        $jum = $row->jum;
                    }
                } break;
            case 'tahunan' : {
                    $compare = date("Y", strtotime("-" . $limit2 . " year"));
                    $query = $this->db->query("
					SELECT COUNT(*) AS jum
					FROM logs
					WHERE VisDate LIKE '" . $compare . "%'
					GROUP BY YEAR(VisDate)
				");
                    foreach ($query->result() as $row) {
                        $jum = $row->jum;
                    }
                } break;
        }
        return $jum;
    }

    function m_bukuTamu($act) {
        $name = $this->input->post('name') == '' ? '' : $this->input->post('name');
        $email = $this->input->post('email') == '' ? '' : $this->input->post('email');
        $text = $this->input->post('text') == '' ? '' : $this->input->post('text');
        $newText = preg_replace('/[^[:print:]]/', '', $this->input->post('text'));
        $newText = htmlspecialchars($newText, ENT_QUOTES);
        $limit = $this->input->post('limit') == '' ? '' : $this->input->post('limit');
        $start = $this->input->post('start') == '' ? '' : $this->input->post('start');
        $dir = $this->input->post('dir') == '' ? 'DESC' : $this->input->post('dir');
        $sort = $this->input->post('sort') == '' ? 'date' : $this->input->post('sort');

        switch ($act) {
            case "insert" : {
				$this->email->from($email, $name);
				$this->email->to('kontak@indoquran.web.id');
				$this->email->cc($email);

				$this->email->subject('GBook Baru Indoquran.web.id Dari '.$name);
				$this->email->message('Dari : '.$name.' Email : '.$email.' Isi : '.$text);

				$this->email->send();

                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'text' => $newText,
                        'email_status' => $this->email->print_debugger()
                    );

                    if ($this->db->insert('bukutamu', $data)) {
                        echo "{success:true, Msg:'Sukses memasukkan bukutamu dari $_REQUEST[name]'}";
                    } else {
                        echo"{success:false, Msg:'Gagal memasukkan bukutamu dari $_REQUEST[name]'}";
                    }
                } break;
            case "read" : {
                    $query = $this->db->select('*')->from('bukutamu')->order_by($sort, $dir)->limit($limit, $start)->get();
                    $arr = array();
                    foreach ($query->result() as $row) {
                        $arr[] = array(
                            'id' => $row->id,
                            'date' => $row->date,
                            'tgl' => date('d-M-Y H:i:s',strtotime($row->date)),
                            'name' => $row->name,
                            'email' => $row->email,
                            'text' => htmlspecialchars_decode(str_replace("\\", "", $row->text), ENT_QUOTES),
                            'email_status' => $row->email_status
                        );
                    }
                    $sum = $this->db->count_all('bukutamu');
                    echo '({success:true, total:' . $sum . ',rows:' . json_encode($arr) . '})';
                } break;
        }
    }

    function m_randCapcha() {
        $query = $this->db->order_by('cap_id', 'random')->limit(1)->get('capcha');
        $arr = array();
        foreach ($query->result() as $row) {
            $arr[] = "(" . $row->txt . ") => ";
            $arr[] = $row->key;
        }
        return json_encode($arr);
    }

    function m_kataMutiara() {
        $query = $this->db->select('text')->from('katamutiara')->order_by("kataId", "random")->limit(1)->get();
        $kata = '';
        foreach ($query->result() as $row) {
            $kata .= $row->text;
        }
        return $kata;
    }

    function m_getAyatInfo() {
        $query = $this->db->query("
			SELECT (SELECT CONCAT('[',a.SuraID, ':', a.VerseID, '] ', b.nama, ' (', b.arti, '), Ayat ', a.VerseID)
				FROM quran_indo a 
				LEFT JOIN surah b ON (a.SuraID=b.id)
				WHERE a.ID = (c.ID - 1)) prev
				,CONCAT('[',c.SuraID, ':', c.VerseID, '] ', d.nama, ' (', d.arti, '), Ayat ', c.VerseID) current
				,(SELECT CONCAT('[',a.SuraID, ':', a.VerseID, '] ', b.nama, ' (', b.arti, '), Ayat ', a.VerseID)
				FROM quran_indo a 
				LEFT JOIN surah b ON (a.SuraID=b.id)
				WHERE a.ID = (c.ID + 1)) next
			FROM quran_indo c 
			LEFT JOIN surah d ON (c.SuraID=d.id)
			WHERE c.ID = '" . $this->input->post('ayatId') . "'
		");
        foreach ($query->result() as $row) {
            return '["' . $row->prev . '","' . $row->current . '","' . $row->next . '"]';
        }
    }
	
	function m_getAyatId() {
		$surah = $this->input->post('surah') == '' ? 0 : $this->input->post('surah');
		$ayat = $this->input->post('ayat') == '' ? 0 : $this->input->post('ayat');
		$q = $this->db->get_where('quran_indo',array('SuraID'=>$surah,'VerseID'=>$ayat));
		foreach($q->result() as $r) {
			return $r->ID;
		}
	}

    function m_getJudulAyat($id = 1) {
        $query = $this->db->select("CONCAT('[',a.SuraID, ':', a.VerseID, '] ', b.nama, ' (', b.arti, '), Ayat ', a.VerseID) AS hasil", false)
                        ->from('quran_indo a')
                        ->join('surah b', 'a.SuraID = b.id')
                        ->where('a.ID', $id)->get();
        foreach ($query->result() as $row) {
            $hasil = $row->hasil;
        }
        return $hasil;
    }

    function m_download() {
        $email = $this->input->post('emailField') == '' ? '' : $this->input->post('emailField');
        $url = $this->input->post('urlField') == '' ? '' : $this->input->post('urlField');
        if (($url == "http://www.adrive.com/public/Ma6rDh.html") || ($url == "http://www.adrive.com/public/9WEXDQ.html"))
            $url = 'http://www.4shared.com/file/6F3hFxSJ/application.html?';

        if (($url == "http://www.adrive.com/public/wKTRUt.html") || ($url == "http://www.4shared.com/file/Zex0WJ1N/Al_Quran_Digital.html?"))
            $url = 'http://www.indoquran.web.id/download/AlQuranDigital.chm';


        if ($url == 'http://www.indoquran.web.id/download/AlQuranDigital.chm') { //jika .chm
            $msg = '<i>Assalamualaikum Warrahmatullahi Wabaroklatuh.</i><br>Berikut alamat download aplikasi : <a href="' . $url . '">' . $url . '</a>.';
            $subjek = 'Request Download Aplikasi';
        } else {
            $msg = '<i>Assalamualaikum Warrahmatullahi Wabaroklatuh.</i><br>Berikut alamat download aplikasi : <a href="' . $url . '">' . $url . '</a><br>Harap konfirmasi melalui reply email ini jika file sudah berhasil download dan antum ingin mulai membuka aplikasi. Kami akan memberikan detail password untuk aplikasi tersebut.';
            $subjek = 'Download Aplikasi';
        }

        $this->email->from('kontak@indoquran.web.id', 'Alquran Digital:Indonesian Transalation');
        $this->email->to($email);
        $this->email->cc('kontak@indoquran.web.id');

        $this->email->subject($subjek);
        $this->email->message($msg);
        $this->email->send();

        if ($this->db->insert('download_stat', array('ip' => $_SERVER['REMOTE_ADDR'], 'email' => $this->input->post('emailField'), 'email_status' => $this->email->print_debugger()))) {
            echo "{success:true, Msg:'Berhasil download, harap cek email'}";
        }
        else
            echo "{success:false, Msg:'Gagal download'}";
    }
	
	function m_getListAyatId() {
		$SuraID = $this->input->post('SuraID') == '' ? '' : $this->input->post('SuraID');
		$q = $this->db->get_where('quran_indo',array('SuraID'=>$SuraID));
		$arr = array();
		for($i=1;$i<=$q->num_rows();$i++) {
			$arr[]['id'] = $i;
		}
		return '({rows:' . json_encode($arr) . '})';
	}
	
	function m_getListPlatform() {
		$q = $this->db->select('VisPlatform as id,VisPlatform as text')->from('logs')->group_by('VisPlatform')->order_by('VisPlatform')->get();
		return json_encode($q->result());
	}

}