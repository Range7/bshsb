<?php
ob_start();
$token = "5737339516:AAFbUdBao0lcyfdlssf_KloejwGigy597p0"; 
define("API_KEY",$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$JJJ22J = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$JJJ22J";
$JJJ22J = file_get_contents($url);
return json_decode($JJJ22J);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$get_trgma=file_get_contents('$from_id/trgm.txt');
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$name = $up->from->first_name;
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$statuss= file_get_contents("NumUser$chat_id.txt");
$staats= file_get_contents("UserNumUser$chat_id.txt");
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){

$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}
if($text == '/start'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
*مرحبا بك عزيزي المستخدم* ( [$name](tg://user?id=$chat_id) )

- في بوت الارقام الوهمية

- يمكنك الحصول علي رقم وهمي مجانا
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الحصول علي رقم وهمي' ,'callback_data'=>"GetNum"]],
]
])
]);
}
if($data=="GetNum"){
$apiNum = json_decode(file_get_contents("http://darr.zzz.com.ua/apix/sd.php"),true);
$donNum = $apiNum["result"];
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
رقمك الوهمي هو

( `$donNum` )
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الحصول علي الرسائل' ,'callback_data'=>"Senders"]],
[['text'=>'الغاء' ,'callback_data'=>"itsBack"]],
]
])
]);
file_put_contents("NumUser$chat_id.txt","$donNum");
}

if($data=="Senders"){
$apiNumSend = json_decode(file_get_contents("http://darr.zzz.com.ua/apix/sd.php/$statuss"),true);
$donNumD = $apiNum["last_Message"];
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
الرسائل المرسلة للرقم 

( *$donNumD* )
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'تحديث' ,'callback_data'=>"Update"]],
[['text'=>'رجوع للخلف' ,'callback_data'=>"itsBack"]],
]
])
]);
}

if($data=="Update"){
$apiNumSend = json_decode(file_get_contents("http://darr.zzz.com.ua/apix/sd.php/$statuss"),true);
$donNumD = $apiNum["last_Message"];
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم تحديث الرسائل 

( *$donNumD* )
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'تحديث' ,'callback_data'=>"Update"]],
[['text'=>'رجوع للخلف' ,'callback_data'=>"itsBack"]],
]
])
]);
}

if($data=="itsBack"){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*مرحبا بك عزيزي المستخدم* ( [$name](tg://user?id=$chat_id) )

- في بوت الارقام الوهمية

- يمكنك الحصول علي رقم وهمي مجانا
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الحصول علي رقم وهمي' ,'callback_data'=>"GetNum"]],
]
])
]);
file_put_contents("NumUser$chat_id.txt","");
}
