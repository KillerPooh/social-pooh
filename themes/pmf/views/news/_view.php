<?php
/* @var $this NewsController */
/* @var $data News */
?>

      <div class="post-first">
       <!--  --><img class="thumb" src="dummy/image.png" height="200px" width="240px">
        <h1 class="uppercase">
             <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
        </h1>
        <div class="info">
          <span class="date"><?php echo CHtml::encode($data->data); ?></span>
          <div class="right">
            <span class="views"><?php echo CHtml::encode($data->views); ?></span>
            <span class="comments">15</span>
          </div>
        </div>
		<div>
			 <?php $content = $data->content;
				   $content = explode("<podkat>", $content);
				   echo str_replace("\n", "<br>", $content['0']);
			 ?>
		</div>
      </div>