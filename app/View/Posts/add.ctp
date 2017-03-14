<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('user_id', array('type'=>'hidden', 'value' => $this->Session->read('Auth.User.id')));
echo $this->Form->input('title', array('class' => 'form-control'));
echo $this->Form->input('body', array('rows' => '3', 'class' => 'form-control', 'style' => 'height:500px; resize:none;' ));
echo "<br><button type='submit' class='btn btn-info'><i class='glyphicon glyphicon-send'></i> Save</button>";
echo $this->Form->end();
?>