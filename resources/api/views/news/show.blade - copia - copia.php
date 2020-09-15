@include('news.partials.megamenu1')
@include('news.partials.megamenu2')


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xx-12">
            <div class="card">
                <div class="card-body">                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif              
                    
                    @foreach($newsone as $newsone_)
                    @endforeach
                    
                    <div class="row">
                    <div class="col-sm-8  border rounded-top shadow p-3 mb-3 bg-white rounded">
                        <div><h1>{{ $newsone_->title  }}</h1></div>
                        <div><span><b>Por {{ $newsone_->autor }}
                            </b></div>
                            <div><i class="fas fa-school"></i>{{ $newsone_->type_id }}
                                </span> | <span><i class="fa fa-clock-o" aria-hidden="true"></i></span><span>{{ $newsone_->created_at }}</span>
                            </div>
                            <br />
                        <div><img class="card-img-top" src="../../images/{{ $newsone_->file }}" height="360" width=""></div>
                        <br />
                        <div><p>{{ $newsone_->body }}</p></div>
                        @guest                            
                            @if (Route::has('register'))                                
                            @endif
                            @else
                                {!! Form::open(['route' => ['news.destroy', $newsone_->id], 'method' => 'DELETE']) !!}
                                    <div class="">
                                        <button type="submit" class="btn btn-danger btn-xs">
                                            <a href="{{ url('/news/'.$newsone_->id.'/destroy') }}">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                                            </a>
                                        </button>
                                        <a href="{{ url('/news/'.$newsone_->id.'/edit') }}" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                        </a>
                                    </div><br />
                                {!! Form::close() !!}                        
                        @endguest
                    </div>
                    <div class="col-sm-4">                        
                        @foreach($newsall as $newsall_)                                
                            <div class="col-sm-12  border rounded-top shadow p-3 mb-3 bg-white rounded">
                                <div class="col-sm-12 p-0">                                    
                                    <a href="{{ url('/news/'.$newsall_->id.'/show') }}" class="" style="text-decoration:none">
                                    <div><img class="card-img-top" src="../../images/{{ $newsall_->file }}" height="170" width=""></div>
                                    <div><h6>{{ \Illuminate\Support\Str::limit($newsall_->title, 80, $end='...') }}</h6></div></a>      
                                    <div><span>{{ $newsall_->type_id }}</span> | <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> | <span>{{ $newsall_->created_at }}</span></div>
                                </div>                                 
                            </div>                                      
                        @endforeach              
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection