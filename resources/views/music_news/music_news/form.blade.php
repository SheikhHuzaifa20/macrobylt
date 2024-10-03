<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text(
                    'title',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea(
                    'description',
                    null,
                    '' == 'required'
                        ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required']
                        : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file(
                    'image',
                    ['class' => 'form-control']
                ) !!}
                @if(isset($music_news->image))
                <input type="hidden" name="existing_image" value="{{ $music_news->image }}">
            @endif
            </div>
        </div>
        @if(isset($music_news->image))
            <div class="col-md-12">
                <div class="form-group">
                    <label>Current Image:</label>
                    <img src="{{ $music_news->image_link }}" alt="Current Image" style="max-width: 100px;">
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('date', 'Date') !!}
                {!! Form::date(
                    'date',
                    $music_news->date,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('time', 'Time') !!}
                {!! Form::time(
                    'time',
                    $music_news->time,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>        
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('auth_id', 'Auth Id') !!}
                {!! Form::select(
                    'auth_id',
                    \App\User::where('id', '!=', 1)->where('role', 2)->pluck('name', 'id'),
                    $music_news->auth_id,
                    ['class' => 'form-control', 'required' => '' == 'required']
                ) !!}
            </div>
        </div>   
    </div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
