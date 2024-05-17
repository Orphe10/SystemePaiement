@extends('layaouts.website')

@section('content')
<link rel="stylesheet" href="{{asset('css/UserStyle.css')}}">
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">Login Form</h2>
            <div class="text-center mb-5 text-dark">Se connecter en tant que utilisateur</div>
            <div class="card my-5">

                @if(Session::get('error'))
                <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                @endif
                <form class="card-body cardbody-color p-lg-5" action="{{route('HandleUserLogin')}}" method="POST">
                    @method('post')
                    @csrf
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                            class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                            alt="profile">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Email@exemple.com">
                            @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
                        @error('password')
                                <div class="text-danger ">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button>
                    </div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Nouveau membre?<a href="#" class="text-dark fw-bold">Se connecter</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
