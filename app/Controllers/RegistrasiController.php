<?php 

namespace App\Controllers;

use App\Models\MRegistrasi;

class RegistrasiController extends RestfulController{	

	public function registrasi(){
		
		$data = [
				'nama'		=> $this->request->getJsonVar('nama'),
				'email'		=> $this->request->getJsonVar('email'),
				'password'	=> password_hash($this->request->getJsonVar('password'), PASSWORD_DEFAULT)
			];

		$model = new MRegistrasi();
		$model->insert($data);
		
		return $this->responseHasil(200, true,"Data Saved ".$model->getLastQuery());
		
	}

}