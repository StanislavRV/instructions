@extends("layouts.master")


@section("content")

<h1 style="text-align: center; margin:1rem;">Instructions</h1>

<div class="container_card">

    @foreach($instructions as $instruction)

    <div class="book_card">

        <h3 style="margin: .5rem; color:darkred">{{ $instruction->title  }}</h3>


        <span class="ml-2 mt-6">Category: {{ $instruction->category->title  }}</span>

        <div class="descr">
            <span style="margin: 1rem .5rem 0 .5rem; font-weight: 600;">Description</span>
            <p style="margin: .5rem;">
                {{ $instruction->description  }}
            </p>
        </div>

        <span class="ml-2 mt-3">Author: {{ $instruction->author->name  }}</span></br>


        <div class="edit">
            <a class="text-sm text-gray-600 hover:text-gray-900"  href="{{url('accept/' . $instruction->id)}}">
                <x-button class="mt-2 ">
                    {{ __('Accept') }}
                </x-button>
            </a>
            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{url('delete/' . 'accept/' . $instruction->id)}}">
                <x-button class="ml-2 mt-2 ">
                    {{ __('Delete') }}
                </x-button>
            </a>

        </div>

    </div>
    @endforeach
</div>
@endsection