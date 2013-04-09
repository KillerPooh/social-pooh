<?php
/* @var $this PhotoController */
/* @var $model Photo */

$this->breadcrumbs=array(
	'Photos'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>'Отметить на фото', 'url'=>array('note', 'id'=>$model->id), 'visible'=>Photo::model()->iOwner($model->profile_id)),
	array('label'=>$model->album->album_name, 'url'=>array('albums/view', 'id'=>$model->album_id)),
	array('label'=>'Добавить фото в альбом', 'url'=>array('albums/upload', 'id'=>$model->album_id), 'visible'=>Photo::model()->iOwner($model->profile_id)),
	array('label'=>'Изменить название', 'url'=>array('update', 'id'=>$model->id), 'visible'=>Photo::model()->iOwner($model->profile_id)),
	array('label'=>'Удалить фото', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Photo <?php echo $model->photo_name; ?></h1>

<?php $photo_url = $this->createAbsoluteUrl('/')."/albums/".$model->profile_id."/".$model->id.".".$model->extension; ?>
<img style="max-width: 730px; height: auto;" src="<?php echo $photo_url; ?>" />

