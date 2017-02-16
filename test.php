<?php
$token = '298443030:AAFxjVr1PvixjUMUzv3NZDf1dhC29b_I7Do'
$json = file_get_contents('php://input');
$telegram = urldecode ($json);
$results = json_decode($telegram); 
$message = $results->message;
$text = $message->text;
$chat = $message->chat;
$textmessage = isset($update->message->text)?$update->message->text:'';
$user_id = $chat->id;
$admin = آیدی ادمین;
$ban = file_get_contents('data/banlist.txt');
if ($text == '/start')
	{
if (!file_exists("data/$from_id/step.txt")) {
mkdir("data/$from_id");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
		'text'=>"سلام به ربات @BaseFunBot خوش اومدی لطفا یکی از دکمه هارا انتخاب کن !",
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
  [
                   ['text'=>"راهنما"],['text'=>"چنل ما"]          
]
                
            	],
            	'resize_keyboard'=>true
       		])
    		]));
}
} else if ($text == 'چنل ما') {
	$message = 'سلام لطفا در چنل ما عضو شوید \n\nآیدی چنل : @Base_Team';
} elseif (strpos($textmessage , "/toall") !== false ) {
if ($from_id == $admin) {
$text = str_replace("/toall","",$textmessage);
$fp = fopen( "data/users.txt", 'r');
while( !feof( $fp)) {
 $users = fgets( $fp);
SendMessage($users,"$text");
}
}
else {
SendMessage($chat_id,"متاسفانه شما ادمین ربات نیستید !");
}
}
elseif (strpos($textmessage , "/feedback") !== false ) {
if ($from_id == $ban) {
$text = str_replace("/feedback","",$textmessage);
SendMessage($chat_id," نظر شما ارسال شد\n Your comment has been sent");
SendMessage($admin,"FeedBack : \n name: $name \n username: $username \n id: $from_id\n Text: $text");
}
else {
SendMessage($chat_id,"شما بن هستید نمیتوانید نظر ارسال کنید !");
}
}
elseif (strpos($textmessage , "/ban" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/ban","",$textmessage);
$myfile2 = fopen("data/banlist.txt", 'a') or die("Unable to open file!");	
fwrite($myfile2, "$text\n");
fclose($myfile2);
SendMessage($admin,"شما کاربر $text را در لیست بن لیست قرار دادید!\n برای در اوردن این کاربر از بن از دستور زیر استفاده کنید\n/unban $text");
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}

elseif (strpos($textmessage , "/unban" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/unban","",$textmessage);
			$newlist = str_replace($text,"",$ban);
			save("data/banlist.txt",$newlist);
SendMessage($admin,"شما کاربر $text را از لیست بن ها در اوردید!");
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}
} else if ($text == 'راهنما') {
	$message = 'دستور /help را ارسال کنید !';
} else if ($text == '/creator') {
	$message = 'سازنده ربات : @PvSuDo';
} else if ($text == '/help')
	$message = 'سلام !
به راهنمای ربات خوشی اومدی !
دستورات :
/help : راهنمایی
/creator : سازنده ربات
/antispam : بخش ضد اسپم ربات
/info : مشخصات اکانت شما
/channel : کانال ما
/feedback : ارسال نظر شما دربارهی ربات
/code : کد کردن متن مورد نظر شما
/hyperlink : ساخت هایپر لینک
/tupdate : مطلع شدن از زمان آپدیت شدن ربات
/vip : این بخش در دست ساخت است
/webscreen : گرفتن اسکرن از سایت مورد نظر شما';
} else if ($text == '/info') {
	$message = 'مشخصات اکانت تلگرام شما :
	نام : first_name
	نام خانوادگی : last_name
	آدی عددی شما  : chat_id
	یوزرنیم شما : @username';
} else if = ($text == '/channel') {
	$message = 'چنل ما : @Base_Team v2';
} else if = ($text == '/antispam') {
	$message = 'این یخش در دست ساخت است !';
} else if ($text == '/code') {
	$message = 'این بخش در دست ساخت است !';
} else if ($text == '/hyperlink') {
	$message = 'این بخش در دست ساخت است !';
} else if ($text == '/tupdate') {
	$message = 'سلام این ربات فعلا آزمایشی میباشد !
	لطفا تا آپدیت ربات و ادیت کامل سورس منتظر بمانید
	نوسنده سورس : @PvSuDo';
} else if ($text == '/vip') {
	$message = 'این بخش در دست ساخت است !';
} else {
	$message = 'درستور وارد شده اشتباه است !';
$url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$user_id.'&text='.$message;
file_get_contents($url);
 }
?>
