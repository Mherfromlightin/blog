@foreach($users as $user)
     <h1>{{ $user->title }}</h1>
    <h2>{{ $user->name }}</h2>
    @endforeach