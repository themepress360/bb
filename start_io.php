<?php
// composer autoload
require_once("vendor/autoload.php");
use Workerman\Worker;
use Workerman\WebServer;
use Workerman\Autoloader;
use PHPSocketIO\SocketIO;
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$io = new SocketIO(2020);
global $usernames;
$io->on('connection', function($socket){  
    $socket->addedUser = false;
    // when the client emits 'add user id ', this listens and executes
    
    //This Event is insert data
    $socket->on('add_user_id', function ($data) use($socket){
        $user_id = $data['user_id'];
        global $usernames,$numUsers;
        // we store the username in the socket session for this client
        $socket->user_id     = $user_id;
        $socket->chat_ids    = $data['chat_ids'];
        // // add the client's username to the global list
        $usernames[$user_id]['user_id']  = $socket->user_id;
        $usernames[$user_id]['chat_ids'] = $socket->chat_ids;
        $usernames[$user_id]['socket_id']= $socket->id;
        var_dump($usernames[$user_id]);
        ++$numUsers;
        $socket->addedUser = true;
    });

    $socket->on('single_message_emit', function ($data)use($socket){
        if(!empty($GLOBALS['usernames'][$data['user_id']]) && !empty($GLOBALS['usernames'][$data['user_id']]['socket_id']))
        {
            $socket->broadcast->to($GLOBALS['usernames'][$data['user_id']]['socket_id'])->emit("single_message_emit",$data);
            var_dump("emit sent ".$data['user_id']);
        }
        else
        {
            var_dump("not in array");
            var_dump($GLOBALS['usernames'][$data['user_id']]);
        }
    });

    $socket->on('Conflict_Approve_Popup', function ($data)use($socket){
        $data = json_decode($data,true);
        var_dump($data);
        var_dump('***************************************');
        // var_dump(!empty($GLOBALS['usernames'][$data['driver_user_id']]));
        // var_dump(!empty($GLOBALS['usernames'][$data['driver_user_id']]['socket_id']));
        // exit();
        if(!empty($GLOBALS['usernames'][$data['driver_user_id']]) && !empty($GLOBALS['usernames'][$data['driver_user_id']]['socket_id']))
        {
            var_dump("----------------------------------------------");
            var_dump("emit_success ".$GLOBALS['usernames'][$data['driver_user_id']]['socket_id']);
            var_dump("----------------------------------------------");
            
            if(empty($data['packet']['url']))
                $data['packet']['url'] = "";
            if(empty($data['packet']['param']))
                $data['packet']['param'] = (object)[];
            if(empty($data['packet']['type']))
                $data['packet']['type'] = ""; 
                
            if($GLOBALS['usernames'][$data['driver_user_id']]['device_type'] == "android")
            {
                $android_iphone_data = array('body' => $data['popup_message'], 'title'=> "TollPAYS",'type' => $data['packet']['type'],'url'=> $data['packet']['url'],"params" => $data['packet']['param'],"silent_notification" => '1');
            }
            else
            {
                $android_iphone_data = array('to' => "", 'notification' => array('title' => "TollPAYS" , 'text' => $data['popup_message']),'priority'=>'high',"data" => array("data"=>array('type'=>$data['packet']['type'],'url'=> $data['packet']['url'],"params" => $data['packet']['param'],"silent_notification" => '1',"title_text" => "TollPAYS","body" => $data['popup_message'])));
            }
            var_dump("----------------------------------------------");
            var_dump($android_iphone_data);
            $socket->broadcast->to($GLOBALS['usernames'][$data['driver_user_id']]['socket_id'])->emit("Conflict_Approve_Popup",$android_iphone_data);
        }
        else
        {
            var_dump("not in array");
            var_dump($GLOBALS['usernames'][$data['driver_user_id']]);
        }
    });
   
    //When driver press the Decline Button This socket is working
    $socket->on('Conflict_Driver_Reject_Request_Announcement', function ($data)use($socket){
        $data = json_decode($data,true);
        var_dump($data);
        if(!empty($GLOBALS['usernames'][$data['contributor_user_id']]) && !empty($GLOBALS['usernames'][$data['contributor_user_id']]['socket_id']))
        {
            var_dump("emit_success Conflict_Driver_Reject_Request_Announcement ".$GLOBALS['usernames'][$data['contributor_user_id']]['socket_id']);
            var_dump($data['packet']['param']);
            if(empty($data['packet']['url']))
                $data['packet']['url'] = "";
            if(empty($data['packet']['param']))
                $data['packet']['param'] = (object)[];
            if(empty($data['packet']['type']))
                $data['packet']['type'] = ""; 
            var_dump($data['packet']['param']);
            if($GLOBALS['usernames'][$data['contributor_user_id']]['device_type'] == "android")
            {
                $android_iphone_data = array('body' => $data['popup_message'], 'title'=> "TollPAYS",'type' => $data['packet']['type'],'url'=> $data['packet']['url'],"params" => $data['packet']['param'],"silent_notification" => '1');
            }
            else
            {
                $android_iphone_data = array('to' => "", 'notification' => array('title' => "TollPAYS" , 'text' => $data['popup_message']),'priority'=>'high',"data" => array("data"=>array('type'=>$data['packet']['type'],'url'=> $data['packet']['url'],"params" => $data['packet']['param'],"silent_notification" => '1',"title_text" => "TollPAYS","body" => $data['popup_message'])));
            }
            var_dump($android_iphone_data);
            $socket->broadcast->to($GLOBALS['usernames'][$data['contributor_user_id']]['socket_id'])->emit("Conflict_Driver_Reject_Request_Announcement",$android_iphone_data);
        }
        else
        {
            var_dump("not in array");
            var_dump($GLOBALS['usernames'][$data['contributor_user_id']]);
        }
    });
    
    // when the user disconnects.. perform this
    $socket->on('disconnect', function () use($socket) {
        global $usernames,$numUsers;
        // remove the username from global usernames list
        if($socket->addedUser) {
            print_r("disconnect user id = ".$socket->user_id);
            unset($usernames[$socket->user_id]);
            --$numUsers;
        }
    });
});

if (!defined('GLOBAL_START')) {
    Worker::runAll();
}
