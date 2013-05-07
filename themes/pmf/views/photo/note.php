<?php
/* @var $this PhotoController */
/* @var $photo Photo */

$this->layout = '//layouts/column1';
$this->breadcrumbs=array(
    $photo->album->album_name=>array('albums/view', 'id'=>$photo->album->id),
    $photo->photo_name=>array('view', 'id'=>$photo->id),
	'Отметить на фото',
);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'profile-grid',
    'dataProvider'=>$profile->search(),
    'filter'=>$profile,
    'columns'=>array(
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