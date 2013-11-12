<?= View::make('meta') ?>
<?= View::make('header') ?>

<div class="row">
    <div class="col-md-12">
    	<h1>Fourum</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <?= $tree->html('<h4>%title%</h4><hr>', '<p>%title%</p>') ?>
    </div>
</div>

<?= View::make('footer') ?>
