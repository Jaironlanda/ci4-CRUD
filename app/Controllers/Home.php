<?php namespace App\Controllers;

use App\Models\Crud;

class Home extends BaseController
{
	/**
	 * List all user
	 * @return array
	 */
	public function index()
	{
		// $data = [];
		$crud = new Crud();
		$data['data'] =  $crud->findAll();
		echo view('nav_bar');
		return view('crud_index', $data);
		
	}

	/**
	 * Create new user
	 * @return mixed
	 */
	public function create()
	{
		$data = [];
		// Check method post/get
		if($this->request->getMethod()=='post'){
			// Set input rule
			$rules = [
				'name' 	=> 'required',
				'email' => 'required|valid_email',
				'address' => 'required',
			];
			if($this->validate($rules)){
				//call Crud Model
				$crud = new Crud();
				//Save to database
				$crud->save([
					'name' 	=> esc($this->request->getPost('name')),
					'email' => esc($this->request->getPost('email')),
					'address' => esc($this->request->getPost('address')),
				]);
				//output input data
				$data['input'] = $_POST;
			}else {
				//validation error
				$data['validation'] = $this->validator;
			}
		}
		// Navbar
		echo view('nav_bar');
		// View form crud
		echo view('crud_create', $data);
	}

	/**
	 * Edit single user
	 * @param int
	 * @return mixed
	 */
	public function edit($id)
	{
		$crud = new Crud();
		$data['userData'] = $crud->find($id);
		
		if($this->request->getMethod()=='post'){
			// Set input rule
			$rules = [
				'name' 	=> 'required',
				'email' => 'required|valid_email',
				'address' => 'required',
			];
			if($this->validate($rules)){
				$crud->update($id, [
					'name' 	=> esc($this->request->getPost('name')),
					'email' => esc($this->request->getPost('email')),
					'address' => esc($this->request->getPost('address')),
				]);
				//redirect detail base on ID
				return redirect()->to($id);
			}else {
				$data['validation'] = $this->validator;
			}
		}
		echo view('nav_bar');
		return view('crud_edit', $data);
	}

	/**
	 * Delete single data
	 * @param int
	 * @return mixed
	 */
	public function delete(int $id)
	{
		$crud = new Crud();
		$data = $crud->find($id);
		if($data){
			$crud->delete($id);
			return redirect()->to('/');
		}
	}

	//--------------------------------------------------------------------

}
