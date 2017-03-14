<?php

App::uses('AppModel', 'Model');

class Comment extends AppModel {
	
    public $validate = array(
        'comment' => array(
         //    'uniqueTitleRule' => array(
	        //     'rule' => 'isUnique',
	        //     'message' => 'Post is already taken'
	        // ),
	        'notEmptyTitle' => array(
	        	'rule' => 'notBlank',
	        	'message' => 'Please input Title'
	        	),
        ),

    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            // 'conditions' => array('Recipe.approved' => '1'),
            'order' => 'Comment.created DESC'
        ),
    );

}