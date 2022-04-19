<!doctype html>
<html>
    <head>
        <title>Laravel Notify</title>
        @notifyCss
    </head>
    <body>


        @include('notify::messages')
        // Laravel 7 or greater
        <x:notify-messages />
        @notifyJs
    </body>
</html>