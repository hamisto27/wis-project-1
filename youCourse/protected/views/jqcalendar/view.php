<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */

$this->breadcrumbs=array(
	'Jqcalendars'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Jqcalendar', 'url'=>array('index')),
	array('label'=>'Create Jqcalendar', 'url'=>array('create')),
	array('label'=>'Update Jqcalendar', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Jqcalendar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jqcalendar', 'url'=>array('admin')),
);
?>

<h1>View Jqcalendar #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Subject',
		'Location',
		'Description',
		'StartTime',
		'EndTime',
		'IsAllDayEvent',
		'Color',
		'RecurringRule',
		'userID',
	),
)); ?>
