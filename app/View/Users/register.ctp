<!-- File: /app/View/Blogs/register.ctp -->

<h1>Register User</h1>
<?php
echo $this->Form->create('User');
echo '<div class="form-group">'.$this->Form->input('name', array('class'=>'form-control', 'placeholder' => 'Full name')).'</div>';
echo '<div class="form-group">'.$this->Form->input('email', array('class'=>'form-control', 'placeholder' => 'Email address(optional)')).'</div>';
echo '<div class="form-group">'.$this->Form->input('username', array('class'=>'form-control', 'placeholder' => 'Username')).'</div>';
echo '<div class="form-group">'.$this->Form->input('password', array('class'=>'form-control', 'placeholder' => 'Password')).'</div>';
?>
<button type="submit" class="btn btn-flat"><i class="glyphicon glyphicon-send"></i> Register</button>
<?php
echo $this->Form->end();
?>