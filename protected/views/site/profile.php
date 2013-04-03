<?php
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Profile',
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
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
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
