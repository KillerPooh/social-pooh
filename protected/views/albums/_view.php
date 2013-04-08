<?php
/* @var $this AlbumsController */
/* @var $data Albums */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->album_name), array('view', 'id'=>$data->id)); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('last_update')); ?>:</b>
    <?php echo CHtml::encode($data->last_update); ?>
    <br />

    <?php $photos = $data->photos;
    if(isset($photos[0]->id)){
        echo "Есть фотки";
    } else {
        echo "Нет фоток";
    }
    ?>
</div>