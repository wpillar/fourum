@include('meta')
@include('header')

<div class="row">
    <div class="col-md-12">
        <h3>New Post</h3>
        <p>in <a href="{{ $thread->getUrl() }}">{{ $thread->getTitle() }}</a></p>

        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endforeach

        @include('post.form', array('thread' => $thread))
    </div>
</div>

@include('footer')
