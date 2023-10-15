@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert alert-success alert-dismissible fade show" style="background: rgb(0, 92, 0);color:white;" role="alert">
            {!! $message['message'] !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        

    @endif
@endforeach

{{ session()->forget('flash_notification') }}
