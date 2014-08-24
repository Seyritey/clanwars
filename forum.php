<?php
include 'blocks/header.php';
head ('Форум - ClanWars.su'); ?>
<div class="table-responsive container-fluid" style="margin: 0px auto; text-align: center; ">
<img src='http://test-clanwar.1gb.ru/style/forumimg.png' style="max-width: 100%; display:block; margin:0 auto;">
    <img src="http://test-clanwar.1gb.ru/style/forumcat1.png" style="max-width: 100%; ">
    <img src="http://test-clanwar.1gb.ru/style/forumcat2.png" style="max-width: 100%; ">
    <img src="http://test-clanwar.1gb.ru/style/forumcat3.png" style="max-width: 100%; ">
    <img src="http://test-clanwar.1gb.ru/style/forumcat4.png" style="max-width: 100%; ">
</div>
<script type="text/javascript">
function startAjax(url){
  var request;
  if(window.XMLHttpRequest){
      request = new XMLHttpRequest();
  } else if(window.ActiveXObject){
      request = new ActiveXObject("Microsoft.XMLHTTP");  
  } else {
      return;
  }
 
  request.onreadystatechange = function(){
        switch (request.readyState) {
          case 1: print_console("<br/><em>1: Подготовка к отправке...</em>"); break
          case 2: print_console("<br/><em>2: Отправлен...</em>"); break
          case 3: print_console("<br/><em>3: Идет обмен..</em>"); break
          case 4:{
           if(request.status==200){    

                     }else if(request.status==404){
                        alert("Ошибка: запрашиваемый скрипт не найден!");
                     }
                      else alert("Ошибка: сервер вернул статус: "+ request.status);
           
            break
            }
        }      
    }
    request.open ('GET', url, true);
    request.send ('');
  }
  function print_console(text){
    document.getElementById("console").innerHTML += text;
  }
</script>

<a href="#" onclick="startAjax('blocks/news.php');">Запустить php скрипт</a>  
<div id="console" style="border: 1px solid gray; width:250px; height: 110px; padding: 10px; background:lightgray;">
Консоль выполнения запроса:
</div>
<br/>
<div id="printResult">
После нажатия на ссылку, тут будет сообщение с сервера!
</div>
<?php
include 'blocks/footer.php';
?>