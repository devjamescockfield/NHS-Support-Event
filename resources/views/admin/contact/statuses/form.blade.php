<div class="row mx-auto">
    <div class="form-group col-md-4 mx-auto">
        {{ Form::label('name', 'Name') }}
        @if(isset($status->name))
            {{ Form::text('name', $status->name, array('class' => 'form-control')) }}
        @else
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        @endif
    </div>

    <div class="form-group text-center mx-auto col-md-2">
        {{ Form::label('color', 'Colour') }}
        @if(isset($status->color))
            {{ Form::text('color', $status->color, array('class' => 'pick-a-color form-control colour')) }}
        @else
            {{ Form::text('color', null, array('class' => 'pick-a-color form-control colour')) }}
        @endif
    </div>
</div>
<a class="btn btn-outline-secondary btn-close" href="{{ route('admin.contact-statuses.index') }}">Cancel</a>
@if(isset($status->name) || isset($status->color))
    {{ Form::submit('Edit', array('class' => 'btn btn-secondary')) }}
@else
    {{ Form::submit('Create', array('class' => 'btn btn-secondary')) }}
@endif
