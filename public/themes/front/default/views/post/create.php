<?= View::make('meta') ?>
<?= View::make('header') ?>

<div class="row">
    <div class="col-md-12">
        <h3>New Post</h3>
        <p>in <a href="<?= $thread->getUrl() ?>"><?= $thread->getTitle() ?></a></p>

        <?php foreach ($errors->all() as $error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
        <?php endforeach ?>

        <?= View::make('post.form', array('thread' => $thread)) ?>
    </div>
</div>

<?= View::make('footer') ?>
