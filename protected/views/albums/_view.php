<?php
/* @var $this AlbumsController */
/* @var $data Albums */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->album_name), array('view', 'id'=>$data->id)); ?>
	<br />

    <?php $photos = $data->photos;
    if(isset($photos[0]->id)){
        echo "ok";
    } else {
        echo "err";
    }
    ?>
</div>