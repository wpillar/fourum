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
		<div class="row post" id="{{ $post->getId() }}">
			<div class="col-md-1">
				{{ Gravatar::image($post->getAuthor()->getEmail(), '', array('width' => 50, 'height' => 50)) }}
				<h4>{{ $post->getAuthor()->getUsername() }}</h4>
			</div>
			<div class="col-md-11">
				<div class="row post-content-container">
					<div class="col-md-12">
						<p class="post-content">{{ $post->getContent() }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 post-meta">
					<?php if ($post->isEdited()): ?>
						<small>edited at <?= $post->getUpdatedAt() ?></small>
					<?php endif ?>
					</div>
					<div class="col-md-8">
					<?php if (Auth::check() && $post->isAuthor(Auth::user())): ?>
						<div class="btn-group btn-group-sm post-controls">
							<a href="javascript:;" data-inline-edit="{{ $post->getId() }}" class="btn btn-default">Edit</a>
						</div>
					<?php endif ?>
					</div>
				</div>
			</div>
		</div>
		@endforeach

		{{ $thread->getPosts()->links() }}
	</div>
</div>

@include('footer')
