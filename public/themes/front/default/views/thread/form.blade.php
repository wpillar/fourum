{{ Form::open(array('url' => 'thread/create/' . $forum->id, 'method' => 'post')) }}

    <div class="form-group">
        <div id="title-container">
            <h3>New Thread</h3>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
        </div>
        <p>in <a href="{{ $forum->getUrl() }}">{{ $forum->getTitle() }}</a></p>
    </div>

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

    {{ Form::button('Save', array('class' => 'btn btn-default btn-primary', 'type' => 'submit')) }}

{{ Form::close() }}

<script>
var contentEditor = new Editor($('#content-container'), {
    placeholder: "Content",
    inputName: 'content'
});

var titleEditor = new Editor($('#title-container'), {
    placeholder: 'Title',
    inputName: 'title',
    editableElement: 'h3'
});
</script>
