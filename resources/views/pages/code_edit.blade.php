<x-app-layout>
    @section('title', 'Code View')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Your Code</h1>
        </div>
        
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                 Update Your Code
                </h6>
            </div>
            <div class="card-body">
              <!-- Content Start -->
              @if(!empty($CodeObject))
              <form action="{{route('UpdateCode')}}" id="code_form" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="code_id" value="{{$CodeObject->code_id}}" >
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputTitle">Code Title<span class="text-danger">*</span></label>
                    <input type="text" value="{{$CodeObject->title ?? ''}}" class="form-control" name="code_title" id="inputTitle" placeholder="Code Title" required>
                  </div>
                </div>
                
                {{-- <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputTitle">Code File</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" name="code_file" class="custom-file-input form-control" id="inputGroupFile02">
                              <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                            </div>
                          </div>
                    </div>
                </div> --}}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="inputTitle">Code Text<span class="text-danger">*</span></label>
                            <textarea  name="code_text" class="form-control" rows="12" cols="50">
                              {{$CodeObject->code_text ?? ''}}
                            </textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
              @else
              <h5 class="text-center">No Data Found</h5>
              @endif
              <!-- Content End -->
            </div>
        </div>
    
    </div>
    <!-- /.container-fluid -->
    
    @push('scripts')
       
    @push('scripts')
   
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('submit', '#code_form', function(e) {
                e.preventDefault();
                if ($('#code_form')[0].checkValidity() === false) {
                    event.stopPropagation();
                    $('#code_form').addClass('was-validated');
                } else {
                    $('#code_form')[0].submit();
                }
            });
        });
    </script>
    
    <script>
        window.onload = function() {
            CKEDITOR.replace('code_text');
        };
    </script>
    
    @endpush
       
    @endpush
    
    </x-app-layout>