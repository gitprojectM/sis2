@extends('layouts.app')

@section('content')

<div class="container  ">
    <div class="row justify-content-center">
       
        <div class="col-md-6 col-md-offset-2">
                <br><br>
               
                <div class="card-header bg-gray"><h3>Login</h3></div>
                
                <div class="card-body  ">
                        @include('partials.ror')
                    <form method="POST" action="{{route('login')}}" aria-label="">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">User ID</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="username" value="" >

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required>
                               
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    login
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                        
        </div>
                            
    </div>
</div>
@endsection
