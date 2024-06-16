<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Notifications') }}
      </h2>
  </x-slot>
  @foreach($messages as $message)
  <div class="shadow-lg rounded-lg mx-auto m-8 p-4 notification-box {{ $message->read ? 'bg-gray-300' : 'bg-blue-300' }} {{ $message->hidden ? 'hidden' : 'shown' }}" id="notification-{{ $message->id }}">
          <div class="text-sm pb-2">
           
            <span class="text-gray-600">
              {{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}
          </span>
            <form action="{{ route('messages.hidden', $message->id) }}" method="Post">
              @csrf
              @method('PUT')
            <span class="float-right cursor-pointer " >
              <button>
              <svg
                class="fill-current text-gray-600"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="22"
                height="22">
                <path class="heroicon-ui" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z" />
              </svg>
            </button>
            </span>
          </form>
          </div>
          <h2 class="font-bold text-black">Nom: <span class="text-gray-600">{{$message->name}}</span></h2> 
          <h2 class="font-bold text-black">Email: <span class="text-gray-600">{{$message->email}}</span></h2>
          <h2 class="font-bold text-black">Message: <span class="text-sm text-gray-600 tracking-tight">{{$message->message}}</span></h2>

          {{-- <div class="text-sm text-gray-600 tracking-tight">
           {{$message->message}}
          </div> --}}
          <form  action="{{ route('messages.seen', $message->id) }}" method="POST">
            @csrf
            @method('PUT')
          <button class="mt-2 px-4 py-2 bg-gray-300 rounded">Traité</button>
        </form>
        </div>
  @endforeach
  <style>
   .notification-box {
      width: 40rem;
     }
  </style>
  
</x-app-layout>
