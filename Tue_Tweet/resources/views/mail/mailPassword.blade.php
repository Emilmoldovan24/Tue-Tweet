<h1>Hi, {{ $username }} </h1>
<p>Click the following link to change your password:</p>
<p>
    <a href="{{route('passChange',$email)}}">Click</a><br>
</p>