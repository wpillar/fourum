@include('meta')
@include('header')

<div class="row">
	<div class="col-md-12">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endforeach

		@include('thread.form', array('forum' => $forum))
	</div>
</div>

@include('footer')
