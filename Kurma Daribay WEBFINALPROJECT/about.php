<?php
$time=time();
if (session_id()=='') session_start();

$db=mysqli_connect("localhost", "root", "", "db") or die();
$res=mysqli_query($db,"set names utf8");

$mess_url=mysqli_real_escape_string($db,basename($_SERVER['SCRIPT_FILENAME']));

//получаем id текущей темы
$res=mysqli_query($db,"SELECT id FROM таблица WHERE file_name='".$mess_url."'");

$theme_id=$res["id"];

if (isset($_POST["contr_cod"])){    //отправлен комментарий
 $mess_login=htmlspecialchars($_POST["mess_login"]);
 $user_text=htmlspecialchars($_POST["user_text"]);
 if (md5($_POST["contr_cod"])==$_POST["prov_summa"]){    //код правильный
  if ($mess_login!='' and $user_text!=''){
   if (is_numeric($_POST["parent_id"]) and is_numeric($_POST["f_parent"]))
    $res=mysqli_query($db,"insert into comment
    (parent_id, first_parent, date, theme_id, login, message)
    values ('".$_POST["parent_id"]."','".$_POST["f_parent"]."',
    '".$time."','".$theme_id."','".$mess_login."','".$user_text."')");
   else $res=mysqli_query($db,"insert into comment (date, theme_id, login, message)
   values ('".$time."','".$theme_id."','".$mess_login."','".$user_text."')");
    $_SESSION["send"]="Комментарий принят!";
    header("Location: $mess_url#last"); exit;
  }
  else {
   $_SESSION["send"]="Не все поля заполнены!";
   header("Location: $mess_url#last"); exit;
  }
 }
 else {
  $_SESSION["send"]="Неверный проверочный код!";
  header("Location: $mess_url#last"); exit;
 }
}

if (isset($_SESSION["send"]) and $_SESSION["send"]!="") {    //вывод сообщения
    echo '<script type="text/javascript">alert("'.$_SESSION["send"].'");</script>';
    $_SESSION["send"]="";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>LIBRARY</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style type="text/css" >
    h3 {color: white;}
    .add_comment {
        /*display: table;*/
        width: 700px;
        float: left;
        margin-left:0px;
        /*margin-right:100px;*/
        margin-bottom: -15px;
        margin-top: -12px;
        border: 1px solid #000;
        background-color: white
    }
    .close_hint, .open_hint {
        float: right;
        border: 1px solid #77A;
        background: #6e6;
        width: 100px;
        text-align: center;
        cursor: pointer;
    }
    .close_hint { margin: 5px; color: #F00; }
    .comm_body { padding: 0 5px; background-color:#EEE; text-align:left; }
    .comm_head { padding: 3px; border: 1px solid #77A; background-color: #DFD; }
    .comm_minus { background: url('images/design.png') no-repeat; }
    .comm_plus { background: url('images/design.png') no-repeat; }
    .comm_minus, .comm_plus {
        float: right;
        width: 19px;
        height: 18px;
        cursor: pointer;
    }
    .comm_text { display:none; }
    .sp_link { color: #F33; cursor: pointer; }
    .strelka {
        background: url(images/design.png) no-repeat;
        border-left: 2px solid #000;
    }
    .strelka_2 { background: url(images/design.png) no-repeat; }
    #hint { position: absolute; display: none; z-index: 100; }
</style>
</head>
<body>	
	<div id="container">
		<div id="header">
      <?php 
        include("header.php");
      ?>           
        </div>
		<div id="centercoll">
		<div id="leftcol"><h3>Welcome To Our Library!<strong>IT'S NICE TO MEET YOU!!!</strong></h3>
    <?php
$cod=rand(1,10); $cod2=rand(1,10);
echo '<div id="last" align="center">';

echo '<form method="POST" action="'.$mess_url.'#last" class="add_comment"';
echo 'name="add_comment" id="hint"><div class="close_hint">Закрыть</div>';
echo '<div style="margin-left:20px; margin-top:10px; float:left;">';
echo 'Имя: <input type="text" name="mess_login" maxlength="20" value=""></div>';
echo '<div style="margin-left:20px; margin-right:450px; margin-top:20px; float:left;">';
echo 'Добавить комментарий: <textarea cols="78" rows="5" name="user_text"></textarea></div>';
echo '<div style="margin-left:-5px; margin-top:20px; margin-right:450px; float:left;"> Проверочный код: '
.$cod.' + '.$cod2.' = ';
echo '<input type="hidden" name="prov_summa" value="'.md5($cod+$cod2).'">';
echo '<input type="hidden" name="parent_id" value="0">';
echo '<input type="hidden" name="f_parent" value="0">';
echo '<input type="text" name="contr_cod" maxlength="10" size="5">';
echo '<div style="margin-left:25px; margin-top:20px; margin-bottom:15px; float:left;"> ';
echo '<input type="submit" value="Отправить"></div></div>';
echo '</form>';

echo '<form method="POST" action="'.$mess_url.'#last" class="add_comment">';
echo '<div style="margin-left:20px; margin-top:10px; float:left;">';
echo 'Имя: <input type="text" name="mess_login" maxlength="20" value=""></div>';
echo '<div style="margin-left:20px; margin-right:450px; margin-top:20px; float:left;">';
echo 'Добавить комментарий: <textarea cols="78" rows="5" name="user_text"></textarea></div>';
echo '<div style="margin-left:-5px; margin-top:20px; margin-right:450px; float:left;"> '.$cod.' + '.$cod2.' = ';
echo '<input type="hidden" name="prov_summa" value="'.md5($cod+$cod2).'">';

echo '<input type="text" name="contr_cod" maxlength="10" size="5">';
echo '<div style="margin-left:25px; margin-top:20px; margin-bottom:15px; float:left;"> ';
echo '<input type="submit" value="Отправить"></div></div>';
echo '</form></div>';
?>
<?php
function parents($up=0, $left=0) {    //Строим иерархическое дерево комментариев
global $tag,$mess_url;

for ($i=0; $i<=count($tag[$up])-1; $i++) {
 //Можно выделять цветом указанные логины
 if ($tag[$up][$i][2]=='Admin') $tag[$up][$i][2]='<font color="#C00">Admin</font>';
 if ($tag[$up][$i][6]==0) $tag[$up][$i][6]=$tag[$up][$i][0];
 //Высчитываем рейтинг комментария
 $sum=$tag[$up][$i][4]-$tag[$up][$i][5];

 if ($up==0) echo '<div style="padding:5px 0 0 0;">';
 else {
    if (count($tag[$up])-1!=$i)
        echo '<div class="strelka" style="padding:5px 0 0 '.($left-2).'px;">';
    else echo '<div class="strelka_2" style="padding:5px 0 0 '.$left.'px;">';
 }
 echo '<div class="comm_head" id="m'.$tag[$up][$i][0].'">';
 echo '<div style="float:left;"><b>'.$tag[$up][$i][2].'</b></div>';
 echo '<div class="comm_minus"></div>';
 echo '<div style="float:right; width:30px;" id="rating_comm'.$tag[$up][$i][0].'">';
 echo '<b>'.$sum.'</b></div><div class="comm_plus"></div>';
 echo '<a style="float:right; width:70px;" href="'.$mess_url.'#m';
 echo $tag[$up][$i][0].'"># '.$tag[$up][$i][0].'</a>';
 echo '<div style="float:right; width:170px;">';
 echo '('.date("H:i d.m.Y", $tag[$up][$i][3]).' г.)</div>';
 echo '<div style="clear:both;"></div></div>';
 echo '<div class="comm_body">';
 if ($sum<0) echo '<u class="sp_link">Показать/скрыть</u><div class="comm_text">';
 else echo '<div style="word-wrap:break-word;">';
 echo str_replace("<br />","<br>",nl2br($tag[$up][$i][1])).'</div>';
 echo '<div class="open_hint" onClick="comm_on('.$tag[$up][$i][0].',
     '.$tag[$up][$i][6].')">Ответить</div><div style="clear:both;"></div></div>';

 if (isset($tag[ $tag[$up][$i][0] ])) parents($tag[$up][$i][0],20);
 echo '</div>';
}
}

$res=mysqli_query($db,"SELECT * FROM comment
    WHERE theme_id='".$theme_id."' ORDER BY id");
$number=mysqli_num_rows($res);

if ($number>0) {
 echo '<div style="border:1px solid #000000;padding:5px;text-align:center;">';
 echo '<b>Последние комментарии:</b><br>';
 while ($com=mysqli_fetch_assoc($res))
    $tag[(int)$com["parent_id"]][] = array((int)$com["id"], $com["message"],
    $com["login"], $com["date"], $com["plus"], $com["minus"], $com["first_parent"]);
 echo parents().'</div><br>';
}
?>
    </div>
    <div class="clear"></div>
        <footer> <?php include("footer.php"); ?> </div></footer>
	</div>
  <script type="text/javascript">
//Добавление в форму отправки комментария значений id родительских комментариев
function comm_on(p_id,first_p){
    document.add_comment.parent_id.value=p_id;
    document.add_comment.f_parent.value=first_p;
}

$(document).ready(function(){
//Показать скрытое под спойлером сообщение
$(".sp_link").click(function(){
    $(this).parent().children(".comm_text").toggle("normal");
});

//Показать форму ответа на имеющийся комментарий
$(".open_hint").click(function(){
    $("#hint").animate({
        top: $(this).offset().top + 25, left: $(document).width()/2 -
        $("#hint").width()/2
    }, 400).fadeIn(800);
});

//Скрыть форму ответа на имеющийся комментарий
$(".close_hint").click(function(){ $("#hint").fadeOut(1200); });

//Получение id оцененного комментария
$(".comm_plus,.comm_minus").click(function(){
    id_comm=$(this).parents(".comm_head").attr("id").substr(1);
});

//Отправление оценки комментария в файл rating_comm.php
$(".comm_plus").click(function(){
    jQuery.post("rating_comm.php",{comm_id:id_comm,ocenka:1},rating_comm);
});
$(".comm_minus").click(function(){
    jQuery.post("rating_comm.php",{comm_id:id_comm,ocenka:0},rating_comm);
});

//Возврат рейтинга комментария и его обновление
function rating_comm(data){
    $("#rating_comm"+id_comm).fadeOut(800,function(){
        $(this).html(data).fadeIn(800);
    });
}
});
</script>
</body>
</html>