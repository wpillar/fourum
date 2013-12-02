<?= View::make('meta') ?>
<?= View::make('header') ?>

<div class="row">
	<div class="col-md-12">
		<h3>New Thread</h3>
        <p>in <a href="<?= $forum->getUrl() ?>"><?= $forum->getTitle() ?></a></p>

        <?php foreach ($errors->all() as $error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
        <?php endforeach ?>

		<?= View::make('thread.form', array('forum' => $forum)) ?>
	</div>
</div>

<?= View::make('footer') ?>
