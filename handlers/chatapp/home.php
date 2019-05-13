<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chatapp | Home</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link type="text/css" rel="stylesheet" href="style.css" />
		<script  type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
		<div>
				<h1>Chatapp.io</h1>
				<img src="avatar.jpg" alt="avatar" class="avatar">
				<h1>Welcome <?php session_start(); echo $_SESSION['username']; ?></h1>
		</div>
		<div class="chatbox">
				<div id="chat"></div>
				<form method="POST" id="message-from">
					<textarea name="message"  class="textarea" placeholder="Type a message"></textarea>
				</form>
		</div>
</div>

</body>

<script type="text/javascript" src="script.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    LoadChat();
    setInterval(function() {
            LoadChat();
    }, 1500);
    function LoadChat() {
        $.post('handlers/messages.php?action=getMessages', function(response) {
            var scrollpos = $('#chat').scrollTop();
            var scrollpos = parseInt(scrollpos) + 520;
            var scrollHeight = $('#chat').prop('scrollHeight');
            $('#chat').html(response);
            if ( scrollpos < scrollHeight ) {
            } else {
                $('#chat').scrollTop( $('#chat').prop('scrollHeight') );
            }
        });
    };
    $('.textarea').keyup(function(e){
        if( e.which == 13 ){
            $('form').submit();
        }
    });
    $('form').submit(function(){
        var message = $('.textarea').val();
        $.post('handlers/messages.php?action=sendMessage&message='+message, function(response){
            if( response==1 ){
                LoadChat();
                document.getElementById('message-from').reset();
            }
        });
        return false;
    });
});
</script>

</html>