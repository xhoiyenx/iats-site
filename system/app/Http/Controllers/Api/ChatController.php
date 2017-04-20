<?php
namespace App\Http\Controllers\Api;

use Auth;
use Model\Chat;
use Model\Member;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class ChatController extends Controller
{
	/**
	 * Show chat list
	 */
	public function index()
	{
		$query = Chat::query();
		$chats = $query->orderBy('id')->get();

		return response()->json(['data' => $chats]);
	}

	/**
	 * Save chat request
	 */
	public function send()
	{
		$member = Auth::user();
		$message = $this->request->get('message', '');

		$chat = new Chat;
		$chat->member_id = $member->member_id;
		$chat->message = $message;
		$chat->save();

		# CREATE FCM NOTIFICATION
		$this->fcm($chat);

		return response()->json($chat);
	}

	private function fcm(Chat $chat)
	{
		$optionBuiler = new OptionsBuilder();
		$optionBuiler->setTimeToLive(60*20);

		$notificationBuilder = new PayloadNotificationBuilder($chat->member->username . ' sent a message');
		$notificationBuilder->setBody($chat->message)
		                    ->setSound('default');

		$dataBuilder = new PayloadDataBuilder();
		$dataBuilder->addData([
			'source' => 'chat',
			'model'  => $chat->toJson()
		]);

		$option = $optionBuiler->build();
		$notification = $notificationBuilder->build();
		$data = $dataBuilder->build();

		// You must change it to get your tokens
		$tokens = Member::query()->where('fcm_token', '!=', null)->where('username', '!=', $chat->member->username)->pluck('fcm_token')->toArray();
		$downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
		/*

		$downstreamResponse->numberSuccess();
		$downstreamResponse->numberFailure(); 
		$downstreamResponse->numberModification();

		//return Array - you must remove all this tokens in your database
		$downstreamResponse->tokensToDelete(); 

		//return Array (key : oldToken, value : new token - you must change the token in your database )
		$downstreamResponse->tokensToModify(); 

		//return Array - you should try to resend the message to the tokens in the array
		$downstreamResponse->tokensToRetry();

		// return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array 
		$downstreamResponse->tokensWithError();
		*/
	}
}