<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */

$this->breadcrumbs=array(
	'Jqcalendars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Events', 'url'=>array('index')),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>Create an Event</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>