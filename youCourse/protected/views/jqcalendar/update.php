<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */

$this->breadcrumbs=array(
	'Jqcalendars'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jqcalendar', 'url'=>array('index')),
	array('label'=>'Create Jqcalendar', 'url'=>array('create')),
	array('label'=>'View Jqcalendar', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Jqcalendar', 'url'=>array('admin')),
);
?>

<h1>Update Jqcalendar <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>