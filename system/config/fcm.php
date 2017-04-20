<?php

return [
	'driver'      => env('FCM_PROTOCOL', 'http'),
	'log_enabled' => true,

	'http' => [
		'server_key'       => env('FCM_SERVER_KEY', 'AAAAfPzYRnY:APA91bEiUzWUm7h7b9_wYyu9AQfUF6z4BszhOZCPGIDpbyJ1RUm5JWuEL_BzG3G7RGCM9cp5A8CjShrSSTyPhcCgIdmzhlDo8UBrZnnEHXfWxS0XENLRm-M-WnG-3jsXD76ggBGdEidh'),
		'sender_id'        => env('FCM_SENDER_ID', '536817976950'),
		'server_send_url'  => 'https://fcm.googleapis.com/fcm/send',
		'server_group_url' => 'https://android.googleapis.com/gcm/notification',
		'timeout'          => 30.0, // in second
	]
];
