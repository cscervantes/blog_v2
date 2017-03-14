<?php

class BlogsController extends AppController
{
	public $helpers = array('Html', 'Form', 'Flash');


    public $components = array('Flash');

    public $uses = array(
        'User', 'Post', 'Comment','PostComment',
    );

	public function index(){

		$this->set(array('posts' => $this->Post->find('all'), 'comments' => $this->PostComment->find('all'), 'user' => $this->User->find('all')));
	}

	public function about(){

		$this->render('/Blogs/about');

	}

	public function service(){

		$this->render('/Blogs/service');

	}

	public function contact(){

		$this->render('/Blogs/contact');

	}

	// public function login(){
	// 	$this->render('/Blogs/login');
	// }



}


	