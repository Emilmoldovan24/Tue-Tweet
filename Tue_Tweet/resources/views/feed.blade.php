<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
</head>
<body>
    <div>
        <h1> FEED </h1>

        <div class="col-md-4 col-md-offset-4">
            <form action="{{ route('postTweet')}}" method="POST">

                <div class="form-group">
                    <label for="Tweet"> Post new Tweet </label>
                    <input type="text" name="tweet" id="tweet" value="{{Request::old('tweet')}}">
                </div>

                <button type="submit" class="btn btn-primary"> Post </button>
                <input type="hidden" name="_token" value="{{  Session::token() }}">
            </form>
        </div>

        <form action="{{ route('profile') }}" method="GET">
            <button type="submit" class="btn btn-primary"> Profile </button>
        </form>
        <form action="{{ route('logout') }}" method="GET">
            <button type="submit" class="btn btn-primary"> Logout </button>
        </form>
        <br>
    
    

    <?php
        
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);

        $users = DB::select('select * from tweets ');
            foreach ($users as $tweet) {
                        echo $tweet->tweet.'<br>';
                        echo $tweet->user_id.'<br>';
                        echo $tweet->created_at.'<br>';
                        echo '<br>';
                        echo '<br>';

                        #TODO: Kommentare anzeigen (evtl ausklappen mit button)
                        
                        // Count Comments
                        $comments = DB::table('comments')->where('tweet_id', $tweet->tweet_id)->count();
                        echo $comments . ' Comments';

                        // Comment Button 
                        echo '<form action=comment method="POST">';
                        echo csrf_field();
                        echo '<input type="hidden" name="tweet_id" value="'.$tweet->tweet_id.'">';
                        echo '<input type="text" name="comment" id="comment">';
                        echo '<button type="submit" class="btn btn-primary"> Comment </button>';
                        echo '</form>';

                        echo '<div class="row d-flex justify-content-between">';

                        // Count Likes
                        $likes = DB::table('likes')->where('tweet_id', $tweet->tweet_id)->count();
                        echo $likes;

                        // Like Button
                        # TODO: man kann mehrmals liken
                        echo '<form action=like method="POST">';
                        echo csrf_field();
                        echo '<button type="submit" class="btn btn-primary"> <3 </button>';
                        echo '<input type="hidden" name="tweet_id" value="'.$tweet->tweet_id.'">';
                        echo '</form>';

                        echo '</div>';

                        echo '<br>';
                        echo '<br>';  
                    }

    ?>


    </div>
</body>
</html>