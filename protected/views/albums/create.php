<?php
/* @var $this AlbumsController */
/* @var $model Albums */

$this->breadcrumbs=array(
	'Albums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Albums', 'url'=>array('index')),
);
?>

<h1>Create Albums</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>