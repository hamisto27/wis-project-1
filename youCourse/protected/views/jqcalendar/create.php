<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */

$this->breadcrumbs=array(
	'Jqcalendars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jqcalendar', 'url'=>array('index')),
	array('label'=>'Manage Jqcalendar', 'url'=>array('admin')),
);
?>

<h1>Create Jqcalendar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>