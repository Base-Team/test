// #base_team fun bot source .
// writed by #Mr.pourya @PvSuDo
<?php
$token = '298443030:AAFxjVr1PvixjUMUzv3NZDf1dhC29b_I7Do';
$json = file_get_contents('php://input')
$telegram = urldecode ($json);
$results = json_decode($telegram);
$message = $results->message;
$text = $message->text;
$chat = $message->chat;
$user_id = $chat->id;
$reply = $message->id;
if ($text == '/start'){
	$message = 'سلام دوست عزیز ! به ربات @basefunbot
	خوش آمدید ! 
	برای اطلاع از دستورات ربات : /help را ارسال کنید ! ';
} else if ($text == '/creator'){
	$message = 'سازنده ربات : @PvSuDo';
} else if ($text == '/help')
	$message = 'سلام !
به راهنمای ربات خوشی اومدی !
دستورات :
/help : راهنمایی
/creator : سازنده ربات
/info : مشخصات اکانت شما
/channel : کانال ما
/feedback : ارسال نظر شما دربارهی ربات
/code [text] : کد کردن متن مورد نظر شما
/hyperlink [text][link] : ساخت هایپر لینک
/tupdate : مطلع شدن از زمان آپدیت شدن ربات
/vip : این بخش در دست ساخت است';
} else if ($text == '/info') {
	$message = 'مشخصات اکانت تلگرام شما :
	نام : first_name
	نام خانوادگی : last_name
	آدی عددی شما  : chat_id
	یوزرنیم شما : @username';
} else if = ($text == '/channel') {
	$message = 'چنل ما : @Base_Team v2';
} else if ($text == '/feedback') {
	$message = 'سلام دوست عزیز .
	لطفا نظر خود را در قالب متن  ارسال کنید !';
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
}


// send reply
$url = https://api.telegram.org/bot'.$token.'/sendMessage?chat_id?'.$user_id.'&text='.$message.'&reply_to_message_id='.$reply;
file_get_contents($url);
?>

