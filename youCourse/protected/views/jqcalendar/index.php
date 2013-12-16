<?php
/* @var $this JqcalendarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jqcalendars',
);

$this->menu=array(
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>Jqcalendars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
