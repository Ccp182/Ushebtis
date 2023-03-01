@extends('layouts.generalContent')
@section('title','Home')

@section('css')

@endsection

@section('content')
    
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                            <strong>{{ __('Mensaje Informativos') }}</strong>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('infomessages.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Titulo</th>
										<th>Mensaje</th>
										<th>Inicio</th>
										<th>Fin</th>
                                        <th>Tipo</th>
										<th>Aplicacion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infomessages as $infomessage)
                                        <tr>
                                            <td>{{ $infomessage->title }}</td>
											<td>{{ Str::limit($infomessage->body, 100, $end='...') }}</td>
											<td>{{ $infomessage->start_time }}</td>
											<td>{{ $infomessage->end_time }}</td>
                                            <td>{{ $infomessage->type->name }}</td>
											<td><img src="https://flagcdn.com/w20/{{ $infomessage->country->prefix }}.png"> {{ $infomessage->app->name }}</td>

                                            <td>
                                                <form action="{{ route('infomessages.destroy',$infomessage->id) }}" method="POST">
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('infomessages.show',$infomessage->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                                    <a class="btn btn-sm btn-success mb-1" href="{{ route('infomessages.edit',$infomessage->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm  mb-1"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                {!! $infomessages->links() !!}
            </div>
        </div>
    </div>
    
@endsection

@section('script')
   
    

@endsection

