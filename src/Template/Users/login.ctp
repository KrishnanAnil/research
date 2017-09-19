<div class="row">
<div class="col-md-9 well matchDiv">

</div>
<div class=" col-md-3 well well-lg matchDiv" >
<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<button class="btn btn-default" style="padding:6px;margin-left:75px;">
<?php echo $this->Html->link('Register', array('action' => 'add'), 
array('class' => 'btn btn-register', 'style'=> 'padding:0px;', 'id' => 'btn-register', 'escape' => false)); ?>
</button>
<?= $this->Form->end() ?>
</div>
</div>
<script type="text/javascript">
$(function() {
	$('.matchDiv').matchHeight();
});
</script>