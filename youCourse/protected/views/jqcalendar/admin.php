<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */

$this->breadcrumbs=array(
	'Jqcalendars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Jqcalendar', 'url'=>array('index')),
	array('label'=>'Create Jqcalendar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jqcalendar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jqcalendars</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jqcalendar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'user_id',
		'Subject',
		'Location',
		'Description',
		'StartTime',
		/*
		'EndTime',
		'IsAllDayEvent',
		'Color',
		'RecurringRule',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
