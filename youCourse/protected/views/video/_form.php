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
        <span id="help-content" class="help-inline" style="color:#b94a48; display:none;">Invalid youtube or vimeo URL!</span>

        <div class="row">
            <?php echo $form->labelEx($model,"Name"); ?>
        </div>
        <?php echo $form->textField($model,"Name", array("size" => TbHtml::INPUT_SIZE_XLARGE,'class' => 'name-video')); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"slideshare"); ?>
        </div>
        <?php echo $form->textField($model,"slideshare", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>
        <span id="help-slideshare" class="help-inline" style="color:#b94a48; display:none;">Invalid slideshare URL format!</span>

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
        var name = $('.name-video').val();
        var description = $('#Video_Description').val();
        var slideshare = $('#Video_slideshare').val();
        var matches_youtube = content.match(/watch\?v=([a-zA-Z0-9\-_]+)/);
        var matches_vimeo = content.match(/^http:\/\/(www\.)?vimeo\.com\/(clip:)?(\d+).*$/);// vimeo regex
        var matches=""
        if(matches_youtube || matches_vimeo){
            if(matches_youtube)
                matches="youtube";
            else
                matches="vimeo";
        }
        else{
            matches="";
        }
        if(content == "" || name == "" || matches == "" || (slideshare != "" && slideshare.indexOf('slideshare.net') == -1)){

            if(content == "" && name == ""  && (slideshare != "" && slideshare.indexOf('slideshare.net') == -1)){

                $('.name-video').addClass('error');
                $("label[for=Video_Name]").addClass('error required');

                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
                $('#help-content').fadeOut('200');

                $('#Video_slideshare').addClass('error');
                $("label[for=Video_slideshare]").addClass('error required');
                $('#help-slideshare').fadeIn('200');




            }
            else if(content != "" && name == "" && matches == "" && (slideshare != "" && slideshare.indexOf('slideshare.net') == -1)){


                $('.name-video').addClass('error');
                $("label[for=Video_Name]").addClass('error required');

                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
                $('#help-content').fadeIn('200');

                $('#Video_slideshare').addClass('error');
                $("label[for=Video_slideshare]").addClass('error required');
                $('#help-slideshare').fadeIn('200');

            }
            else if(content == "" && name != "" && (slideshare != "" && slideshare.indexOf('slideshare.net') == -1)){


                $('.name-video').removeClass('error');
                $("label[for=Video_Name]").removeClass('error required');

                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
                $('#help-content').fadeOut('200');

                $('#Video_slideshare').addClass('error');
                $("label[for=Video_slideshare]").addClass('error required');
                $('#help-slideshare').fadeIn('200');
            }
            else if(content != "" && name == "" && matches != "" && (slideshare != "" && slideshare.indexOf('slideshare.net') == -1)){
                $('.name-video').addClass('error');
                $("label[for=Video_Name]").addClass('error required');


                $('#Video_Content').removeClass('error');
                $("label[for=Video_Content]").removeClass('error required');
                $('#help-content').fadeOut('200');

                $('#Video_slideshare').addClass('error');
                $("label[for=Video_slideshare]").addClass('error required');
                $('#help-slideshare').fadeIn('200');


            }

            else if(content == "" && name == "" && (slideshare == "" || slideshare.indexOf('slideshare.net') != -1)){
                $('.name-video').addClass('error');
                $("label[for=Video_Name]").addClass('error required');


                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
                $('#help-content').fadeOut('200');

                $('#Video_slideshare').removeClass('error');
                $("label[for=Video_slideshare]").removeClass('error required');
                $('#help-slideshare').fadeOut('200');


            }

            else if(content != "" && name != "" && matches == "" && (slideshare != "" && slideshare.indexOf('slideshare.net') == -1)){
                $('.name-video').removeClass('error');
                $("label[for=Video_Name]").removeClass('error required');


                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
                $('#help-content').fadeIn('200');

                $('#Video_slideshare').addClass('error');
                $("label[for=Video_slideshare]").addClass('error required');
                $('#help-slideshare').fadeIn('200');


            }

            else if(content != "" && name == "" && matches != "" && (slideshare == "" || slideshare.indexOf('slideshare.net') != -1)){
                $('.name-video').addClass('error');
                $("label[for=Video_Name]").addClass('error required');


                $('#Video_Content').removeClass('error');
                $("label[for=Video_Content]").removeClass('error required');
                $('#help-content').fadeOut('200');

                $('#Video_slideshare').removeClass('error');
                $("label[for=Video_slideshare]").removeClass('error required');
                $('#help-slideshare').fadeOut('200');


            }

            else if(content != "" && name == "" && matches != "" && (slideshare != "" && slideshare.indexOf('slideshare.net') == -1)){

                $('.name-video').addClass('error');
                $("label[for=Video_Name]").addClass('error required');

                $('#Video_Content').removeClass('error');
                $("label[for=Video_Content]").removeClass('error required');
                $('#help-content').fadeOut('200');

                $('#Video_slideshare').addClass('error');
                $("label[for=Video_slideshare]").addClass('error required');
                $('#help-slideshare').fadeIn('200');



            }
            else if(content != "" && name == "" && matches == "" && (slideshare == "" || slideshare.indexOf('slideshare.net') != -1)){

                $('.name-video').addClass('error');
                $("label[for=Video_Name]").addClass('error required');


                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
                $('#help-content').fadeIn('200');

                $('#Video_slideshare').removeClass('error');
                $("label[for=Video_slideshare]").removeClass('error required');
                $('#help-slideshare').fadeOut('200');



            }
            else if(content != "" && name != "" && matches != "" && (slideshare != "" && slideshare.indexOf('slideshare.net') == -1)){

                $('.name-video').removeClass('error');
                $("label[for=Video_Name]").removeClass('error required');

                $('#Video_Content').removeClass('error');
                $("label[for=Video_Content]").removeClass('error required');
                $('#help-content').fadeOut('200');

                $('#Video_slideshare').addClass('error');
                $("label[for=Video_slideshare]").addClass('error required');
                $('#help-slideshare').fadeIn('200');



            }
            else if(content != "" && name != "" && matches == "" && (slideshare == "" || slideshare.indexOf('slideshare.net') == -1)){

                $('.name-video').removeClass('error');
                $("label[for=Video_Name]").removeClass('error required');

                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
                $('#help-content').fadeIn('200');

                $('#Video_slideshare').removeClass('error');
                $("label[for=Video_slideshare]").removeClass('error required');
                $('#help-slideshare').fadeOut('200');



            }
            else if(content == "" && name != "" && (slideshare == "" || slideshare.indexOf('slideshare.net') != -1)){

                $('.name-video').removeClass('error');
                $("label[for=Video_Name]").removeClass('error required');

                $('#Video_Content').addClass('error');
                $("label[for=Video_Content]").addClass('error required');
                $('#help-content').fadeOut('200');

                $('#Video_slideshare').removeClass('error');
                $("label[for=Video_slideshare]").removeClass('error required');
                $('#help-slideshare').fadeOut('200');



            }

        }

        /*else if (slideshare.indexOf('slideshare.net') == -1){
            $('#Video_slideshare').addClass('error');
            $("label[for=Video_slideshare]").addClass('error required');
            $('#help-slideshare').fadeIn('200');

            $('#Video_Content').removeClass('error');
            $("label[for=Video_Content]").removeClass('error required');
            $('#help-content').fadeOut('100');

            $('#Video_Name').removeClass('error');
            $("label[for=Video_Name]").removeClass('error required');
        }*/

        else{
            $('#Video_Content').removeClass('error');
            $("label[for=Video_Content]").removeClass('error required');
            $('#help-content').fadeOut('100');

            $('#Video_slideshare').removeClass('error');
            $("label[for=Video_slideshare]").removeClass('error required');
            $('#help-slideshare').fadeOut('200');

            $('.name-video').removeClass('error');
            $("label[for=Video_Name]").removeClass('error required');

            var sendInfo = {
                Content: content,
                Name: name,
                Description: description,
                slideshare: slideshare
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