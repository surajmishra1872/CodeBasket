<x-app-layout>
    @section('title', 'Code List')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Your Basket</h1>
            <a href="{{route('AddToBasket')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fa fa-plus" aria-hidden="true"></i> Add To Basket
            </a>
        </div>
        {{-- {{date('d , M y', strtotime($order_details->created_at ?? ''))}} --}}
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Your Codes In Your Basket <i class="fa fa-shopping-basket" aria-hidden="true"></i></h6>
            </div>
            <div class="card-body">
              <!-- Content Start -->
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code Title</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Last Updated At</th>
                    {{-- <th scope="col">File</th> --}}
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if(!empty($codes))
                @foreach ($codes as $key=>$item)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td >{{$item->title ?? ''}}</td>
                    <td >{{date('d  M Y', strtotime($item->created_at ?? ''))}}</td>
                    <td >{{date('d  M Y', strtotime($item->updated_at ?? ''))}}</td>
                    {{-- <td><i class="fa fa-cloud-download" aria-hidden="true"></i></td> --}}
                    <td>
                        <a href="{{route('ViewCode',$item->code_id)}}" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="{{route('EditCode',$item->code_id)}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="{{route('DeleteCode')}}" value="{{$item->code_id}}" class="btn btn-danger delete_code"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
              </table>
              @if(!empty($codes))
              <div class="text-center mt-3">{{ $codes->links() }}</div>
              @endif
              <!-- Content End -->
            </div>
        </div>
    
    </div>
    <!-- /.container-fluid -->
    
    
<!------------ Modal end Here----------------->


  <div class="modal fade enquiry-form" id="DeleteCodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-space-between">
                <h5 class="modal-title" id="exampleModalLabel">Delete Code</h5>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_code_id">
                <h4 class="p-2">Are You Sure Want To Delete Code ?</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary delete_code_cnf ">Yes</button>
                <button type="button" class="btn btn-primary modal-close" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
  </div>

  <!------------ Delete Ajax----------------->
    @push('scripts')  
    <script type="text/javascript">
      $(document).ready(function () {
          //delete modal
        $(document).on("click", ".delete_code", function (e) {
            e.preventDefault();
            var codeId = $(this).attr('value');
            $('#delete_code_id').val(codeId);
            $('#DeleteCodeModal').modal('show');
        });

        // final delete
        $(document).on("click", ".delete_code_cnf", function (e) {
            e.preventDefault();
            var code_id = $('#delete_code_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('DeleteCode') }}",
                type: "POST",
                data: {
                  code_id: code_id
                },
                success: function (response) {
                    $('#DeleteCodeModal').modal('hide');
                    if(response.status==200)
                    location.reload();
                }
            });
        });
      });
    </script>       
    @endpush

    </x-app-layout>