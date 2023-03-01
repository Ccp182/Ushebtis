<div class="box box-info padding-1">
    <div class="box-body mb-3">
        
        <div class="form-group">
            {{ Form::label('Titulo') }}
            {{ Form::text('title', $infomessage->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Mensaje') }}
            {{ Form::textarea('body', $infomessage->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Body']) }}
            <!--<textarea required="" class="form-control {{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="body" rows="5" id="body"></textarea>-->
            {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo Mensaje') }}
            {{ Form::select('type_id', $types, $infomessage->type_id, ['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'placeholder' => '--']) }}
            {!! $errors->first('tipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Inicio') }}
            <!--<input class="form-control {{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" type="datetime-local" value="{{ old('start_time') }}" required autofocus id="start_time">-->
            {{ Form::input('dateTime-local', 'start_time', $infomessage->start_time, ['id' => 'start_time', 'class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : ''), 'placeholder' => 'Start Time']) }}
            <!--{{ Form::datetime('start_time', $infomessage->start_time, ['class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : ''), 'placeholder' => 'Start Time']) }}-->
            {!! $errors->first('start_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fin') }}
            {{ Form::input('dateTime-local', 'end_time', $infomessage->end_time, ['id' => 'end_time', 'class' => 'form-control' . ($errors->has('end_time') ? ' is-invalid' : ''), 'placeholder' => 'End Time']) }}
            <!--{{ Form::text('end_time', $infomessage->end_time, ['class' => 'form-control' . ($errors->has('end_time') ? ' is-invalid' : ''), 'placeholder' => 'End Time']) }}-->
            {!! $errors->first('end_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Aplicación') }}
            {{ Form::select('app_id', $apps, $infomessage->app_id, ['class' => 'form-control' . ($errors->has('app_id') ? ' is-invalid' : ''), 'placeholder' => '--']) }}
            {!! $errors->first('app', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Paises') }}
            {{ Form::select('country_id', $countries, $infomessage->country_id, ['class' => 'form-control' . ($errors->has('country_id') ? ' is-invalid' : ''), 'placeholder' => '--']) }}
            {!! $errors->first('app', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</div>