<div class="container">
<div class="row">
<div class="col-md-8 well matchDiv" style="margin-right:25px">

</div>
<div class=" col-md-3 well well-lg matchDiv" >
<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?php echo $this->Html->link('Register', array('action' => 'add'), array('class' => 'btn-register', 'style'=> 'padding-left:75px;', 'id' => 'btn-register', 'escape' => false)); ?>

<?= $this->Form->end() ?>
</div>
</div>
</div>
<script type="text/javascript">
$(function() {
	$('.matchDiv').matchHeight();
});
</script>