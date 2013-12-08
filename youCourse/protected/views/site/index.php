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
    <h1>Welcome to the <i>YouCours</i> webpage!</h1>

    <p>In this page you can learn and teach posting your own videos and tutorials</p>


    <div class="container">
        <div class="row">
            <div class="span8">
                <div class="flex-video widescreen" style="margin: 0 auto;text-align:left;">
                    <iframe width="640" height="360" src="//www.youtube.com/embed/5voVN_RuAjk?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <p>In this page you can learn and teach posting your own videos and tutorials</p>
    <ul>
        <li>View file: <code><?php echo __FILE__; ?></code></li>
        <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
    </ul>

    <p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
</div>
