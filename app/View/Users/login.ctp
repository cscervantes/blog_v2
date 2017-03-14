<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username', array('class' => 'form-control'));
        echo $this->Form->input('password', array('class' => 'form-control'));
    ?>
    </fieldset>
    <br>
    <button type="submit" class="btn btn-flat"><i class="glyphicon glyphicon-log-in"></i> Login</button>
<?php echo $this->Form->end(); ?>
</div>
<br>
<?php
 echo $this->Html->link( "Add A New User",   array('action'=>'register') ); 
?>