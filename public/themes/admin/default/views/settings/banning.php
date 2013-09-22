<?= View::make('meta') ?>
<?= View::make('header') ?>

<div class="row">
    <div class="col-md-12">
        <h3>Settings</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <?= View::make('settings.sidebar') ?>
    </div>
    <div class="col-md-9" style="height:1000px;">
        <h4>Suspensions & Banning</h4>

        <? if (Session::get('message')): ?>
        <div class="alert alert-success">
            <?= Session::get('message') ?>
        </div>
        <? endif ?>
    </div>
</div>

<?= View::make('footer') ?>
