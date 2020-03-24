<div style="text-align: center" class="container">
    <h1>Login</h1>

    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Email') }}
        {{ Form::text('title', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Password') }}
        {{ Form::text('body', '', ['class' => 'form-control']) }}
    </div>
    {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
</div>
