<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);
?>

<h1><?php echo CHtml::encode($model->title); ?></h1>

<?php $content = str_replace("<podkat>", "", $model->content);
    echo str_replace("\n", "<br>", $content); ?>
<br />
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data')); ?>:</b>
<?php echo CHtml::encode($model->data); ?>

<b><?php echo CHtml::encode($model->user->profile->getAttributeLabel('first_name_author')); ?>:</b>
<?php echo CHtml::encode($model->user->profile->first_name); ?>

<b><?php echo CHtml::encode($model->getAttributeLabel('views')); ?>:</b>
<?php echo CHtml::encode($model->views); ?>