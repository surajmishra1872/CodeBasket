<x-guest-layout>
    @section('title', 'Forgot Password')
    <div class="container">
        <!-- Outer Row -->
        <h2 class="text-center text-white mt-5">Code Basket</h2>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">    
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group" >
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" value="{{old('email')}}" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                            @error('email')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="submit"  class="btn btn-primary btn-user btn-block">
                                            Send Email
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('login')}}">Back To Login !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-guest-layout>
