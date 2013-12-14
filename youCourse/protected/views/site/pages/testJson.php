<?php
/**
 * Created by PhpStorm.
 * User: Pantoufle
 * Date: 13/12/13
 * Time: 18:31
 */

?>

<!-- Begin Button -->
<div class="demo">
<br> <br> <br>
<input id = "btnSubmit" type="button" value="Release"/>
<br> <br> <br>
</div>
<!-- End Button -->
<script>
//var data = {"name":"api1","phone":"234343","message":"sample message 4"}; // for POST method
$('#btnSubmit').click(function(){
    var data = {"id":"1"}; // for GET Method
//var data = {"name":"my api success"}; // for PUT method
//var data = {"id":"1"}; // For DELETE method
    $.ajax({
        url:"<?php echo Yii::app()->request->baseUrl; ?>/index.php/api?model=user&key=cGFzczE=", // replace with your module
        //use the authentication key in base64 encoded format
        data:data, //No need to add for GET and DELETE methods
        datType:'json',
        type: 'GET',
        success:function(result){
            $("#div1").html(result);
        }});

});

</script>