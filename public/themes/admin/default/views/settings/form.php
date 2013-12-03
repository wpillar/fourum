<?php if (Session::get('message')): ?>
<div class="alert alert-success">
    <?= Session::get('message') ?>
</div>
<?php endif ?>

<form role="form" action="<?= url('admin/settings') ?>" method="post">
    <?php foreach($settings as $setting): ?>
    <div class="form-group">
        <label for="<?= $setting['name'] ?>"><?= $setting['title'] ?></label>
        <p><?= $setting['description'] ?></p>

        <?php if (isset($setting['options'])): ?>
        <select name="<?= $setting['namespace'] ?>_<?= $setting['name'] ?>">
            <?php foreach ($setting['options'] as $option): ?>
            <option <?= $setting['value'] === $option ? 'selected="selected"' : '' ?> value="<?= $option ?>"><?= ucwords($option) ?></option>
            <?php endforeach ?>
        </select>
        <?php else: ?>
        <input type="text" class="form-control" name="<?= $setting['namespace'] ?>_<?= $setting['name'] ?>" id="<?= $setting['name'] ?>" value="<?= $setting['value'] ?>">
        <?php endif ?>
    </div>
    <?php endforeach ?>
    <button type="submit" class="btn btn-default btn-primary">Save</button>
</form>
