<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>
    // Enable Pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-pusher-channel');
    channel.bind('my-pusher-event', function(data) {
        console.log('Event received:', data);
        alert(JSON.stringify(data)); // Directly alert the data object
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel-asad</code>
    with event name <code>my-pusher-event</code>.
  </p>
</body>
</html>
