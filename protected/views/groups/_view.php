<?php
/* @var $this GroupsController */
/* @var $data Groups */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->group_name), array('view', 'id'=>$data->id)); ?>

	<?php echo CHtml::encode($data->group_desc); ?>
	<br />

</div>