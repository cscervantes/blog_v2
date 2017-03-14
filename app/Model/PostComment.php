<?php
App::uses('AppModel', 'Model');

class PostComment extends AppModel {
	
	 public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            // 'conditions' => array('Recipe.approved' => '1'),
            'order' => 'PostComment.created DESC'
        ),

        'Comment' => array(
            'className' => 'Comment',
            // 'conditions' => array('Recipe.approved' => '1'),
            'order' => 'PostComment.created DESC'
        ),
      
    );
}