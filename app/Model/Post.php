<?php

App::uses('AppModel', 'Model');

class Post extends AppModel {
	
    public $validate = array(
        'title' => array(
            'uniqueTitleRule' => array(
	            'rule' => 'isUnique',
	            'message' => 'Post is already taken'
	        ),
	        'notEmptyTitle' => array(
	        	'rule' => 'notBlank',
	        	'message' => 'Please input Title'
	        	),
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            // 'conditions' => array('Recipe.approved' => '1'),
            'order' => 'Post.created DESC'
        ),
    );

}