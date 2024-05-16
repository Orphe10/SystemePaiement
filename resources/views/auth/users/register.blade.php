@extends('layaouts.website')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">Login Form</h2>
            <div class="text-center mb-5 text-dark">Made with bootstrap</div>
            <div class="card my-5">

                @if(Session::get('success'))
                <div class="alert alert-success p-lg-2">{{Session::get('success')}}</div>
                @endif
                <form class="card-body cardbody-color p-lg-5" action="{{route('HandleUserRegister')}}" method="POST">
                    @method('post')
                    @csrf
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                            class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                            alt="profile">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Nom & Prénom">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
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
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                        Registered? <a href="#" class="text-dark fw-bold"> Connectez-vous</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<style>
    .btn-color {
        background-color: #0e1c36;
        color: #fff;

    }

    .profile-image-pic {
        height: 200px;
        width: 200px;
        object-fit: cover;
    }



    .cardbody-color {
        background-color: #ebf2fa;
    }

    a {
        text-decoration: none;
    }
    .ok{
        background-color: #0e1c36
    }
</style>
@endsection
