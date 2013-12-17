<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */

$this->breadcrumbs=array(
	'Jqcalendars'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Events', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'View Events', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>Update Event <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>