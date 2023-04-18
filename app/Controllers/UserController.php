<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    /*///////////////////////////////////////////////////
    //////////////// VARIABLES PUBLICAS /////////////////
    ///////////////////////////////////////////////////*/
	private $user;
	private $session;




    
    /*///////////////////////////////////////////////////
    ///////////////////// CONSTRUCTOR ///////////////////
    ///////////////////////////////////////////////////*/
	public function __construct()
	{
		helper(['form', 'url', 'session']);
		$this->user = new User();
		$this->session = session();
	}




	/*///////////////////////////////////////////////////
	/////////////// PAGINA INICIO DE SESION /////////////
	///////////////////////////////////////////////////*/
	public function login()
	{
		return view('login');
	}




	/*///////////////////////////////////////////////////
	//////////////// VALIDACION DEL LOGIN ///////////////
	///////////////////////////////////////////////////*/
	public function loginValidate()
	{
		$inputs = $this->validate([
			'email' => 'required|valid_email',
			'password' => 'required|min_length[5]'
		]);

		if (!$inputs) {
			return view('login', [
				'validation' => $this->validator
			]);
		}

		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');

		$user = $this->user->where('email', $email)->first();

		if ($user) {

			$pass = $user['password'];
			$authPassword = password_verify($password, $pass);

			if ($authPassword) {
				$sessionData = [
					'id' => $user['id'],
					'full_name' => $user['full_name'],
					'email' => $user['email'],
					'loggedIn' => true,
					'phone' => $user['phone'], 
					'document_ci' => $user['document_ci'], 
					'id_fk_rol' => $user['id_fk_rol'],
					'profile_photo' => $user['profile_photo'],
				];

				$this->session->set($sessionData);
				return redirect()->to('dashboard');
			}

			session()->setFlashdata('failed', 'Failed! incorrect password');
			return redirect()->to(site_url('/login'));
		}

		session()->setFlashdata('failed', 'Failed! incorrect email');
		return redirect()->to(site_url('/login'));
	}

	




	/*///////////////////////////////////////////////////
	/////////// DESTRUIMOS LOS DATOS DE SESION //////////
	///////////////////////////////////////////////////*/
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('login');
	}
}