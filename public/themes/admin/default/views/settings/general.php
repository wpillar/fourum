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
        <h4>General</h4>

        <? if (Session::get('message')): ?>
        <div class="alert alert-success">
            <?= Session::get('message') ?>
        </div>
        <? endif ?>

        <form role="form" action="<?= url('admin/settings') ?>" method="post">
        <? foreach($settings as $setting): ?>
            <div class="form-group">
                <label for="<?= $setting->name ?>"><?= $setting->title ?></label>
                <p><?= $setting->description ?></p>
                <input type="text" class="form-control" name="<?= $setting->namespace ?>_<?= $setting->name ?>" id="<?= $setting->name ?>" value="<?= $setting->value ?>">
            </div>
            <? endforeach ?>
            <button type="submit" class="btn btn-default btn-primary">Save</button>
        </form>
    </div>
</div>

<?= View::make('footer') ?>
