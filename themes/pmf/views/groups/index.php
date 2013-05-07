<?php
/* @var $this GroupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Groups',
);
?>
<div id="group">
<!--<h1>Groups</h1>-->
      <div class="heading">
        <span class="uppercase">Группы</span>
      </div>
<style type="text/css">
    .summary{display: none;}
</style>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
