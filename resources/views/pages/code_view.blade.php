<x-app-layout>
    @section('title', 'Code View')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Your Code</h1>
          <a href="{{route('ViewToBasket')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back
          </a>
      </div>
        
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  @if(!empty($CodeObject))
                  Title : {!! $CodeObject->title !!}
                  @else
                  Error : Please do not change url.
                  @endif
                </h6>
            </div>
            <div class="card-body">
              <!-- Content Start -->
              @if(!empty($CodeObject))
              {!! $CodeObject->code_text !!}
              @else
              <h5 class="text-center">No Data Found</h5>
              @endif
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