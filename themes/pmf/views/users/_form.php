<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_id'); ?>
		<?php echo $form->textField($model,'profile_id'); ?>
		<?php echo $form->error($model,'profile_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'identity'); ?>
		<?php echo $form->textField($model,'identity',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'identity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'network'); ?>
		<?php echo $form->textField($model,'network',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'network'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'access'); ?>
		<?php echo $form->textField($model,'access'); ?>
		<?php echo $form->error($model,'access'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($profile,'first_name'); ?>
        <?php echo $form->textField($profile,'first_name'); ?>
        <?php echo $form->error($profile,'first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'second_name'); ?>
        <?php echo $form->textField($profile,'second_name'); ?>
        <?php echo $form->error($profile,'second_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'third_name'); ?>
        <?php echo $form->textField($profile,'third_name'); ?>
        <?php echo $form->error($profile,'third_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'fourth_name'); ?>
        <?php echo $form->textField($profile,'fourth_name'); ?>
        <?php echo $form->error($profile,'fourth_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'group_id'); ?>
        <?php echo $form->dropDownList($profile, 'group_id', $groups); ?>
        <?php echo $form->error($profile,'group_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'city'); ?>
        <?php echo $form->textField($profile,'city'); ?>
        <?php echo $form->error($profile,'city'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'profession'); ?>
        <?php echo $form->textField($profile,'profession'); ?>
        <?php echo $form->error($profile,'profession'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'icq'); ?>
        <?php echo $form->textField($profile,'icq'); ?>
        <?php echo $form->error($profile,'icq'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'skype'); ?>
        <?php echo $form->textField($profile,'skype'); ?>
        <?php echo $form->error($profile,'skype'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'mobile'); ?>
        <?php echo $form->textField($profile,'mobile'); ?>
        <?php echo $form->error($profile,'mobile'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'about'); ?>
        <?php echo $form->textArea($profile,'about',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($profile,'about'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->