<?php
/* @var $this GroupsController */
/* @var $data Groups */
?>

<div class="view">

    <?php echo CHtml::link(CHtml::encode($data->first_name." ".$data->second_name), array('profile/view', 'id'=>$data->id)); ?>

</div>