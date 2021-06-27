<?php
function post_message($text, $date){
    return '<div class="msg right-msg">
                <div class="msg-img"></div>
                    <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name">User</div>
                            <div class="msg-info-time">'. $date .'</div>
                        </div>
    
                      <div class="msg-text">
                        '. $text .'
                      </div>
                    </div>
                  </div>';}

$json_parser = file_get_contents("messages.json");
$messages = json_decode($json_parser, true);
if (!empty($messages))
{
    foreach($messages as $message)
        echo post_message($message['text'], $message['date']);
}
?>