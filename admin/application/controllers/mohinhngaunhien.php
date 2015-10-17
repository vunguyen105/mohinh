<?php
class mohinhngaunhien extends Backend_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function matran() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post();
			$size = (int)sqrt(count($post["datastring"]));
			$matran = array();
			foreach ($post["datastring"] as $key => $value) {
				$k1 = substr($value["name"], 1, (strlen($value["name"]) -1)/2);
				$k2 = substr($value["name"], (strlen($value["name"]) -1)/2 + 1);
				if($pos = strpos($value['value'], '/')) {
					$fraction = array('whole' => 0);
					preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $value['value'], $fraction);
					$result = $fraction['whole'] + $fraction['numerator']/$fraction['denominator'];
					$matran[$k1][$k2] = floatval($result);
				} else {
					$matran[$k1][$k2] = floatval($value['value']);
				}
			}//echo "<pre>";var_dump($matran);
			//var_dump($this->checkmatrachuyen($matran,$size));die;
			if($this->checkmatrachuyen($matran,$size)) {
				echo json_encode ( array (
						'stt' => 1,
						'msg' => 'Ma trận xác suất chuyển' 
				) );
				die ();
			} 
			else {
				echo json_encode ( array (
						'stt' => 2,
						'msg' => 'Không phải ma trận xác suất chuyển' 
				) );
				die ();
			}	
		} else {
			$data = array ();
			$this->template->add_title ( 'Mô hình ngẫu nhiên và ứng dụng' );
			//$this->template->write ( 'title', 'Mô hình ngẫu nhiên và ứng dụng' );
			//$this->template->write ( 'desption', 'Nhóm 6' );
			$this->template->write_view ( 'content', 'ngaunhien/ngaunhien', $data, true );
			$this->template->render ();
		}
	}
	private function checkmatrachuyen($matran,$size) {//echo "<pre>";var_dump($matran);
		for ($i=1; $i <= $size ; $i++) { 
				$sum = 0.0;
				for ($j=1; $j <= $size ; $j++) {// echo $i.$j;
					$sum += $matran[$i][$j];//var_dump($j);
					 if($matran[$i][$j] < 0 && $matran[$i][$j] > 1) 
					 	return FALSE;
				}//var_dump($sum);
				//var_dump($sum."--".$i);var_dump((string)$sum == '1');
				if(!((string)$sum == '1')) return FALSE;
		}
		return true;
	}
	private function checkphanphoichuan($phanphoi,$size) { //var_dump($size);
		$sum = 0;
		for ($j=1; $j <= $size ; $j++) { 
			$sum += $phanphoi[$j];
			 if($phanphoi[$j] < 0) 
			 	return FALSE;
		}
		if($sum != 1) return FALSE;
		return true;
	}
	public function checkphanphoi() { 
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post();
			$size = (int)count($post["datastring"]);
			$phanphoi = array();
			foreach ($post["datastring"] as $key => $value) {
				$k1 = substr($value["name"], 1);
				if($pos = strpos($value['value'], '/')) {
					$fraction = array('whole' => 0);
					preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $value['value'], $fraction);
					$result = $fraction['whole'] + $fraction['numerator']/$fraction['denominator'];
					$phanphoi[$k1] = $result;
				} else {
					$phanphoi[$k1] = (float)$value['value'];
				}
			}
			if($this->checkphanphoichuan($phanphoi,$size)) {
				echo json_encode ( array (
						'stt' => 1,
						'msg' => 'Điều kiện phân phối ban đầu thỏa mãn ' 
				) );
				die ();
			} 
			else {
				echo json_encode ( array (
						'stt' => 2,
						'msg' => 'Không Thỏa mãn điều kiện phân phối ban đầu' 
				) );
				die ();
			}	
		}
	}

	public function checklienthong() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post();
			$size = (int)sqrt(count($post["matran"]));
			if(empty($post['t1']) || empty($post['t2'])) {
				echo json_encode ( array (
						'stt' => 2,
						'msg' => 'Vui lòng nhập 2 trạng thái'
				) );
				die ();
			}
			if($post['t1'] > $size || $post['t1'] <= 0) {
				echo json_encode ( array (
						'stt' => 2,
						'msg' => 'Trạng thái '.$post['t1'].' không tồn tại'
				) );
				die ();
			}
			if($post['t2'] > $size || $post['t2'] <= 0) {
				echo json_encode ( array (
						'stt' => 2,
						'msg' => 'Trạng thái '.$post['t2'].' không tồn tại'
				) );
				die ();
			}
			if($post['t1'] == $post['t2']) {
				echo json_encode ( array (
						'stt' => 2,
						'msg' => 'Vui lòng nhập 2 trạng thái khác nhau'
				) );
				die ();
			}
			$matran = array();
			foreach ($post["matran"] as $key => $value) {
				$k1 = substr($value["name"], 1, (strlen($value["name"]) -1)/2);
				$k2 = substr($value["name"], (strlen($value["name"]) -1)/2 + 1);
				if($pos = strpos($value['value'], '/')) {
					$fraction = array('whole' => 0);
					preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $value['value'], $fraction);
					$result = $fraction['whole'] + $fraction['numerator']/$fraction['denominator'];
					$matran[$k1][$k2] = $result;
				} else {
					$matran[$k1][$k2] = (float)$value['value'];
				}
			}
			if(!$this->checkmatrachuyen($matran,$size)) {
				echo json_encode ( array (
						'stt' => 3,
						'msg' => 'Không phải ma trận xác suất chuyển' 
				) );
				die ();
			}
			if($matran[$post['t1']][$post['t2']] > 0 && $matran[$post['t2']][$post['t1']] >0) {
				echo json_encode ( array (
						'stt' => 1,
						'msg' => 'Trạng thái '.$post['t1'].' liên thông với trạng thái '.$post['t2']
				) );
				die ();
			} 
			else {
				echo json_encode ( array (
						'stt' => 2,
						'msg' => 'Trạng thái '.$post['t1'].' không liên thông với trạng thái '.$post['t2']
				) );
				die ();
			}	
		}
	}

	public function tinhluythua() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post();
			if($post["luythua"] <= 0) {
				echo'<span class="help-block">Vui lòng nhập số mũ lớn hơn 0</span>';die;
			}
			$size = (int)sqrt(count($post["datastring"]));
			$matran = array();
			foreach ($post["datastring"] as $key => $value) {
				$k1 = substr($value["name"], 1, (strlen($value["name"]) -1)/2);
				$k2 = substr($value["name"], (strlen($value["name"]) -1)/2 + 1);
				if($pos = strpos($value['value'], '/')) {
					$fraction = array('whole' => 0);
					preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $value['value'], $fraction);
					$result = $fraction['whole'] + $fraction['numerator']/$fraction['denominator'];
					$matran[$k1][$k2] = $result;
				} else {
					$matran[$k1][$k2] = (float)$value['value'];
				}
			}//echo "<pre>";var_dump($post["luythua"]);
			$listThuaSo = $this->convert10to2($post["luythua"]);//var_dump($listThuaSo);die;
			$listMaTranThuaSo = array();
			$i = 1;
			foreach ($listThuaSo as $key => $value) {
				if($value == 1) {
					$listMaTranThuaSo[$i] = $this->tinhAk($matran,$key);
					$i++;
				}
			}
			//var_dump($this->tinhAk($matran,1));die;
			//var_dump($listThuaSo);die;
			$tich = $this->nhannhom($listMaTranThuaSo);//var_dump($tich);die;
			if($size < 7) {
            $string = '<div class="span5">';
            $string .='<div class="portlet-body">';
            $string .= '<div> </div>';
            $string .='<table class="table table-bordered table-hover">';
            $string .= '<tbody>';
            for ($i = 1; $i <= $size; $i++) {
            	$string .= '<tr>';
            	for ($j = 1; $j <= $size; $j++) {
            		$string .= '<td>';
                    $string .=  $matran[$i][$j];
                    $string .= '</td>'; 
            	}
                $string .= '</tr>';
            }
            $string .= '</tbody></table>';
            $string .= '</div>';
            $string .= '</div>';
			
			$string .= '<div class="span1">';
            $string .='<div class="portlet-body">';
            $string .= '<div id="somu">^ '.$post["luythua"].'</div>';
            $string .='<table class="table table-bordered">';
            $string .= '<tbody>';
            for ($i = 1; $i <= $size; $i++) {
            	$string .= '<tr>';
            		$string .= '<td>';
            		if(ceil($size/2) == $i) {
            			$string .=  '=';
            		}
                    $string .= '</td>';
                $string .= '</tr>';
            }
            $string .= '</tbody></table>';
            $string .= '</div>';
            $string .= '</div>';

			$string .= '<div class="span5">';
            $string .='<div class="portlet-body">';
            $string .= '<div> </div>';
            $string .='<table class="table table-bordered table-hover">';
            $string .= '<tbody>';
            for ($i = 1; $i <= $size; $i++) {
            	$string .= '<tr>';
            	for ($j = 1; $j <= $size; $j++) {
            		$string .= '<td>';
                    $string .=  $tich[$i][$j];
                    $string .= '</td>'; 
            	}
                $string .= '</tr>';
            }
            $string = '</tbody></table>';
            $string .= '</div>';
            $string .= '</div>';
        	} else {
        	$string = '<div class="span11">';
            $string .='<div class="portlet-body">';
            $string .= '<div> </div>';
            $string .='<table class="table table-bordered table-hover">';
            $string .= '<tbody>';
            for ($i = 1; $i <= $size; $i++) {
            	$string .= '<tr>';
            	for ($j = 1; $j <= $size; $j++) {
            		$string .= '<td>';
                    $string .=  $tich[$i][$j];
                    $string .= '</td>'; 
            	}
                $string .= '</tr>';
            }
            $string .= '</tbody></table>';
            $string .= '</div>';
            $string .= '</div>';
        	}
			echo $string;die;
		}
	}
	public function tinhchuky() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post();
			$size = (int)sqrt(count($post["datastring"]));
			$matran = array();
			foreach ($post["datastring"] as $key => $value) {
				$k1 = substr($value["name"], 1, (strlen($value["name"]) -1)/2);
				$k2 = substr($value["name"], (strlen($value["name"]) -1)/2 + 1);
				if($pos = strpos($value['value'], '/')) {
					$fraction = array('whole' => 0);
					preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $value['value'], $fraction);
					$result = $fraction['whole'] + $fraction['numerator']/$fraction['denominator'];
					$matran[$k1][$k2] = $result;
				} else {
					$matran[$k1][$k2] = $value['value'];
				}
			}
			if($this->checkmatrachuyen($matran,$size)) {
				$chukytrangthai = $this->tinhchukytrangthai($matran,$size);
				foreach ($chukytrangthai as $key => $value) {
					echo "Chu kỳ trạng thái ".$key." là: ".$value."<br>";
				}
 			} 
			else {
				echo'<span class="help-block">Ma trận trên không phải ma trận chuyển</span>';
				die ();
			}
		}
	}
	public function tinhxs() {
		if ($this->input->is_ajax_request ()) {
			$post = $this->input->post();
			$size = (int)sqrt(count($post["datamatran"]));
			$matran = array();
			foreach ($post["datamatran"] as $key => $value) {
				$k1 = substr($value["name"], 1, (strlen($value["name"]) -1)/2);
				$k2 = substr($value["name"], (strlen($value["name"]) -1)/2 + 1);
				if($pos = strpos($value['value'], '/')) {
					$fraction = array('whole' => 0);
					preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $value['value'], $fraction);
					$result = $fraction['whole'] + $fraction['numerator']/$fraction['denominator'];
					$matran[$k1][$k2] = $result;
				} else {
					$matran[$k1][$k2] = $value['value'];
				}
			}
			$phanphoi = array();
			foreach ($post["dataphanphoi"] as $key => $value) {
				$k1 = substr($value["name"], 1);
				if($pos = strpos($value['value'], '/')) {
					$fraction = array('whole' => 0);
					preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $value['value'], $fraction);
					$result = $fraction['whole'] + $fraction['numerator']/$fraction['denominator'];
					$phanphoi[$k1] = $result;
				} else {
					$phanphoi[$k1] = (float)$value['value'];
				}
			}
			if($this->checkmatrachuyen($matran,$size) && $this->checkphanphoichuan($phanphoi,$size)) {
				$xs = $phanphoi[1];
				for ($i=2; $i <= $size; $i++) { 
					$xs *= $matran[$i-1][$i];
				}
				echo "Xác suất: P(Xn=in,Xn-1=in-1,....,X0=i0) = ".$xs."<br>";
 			} 
			else if(!$this->checkmatrachuyen($matran,$size)){
				echo'<span class="help-block">Ma trận trên không phải ma trận chuyển</span>';
				die ();
			}
			else {
				echo'<span class="help-block">Điều kiện phân phối ban đầu không thỏa mãn</span>';
				die ();
			}
		}
	}
	private function tinhchukytrangthai($matran,$size) {
		$chuky = array();
		for ($i=1; $i <= $size ; $i++) { 
				if($matran[$i][$i] > 0 && $matran[$i][$i] <= 1 ) {
					$chuky[$i] = 1;
				} else {
					$chuky[$i] = 0;
				}

		}
		return $chuky;
	}
	public function tichmatran($a,$b) {
		$kq = array();
		$length = count($a);
		for ($i=1; $i <= $length; $i++) {
			for ($j=1; $j <= $length; $j++) {
				$kq[$i][$j] = 0;
				for ($k=1; $k <= $length; $k++) { 
					$kq[$i][$j] += $a[$i][$k]*$b[$k][$j];
				}
			}
		}//var_dump($kq);	
		return $kq;
	}
	public function convert10to2($n) {
		$k = array();
		$i = 0;
		do{
           $k[$i++]=$n%2;
           $n=floor($n/2);
      	}while($n>0);//echo "<pre>";print_r($k);
      	return $k;
	}
	public function tinhAk($matran, $index) {//var_dump($index);
		$Ak = $matran;
		while ($index > 0) {
			$Ak = $this->tichmatran($Ak,$Ak);
			$index--;
		}
		//var_dump($Ak);	
		return $Ak;
	}
	public function nhannhom($array) {
		if(count($array) == 1)
			return $array[1];
		$tichMaTran = $array[1];
		for ($i=2; $i <= count($array); $i++) { 
			$tichMaTran = $this->tichmatran($tichMaTran,$array[$i]);
		}
		return $tichMaTran;
	}
}
