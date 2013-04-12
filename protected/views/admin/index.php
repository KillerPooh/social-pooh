<?php
$this->pageTitle=Yii::app()->name;
?>

<a href="<?php echo $this->createAbsoluteUrl('groups/admin'); ?>">Управление группами</a>
<br />
<a href="<?php echo $this->createAbsoluteUrl('users/admin'); ?>">Управление пользователями</a>
<br />
<a href="<?php echo $this->createAbsoluteUrl('gallery/admin'); ?>">Управление альбомами</a>
<br />
<a href="<?php echo $this->createAbsoluteUrl('profile/admin'); ?>">Управление профилями пользователей</a>
<br />
<a href="<?php echo $this->createAbsoluteUrl('photo/admin'); ?>">Управление фотками</a>
<br />
<a href="<?php echo $this->createAbsoluteUrl('/rights'); ?>">Управление правами (rights)</a>
<br />
Управление форумом осуществляется в самом форуме