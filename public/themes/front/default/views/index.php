<?= View::make('meta') ?>
<?= View::make('header') ?>

<div class="row">
    <div class="col-md-12">
    <?= $tree->html('<h4>%title%</h4><hr>', '<h4><a href="%url%">%title%</a></h4>') ?>
    </div>
</div>

<?= View::make('footer') ?>
