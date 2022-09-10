<?php
#####@armof####
##@php_aba#####
ob_start();
$API_KEY = "5737339516:AAFbUdBao0lcyfdlssf_KloejwGigy597p0";
define('API_KEY',$API_KEY);
echo "<a href='https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."'>setwebhook</a>";
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}
else
{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$php_aba = $update->message;
$armof = $php_aba->text;
$F_PPP = $php_aba->chat->id;
$from_id = $php_aba->from->id;
$data = $update->callback_query->data;
$F_PPP2 = $update->callback_query->message->chat->id;
$php_aba_id2 = $update->callback_query->message->message_id;
$username = $update->message->from->username;
$date = "https://api.rangatiratan.ga/tiq.php";
$g = file_get_contents($date);
$js = json_decode($g);
$da = $js->Date;
$time = $js->Time;
$bot = bot('getme',['bot'])->result->username;
echo "<br><a  href='https://t.me/$bot'>@$bot</a>";
#####اوامر المطور انت ظيفها هنا####
if($armof == "/start"){
bot('sendMessage',[
        'chat_id'=>$F_PPP,
      'text'=>" 
▫️- اهلا بك : [$name](tg://user?id=$F_PPP) 
▫️- في بوت تحميل
من ( الميوزكلي والانستا)
▫️- يمكنك تحمل صورة او فديو من الانستا عن طريق ارسال رابط الفديو او الصورة الي✅
▫️- ويمكنك ايضا تحميل مقطع من الميوزكلي عن طريق ارسال رابط الفيدو الي ليتم تحميله لك 〽️
▫️- يمكنك استخراج معلومات الانستا عن طريق ارسال يوزر الحساب ⚠️
▫️- للتوضيح اكثر ارسل /help -▫️
",
      'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• تابعنا☬'",'url'=>"https://t.me/armof"]],    
        ]
    ])
    ]);
      
if ($update && !in_array($F_PPP, $u)) {
    file_put_contents("memb.txt", $F_PPP."\n",FILE_APPEND);
  }
}

if($armof == "/help"){
	bot('sendMessage',[
        'chat_id'=>$F_PPP,
      'text'=>"- اهلا بك مرة اخرى ؛ [$name](tg://user?id=$F_PPP) 

☬ - قم بنسخ رابط الصورة او الفيديو من الانستا  ،
☬ - وارسالةه الى البوت سوف يتم تحميله ،
☬ - وارسالة اليك بكل سهولةه ، 📬
☬ - ارسل يوزر الحساب الخاص بك ، 
☬ - وسوف يتم ارسال معلوماته اليك من خلال البوت ،
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎",
      'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• تابعنا☬'",'url'=>"https://t.me/armof"]]    
        ]
    ])
    ]);
    }


if(preg_match('/.*instagram\.com.*/i',$armof)){
 bot('sendmessage',[
  'chat_id'=>$F_PPP,
    'text'=>"- يرجى الانتظار قليلا من فضلك ، 🔱
- جار التحميل ، قناة البوت ؛ @armof ،",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• تابعنا'",'url'=>"t.me/armof"]],   
        ]
    ])
    ]);
bot('sendphoto',[
 'chat_id'=>$F_PPP,
  'photo'=>"$armof",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"• تابعنا'",'url'=>"t.me/armof"]],   
        ]
    ])
    ]);
 bot('sendvideo',[
  'chat_id'=>$F_PPP,
   'video'=>"$armof",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
 [['text'=>"• تابعنا'",'url'=>"t.me/armof"]],
        ]
    ])
    ]);
    }
#####مؤيد#    الايبي لحسن######
####ابن مؤيد####
if($armof != "/start"){
$Api = json_decode(file_get_contents("https://forhassan.ml/my_ip/story.php?username=$armof"),true);
for($i = 0; $i<count($Api['Info']['photo']); $i++){
$photo = $Api['Info']['photo'][$i]['url'];
$nm = $i +1;
bot('sendphoto',[
'chat_id'=>$F_PPP,
'photo'=>$photo,
'caption'=>"🖼| صورة : $nm ",
]);
}
$Api1 = json_decode(file_get_contents("https://forhassan.ml/my_ip/story.php?username=$armof"),true);
for($i = 0; $i<count($Api1['Info']['video']); $i++){
$video = $Api1['Info']['video'][$i]['url'];
$nm1 = $i +1;
bot('sendvideo',[
'chat_id'=>$F_PPP,
'video'=>$video,
'caption'=>"🖼| الفيديو : $nm1 ",
]);
}}
####@armof######
####@php_aba####
