@include('meta')
@include('header')

<div class="row">
	<div class="col-md-6">
		<h3>{{ $thread->getTitle() }}</h3>
		<p>in <a href="{{ $forum->getUrl() }}">{{ $forum->getTitle() }}</a></p>
	</div>
	<div class="col-md-6">
		<p style="float:right;">
			<a href="{{ url('/post/create/' . $thread->id) }}" class="btn btn-default btn-primary">New Post</a>
		</p>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		@foreach($thread->getPosts() as $post)
		<div class="row post">
			<div class="col-md-2">
				<h4>{{ $post->getAuthor()->getUsername() }}</h4>
			</div>
			<div class="col-md-10">
			{{ $post->getContent() }}
			</div>
		</div>
		@endforeach
	</div>
</div>

@include('footer')
