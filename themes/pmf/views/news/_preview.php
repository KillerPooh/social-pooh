<?php
/* @var $this NewsController */
/* @var $data News */
?>
<!--
<div class="view">
	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
	<br />

	<?php $content = $data->content;
        $content = explode("<podkat>", $content);
        echo str_replace("\n", "<br>", $content['0']); ?>
	<br />
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
    <?php echo CHtml::encode($data->data); ?>

    <b><?php echo CHtml::encode($data->user->profile->getAttributeLabel('first_name_author')); ?>:</b>
    <?php echo CHtml::encode($data->user->profile->first_name); ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('views')); ?>:</b>
	<?php echo CHtml::encode($data->views); ?>

    <?php echo CHtml::link($data->getAttributeLabel('read'), array('view', 'id'=>$data->id)); ?>
	<br />
'class' => 'more'

</div>
-->

        <div class="left">
      <!--    <img src="dummy/image.png" />-->
          <h3 class="uppercase"><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id,)); ?></h3>
		  <?php echo CHtml::link($data->getAttributeLabel('read'), array('view', 'id'=>$data->id),array('class' => 'more')); ?>
          <!--<a href="#" class="more">Подробнее</a>-->
        </div>
