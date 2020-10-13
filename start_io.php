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
        $socket->broadcast->emit("online_status",array_values($usernames));
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

    $socket->on('online_status', function ($data)use($socket){
        if(!empty($GLOBALS['usernames']))
            $socket->broadcast->emit("online_status",array_values($GLOBALS['usernames']));
    });

    // when the client emits 'typing', we broadcast it to others
    $socket->on('typing', function ($data) use($socket) {
        if(!empty($GLOBALS['usernames'][$data['user_id']]) && !empty($GLOBALS['usernames'][$data['user_id']]['socket_id']))
        {
            $socket->broadcast->to($GLOBALS['usernames'][$data['user_id']]['socket_id'])->emit("typing",$data);
            var_dump("emit sent ".$data['user_id']);
        }
        else
        {
            var_dump("not in array");
            var_dump($GLOBALS['usernames'][$data['user_id']]);
        }
    });

    // when the client emits 'stop typing', we broadcast it to others
    $socket->on('stop typing', function ($data) use($socket) {
        if(!empty($GLOBALS['usernames'][$data['user_id']]) && !empty($GLOBALS['usernames'][$data['user_id']]['socket_id']))
        {
            $socket->broadcast->to($GLOBALS['usernames'][$data['user_id']]['socket_id'])->emit("stop typing",$data);
            var_dump("emit sent ".$data['user_id']);
        }
        else
        {
            var_dump("not in array");
            var_dump($GLOBALS['usernames'][$data['user_id']]);
        }
    });
 
    // when the user disconnects.. perform this
    $socket->on('disconnect', function () use($socket) {
        global $usernames,$numUsers;
        // remove the username from global usernames list
        if($socket->addedUser) {
            print_r("disconnect user id = ".$socket->user_id);
            unset($usernames[$socket->user_id]);
            $socket->broadcast->emit("online_status",array_values($usernames));
            --$numUsers;
        }
    });
});

if (!defined('GLOBAL_START')) {
    Worker::runAll();
}
