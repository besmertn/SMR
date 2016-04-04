function getXmlHttp() {
    var xmlhttp;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
  }
function userNameCheck(form) {
    var status = 0;
    var elStatus = document.getElementById('name_status');
    var name = form.elements.username.value;
    var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    xmlhttp.open('POST', 'check.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("name=" + encodeURIComponent(name)); // Отправляем POST-запрос
    xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
      if (xmlhttp.readyState == 4) { // Ответ пришёл
        if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
          status = xmlhttp.responseText; // Выводим ответ сервера
        }
      }
    };
    setTimeout(function(){
      if(name.length < 31 && name.length  > 4){
        if(status == "false"){
            elStatus.innerHTML = "OK";
        }
          else elStatus.innerHTML = "This name already exists!";
    }
        else elStatus.innerHTML = "Incorrect name size!" ;
    }, 1000);


}
function passwordCheck(form){
    var status = 0;
    var elStatus = document.getElementById('pas_status');
    var elStatusTmp = document.getElementById('re_pas_status');
    var pas = form.elements.password.value;
    var rePas = form.elements.re_password.value;
    if(pas.length < 31 && pas.length > 3){
        if(pas == rePas){
            elStatus.innerHTML = "OK";
            elStatusTmp.innerHTML = "OK";
        }
        else elStatusTmp.innerHTML = "Passwords do not match!";
    }
    else elStatus.innerHTML = "Incorrect password size!";
}
function emailCheck(form){
    var status = 0;
    var elStatus = document.getElementById('email_status');
    var email = form.elements.email.value;
    var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    xmlhttp.open('POST', 'check.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("name=" + encodeURIComponent(email)); // Отправляем POST-запрос
    xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
      if (xmlhttp.readyState == 4) { // Ответ пришёл
        if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
          status = xmlhttp.responseText; // Выводим ответ сервера
        }
      }
    };
    var tmp = 0;
    for(var i = 0;i < email.length;i++){
        if(email[i] == '@')tmp = 1;
    }
    setTimeout(function(){
      if(email.length < 31 && email.length  > 5 && tmp == 1){
        if(status == "false"){
            elStatus.innerHTML = "OK";
        }
          else elStatus.innerHTML = "This e-mail already exists!";
    }
        else elStatus.innerHTML = "Incorrect email " ;
    }, 1000);
}
