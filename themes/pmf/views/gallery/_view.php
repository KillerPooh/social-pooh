<?php
/* @var $this AlbumsController */
/* @var $data Albums */
?>

<div class="view">

	<h1 class="uppercase"><?php echo CHtml::link(CHtml::encode($data->album_name), array('view', 'id'=>$data->id)); ?></h1>


    <b><?php echo CHtml::encode($data->getAttributeLabel('last_update')); ?>:</b>
    <?php echo CHtml::encode($data->last_update); ?>
    <br />

    <?php $photos = $data->photos;
    if(isset($photos[0]->id)){
       $count = count($photos);
       if($count>5){$count=5;}
       for($i=0; $i<$count; $i++){
           $mini_photo_url = $this->createAbsoluteUrl('/')."/albums/".$data->profile_id."/mini/".$photos[$i]->id.".".$photos[$i]->extension;
           $open_url = $this->createAbsoluteUrl('photo/view',array('id'=>$photos[$i]->id));
           echo "<a style='margin:5px;' href='".$open_url."'><img src='".$mini_photo_url."' /></a>";
       }
    } else {
        echo "Нет фоток";
    }
    ?>
</div>