<?php
/* @var $this GroupsController */
/* @var $model Groups */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->group_name,
);
?>

<h1><?php echo $model->group_name; ?></h1>

<?php echo $model->group_desc; ?>
<br />
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$graduates,
    'itemView'=>'_graduates',
)); ?>