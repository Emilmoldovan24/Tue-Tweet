<!doctype html>
<html lang="en">
  <head>

  <style>
</style>



<body>

@if ($combinedResults->isEmpty())
    <p>No results found.</p>
@else
    <ul>
        @foreach ($combinedResults as $result)
            @if (isset($result->tweet))
                <li>Tweet: {{ $result->tweet }}</li>
                <!-- Display other tweet-related information -->
            @elseif (isset($result->retweet_text))
                <li>Retweet: {{ $result->retweet_text }}</li>
                <!-- Display other retweet-related information -->
            @elseif (isset($result->comment))
                <li>Comment: {{ $result->comment }}</li>
                <!-- Display other comment-related information -->
            @elseif (isset($result->username))
                <li>User: {{ $result->username }}</li>
                <!-- Display other user-related information -->
            @endif
        @endforeach
    </ul>
@endif



</body>
</html>