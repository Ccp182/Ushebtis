@extends('layouts.generalContent')
@section('title','Home')

@section('css')

@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Infomessage</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('infomessages.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('infomessage.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
   
    

@endsection