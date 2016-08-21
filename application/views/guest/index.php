<div class="text-center">
<script>
    jQuery(function($){
        $('#step_0').on('click', function(){
            step_0();
            return false;
        });
    });

    function step_0(){
        $.ajax({
            method: "POST",
            url: "/reg/ajax_step_0/",
            data: {
                test: 111
                //task_id: $('input[name="task_id"]').val(),
                //content: $('textarea[name="content"]').val(),
            },
        }).done(function( json_data ) {
            var obj_data = jQuery.parseJSON( json_data );
            //console.log(obj_data);
            if(obj_data.is_error){
                alert(obj_data.msg);
            }else{
                window.location.href = "/reg/step_1/";
            }
        });
    }
</script>
<style>

    .slider.slider-horizontal {
        width: 300px;
        height: 50px;
    }
    .slider.slider-horizontal .slider-track {
        height: 20px;
    }
    .slider-handle {
        height: 30px;
        width: 30px;
    }
    .slider_01_desc{
        font-size:24px;
        padding-top:20px;
    }
</style>

    <input id="slider_01" type="text"
           data-slider-min="1000"
           data-slider-max="100000"
           data-slider-step="1000"
           data-slider-value="30000"
    />
    <div class="slider_01_desc">Сумма займа: <span id="slider_01_val">30000</span></div>
    <div class="btn-group" data-toggle="buttons" style="padding-top:20px">
        <label class="btn btn-default active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked> 1-7<br>дней
        </label>
        <label class="btn btn-default">
            <input type="radio" name="options" id="option2" autocomplete="off"> 8-14<br>дней
        </label>
        <label class="btn btn-default">
            <input type="radio" name="options" id="option3" autocomplete="off"> 15-30<br>дней
        </label>
        <label class="btn btn-default">
            <input type="radio" name="options" id="option4" autocomplete="off"> 1-6<br>месяцев
        </label>
        <label class="btn btn-default">
            <input type="radio" name="options" id="option5" autocomplete="off"> 7-12<br>месяцев
        </label>
    </div>
    <div style="font-size:12px; color:gray">
        <br>
        <div style="font-size:24px;">24/7</div>
        моментальное<br>
        решение<br>
    </div>
    <div style="width:300px; margin:0 auto; padding-top:40px">
        <button type="button" class="btn btn-primary btn-lg btn-block" id="step_0">ПОЛУЧИТЬ ДЕНЬГИ ></button>
    </div>


</div>
<?php // <script src="/js/slider.js"></script> ?>

<script>
$("#slider_01").slider({
    tooltip: 'always',
    animate: 1000,

});
$("#slider_01").on("slide", function(slideEvt) {
$("#slider_01_val").text(slideEvt.value);
});
</script>