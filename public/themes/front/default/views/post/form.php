<form role="form" action="<?= url("post/create/{$thread->id}") ?>" method="post">
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" rows="4" name="content" id="content"><?= Input::old('content') ?></textarea>
    </div>
    <button type="submit" class="btn btn-default btn-primary">Post</button>
</form>
