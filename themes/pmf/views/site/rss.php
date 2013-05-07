<?= '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0">
    <channel>
        <title><?php echo Yii::app()->name; ?></title>
        <link><?php echo $this->createAbsoluteUrl('/'); ?></link>
        <description><?php echo Yii::app()->params->description; ?></description>
        <copyright><?php echo Yii::app()->name; ?></copyright>
        <?php foreach ($news as $val): ?>
        <item>
            <title><?php echo strip_tags($val->title); ?></title>
            <link><?php echo $this->createAbsoluteUrl('/news/view', array('id' => $val->id)); ?></link>
            <description><?php echo strip_tags(substr($val->content, 0, 256)); ?></description>
            <pubDate><?php echo $val->data; ?></pubDate>
        </item>
        <?php endforeach; ?>
    </channel>
</rss>