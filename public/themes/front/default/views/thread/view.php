<?= View::make('meta') ?>
<?= View::make('header') ?>

<div class="row">
	<div class="col-md-6">
		<h3><?= $thread->getTitle() ?></h3>
	</div>
	<div class="col-md-6">
		<p style="float:right;">
			<a href="<?= url("/post/create/{$thread->id}") ?>" class="btn btn-default btn-primary">New Post</a>
		</p>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<? foreach($thread->getPosts() as $post): ?>
		<div class="post">
			<?= $post->getContent() ?>
		</div>
		<? endforeach ?>
	</div>
</div>

<?= View::make('footer') ?>
