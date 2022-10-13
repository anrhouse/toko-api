<?php namespace App\Controllers;

use App\Models\MKategori;

class KategoriController extends RestfulController{
	
	public function list(){
		$model 		= new MKategori();
		$kategori 	= $model->findAll();
		return $this->responseHasil(200, true, $kategori);
	}

	public function create(){
		$data = [
				'nama_kategori' => $this->request->getJsonVar('nama_kategori')
			];
		
		$model = new MKategori();
		$model->insert($data);

		$kategori = $model->find($model->getInsertID());
		return $this->responseHasil(200, true, $kategori);
	}

	public function detail($id){
		$model 	= new MKategori();
		$kategori = $model->find($id);
		return $this->responseHasil(200, true, $kategori);
	}

	public function ubah($id){
		
		$data = [
				'nama_kategori' => $this->request->getJsonVar('nama_kategori')
			];

		$model = new MKategori();
		$model->update($id, $data);
		$kategori = $model->find($id);

		return $this->responseHasil(200, true, $kategori);
	}

	public function hapus($id){
		
		$model = new MKategori();
		$kategori = $model->delete($id);

		return $this->responseHasil(200, true, $kategori);
	}
}