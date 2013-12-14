<?php
/* @var $this ChannelController */
/* @var $model Channel */

echo TbHtml::breadcrumbs(array(
    'Home'=> Yii::app()->baseUrl.'/index.php',
    'Channel',
));
echo  TbHtml::pageHeader('Create your Channel', 'on YouCourse');
/*$this->menu=array(
	array('label'=>'List Channel', 'url'=>array('index')),
	array('label'=>'Manage Channel', 'url'=>array('admin')),
);*/
$this->renderPartial('_form', array('model'=>$model));