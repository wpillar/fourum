{{ View::make('meta') }}
{{ View::make('header') }}

<div class="row">
    <div class="col-md-12">
        <h3>Groups</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        {{ View::make('groups.sidebar') }}
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <a href="<?= url('admin/groups/add') ?>" class="btn btn-default btn-primary" style="float:right;">
                    Add Group
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach ($groups as $group)
                <p>{{ $group->getName() }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{ View::make('footer') }}
