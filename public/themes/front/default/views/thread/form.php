<form role="form" action="<?= url("thread/create/{$forum->id}") ?>" method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= Input::old('title') ?>">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" rows="4" name="content" id="content"><?= Input::old('content') ?></textarea>
    </div>
    <button type="submit" class="btn btn-default btn-primary">Save</button>
</form>
