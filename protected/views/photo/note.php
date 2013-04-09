<?php
/* @var $this PhotoController */
/* @var $photo Photo */

$this->breadcrumbs=array(
	'Photos'=>array('index'),
    $photo->photo_name=>array('view', 'id'=>$photo->id),
	'Отметить на фото',
);

$this->menu=array(
	array('label'=>'List Photo', 'url'=>array('index')),
	array('label'=>'Manage Photo', 'url'=>array('admin')),
);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'profile-grid',
    'dataProvider'=>$profile->search(),
    'filter'=>$profile,
    'columns'=>array(
        'id',
        'first_name',
        'second_name',
        'third_name',
        'fourth_name',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{note}',
            'buttons'=>array(
                'note'=>array(
                    'label'=>'Отметить',
                    'url'=>'Yii::app()->createAbsoluteUrl("photo/note", array("id"=>$_GET["id"], "profile"=>$data->id))',
                ),
            ),
        ),
    ),
)); ?>