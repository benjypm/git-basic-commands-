dimensiones
El archivo bajo validación debe ser una imagen que cumpla con las restricciones de dimensión especificadas por los parámetros de la regla:

'avatar' => 'dimensions:min_width=100,min_height=200'

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/bootstrap.css">
<link rel="stylesheet" href="../../css/b4megamenu.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<title>Bootstrap 4 mega menu</title>
</head>

<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
            <div class="row w-100">
                <div class="col-md-2">
                    <img src="../../images/descarga.png" alt="flower" class="img-fluid">
                    <h4 style="color: orangered;">Flower 1</h4>
                    <p>bootstrap is a very famework.</p>
                </div>
                <div class="col-md-2">
                    <p><strong class="sub-menu-heading">Kids Items</strong></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                </div>
                <div class="col-md-2">
                    <p><strong class="sub-menu-heading">Kids Items</strong></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                </div>
                <div class="col-md-2">
                    <p><strong class="sub-menu-heading">Kids Items</strong></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                </div>
                <div class="col-md-2">
                    <p><strong class="sub-menu-heading">Kids Items</strong></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                </div>
                <div class="col-md-2">
                    <p><strong class="sub-menu-heading">Kids Items</strong></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                    <p><a href="#">Item Number1</a></p>
                </div>
            </div> 
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link enabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../../images/rioperalonso.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../../images/cascada.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../../images/rioperalonso_.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

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