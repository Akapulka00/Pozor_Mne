<?php
const  FILE_NAME ="data.csv";
function heanlder(){
$files=$_FILES;
$tmp_name = $files['csvInfo']['tmp_name'];
$file_name = $files['csvInfo']['name'];
$file_name = microtime() . $file_name;
$file="files/".$file_name;
if (move_uploaded_file($tmp_name, "files/$file_name")){
return ;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $arr_from_file = file($file);
  $link = mysqli_connect("localhost", "vadim", "2552", "workbase");
  if($link === false){
    die("ERROR: Ошибка подключения. " . mysqli_connect_error());
  }
  $strBuff=[];
  $strNewfile="Код,Название,Error\n";
  $flag=0;//флаг скипа чтобы отделить поля от данных файла
  $sqlString="INSERT INTO guideList (Код, Название) VALUES";
  foreach ($arr_from_file as $str){
    if($flag==0){
      $flag=1;
      continue;
    }
    $strBuff=explode(",", $str);//1-ключ 0-значение
    //проверка названия
    if(preg_match('/^([а-яА-ЯЁёa-zA-Z0-9-.]+)$/u',$str[1])){
      $strNewfile.="$str[0],$str[1]\n";
      $sqlString.="('$str[0]', '$str[1]'),";
    }else{
      $char=CheckingSymbol($str[1]);
      $strNewfile.=`$str[0],$str[1],"Недопустимый символ "$char"\n`;
    }
  }
  if(mysqli_query($link, $sqlString)){

  } else{
    return;
  }
  $f_hdl = fopen(FILE_NAME, 'w+');
  fwrite($f_hdl, $strNewfile);
  fclose($f_hdl);
  echo FILE_NAME;
}
}
function CheckingSymbol(string $str){
$arr= explode("", $str);
foreach ($arr as $char){
  if(!preg_match('/^([а-яА-ЯЁёa-zA-Z0-9-.]+)$/u',$char)){
    return $char;
  }
}
}
heanlder();
?>
