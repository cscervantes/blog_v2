<?php

class UsersController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index(){
		if($this->Auth->user() && $this->Auth->login()){
			return $this->redirect('/');
		}else{
			return $this->redirect('/login');
		}
		
	}

	public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('register', 'logout');
	}

	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect('index');
	        }
	        $this->Flash->error(__('Invalid username or password, try again'));
	    }
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

	public function register(){

		if ($this->request->is('post')) {
            
            $this->User->create();
            
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('New user has been saved.'));
                return $this->redirect(array('action' => 'register'));
            }
            
            $this->Flash->error(__('Unable to add user.'));
        }

		//$this->render('/Blogs/register');
	}
}