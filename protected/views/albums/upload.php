<?php
/* @var $this AlbumsController */
/* @var $album Albums */

$this->breadcrumbs=array(
    'Albums'=>array('index'),
    $album->album_name=>array('albums/'.$album->id),
    'Загрузить фотографию',
);

$this->menu=array(
    array('label'=>'List Albums', 'url'=>array('index')),
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'albums-form',
	'enableAjaxValidation'=>true,
    'htmlOptions'=>array('enctype' => 'multipart/form-data')
)); ?>
	<?php echo $form->errorSummary($photo); ?>

	<div class="row">
		<?php echo $form->labelEx($photo,'photo_file'); ?>
		<?php echo CHtml::activeFileField($photo,'photo_file'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Upload'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->