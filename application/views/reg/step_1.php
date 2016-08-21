<script>
  jQuery(function($){
    $('#step_1').on('click', function(){
      step_1();
      return false;
    });
  });

  function step_1(){
    $.ajax({
      method: "POST",
      url: "/reg/ajax_step_1/",
      data: {
          name_1: $('input[name="name_1"]').val(),
          name_2: $('input[name="name_2"]').val(),
          name_3: $('input[name="name_3"]').val(),
          sex: $('select[name="sex"]').val(),
          birthday: $('input[name="birthday"]').val(),
          email: $('input[name="email"]').val(),
          phone: $('input[name="phone"]').val(),
          option_18_year: document.getElementById('inlineCheckbox1').checked?1:0,
          option_accept_rules: document.getElementById('inlineCheckbox2').checked?1:0,
          option_accept_email: document.getElementById('inlineCheckbox3').checked?1:0,
      },
    }).done(function( json_data ) {
      var obj_data = jQuery.parseJSON( json_data );
      //console.log(obj_data);
      if(obj_data.is_error){
        alert(obj_data.msg);
      }else{
        window.location.href = "/reg/step_2/";
      }
    });
  }
</script>

<div class="reg_form_title">
  <h1>Заявка на микрозайм - 1 шаг: Личные данные</h1>
  <h3>Заполните свои личные данные</h3>
</div>
<form>
<div class="row">
  <div class="col-md-6">
      <div class="form-group">
        <label for="inputName1">Имя</label>
        <input type="text" class="form-control" id="inputName1" placeholder="имя" name="name_1">
      </div>

      <div class="form-group">
        <label for="inputName2">Фамилия</label>
        <input type="text" class="form-control" id="inputName2" placeholder="фамилия" name="name_2">
      </div>

      <div class="form-group">
        <label for="inputName3">Отчество</label>
        <input type="text" class="form-control" id="inputName3" placeholder="отчество" name="name_3">
      </div>

      <div class="form-group">
        <label for="inputSex">Пол</label>
        <select class="form-control" id="inputSex" name="sex">
          <option value="male"> м </option>
          <option value="female"> ж </option>
        </select>
      </div>

  </div>
  <div class="col-md-6">
      <div class="form-group">
        <label for="inputDay">День рождения</label>
        <input type="date" class="form-control" id="inputDay" placeholder="день" name="birthday">
      </div>

      <div class="form-group">
        <label for="inputEmail1">Email</label>
        <input type="email" class="form-control" id="inputEmail1" placeholder="e-mail" name="email">
      </div>

      <div class="form-group">
        <label for="inputPhone">Телефон</label>
        <input type="tel" class="form-control" id="inputPhone" placeholder="телефон" name="phone">
      </div>

      <div class="form-group">
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox1" name="option_18_year" value="1"> Вам уже исполнилось 18 лет?
        </label>
      </div>
      <div class="form-group">
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox2" name="option_accept_rules" value="1"> Я согласен с <a href="/rules/public_offer">публичной офертой</a> и на <a href="/rules/police">обработку персональных данных</a>
        </label>
      </div>
      <div class="form-group">
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox3" name="option_accept_email" value="1"> Я согласен получать маркетинговые рассылки с предложениями микрозайма
        </label>
      </div>

      <div class="form-button">
        <button type="button" class="btn btn-primary btn-lg btn-block" id="step_1">Продолжить ></button>
      </div>
  </div>
</div>
</form>

<div class="pad-50"></div>