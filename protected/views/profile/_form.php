<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'second_name'); ?>
		<?php echo $form->textField($model,'second_name',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'second_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'third_name'); ?>
		<?php echo $form->textField($model,'third_name',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'third_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fourth_name'); ?>
		<?php echo $form->textField($model,'fourth_name',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'fourth_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id'); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profession'); ?>
		<?php echo $form->textField($model,'profession',array('size'=>60,'maxlength'=>65)); ?>
		<?php echo $form->error($model,'profession'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_photo'); ?>
		<?php echo $form->textField($model,'profile_photo',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'profile_photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'icq'); ?>
		<?php echo $form->textField($model,'icq',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'icq'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'skype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about'); ?>
		<?php echo $form->textArea($model,'about',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->