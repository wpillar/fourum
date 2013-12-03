{{ Form::open(array('url' => 'thread/create/' . $forum->id, 'method' => 'post')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('content', 'Content') }}
        {{ Form::textarea('content', Input::old('content'), array('class' => 'form-control', 'rows' => 4)) }}
    </div>

    {{ Form::button('Save', array('class' => 'btn btn-default btn-primary', 'type' => 'submit')) }}

{{ Form::close() }}
