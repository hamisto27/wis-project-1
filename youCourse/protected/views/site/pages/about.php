<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<?php $this->widget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'About',
    'content' => '<p>This is a simple web application have built for the cours of Web Information Systems. Our names are Aurelien Plisnier, Jorge Garcia and Mohamed Chajii.</p>'
        . TbHtml::button('Developers click here to have access to our API', array('color' =>TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE,'data-toggle' => 'modal','data-target' => '#myModal')),
)); ?>

<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal',
    'header' => 'Developers',
    'content' => '<p>Developers can access information from our database by using our REST based API returning a json. The adrress to access this json is <a href="youcourse/index.php/api/video/">youcourse/index.php/api/video/</a> for example</p>',
    'footer' => array(
        TbHtml::button('Ok', array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),
)); ?>

