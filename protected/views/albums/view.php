<?php
/* @var $this AlbumsController */
/* @var $model Albums */

$this->breadcrumbs=array(
	'Albums'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>'Добавить фотографию в альбом', 'url'=>array('upload','id'=>$model->id)),
	array('label'=>'List Albums', 'url'=>array('index')),
	array('label'=>'Create Albums', 'url'=>array('create')),
	array('label'=>'Update Albums', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Albums', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Albums <?php echo $model->album_name; ?></h1>

<?php for($i=0, $count=count($model->photos); $i<$count; $i++){
    echo $model->photos[$i]->id." <img src='".$this->createAbsoluteUrl('/')."/albums/".$model->profile_id."/".$model->photos[$i]->id.".png' /><br />";
} ?>
