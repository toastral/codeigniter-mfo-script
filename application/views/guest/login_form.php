<div class="text-center">
    <script>
        jQuery(function($){
            $('#login_btn').on('click', function(){
                login();
                return false;
            });
        });

        function login(){
            $.ajax({
                method: "POST",
                url: "/gate/ajax_login/",
                data: {
                    email: $('input[name="email"]').val(),
                    password: $('input[name="password"]').val(),
                },
            }).done(function( json_data ) {
                var obj_data = jQuery.parseJSON( json_data );
                //console.log(obj_data);
                if(obj_data.is_error){
                    alert(obj_data.msg);
                }else{
                    window.location.href = "/back/";
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
<div class="pad-50"></div>
<div class="pad-50"></div>
<div class="form-horizontal" style="width:450px; margin:0 auto;">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" id="login_btn">Вход</button>
        </div>
    </div>
</div>
<div class="pad-50"></div>
<div class="pad-50"></div>