@extends("layouts.master")


@section("content")

<h1 style="text-align: center; margin:1rem;">Instructions</h1>

<div class="container_card">

    @foreach($instructions as $instruction)
    

    <div class="book_card">

        <h3 style="margin: .5rem; color:red;">{{ $instruction->title  }}</h3>


        <span class="ml-2 mt-6">Category: {{ $instruction->category->title  }}</span>

        <div class="mt-3 mb-3 descr">
            <span style="margin:  1rem .5rem 0 .5rem; color:green; font-size: 1.2rem; font-weight: 600;">Description</span>
            <p style="margin: 0 .5rem;">
                {{ $instruction->description  }}
            </p>
        </div>

        <span class="ml-2 mt-3">Author: {{ $instruction->author->name  }}</span></br>

        <div class="mb-3 descr">
            <a class="ml-2 text-sm text-gray-600 hover:text-gray-900" href="{{url('uploads/' . $instruction->path)}}">
                <x-button class="mt-6 mx-auto">
                    {{ __('Read') }}
                </x-button>
            </a>
            <a class="ml-2 text-sm text-gray-600 hover:text-gray-900" href="{{url('uploads/' . $instruction->path)}}" download>
                <x-button class="mt-6 mx-auto">
                    {{ __('Download file') }}
                </x-button>
            </a>
            <a class="ml-2 text-sm text-gray-600 hover:text-gray-900" href="{{url('/create/complaint/'. $instruction->id)}}">
                <x-button class="mt-6 mx-auto">
                    {{ __('Сomplaint') }}
                </x-button>
            </a>
        </div>
        @if(Auth::check() && Auth::user()->admin)
        <div class="edit">

            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{url('delete/' . 'instructions/' . $instruction->id)}}">
                <x-button class=" mt-2 ">
                    {{ __('Delete') }}
                </x-button>
            </a>
            
            @if(!($instruction->author->admin))
            @if($instruction->author->banned  && !($instruction->author->admin))
            
            <a class="ml-3 text-sm text-gray-600 hover:text-gray-900" href="{{url('banned/' . $instruction->author->id)}}">
                <x-button class=" mt-2 ">
                    {{ __( 'Unbanned user' ) }}
                </x-button>
            </a>
            @else
            <a class="ml-3 text-sm text-gray-600 hover:text-gray-900" href="{{url('banned/' . $instruction->author->id)}}">
                <x-button class=" mt-2 ">
                    {{ __( 'Banned user' ) }}
                </x-button>
            </a>
            
            @endif
            @endif

        </div>
        @endif
    </div>
    @endforeach
</div>
@endsection