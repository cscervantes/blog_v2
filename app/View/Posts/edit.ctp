<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('class' => 'form-control'));
echo $this->Form->input('body', array('rows' => '3', 'class' => 'form-control', 'style' => 'height:500px; resize:none;' ));
echo $this->Form->input('id', array('type' => 'hidden'));
echo "<br><button type='submit' class='btn btn-info'><i class='glyphicon glyphicon-send'></i> Update</button>";
echo $this->Form->end();
?>
