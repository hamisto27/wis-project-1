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

        $("#btnSubmit").click(function(){
            $.ajax({
                url:'/api/user/1',
                type:"GET",
                success:function(data) {
                    console.log(data);
                },
                error:function (xhr, ajaxOptions, thrownError){
                    console.log(xhr.responseText);
                }
            });
        });
</script>