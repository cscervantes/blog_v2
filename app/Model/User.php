<?php

App::uses('AppModel', 'Model');


App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


class User extends AppModel {
	
	public $name = 'User';

    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),

        'email' => array(
	        'validEmailRule' => array(
	            'rule' => array('email'),
	            'message' => 'Invalid email address'
	        ),
	        'uniqueEmailRule' => array(
	            'rule' => 'isUnique',
	            'message' => 'Email already registered'
	        )
	    ),

        'username' => array(
            'uniqueUsernameRule' => array(
	            'rule' => 'isUnique',
	            'message' => 'Username already taken'
	        ),
	        'notEmptyUsername' => array(
	            'rule' => 'notBlank',
	            'message' => 'Required Username'
	        ),
        ),

        'password' => array(
            'rule' => 'notBlank',
            'message' => 'Invalid email address'
        ),
        
    );


    public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();
	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }
	    return true;
	}


	// public $hasMany = array(
 //        'Post' => array(
 //            'className' => 'Post',
 //            // 'conditions' => array('Recipe.approved' => '1'),
 //            'order' => 'User.id DESC'
 //        ),
 //        'Comment' => array(
 //            'className' => 'Comment',
 //            // 'conditions' => array('Recipe.approved' => '1'),
 //            'order' => 'User.id DESC'
 //        )
 //    );


    // public function userPosts($id) {
    //     $userPost = $this->Post->findAllByUserId($id);
    //     return $this->find($userPost);
    // }
}