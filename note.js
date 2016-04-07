function getXMLHTTP() {
           var x = false;
           try {
              x = new XMLHttpRequest();
           }catch(e) {
             try {
                x = new ActiveXObject("Microsoft.XMLHTTP");
             }catch(ex) {
                try {
                    req = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e1) {
                    x = false;
                }
             }
          }
          return x;
}
function open(id){
    var nTitle = document.getElementById('title' + id).innerHTML;
    var nContent = document.getElementById('content' + id).innerHTML;
    document.getElementById('title').innerHTML = nTitle;
    document.getElementById('content').innerHTML = nContent;
}
function deleteNote(id){
    var xmlhttp = getXMLHTTP(); // Создаём объект XMLHTTP
    xmlhttp.open('POST', 'deleteNote.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("id=" + encodeURIComponent(id)); // Отправляем POST-запрос
    xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
      if (xmlhttp.readyState == 4) { // Ответ пришёл
        if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
           window.location.reload(); // Выводим ответ сервера
        }
      }
    };

}
function fillingNote(){
   var xmlhttp = getXMLHTTP(); // Создаём объект XMLHTTP
    xmlhttp.open('POST', 'filling.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send(); // Отправляем POST-запрос
    xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
      if (xmlhttp.readyState == 4) { // Ответ пришёл
        if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
           alert(xmlhttp.responseText);
            //document.getElementById('cont').innerHTML = xmlhttp.responseText; // Выводим ответ сервера
            document.write(xmlhttp.responseText);
        }
      }
    };
}
