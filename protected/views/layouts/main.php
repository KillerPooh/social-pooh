<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/highslide/highslide-with-gallery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/highslide/highslide.css" />
    <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/highslide/highslide-ie6.css" />
    <![endif]-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script type="text/javascript">
        hs.graphicsDir = '<?php echo Yii::app()->request->baseUrl; ?>/highslide/graphics/';
        hs.align = 'center';
        hs.transitions = ['expand', 'crossfade'];
        hs.fadeInOut = true;
        hs.dimmingOpacity = 0.8;
        hs.outlineType = 'rounded-white';
        hs.captionEval = 'this.thumb.alt';
        hs.marginBottom = 105; // make room for the thumbstrip and the controls
        hs.numberPosition = 'caption';

        // Add the slideshow providing the controlbar and the thumbstrip
        hs.addSlideshow({
            //slideshowGroup: 'group1',
            interval: 5000,
            repeat: false,
            useControls: true,
            overlayOptions: {
                className: 'text-controls',
                position: 'bottom center',
                relativeTo: 'viewport',
                offsetY: -60
            },
            thumbstrip: {
                position: 'bottom center',
                mode: 'horizontal',
                relativeTo: 'viewport'
            }
        });
    </script>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php if(!Yii::app()->user->isGuest){
            $name = Users::model()->findByPk(Yii::app()->user->id);
            $name = $name->profile->first_name." ".$name->profile->second_name;
        } else {
            $name='';
        }
        $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/')),
                array('label'=>'Выпускники', 'url'=>array('/groups/index')),
                array('label'=>'Фотогалерея', 'url'=>array('/gallery/index')),
                array('label'=>'Форум', 'url'=>array('/forum')),
				array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Обратная связь', 'url'=>array('/site/contact')),
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Профиль', 'url'=>array('/site/profile'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.$name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Админка', 'url'=>array('/admin/index'), 'visible'=>Users::model()->iAdmin()),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
