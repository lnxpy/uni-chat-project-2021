<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chat</title>
</head>
<body>
    <section class="msger">
        <header class="msger-header">
          <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i>Simple Chat</div>
          <div class="msger-header-options">
            <span><i class="fas fa-cog"></i></span>
          </div>
        </header>
      
        <main class="msger-chat">
          <div class="msg left-msg">
            <div class="msg-img" style="background-image: url(img/spy-bot.svg)">
            </div>

            <div class="msg-bubble">
              <div class="msg-info">
                <div class="msg-info-name">Bot</div>
                <div class="msg-info-time">Now</div>
              </div>
      
              <div class="msg-text">
                Welcome to Simple Chat 🤖
              </div>
            </div>
          </div>
          <?php
                include("reader.php");
          ?>
        </main>

        <form class="msger-inputarea" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <input type="text" class="msger-input" name="text" placeholder="Enter your message...">
          <input type="submit" class="msger-send-btn" name="submit" value="Send">
        </form>

        <?php
        // check if the form was submitted
        if(isset($_POST['submit']))
        {
          if(!empty($_POST['text'])){
            $data = [
              "date" => date("g:iA"),
              "text" => $_POST['text'],
            ];

            $inp = file_get_contents('messages.json');
            $tempArray = json_decode($inp);
            array_push($tempArray, $data);
            $jsonData = json_encode($tempArray);
            file_put_contents('messages.json', $jsonData);

            echo "<meta http-equiv='refresh' content='0'>";
          }
        }
        ?>
      </section>
</body>
</html>