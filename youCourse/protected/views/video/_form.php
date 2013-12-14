<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget("bootstrap.widgets.TbActiveForm", array(
        "id"=>"video-form",
        "layout" => TbHtml::FORM_LAYOUT_HORIZONTAL,
        "enableAjaxValidation"=>true,
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'onsubmit'=>"send();",/* Disable normal form submit */
            'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
        ),
    )); ?>
    <fieldset>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"Content"); ?>
        </div>
        <?php echo $form->textField($model,"Content", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"Name"); ?>
        </div>
        <?php echo $form->textField($model,"Name", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"Description"); ?>
        </div>
        <?php echo $form->textArea($model,"Description", array("span" => 5, "rows" => 5)); ?>

        <?php // echo TbHtml::formActions(array(
            //TbHtml::submitButton($model->isNewRecord ? "Create" : "Save"),
        //));  ?>
        <?php //echo TbHtml::Button('Submit',array('onclick'=>'send();')); ?>
    </fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    function send()
    {
        var data=$("#video-form").serialize();
        var content = $('#Video_Content').val();
        var name = $('#Video_Name').val();
        var description = $('#Video_Description').val();
        var sendInfo = {
            Content: content,
            Name: name,
            Description: description
        };
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("video/ajax"); ?>',
            data:{Video: sendInfo},
            success:function(data){
            },
            error: function(data) { // if error occurred
                alert("Error occurred. please try again!");
            },

            dataType:'html'
        });

    }
</script>