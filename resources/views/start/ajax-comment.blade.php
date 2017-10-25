@section('ajax.comment')
    @foreach($users as $user)
        <div class="user-comment-box">
            <div class="name">{{$user->name}}</div>
            <div class="date">{{date('j-m-Y H:m',$user->time)}}</div>
            <br>
            <div class="text">{{$user->text}}</div>
        </div>
    @endforeach
@show