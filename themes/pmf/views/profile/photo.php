<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
    'Photo'=>array('profile/photo'),
	$model->first_name." ".$model->second_name,
);
?>

<h3><?php echo $model->group->group_name." - ".$model->first_name." ".$model->second_name; ?></h3>

<table>
    <?php if($model->users->id == Yii::app()->user->id){ ?>
    <tr>
        <td colspan="2">
            <a href="<?php echo $this->createAbsoluteUrl('site/profile'); ?>">Отредактировать профиль</a>
            <a href="<?php echo $this->createAbsoluteUrl('albums/index'); ?>">Фотографии</a>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td>photo</td>
        <td>
            <?php echo $model->second_name; ?>
            <?php if(isset($model->fourth_name) AND !empty($model->fourth_name)){echo "(".$model->fourth_name.")";} ?>
            <?php echo $model->first_name; ?>
            <?php echo $model->third_name; ?>
            <br />
            <?php echo $model->group->group_name; ?>
            <br />
            <?php if(isset($model->city) AND !empty($model->city)){echo $model->city;} ?>
            <br />
            <?php if(isset($model->profession) AND !empty($model->profession)){echo $model->profession;} ?>
            <br />
            <?php if(isset($model->icq) AND !empty($model->icq)){echo "ICQ: ".$model->icq;} ?>
            <?php if(isset($model->skype) AND !empty($model->skype)){echo "Skype: ".$model->skype;} ?>
            <?php if(isset($model->mobile) AND !empty($model->mobile)){echo "Mobile: ".$model->mobile;} ?>
            <br />
            <?php if(isset($model->about) AND !empty($model->about)){echo $model->about;} ?>
        </td>
    </tr>
</table>
