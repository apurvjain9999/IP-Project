function send_message(message) {
  $.ajax({
    url: '/ajax/add_msg.php',
    method: 'post',
    data: {msg: message},
    success: function(data) {
      $('#chatMsg').val('');
      get_messages();
    }
  });
}

function get_messages() {
  $.ajax({
    url: '/ajax/get_messages.php',
    method: 'GET',
    success: function(data) {
      $('.msg-wgt-body').html(data);
    }
  });
}

function boot_chat() {
  var chatArea = $('#chatMsg');
  setInterval(get_messages, 20000);s  
  chatArea.bind('keydown', function(event) {
    if (event.keyCode === 13 && event.shiftKey === false) {
      var message = chatArea.val();
      if (message.length !== 0) {
        send_message(message);
        event.preventDefault();
      } else {
        alert('Provide a message to send!');
        chatArea.val('');
      }
    }
  });
}
boot_chat();