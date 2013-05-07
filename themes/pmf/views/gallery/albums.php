<?php
/* @var $this AlbumsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Albums',
);

?>

<h1>Albums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_albums',
)); ?>
