<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'News',
);
?>

<!--<h1>News</h1>    -->
<style type="text/css">
    .summary {
        display: none;
    }
</style>


<div id="news-content">
    <div class="heading">
        <span class="uppercase">Новости PMF</span>
    </div>
    <?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
    <div id="recent">
        <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $preview,
        'itemView' => '_preview',
    )); ?>
    </div>

</div>
<div id="sidebar">
    <div id="albums">
        <div class="heading">
            <span class="uppercase">Фото PMF</span>
        </div>
        <ul class="left">
            <li><a href="#" class="uppercase">Item 1</a></li>
            <li><a href="#" class="uppercase">Item 2</a></li>
            <li><a href="#" class="uppercase">Item 3</a></li>
            <li><a href="#" class="uppercase">Item 4</a></li>
            <li><a href="#" class="uppercase">Item 5</a></li>
            <li><a href="#" class="uppercase">Item 6</a></li>
        </ul>
        <ul class="right">
            <li><a href="#" class="uppercase">Item 7</a></li>
            <li><a href="#" class="uppercase">Item 8</a></li>
            <li><a href="#" class="uppercase">Item 9</a></li>
            <li><a href="#" class="uppercase">Item 10</a></li>
            <li><a href="#" class="uppercase">Item 11</a></li>
            <li><a href="#" class="uppercase">Item 12</a></li>
        </ul>
        <a href="#" class="more">Смотреть все фото</a>
    </div>
    <div id="random">
        <div class="heading">
            <span class="uppercase">Случайные фото PMF</span>
        </div>
        <?php for($i=0; $i<6; $i++){
            $val = $random[$i];
            if(($i % 2)== 0){
                $class = 'left';
            } else {
                $class = 'right';
            }
            echo "<a href=\"#\" class=\"".$class."\"><img src=\"".$this->createAbsoluteUrl('/')."/albums/".$val['profile_id']."/mini/".$val['id'].".".$val['extension']."\"/></a>";
        } ?>
    </div>
</div>
<div style="clear:both"></div>