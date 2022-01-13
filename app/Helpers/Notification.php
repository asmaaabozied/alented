<?php

namespace App\Helpers;

class Notification{
    public static function firebase_notification($token, $title, $body, $navigation)
    {
        if(empty($token)){
            return false;
        }
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token  = $token;

        $notification = [
            'title'      => $title,
            'body'       => $body,
            'sound'      => true,
            'navigation' => $navigation 
        ];
        
        $extraNotificationData = ["message" => $notification, "moredata" => $navigation];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=AAAA9cauV4Y:APA91bEEO91XStxDd_4Fo0GfHIF9qItwUbTMLNQwIPsn9gJTdiRXDSY01Q5KpsMnhy0QGKEHnUR4knj3VuK-kP2TzvceprUBoLAi7e8n1CfFHOgU5iqPt6pNCAvj5hyqONvYgejHsrIU',
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}