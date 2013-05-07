<?php
/* @var $this GroupsController */
/* @var $data Groups */
?>

<div class="view">

	<div class="name">
        <?php echo CHtml::link(CHtml::encode($data->group_name), array('view', 'id'=>$data->id)); ?>
    </div>
    <div class="description">
	    <?php echo CHtml::encode($data->group_desc); ?>
    </div>

</div>