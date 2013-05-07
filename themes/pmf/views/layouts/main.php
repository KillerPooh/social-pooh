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

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
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

//        var content_container = document.getElementById('content-container');
//        var contHeight = content_container.offsetHeight;
        function heigth_plus(){
            var content_container = document.getElementById('page');
            var bg_container = document.getElementById('bg-line-center');
            var height = content_container.offsetHeight;
            if (height <= 500){
                height = 500;
                content_container.style.height = height-120+"px";
            }
//            alert(height);
            bg_container.style.height = (height-120)+"px";

        }
        var contHeight = null;
        setInterval(function(){
            if (contHeight != document.getElementById('content-container').offsetHeight){
                heigth_plus();
                contHeight = document.getElementById('content-container').offsetHeight;
                //alert('changed');
            }
        }, 1000);

        window.onload = heigth_plus;
    </script>
</head>

<body>
<?php
    //do it smarter

if(!Yii::app()->user->isGuest){
    $show = 'none';
} else {
    $show = 'inline-block';
}
?>

<div class="page-container" id="page">
  <div id="header">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>" id="logo" href="#">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" alt="Вги Матфак" />
    </a>
    <div id="mail">
      <a href="#" id="send-mail"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/send-mail.png" alt="Написать нам" /></a>
      <a href="#" id="subscribe"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/subscribe.png" alt="Подписаться на рассылку" /></a>
    </div>
    <div id="social">
      <a href="#" id="facebook"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/facebook.png" alt="Facebook" /></a>
      <a href="#" id="vkontakte"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/vkontakte.png" alt="В контакте" /></a>
      <a href="#" id="odnoklassniki"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/odnoklassniki.png" alt="Одноклассники" /></a>
    </div>
    <hr>
	<div class="menu-wrapper">





		<ul id="login-menu" style="display: <?php echo $show ?> ">
			<li>
				<div class="img">&nbsp;</div>
			</li>
			<li>
				 <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login">Войти</a>
            </li>
			<li>
				<div class="separator"></div>
			</li>
			<li>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/register">Регистрация</a>
			</li>
		</ul>

		<div id="mainmenu">
				<?php if(!Yii::app()->user->isGuest){
					$user = Users::model()->findByPk(Yii::app()->user->id);
					$name = $user->profile->first_name." ".$user->profile->second_name;
					$profile_id_main = $user->profile->id;
				} else {
					$profile_id_main='';
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
						array('label'=>'Моя страничка', 'url'=>array('profile/view', 'id'=>$profile_id_main), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Ред.Профиль', 'url'=>array('/site/profile'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Выйти ('.$name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Админка', 'url'=>array('/admin/index'), 'visible'=>Users::model()->iAdmin()),
					),
				)); ?>
		</div>
	</div>

  </div>
  <div id="content-header">
    <div id="images"></div>
  </div>
  <div class="content-container" id="content-container">
     <?php echo $content; ?>
  </div>
</div>
<div id="footer">
  <span>Copyright <?php echo date('Y'); ?></span>
</div>
<div class="bg-line">
	<div class="bg-line-header">&nbsp;</div>
	<div class="bg-line-center" id="bg-line-center">&nbsp;</div>
	<div class="bg-line-bottom">&nbsp;</div>
</div>
</body>
</html>
