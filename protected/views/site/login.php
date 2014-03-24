<div class="row-fluid">
<div id="login" class="span4 offset4 well">
	<?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::errorSummary($loginForm); ?>
	
	<div class="row-fluid">
		<?php //echo CHtml::activeLabel($loginForm, 'username', array('label' => 'Логин')); ?>
		<div class="input-prepend span11">
			<span class="add-on"><i class="fa fa-user"></i></span>
			<?php echo CHtml::activeTextField($loginForm, 'username', Array('class' => 'span12')); ?>
		</div>
	</div>
	
	<div class="row-fluid">
		<?php //echo CHtml::activeLabel($loginForm, 'password', array('label' => 'Пароль')); ?>
		<div class="input-prepend span11">
			<span class="add-on"><i class="fa fa-key"></i></span>
			<?php echo CHtml::activePasswordField($loginForm, 'password', Array('class' => 'span12')); ?>
		</div>
	</div>
	
	<div>
		<?php echo CHtml::submitButton('Войти', Array('class' => 'btn')); ?>
	</div>
	
	<?php echo CHtml::endForm(); ?>
</div>
</div>