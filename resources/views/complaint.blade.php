@extends("layouts.master")


@section("content")

<h1 style="text-align: center; margin:1rem;">Complaint</h1>

<div class="container_card">

    @foreach($complaints as $complaint)
   

    <div class="book_card">

        <h3 style="margin: .5rem; color:red;">Complaint about: {{ $complaint->instruction->title }}</h3>        

        <div class="mt-3 mb-3 descr">
            <span style="margin:  1rem .5rem 0 .5rem; color:green; font-size: 1.2rem; font-weight: 600;">Description</span>
            <p style="margin: 0 .5rem;">
                {{ $complaint->description  }}
            </p>
        </div>

        <span class="ml-2 mt-3">Author instruction: {{ $complaint->instruction->author->name  }}</span></br>


        <div class="edit">
            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{url('delete/complaint/'. $complaint->id)}}">
                <x-button class=" mt-2 ">
                    {{ __('Delete') }}
                </x-button>
            </a>
        </div>
  

    </div>
    @endforeach
</div>
@endsection