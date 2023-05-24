<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blabla</title>
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

    
    
    

    <?php
        
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);
        #TODO $currentUser benutzen
        function postTweet(){

            DB::insert('insert into tweets(user_id, tweet, img, created_at) 
            values(?,?,?,?)',[1, 'Hallo das ist ein Tweet', NULL ,$currentTimestamp]);
        }

        $users = DB::select('select * from tweets ');
            foreach ($users as $user) {
                        echo $user->tweet.'<br>';
                        echo $user->user_id.'<br>';
                        echo $user->created_at.'<br>';
                        echo '<br>';
                        echo '<br>';
                    }

    ?>


    </div>
</body>
</html>