<x-app-layout>
    @section('title', 'Code View')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Your Profile</h1>
      </div>
        
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Update Profile
                </h6>
            </div>
            <div class="card-body">
              <!-- Content Start -->
              
              <form action="{{route('profile.update')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$userObject->id}}">

                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" name="name" value="{{$userObject->name ?? ''}}"  aria-describedby="emailHelp" placeholder="Enter email">
                    @error('name')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$userObject->email ?? ''}}" readonly aria-describedby="emailHelp" placeholder="Enter email">
                  @error('email')
                  <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
              <!-- Content End -->
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Update Password
                </h6>
            </div>
            <div class="card-body">
              <!-- Content Start -->
              
              <form action="{{route('passwordUpdate')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$userObject->email}}">
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="new_password" id="exampleInputPassword1" placeholder="Password">
                  @error('new_password')
                  <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword2" placeholder="Confirm Password">
                    @error('password_confirmation')
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
              <!-- Content End -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    
    @push('scripts')
       
    <script type="text/javascript">
        $(document).ready(function () {
           
        });
    </script>
       
    @endpush
    
</x-app-layout>