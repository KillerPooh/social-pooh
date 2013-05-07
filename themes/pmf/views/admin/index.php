<div id="admin">
    <div class="heading">
        <span class="uppercase">Администрирование</span>
    </div>
<?php
$this->pageTitle=Yii::app()->name;
?>
    <h1 class="uppercase"><a href="<?php echo $this->createAbsoluteUrl('news/admin'); ?>">Управление новостями</a></h1>
    <h1 class="uppercase"><a href="<?php echo $this->createAbsoluteUrl('groups/admin'); ?>">Управление группами</a></h1>
    <h1 class="uppercase"><a href="<?php echo $this->createAbsoluteUrl('users/admin'); ?>">Управление пользователями</a></h1>
    <h1 class="uppercase"><a href="<?php echo $this->createAbsoluteUrl('gallery/admin'); ?>">Управление альбомами</a> </h1>
    <h1 class="uppercase"><a href="<?php echo $this->createAbsoluteUrl('profile/admin'); ?>">Управление профилями пользователей</a>   </h1>
    <h1 class="uppercase"><a href="<?php echo $this->createAbsoluteUrl('photo/admin'); ?>">Управление фотками</a>    </h1>
    <h1 class="uppercase"><a href="<?php echo $this->createAbsoluteUrl('/rights'); ?>">Управление правами (rights)</a>  </h1>
    <h1>Управление форумом осуществляется в самом форуме  </h1>
</div>