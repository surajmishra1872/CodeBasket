<x-guest-layout>
    @section('title', 'Update Password')
    <div class="container">
        <h2 class="text-center text-white mt-5">Code Basket</h2>
        <!-- Outer Row -->
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
                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <input type="hidden" name="email" value="{{ $request->email }}">

                                        <div class="form-group" >
                                            <input  class="form-control form-control-user"
                                                type="password" name="password" aria-describedby="emailHelp"
                                                placeholder="Enter Password" required>
                                            @error('password')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password"  name="password_confirmation" class="form-control form-control-user"
                                                placeholder="Confirm Password" required>
                                            @error('password_confirmation')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                        <button type="submit"  class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-guest-layout>
