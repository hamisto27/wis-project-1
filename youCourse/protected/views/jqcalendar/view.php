<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */

$this->breadcrumbs=array(
	'Jqcalendars'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Events', 'url'=>array('index')),
	array('label'=>'Create Events', 'url'=>array('create')),
	array('label'=>'Update Events', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Events', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>View Event <?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'user_id',
		'Subject',
		'Location',
		'Description',
		'StartTime',
		'EndTime',
		'IsAllDayEvent',
		'Color',
		'RecurringRule',
	),
)); ?>
