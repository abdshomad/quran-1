<?php
class M_topik extends CI_Model {
    function m_isLeaf($parent_id) {
		$jum = $this->db->get_where('topik_grup', array('parent_id'=>$parent_id))->num_rows();
		if($jum > 0) return false;
		else return true;
	}
	
	function isiToArray($isi) {
		$isi = str_replace(" ","",$isi);
		return explode(",", trim($isi));
	}
	
	function m_getTopikMenu() {
		$arr = array();
		$i = 0;
		$query = $this->db->get_where('topik_grup', array('is_title'=>1));
		foreach($query->result() as $row) {
			$arr[$i] = array(
				'title' => $row->text
			);
			$q = $this->db->get_where('topik_grup', array('parent_id'=>$row->id));
			if ($q->num_rows() > 0) {
				$j = 0;
				foreach($q->result() as $r) {
					$arr[$i]['lbar'][$j] = array(
						'text' => $r->text,
						'iconCls' => 'menu_root',
						'textAlign' => 'left'
					);
					$subMenuQry = $this->db->get_where('topik_grup', array('parent_id'=>$r->id));
					if ($subMenuQry->num_rows() > 0) {
						$k = 0;
						foreach($subMenuQry->result() as $rMenu) {
							$arr[$i]['lbar'][$j]['menu'][$k] = array(
								'text' => $rMenu->text,
								'iconCls' => 'menu_child'
							);
							if(!$this->m_isLeaf($rMenu->id)) {
								$subMenuQry1 = $this->db->get_where('topik_grup', array('parent_id'=>$rMenu->id));
								if ($subMenuQry1->num_rows() > 0) {
									$l = 0;
									foreach($subMenuQry1->result() as $rMenu1) {
										$arr[$i]['lbar'][$j]['menu'][$k]['menu'][$l] = array(
											'text' => $rMenu1->text,
											'iconCls' => 'menu_child'
										);
										$l++;
									}
								} else {
									$arr[$i]['lbar'][$j]['menu'][$k]['menu'][$l]['handler'] = 'onItemClick('.$r->id.')';
								}
							}
							$k++;
						}
					} else {
						$arr[$i]['lbar'][$j]['handler'] = 'onItemClick('.$r->id.')';
					}
					$j++;
				}
			}
			$arr[$i]['html'] = 'testing '.$i;
			$i++;
		}
		//return substr(json_encode($arr), 1, -1);
		
		$arrFunc1 = array();
		$arrFunc2 = array();
		
		$qry = $this->db->get('topik_grup');
		foreach($qry->result() as $row) {
			$arrFunc1[] = '"onItemClick('.$row->id.')"';
		}
		foreach($qry->result() as $row) {
			$arrFunc2[] = 'onItemClick('.$row->id.')';
		}
		
		$hasil = str_replace($arrFunc1, $arrFunc2, json_encode($arr));
		
		return $hasil;
    }
	
	function m_getTreeTopik() {
		$data = array(
			'text'=>'.'
		);
		$row = array();
		$id = $this->input->post('id') == '' ? 0 : $this->input->post('id');
		if($id==0) {
			$query = $this->db->select('*')->from('topik_grup')->where(array('parent_id'=>null))->get();
		} else {
			$query = $this->db->select('*')->from('topik_grup')->where(array('parent_id'=>$id))->get();
		}
		foreach ($query->result_array() as $row) {
			$queryChild = $this->db->get_where('topik_grup',array('parent_id'=>$row['id']));
			if($queryChild->num_rows() > 0) {
				// if have a child
				$row['leaf'] = false;
				$row['cls'] = 'folder';
			} else {
				// if have no child
				$row['leaf'] = true;
				$row['cls'] = 'file';
			}
			$qAdadTopik = $this->db->get_where('topik_grup',array('id'=>$row['id'],'isi'=>null));
			if($qAdadTopik->num_rows() > 0) {
				$row['adaTopik'] = 'kosong';
				$row['jumTopik'] = '-';
			}
			else {
				$row['adaTopik'] = 'ada';
				$row['jumTopik'] = count($this->isiToArray($row['isi']));
			}
			$data['children'][] = $row;
		}
		return json_encode($data);
	}
	
	function viewTopikContent($id) {
		$hasil = '';
		$query = $this->db->select('*')->from('topik_grup')->where('id',$id)->get();
		$jum = $query->num_rows();
		if($jum > 0) {
			$arrIsi = array();
			$isi = '';
			foreach ($query->result() as $row) {
				$isi = str_replace(" ","",$row->isi);
			}
			$arrIsi = $this->isiToArray($isi);
			$i = 1;
			foreach ($arrIsi as $val) {
				$pieces = explode(":", $val);
				$q = $this->db->get_where('quran_indo',array('SuraID'=>intval($pieces[0]),'VerseID'=>intval($pieces[1])));
				foreach ($q->result() as $r) {
					// $hasil .= '
						// <table width="100%">
						// <tr><td valign="top"><b>('.$i.') QS. ['.$r->SuraID.':'.$r->VerseID.']<br><br>
						// <i>"'.$r->AyahText.'"</i></b></td><td valign="top">
						// <div align="right">
						// <img src="'.base_url().'assets/'.$r->img.'" />&nbsp;&nbsp;&nbsp;<br>
						// <object type="application/x-shockwave-flash" data="'.base_url().'assets/swf/player.swf" id="audioplayer1" height="24" width="460">
						// <param name="movie" value="'.base_url().'assets/swf/player.swf">
						// <param name="FlashVars" value="playerID=1&amp;bg=0xEFEFEF&amp;leftbg=0xCCCCCC&amp;lefticon=0x666666&amp;rightbg=0xB6E1E1&amp;rightbghover=0x9BA948&amp;righticon=0x798732&amp;righticonhover=0xFFFFFF&amp;text=0x666666&amp;slider=0x666666&amp;track=0xFFFFFF&amp;border=0x666666&amp;loader=0xEDF4CA&amp;soundFile='.base_url().'assets/quran_'.$r->mp3.'">
						// <param name="quality" value="high">
						// <param name="menu" value="false">
						// <param name="wmode" value="transparent">
						// </object>
						// </div></td></tr>
						// <tr><td colspan="2"><hr noshade size="1"></td></tr>
						// </table>
					// ';
					$hasil .= '
						<table width="100%">
						<tr><td valign="top"><b>('.$i.') QS. ['.$r->SuraID.':'.$r->VerseID.']<br><br>
						<i>"'.$r->AyahText.'"</i></b></td></tr>
						<tr><td colspan="2"><hr noshade size="1"></td></tr>
						</table>
					';
				}
				$i++;
			}
		} else $hasil = false;
		return $hasil;
	}
	
	function m_getGridTopik($id) {
		$arrIsi = array();
		$hasil = array();
		$query = $this->db->select('*')->from('topik_grup')->where('id',$id)->get();
		$jum = $query->num_rows();
		if($jum > 0) {
			$isi = '';
			foreach ($query->result() as $row) {
				$isi = str_replace(" ","",$row->isi);
			}
			$arrIsi = $this->isiToArray($isi);
			$i = 0;
			foreach ($arrIsi as $val) {
				$pieces = explode(":", $val);
				$q = $this->db->get_where('quran_indo',array('SuraID'=>intval($pieces[0]),'VerseID'=>intval($pieces[1])));
				foreach ($q->result_array() as $r) {
					$hasil[] = $r;
				}
				$i++;
			}
		}
        return '({total:' . $i . ',data:' . json_encode($hasil) . '})';
    }
}