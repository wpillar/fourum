{{ Form::open(array('url' => 'post/create/' . $thread->id, 'method' => 'post', 'role' => 'form')) }}

    <div class="form-group">
        <div class="row post">
            <div class="col-md-1">
                {{ Gravatar::image($user->getEmail(), '', array('width' => 50, 'height' => 50)) }}
                <h4>{{ $user->getUsername() }}</h4>
            </div>
            <div class="col-md-11">
                <div id="content-container">
                    {{ Form::label('content', 'Content', array('id' => 'content-label')) }}
                    {{ Form::textarea('content', Input::old('content'), array('class' => 'form-control', 'rows' => 4)) }}
                </div>
            </div>
        </div>
    </div>

    {{ Form::button('Post', array('class' => 'btn btn-default btn-primary', 'type' => 'submit')) }}

{{ Form::close() }}

<script>
var contentEditor = new Editor($('#content-container'), {
    placeholder: 'Content',
    inputName: 'content'
});
</script>
