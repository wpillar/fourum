<? if (Session::get('message')): ?>
<div class="alert alert-success">
    <?= Session::get('message') ?>
</div>
<? endif ?>

<form role="form" action="<?= url('admin/settings') ?>" method="post">
<? foreach($settings as $setting): ?>
    <div class="form-group">
        <label for="<?= $setting['name'] ?>"><?= $setting['title'] ?></label>
        <p><?= $setting['description'] ?></p>
        <input type="text" class="form-control" name="<?= $setting['namespace'] ?>_<?= $setting['name'] ?>" id="<?= $setting['name'] ?>" value="<?= $setting['value'] ?>">
    </div>
    <? endforeach ?>
    <button type="submit" class="btn btn-default btn-primary">Save</button>
</form>
