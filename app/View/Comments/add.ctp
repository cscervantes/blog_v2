<h1>Add Comment</h1>
<?php
echo $this->Form->create('Comment');
echo $this->Form->input('user_id', array('type'=>'hidden', 'value' => $this->Session->read('Auth.User.id')));
echo $this->Form->input('post_id', array('type'=>'hidden', 'value' => $id));
echo $this->Form->input('comment', array('rows' => '3', 'class' => 'form-control', 'style' => 'height:500px; resize:none;' ));
echo "<br><button type='submit' class='btn btn-info'><i class='glyphicon glyphicon-send'></i> Comment</button>";
echo $this->Form->end();
?>