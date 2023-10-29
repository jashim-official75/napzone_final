<!DOCTYPE html>
<html>
<head>
    <title>NapZone Games - Enjoy Most Exciting Games | {{ $game->game_name }}</title>
    <style>
        iframe{
            position: fixed;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
           <iframe src="{{ asset('AllGames/'. $game->game_file) }}" frameborder="0" height="100" width="100"></iframe>
        </div>
    </div>
</body>

</html>
