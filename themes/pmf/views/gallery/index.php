<div id="gallery">
    <!--<div class="heading">-->
        <!--<span class="uppercase">Фото</span>-->
    <!--</div>-->
    <?php
    /* @var $this AlbumsController */
    /* @var $dataProvider CActiveDataProvider */

    $this->breadcrumbs=array(
        'Альбомы',
    );

    $this->menu=array(
        array('label'=>'Создать альбом', 'url'=>array('create')),
    );
    ?>
    <div class="heading">
        <span class="uppercase">Последние фото</span>
    </div>
    <!--<h1 class="uppercase">Last Photos</h1>-->
    <?php
    $count = count($last_photos);
    for($i=0; $i<$count; $i++){
        if($i=='8'){
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
<div class="heading">
    <span class="uppercase">Альбомы</span>
</div>
    <!--<h1 class="uppercase">Albums</h1>-->
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); ?>
</div>
