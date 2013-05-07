<?php
/* @var $this GroupsController */
/* @var $model Groups */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->group_name,
);
?>
<div id="group">
    <div class="heading">
        <span class="uppercase"><?php echo $model->group_name; ?></span>
    </div>
    <div class="description">
        <?php echo $model->group_desc; ?>
        <br />
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$graduates,
            'itemView'=>'_graduates',
        )); ?>
    </div>
</div>