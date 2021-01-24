<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = 'QxhiKnDmRZJz+96vQzIktrD++CBo80vnk42rpLRxcAyQha34/djoJlzNEeGfMZcCgU/RsxEPv4VqeDVad3r07y0GOF1rMYjvoXkRypWrTdVN/Ro6T6t7jIfJoKq0K4P+URR8TXnBUqVxgMOBZVJ0IgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '06900ad2083f49a492c76ddf0416c86f';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
			if ($message['text'] === 'つらい') {
                    		$client->replyMessage([
                        	'replyToken' => $event['replyToken'],
                        		'messages' => [
                            			[
                                			'type' => 'text',
                                			'text' => '辛いよね。一人じゃないから大丈夫だよ'
                            			]
                        		]
                    		]);
			}
			
			if ($message['text'] === '苦しい') {
                    		$client->replyMessage([
                        	'replyToken' => $event['replyToken'],
                        		'messages' => [
                            			[
                                			'type' => 'text',
                                			'text' => '苦しいよね。今はゆっくり休んでください'
                            			]
                        		]
                    		]);
			}

			if ($message['text'] === '自分にはできっこない') {
                    		$client->replyMessage([
                        	'replyToken' => $event['replyToken'],
                        		'messages' => [
                            			[
                                			'type' => 'text',
                                			'text' => '出来る！絶対できる！今まで頑張ってきたんだから絶対いける！'
                            			]
                        		]
                    		]);
			}
                    break;
                default:
			$client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => '申し訳ありません。文章でのメッセージのみの対応となっております'
                            ]
                        ]
                    	]);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
