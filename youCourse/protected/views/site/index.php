<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="left">
    <?php $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_LIST,
        'items' => array(
            array('label' => 'List header'),
            array('label' => 'Home', 'url' => '#', 'active' => true),
            array('label' => 'Library', 'url' => '#'),
            array('label' => 'Applications', 'url' => '#'),
            array('label' => 'Another list header'),
            array('label' => 'Profile', 'url' => '#'),
            array('label' => 'Settings', 'url' => '#'),
            TbHtml::menuDivider(),
            array('label' => 'Help', 'url' => '#'),
        )
    ));
    ?>
</div>
<div class="right">
    <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

    <p>Welcome to the Youcours webpage!</p>

    <p>You may change the content of this page by modifying the following two files:</p>
    <ul>
        <li>View file: <code><?php echo __FILE__; ?></code></li>
        <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
    </ul>

    <p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
</div>
