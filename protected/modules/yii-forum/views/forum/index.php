<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array('Forum')
));

if(!Yii::app()->user->isGuest && Users::model()->iAdmin())
{
    echo 'Admin: '. CHtml::link('New forum', array('/forum/forum/create')) .'<br />';
}

foreach($categories as $category)
{
    $this->renderpartial('_subforums', array(
        'forum'=>$category,
        'subforums'=>new CActiveDataProvider('Forum', array(
            'criteria'=>array(
                'scopes'=>array('forums'=>array($category->id)),
            ),
            'pagination'=>false,
        )),
    ));
}