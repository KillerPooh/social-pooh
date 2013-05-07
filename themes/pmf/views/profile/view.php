<div id="profile">
<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->first_name." ".$model->second_name,
);
?>
<div class="heading">
    <span class="uppercase">Профиль</span>
</div>
<h1 class="uppercase"><?php echo $model->group->group_name." - ".$model->first_name." ".$model->second_name; ?></h1>

<table>
    <?php if($model->users->id == Yii::app()->user->id){ ?>
    <tr>
        <td colspan="2">
            <a href="<?php echo $this->createAbsoluteUrl('site/profile'); ?>">Отредактировать профиль</a>
            <a href="<?php echo $this->createAbsoluteUrl('albums/index'); ?>">Управление фотографиями</a>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td width="200px" style="vertical-align: top;">
            <?php $extension = Photo::model()->findByPk($model->profile_photo);
            $photo_url = $this->createAbsoluteUrl('/')."/albums/".$model->id."/".$model->profile_photo.".".$extension->extension; ?>
            <img class="main-img" src="<?php echo $photo_url; ?>" />
        </td>
        <td style="vertical-align: top;">
            <p ><?php echo $model->second_name; ?> </p>
            <p ><?php if(isset($model->fourth_name) AND !empty($model->fourth_name)){echo "(".$model->fourth_name.")";} ?>  </p>
            <p><?php echo $model->first_name; ?>   </p>
            <p><?php echo $model->third_name; ?>  </p>
            <p><?php echo $model->group->group_name; ?>  </p>
            <p><?php if(isset($model->city) AND !empty($model->city)){echo $model->city;} ?></p>
            <p><?php if(isset($model->profession) AND !empty($model->profession)){echo $model->profession;} ?></p>
            <p><?php if(isset($model->icq) AND !empty($model->icq)){echo "ICQ: ".$model->icq;} ?>  </p>
            <p ><?php if(isset($model->skype) AND !empty($model->skype)){echo "Skype: ".$model->skype;} ?>   </p>
            <p ><?php if(isset($model->mobile) AND !empty($model->mobile)){echo "Mobile: ".$model->mobile;} ?>  </p>
            <p ><?php if(isset($model->about) AND !empty($model->about)){echo $model->about;} ?>   </p>

            <?php
            $count=count($last_photos);
            if($count!='0'){
                $profile_albums = $this->createAbsoluteUrl('albums/profile', array('id'=>$model->id));
                echo "<p><a href='".$profile_albums."'>Все альбомы</a></p>";
            }
            for($i=0; $i<$count; $i++){
                if($i=='5'){
                    echo "<div style='display:none;'>";
                }
                $mini_photo_url = $this->createAbsoluteUrl('/')."/albums/".$model->id."/mini/".$last_photos[$i]->id.".".$last_photos[$i]->extension;
                $open_url = $this->createAbsoluteUrl('/')."/albums/".$model->id."/".$last_photos[$i]->id.".".$last_photos[$i]->extension;
                echo "<a class='highslide' href='".$open_url."' onclick='return hs.expand(this, { slideshowGroup: 1 } )'><img src='".$mini_photo_url."' /></a>";
                if($i==$count-1){
                    echo "</div>";
                }
            } ?>
            <br />
            <p>Отмечен на:    </p>
            <br />
            <?php
            $count=count($last_notes);
            for($i=0; $i<$count; $i++){
                if($i=='5'){
                    echo "<div style='display:none;'>";
                }
                $mini_photo_url = $this->createAbsoluteUrl('/')."/albums/".$last_notes[$i]->photo->profile_id."/mini/".$last_notes[$i]->photo->id.".".$last_notes[$i]->photo->extension;
                $open_url = $this->createAbsoluteUrl('/')."/albums/".$last_notes[$i]->photo->profile_id."/".$last_notes[$i]->photo->id.".".$last_notes[$i]->photo->extension;
                echo "<a class='highslide' href='".$open_url."' onclick='return hs.expand(this, { slideshowGroup: 2 } )'><img src='".$mini_photo_url."' /></a>";
                if($i==$count-1){
                    echo "</div>";
                }
            } ?>
        </td>
    </tr>
</table>
</div>
