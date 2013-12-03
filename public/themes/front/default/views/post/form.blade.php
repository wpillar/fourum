{{ Form::open(array('url' => 'post/create/' . $thread->id, 'method' => 'post', 'role' => 'form')) }}

    <div class="form-group">
        {{ Form::label('content', 'Content') }}
        {{ Form::textarea('content', Input::old('content'), array('class' => 'form-control', 'rows' => 4)) }}
    </div>

    {{ Form::button('Post', array('class' => 'btn btn-default btn-primary', 'type' => 'submit')) }}

{{ Form::close() }}
