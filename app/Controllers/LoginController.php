<?php namespace App\Controllers;

use CodeIgniter\Controller;

class LoginController extends BaseController
{
	public function index()
	{
		return view('login');
	}

	public function register()
	{
		return view('register');
	}

	public function registerUser(){
		$validation = \Config\Services::validation();
		$validation->setRules(
			[
			'name' => 'max_length[100]',
			'email' => 'required|valid_email',
			'password1' => 'required|max_length[24]|min_length[6]',
			'password2' => 'required_with[password1]|matches[password1]'
		],
		[
            'email'        => [
				'required' => 'Email is required',
				'valid_email'=>'Please provide a valid Email.'
			],
			'name'=>
				['max_length'=>'Name must be fewer that 100 characters'],
			'password1'=>
				['required'=>'You must enter a password',
				'max_length'=>'password must be fewer that 24 characters',
				'min_length'=>'password must be more that 6 characters'],
			'password2'=>
				['matches'=>'Passwords do not match',
				'required_with'=>'Please provide Password again']
        ]
	);

		$validation->withRequest($this->request)->run();
		$errors = $validation->getErrors();
		if(count($errors) > 0){
			$status = [
				'status'=>'Failure',
				'errors'=>$errors];
			echo(json_encode($status));
			return;
		}

		$password =  $this->request->getPost('password1');
		$password = password_hash($password,PASSWORD_BCRYPT);

		$LoginModel = new \App\Models\LoginModel();
		$response = $LoginModel->insert([
			'Email' => $this->request->getPost('email'),
			'Name' =>$this->request->getPost('name'),
			'Password' =>$password,
			'Role' =>'User'
		]);

		if($response == false){
			$status = [
				'status'=>'Failure',
				'errors'=>$LoginModel->errors()];
			echo(json_encode($status));
			return;
		}
		
		$status = [
			'status'=>'Success'
		];
		echo(json_encode($status));
	}

	public function loginUser(){
		//take the username and password
		$password =  $this->request->getPost('password');
		$email =  $this->request->getPost('email');
		//get the password user id and email from the databse based on the email
		$LoginModel = new \App\Models\LoginModel();
		//select *from usertable where email = 'email'
		$user = $LoginModel->where('Email', $email)
							->limit(1)
							->get()->getRowArray();
		//if this email doesnt exits return an error
		if(empty($user)){
			$status = [
				'status'=>'Failure',
				'error'=>'Email or Password is Incorrect'];
			echo(json_encode($status));
			return;
		}
		//check if the passwords match
		$passwordsMatch = password_verify($password,$user['Password']);
		if($passwordsMatch){
			//set the user session
			unset($user['Password']);
			$this->session->set('userData',$user);
			//send back success
			$status = [
				'status'=>'Success'
			];
			echo(json_encode($status));
			return;
		}else{
			//if not send an error
			$status = [
				'status'=>'Failure',
				'error'=>'Email or Password is Incorrect'];
			echo(json_encode($status));
			return;
		}
	}

	public function sendResetPasswordEmail(){
		$recipient =  $this->request->getPost('email');

		$LoginModel = new \App\Models\LoginModel();
		$user = $LoginModel->where('Email', $recipient)
							->limit(1)
							->get()->getRowArray();

		if(empty($user)){
			$status = [
				'status'=>'Failure',
				'error'=>'Email Does Not Exist'];
			echo(json_encode($status));
			return;
		}

		//make the password reset link
		$link = base_url.'LoginController/resetPassword/'.base64_encode($recipient).'/'.md5($user['ID']);

		//send the password reset link
		$email = \Config\Services::email();

		$email->setTo($recipient);

		
		$email->setSubject('Password Reset');
		$email->setMessage($link);
		

		$status = [];
        if ($email->send()) 
		{
			$status = [
				'status'=>'Success'];
        } 
		else 
		{
			$status = [
				'status'=>'Failure',
				'error'=>'An Error Occured While Sending An Email'];
            // $data = $email->printDebugger(['headers']);
        }
		echo(json_encode($status));
	}

	public function resetPassword($email,$id){
		$email = base64_decode($email);

		$LoginModel = new \App\Models\LoginModel();
		$user = $LoginModel->where('Email', $email)
							->limit(1)
							->get()->getRowArray();

		if(empty($user)){
			$status = [
				'title'=>'Invalid Email',
				'message'=>'No Account Could Be Found With This Email'];
			echo view('/templates/message',$status);
			return;
		}else if(md5($user['ID']) != $id){
			$status = [
				'title'=>'Invalid Link',
				'message'=>'This Reset Password Link Is Not Valid'];
			echo view('/templates/message',$status);
			return;
		}
		
		echo view('/resetPassword',['email'=>$email]);
	}

	public function resetUserPassword(){
		$validation = \Config\Services::validation();
		$validation->setRules(
			[
			'email' => 'required|valid_email',
			'password1' => 'required|max_length[24]|min_length[6]',
			'password2' => 'required_with[password1]|matches[password1]'
		],
		[
            'email'        => [
				'required' => 'Email is required',
				'valid_email'=>'Please provide a valid Email.'
			],
			'password1'=>
				['required'=>'You must enter a password',
				'max_length'=>'password must be fewer that 24 characters',
				'min_length'=>'password must be more that 6 characters'],
			'password2'=>
				['matches'=>'Passwords do not match',
				'required_with'=>'Please provide Password again']
        ]
	);


		$validation->withRequest($this->request)->run();
		$errors = $validation->getErrors();
		if(count($errors) > 0){
			$status = [
				'status'=>'Failure',
				'errors'=>$errors];
			echo(json_encode($status));
			return;
		}
		
		$email =  $this->request->getPost('email');
		$password =  $this->request->getPost('password1');
		$password = password_hash($password,PASSWORD_BCRYPT);

		var_dump($email);
		$LoginModel = new \App\Models\LoginModel();
		$response = $LoginModel
							->set('Password', $password, false)
							->where('Email', $email)
							->update();

		if($response == false){
			$status = [
				'status'=>'Failure',
				'errors'=>$LoginModel->errors()];
			echo(json_encode($status));
			return;
		}
		
		$status = [
			'status'=>'Success'
		];
		echo(json_encode($status));
		//

	}

}