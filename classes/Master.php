<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}

	public function __destruct(){
		parent::__destruct();
	}

	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}

	// GOODS AVAILABLE
	
	function save_goodsavailable(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = addslashes(trim($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}

		$check = $this->conn->query("SELECT * FROM `goodsavailable_list` where `name` = '{$name}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Goods Available Name already exists.";
			return json_encode($resp);
			exit;
		}

		if(empty($id)){
			$sql = "INSERT INTO `goodsavailable_list` set {$data} ";
		}else{
			$sql = "UPDATE `goodsavailable_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$bid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Goods Available successfully saved.";
			else
				$resp['msg'] = "Goods Available successfully updated.";
			
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

	function delete_goodsavailable(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `goodsavailable_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Goods Available successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}

	// GOODS NEEDED
	
	function save_goodsneeded(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = addslashes(trim($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}

		$check = $this->conn->query("SELECT * FROM `goodsneeded_list` where `name` = '{$name}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Goods Needed Name already exists.";
			return json_encode($resp);
			exit;
		}

		if(empty($id)){
			$sql = "INSERT INTO `goodsneeded_list` set {$data} ";
		}else{
			$sql = "UPDATE `goodsneeded_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$bid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Goods Needed successfully saved.";
			else
				$resp['msg'] = "Goods Needed successfully updated.";
			
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

	function delete_goodsneeded(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `goodsneeded_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Goods Needed successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}

	
	// GOODS LIST

	/**function save_goodslist(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = addslashes(trim($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}

		$check = $this->conn->query("SELECT * FROM `goods_list` where `name` = '{$name}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Goods Name already exists.";
			return json_encode($resp);
			exit;
		}

		if(empty($id)){
			$sql = "INSERT INTO `goods_list` set {$data} ";
		}else{
			$sql = "UPDATE `goods_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$bid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Goods successfully saved.";
			else
				$resp['msg'] = " Goods successfully updated.";
			
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

	function delete_goodslist(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `goods_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Goods successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}*/

	// VICTIM APP
	function save_victimapp(){
		if(empty($id)){
			$prefix = date("Ym");
			$code = sprintf("%'.05d",1);
			while(true){
				$check = $this->conn->query("SELECT * FROM `victimapp_list` where code = '{$prefix}{$code}' ")->num_rows;
				if($check > 0){
					$code = sprintf("%'.05d",ceil($code) + 1);
				}else{
					break;
				}
			}
			$_POST['code'] = $prefix.$code;
		}
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,['id'])){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$this->conn->real_escape_string($v)}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `victimapp_list` set {$data} ";
		}else{
			$sql = "UPDATE `victimapp_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$bid = empty($id) ? $this->conn->insert_id : $id;
			$resp['bid'] = $bid;
			$resp['status'] = 'success';
			$code = $this->conn->query("SELECT code FROM `victimapp_list` where id = '{$bid}'")->fetch_array()['code'];
			if(empty($id)){
				$resp['process'] = "new";
				$resp['msg'] = 'Your application has been sent successfully. We will reach you as soon as we sees you application request using your given contact information. Thank you!';
			}else{
				$resp['process'] = "old";
				$resp['msg'] = "Application Details has been updated successfully.";
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = 'Application has failed to saved due to an error occurred.';
			$resp['error'] = $this->conn->error;
			$resp['sql'] = $sql;
		}
		if($resp['status'] == 'success' && isset($resp['msg'])){
			if($resp['process'] == 'new'){
				$this->settings->set_flashdata("success_fix", $resp['msg']);
			}else{
				$this->settings->set_flashdata("success", $resp['msg']);
			}
		}
		return json_encode($resp);
	}


	function update_vstatus(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `victimapp_list` set `status` = '{$status}' where id = '{$id}'");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = "Application Status has been updated successfully";
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = "Application Status has failed to update";
		}
		return json_encode($resp);
	}
	function delete_victimapp(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `victimapp_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Application successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}

	// DONATOR APP
	function save_donatorapp(){
		if(empty($id)){
			$prefix = date("Ym");
			$code = sprintf("%'.05d",1);
			while(true){
				$check = $this->conn->query("SELECT * FROM `donatorapp_list` where code = '{$prefix}{$code}' ")->num_rows;
				if($check > 0){
					$code = sprintf("%'.05d",ceil($code) + 1);
				}else{
					break;
				}
			}
			$_POST['code'] = $prefix.$code;
		}
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,['id'])){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$this->conn->real_escape_string($v)}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `donatorapp_list` set {$data} ";
		}else{
			$sql = "UPDATE `donatorapp_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$bid = empty($id) ? $this->conn->insert_id : $id;
			$resp['bid'] = $bid;
			$resp['status'] = 'success';
			$code = $this->conn->query("SELECT code FROM `donatorapp_list` where id = '{$bid}'")->fetch_array()['code'];
			if(empty($id)){
				$resp['process'] = "new";
				$resp['msg'] = 'Your application has been sent successfully. Thank you!';
			}else{
				$resp['process'] = "old";
				$resp['msg'] = "Application Details has been updated successfully.";
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = 'Application has failed to saved due to an error occurred.';
			$resp['error'] = $this->conn->error;
			$resp['sql'] = $sql;
		}
		if($resp['status'] == 'success' && isset($resp['msg'])){
			if($resp['process'] == 'new'){
				$this->settings->set_flashdata("success_fix", $resp['msg']);
			}else{
				$this->settings->set_flashdata("success", $resp['msg']);
			}
		}
		return json_encode($resp);
	}


	function update_status(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `donatorapp_list` set `status` = '{$status}' where id = '{$id}'");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = "Application Status has been updated successfully";
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = "Application Status has failed to update";
		}
		return json_encode($resp);
	}
	function delete_donatorapp(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `donatorapp_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Application successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}

	// DONATOR APP
	/**function save_donatorapp(){
		if(empty($id)){
			$prefix = date("Ym");
			$code = sprintf("%'.05d",1);
			while(true){
				$check = $this->conn->query("SELECT * FROM `donatorapp_list` where code = '{$prefix}{$code}' ")->num_rows;
				if($check > 0){
					$code = sprintf("%'.05d",ceil($code) + 1);
				}else{
					break;
				}
			}
			$_POST['code'] = $prefix.$code;
		}
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,['id'])){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$this->conn->real_escape_string($v)}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `donatorapp_list` set {$data} ";
		}else{
			$sql = "UPDATE `donatorapp_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$bid = empty($id) ? $this->conn->insert_id : $id;
			$resp['bid'] = $bid;
			$resp['status'] = 'success';
			$code = $this->conn->query("SELECT code FROM `donatorapp_list` where id = '{$bid}'")->fetch_array()['code'];
			if(empty($id)){
				$resp['process'] = "new";
				$resp['msg'] = 'Your application has been sent successfully. Your application Reference Code is <b>'.$code.'</b>. We will reach you as soon as we sees you application request using your given contact information. Thank you!';
			}else{
				$resp['process'] = "old";
				$resp['msg'] = "Application Details has been updated successfully.";
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = 'Application has failed to saved due to an error occurred.';
			$resp['error'] = $this->conn->error;
			$resp['sql'] = $sql;
		}
		if($resp['status'] == 'success' && isset($resp['msg'])){
			if($resp['process'] == 'new'){
				$this->settings->set_flashdata("success_fix", $resp['msg']);
			}else{
				$this->settings->set_flashdata("success", $resp['msg']);
			}
		}
		return json_encode($resp);
	}


	function update_status(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `donatorapp_list` set `status` = '{$status}' where id = '{$id}'");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = "Application Status has been updated successfully";
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = "Application Status has failed to update";
		}
		return json_encode($resp);
	}
	function delete_donatorapp(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `donatorapp_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Application successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}*/

	function delete_img(){
		extract($_POST);
		if(is_file($path)){
			if(unlink($path)){
				$resp['status'] = 'success';
			}else{
				$resp['status'] = 'failed';
				$resp['error'] = 'failed to delete '.$path;
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = 'Unkown '.$path.' path';
		}
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_goodsavailable':
		echo $Master->save_goodsavailable();
		break;
	case 'delete_goodsavailable':
		echo $Master->delete_goodsavailable();
		break;
	case 'save_goodsneeded':
		echo $Master->save_goodsneeded();
		break;
	case 'delete_goodsneeded':
		echo $Master->delete_goodsneeded();
		break;

	case 'save_goodslist':
		echo $Master->save_goodslist();
	break;
	case 'delete_goodslist':
		echo $Master->delete_goodslist();
	break;
	case 'update_vstatus':
		echo $Master->update_vstatus();
	break;
	case 'save_victimapp':
		echo $Master->save_victimapp();
	break;
	case 'delete_victimapp':
		echo $Master->delete_victimapp();
	break;
	case 'update_status':
		echo $Master->update_status();
	break;
	case 'save_donatorapp':
		echo $Master->save_donatorapp();
	break;
	case 'delete_donatorapp':
		echo $Master->delete_donatorapp();
	break;
	case 'delete_img':
		echo $Master->delete_img();
	break;
	default:
		// echo $sysset->index();
		break;
}