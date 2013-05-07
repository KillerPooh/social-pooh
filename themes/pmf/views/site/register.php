<?php
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login'); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
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
        <?php echo $form->labelEx($profile,'group_id'); ?>
        <?php echo $form->dropDownList($profile, 'group_id', $groups); ?>
        <?php echo $form->error($profile,'group_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'city'); ?>
        <?php echo $form->textField($profile,'city'); ?>
        <?php echo $form->error($profile,'city'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Register'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
