<?= View::make('meta') ?>
<?= View::make('header') ?>

<div class="row">
	<div class="col-md-12">
		<h3>New Thread</h3>

		<?= View::make('thread.form', array('forum' => $forum)) ?>
	</div>
</div>

<?= View::make('footer') ?>
