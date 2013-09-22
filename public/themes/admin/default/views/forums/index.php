<?= View::make('meta') ?>
<?= View::make('header') ?>

<div class="row">
    <div class="col-md-12">
        <h3>Forums</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <?= View::make('forums.sidebar') ?>
    </div>
    <div class="col-mid-9" style="height:1000px;">
    </div>
</div>

<?= View::make('footer') ?>
