@extends('layouts.app')

@section('template_title')
    {{ $infomessage->name ?? 'Show Infomessage' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Infomessage</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('infomessages.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $infomessage->title }}
                        </div>
                        <div class="form-group">
                            <strong>Body:</strong>
                            {{ $infomessage->body }}
                        </div>
                        <div class="form-group">
                            <strong>Start Time:</strong>
                            {{ $infomessage->start_time }}
                        </div>
                        <div class="form-group">
                            <strong>End Time:</strong>
                            {{ $infomessage->end_time }}
                        </div>
                        <div class="form-group">
                            <strong>Country:</strong>
                            {{ $infomessage->country }}
                        </div>
                        <div class="form-group">
                            <strong>Aplicacion:</strong>
                            {{ $infomessage->app }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
   
    

@endsection
