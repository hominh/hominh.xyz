<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Pusher - Ho Minh</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css" media="screen">
      #messages{
        color: #1abc9c;
      }
      #messages li{
        max-width: 50%;
        margin-bottom:10px;
        border-color: #34495e;
      }
    </style>
</head>
<body>
    <div class="container">
      <div class="content">
        <h1>Laravel & Pusher: Demo real-time web application.</h1>
          <small>
          </small><br><br>
 
        <p>Message preview:</p>
          <ul id="messages" class="list-group"></ul>
      </div>
    </div>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
    <script>
      $(document).ready(function(){
        // Khởi tạo một đối tượng Pusher với app_key
        var pusher = new Pusher('933049e7e6c2468e760a', {
            cluster: 'ap1',
            encrypted: true
        });
        console.log(pusher);
 
        //Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
        var channel = pusher.subscribe('test');
        console.log(channel);
 
        //Bind một function addMesagePusher với sự kiện DemoPusherEvent
        channel.bind('App\\Events\\DemoPusherEvent', addMessageDemo);
      });
 
      //function add message
      function addMessageDemo(data) {
        var liTag = $("<li class='list-group-item'></li>");
        liTag.html(data.message);
        console.log(data);
        $('#messages').append(liTag);
      }
    </script>
</body>
</html>