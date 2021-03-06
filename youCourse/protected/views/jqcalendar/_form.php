<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */
/* @var $form CActiveForm */
?>

<div class="form">
<!--<script type="text/javascript" src="../../../js/datepicker.js"></script>-->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jqcalendar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'user_id'); ?>
		<?php //echo $form->textField($model,'user_id'); ?>
		<?php //echo $form->error($model,'user_id');?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Subject'); ?>
		<?php echo $form->textField($model,'Subject',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'Subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Location'); ?>
		<?php echo $form->textField($model,'Location',array('size'=>60,'maxlength'=>200)); ?>
        <input id="clickMe" type="button" value="clickme"; />
		<?php echo $form->error($model,'Location'); ?>
        <?php
        $this->widget('application.extensions.gmap.GMap', array(
            'id' => 'gmap',//id of the <div> container created
            'key' => 'AIzaSyALxT1YDH6ZWyI3oqWxCLDIhWTqMTUgsaQ', //goole API key, should be obtained for each site,it's free
            'label' => ' ', //text written in the text bubble
            'address' => array(
                'address' => 'ULB',//address of the place
                'city' => 'Bruxelles', //city
            )
        ));
        ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StartTime'); ?>
		<?php //echo $form->textField($model,'StartTime'); ?>
		<?php //echo $form->error($model,'StartTime'); ?>
	</div>

    <div class="row">
        <?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
            'name'=>CHtml::activeName($model,'StartTime'),
            'value'=>$model->StartTime,
            'options'=>array('dateFmt'=>'yyyy-MM-dd HH:mm:ss'),
        ));?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndTime'); ?>
		<?php //echo $form->textField($model,'EndTime'); ?>
		<?php //echo $form->error($model,'EndTime'); ?>
	</div>

    <div class="row">
        <?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
            'name'=>CHtml::activeName($model,'EndTime'),
            'value'=>$model->EndTime,
            'options'=>array('dateFmt'=>'yyyy-MM-dd HH:mm:ss'),
        ));?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsAllDayEvent') ;echo $form->checkBox($model,'IsAllDayEvent' ); ?>
		<?php //echo $form->textField($model,'IsAllDayEvent'); ?>
		<?php //echo $form->error($model,'IsAllDayEvent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Color'); ?>
		<?php //echo $form->textField($model,'Color',array('size'=>60,'maxlength'=>200)); ?>
		<?php //echo $form->error($model,'Color'); ?>
        <?php echo $form->dropDownList($model,'Color',array('6' => 'Blue', '1' => 'Red','9' => 'Green','13' => 'Orange','0' => 'Grey','21' => 'Brown'),
            array('empty' => '(Select a color)'));?>

        <?php //echo CHtml::dropDownList('Color', $model,
            //array('Blue' => 'Blue', 'Red' => 'Red'),
            //array('empty' => '(Select a color)')); ?>

	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'RecurringRule'); ?>
		<?php //echo $form->textField($model,'RecurringRule',array('size'=>60,'maxlength'=>500)); ?>
		<?php //echo $form->error($model,'RecurringRule'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $('#clickMe').click(function(){

        var m = new GMap("gmap", $('#Jqcalendar_Location').val());
        m.show();


    });

</script>

