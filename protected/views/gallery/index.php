<?php
/* @var $this AlbumsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Albums',
);

$this->menu=array(
	array('label'=>'Create Albums', 'url'=>array('create')),
);
?>

<h1>Last Photos</h1>
<?php
$count = count($last_photos);
for($i=0; $i<$count; $i++){
    if($i=='5'){
        echo "<div style='display:none;'>";
    }
    $mini_photo_url = $this->createAbsoluteUrl('/')."/albums/".$last_photos[$i]->profile_id."/mini/".$last_photos[$i]->id.".".$last_photos[$i]->extension;
    $open_url = $this->createAbsoluteUrl('/')."/albums/".$last_photos[$i]->profile_id."/".$last_photos[$i]->id.".".$last_photos[$i]->extension;
    echo "<a class='highslide' href='".$open_url."' onclick='return hs.expand(this, { slideshowGroup: 1 } )'><img src='".$mini_photo_url."' /></a>";
    if($i==$count-1){
        echo "</div>";
    }
}
?>
<br />
<h1>Albums</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
