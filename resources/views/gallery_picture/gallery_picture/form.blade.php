<div class="form-body">
    <div class="row">
        {{-- <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('artist_id', 'Artist Id') !!}
                {!! Form::text(
                    'artist_id',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file(
                    'image',
                    ['class' => 'form-control']
                ) !!}
                @if(isset($gallery_picture->image))
                    <input type="hidden" name="existing_image" value="{{ $gallery_picture->image }}">
                @endif
            </div>
        </div>
        @if(isset($gallery_picture->image))
            <div class="col-md-12">
                <div class="form-group">
                    <label>Current Image:</label>
                    <img src="{{ $gallery_picture->image_link }}" alt="Current Image" style="max-width: 100px;">
                </div>
            </div>
        @endif
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
                    $gallery_picture->auth_id,
                    ['class' => 'form-control', 'required' => '' == 'required']
                ) !!}
            </div>
        </div>      
    </div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
