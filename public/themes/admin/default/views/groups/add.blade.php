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
                <h4>Add Group</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {{ View::make('groups.form') }}
            </div>
        </div>
    </div>
</div>

{{ View::make('footer') }}
