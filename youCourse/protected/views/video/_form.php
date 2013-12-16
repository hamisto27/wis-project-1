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
        <span class="help-inline" style="color:#b94a48; display:none;">Invalid youtube URL format!</span>

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
        var content = $('#Video_Content').val();
        var name = $('#Video_Name').val();
        var description = $('#Video_Description').val();
        var matches = content.match(/watch\?v=([a-zA-Z0-9\-_]+)/);
        if(content == "" || name == "" || !matches){
            if(content == "" && name == ""){
                $('#Video_Name').addClass('error');
                $("label[for=Video_Name]").addClass('error required');

                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
            }
            else if(content == "" ){
                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');

                $('#Video_Name').removeClass('error');
                $("label[for=Video_Name]").removeClass('error required');
            }
            else{

                if(!matches && name == ""){
                    $('#Video_Content').addClass('error');
                    $("label[for=Video_Content]").addClass('error required');
                    $('.help-inline').fadeIn('200');

                    $('#Video_Name').addClass('error');
                    $("label[for=Video_Name]").addClass('error required');


                }
                else{
                    if(!matches){
                        $('#Video_Content').addClass('error');
                        $("label[for=Video_Content]").addClass('error required');
                        $('.help-inline').fadeIn('200');

                        $('#Video_Name').removeClass('error');
                        $("label[for=Video_Name]").removeClass('error required');
                    }
                    else{
                        $('#Video_Content').removeClass('error');
                        $("label[for=Video_Content]").removeClass('error required');
                        $('.help-inline').fadeOut('100');

                        $('#Video_Name').addClass('error');
                        $("label[for=Video_Name]").addClass('error required');

                    }
                }
            }
        }
        else{
            $('#Video_Content').removeClass('error');
            $("label[for=Video_Content]").removeClass('error required');
            $('.help-inline').fadeOut('100');

            $('#Video_Name').removeClass('error');
            $("label[for=Video_Name]").removeClass('error required');

            var sendInfo = {
                Content: content,
                Name: name,
                Description: description
            };

           $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("video/ajax"); ?>',
                data:{Video: sendInfo},
                success:function(){
                    $('#uploadModal').modal('hide');
                    location.reload();
                },
                error: function() { // if error occurred
                    alert("Error occurred. please try again!");
                },

                dataType:'html'
            });

        }

    }
</script>