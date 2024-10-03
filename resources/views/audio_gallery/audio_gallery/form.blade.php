<div class="form-body">
    <div class="row">
        {{-- <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('category', 'Category') !!}
                {!! Form::text(
                    'category',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('audio_title', 'Audio Title') !!}
                {!! Form::text(
                    'audio_title',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::text(
                    'description',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('language', 'Audio Language') !!}
                {!! Form::text(
                    'language',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('genre', 'Audio Genre') !!}
                {!! Form::text(
                    'genre',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('free_style_name', 'Audio Freestyle Name') !!}
                {!! Form::text(
                    'free_style_name',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('file', 'File') !!}
                {!! Form::file(
                    'file',
                    ['class' => 'form-control']
                ) !!}
                @if(isset($audio_gallery->file))
                    <input type="hidden" name="existing_file" value="{{ $audio_gallery->file }}">
                @endif
            </div>
        </div>
        @if(isset($audio_gallery->file))
            <div class="col-md-12">
                <div class="form-group">
                    <label>Current File:</label>
                    <p><a href="{{ url($audio_gallery->file) }}" target="_blank">File</a></p>
                </div>
            </div>
        @endif
        
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file(
                    'image',
                    ['class' => 'form-control']
                ) !!}
                @if(isset($audio_gallery->image))
                <input type="hidden" name="existing_image" value="{{ $audio_gallery->image }}">
            @endif
            </div>
        </div>
        @if(isset($audio_gallery->image))
            <div class="col-md-12">
                <div class="form-group">
                    <label>Current Image:</label>
                    <img src="{{ $audio_gallery->image_link }}" alt="Current Image" style="max-width: 100px;">
                </div>
            </div>
        @endif
              
        {{-- <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('is_approved', 'Is Approved') !!}
                {!! Form::text(
                    'is_approved',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('auth_id', 'Auth Id') !!}
                {!! Form::select(
                    'auth_id',
                    \App\User::where('id', '!=', 1)->where('role', 2)->pluck('name', 'id'),
                    $audio_gallery->auth_id, // Assuming $selectedAuthId contains the ID of the selected user
                    ['class' => 'form-control', 'required' => '' == 'required']
                ) !!}
            </div>
        </div            
    </div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
