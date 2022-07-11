@extends("layouts.master")

@section("content")
<h1 style="text-align: center; margin:1rem;">Create Complaint</h1>

<x-auth-validation-errors style="text-align: center; margin:1rem;" :errors="$errors" />


<form class="create__form" method="post" action="{{ url('/create/complaint/' . $instr_id)  }}">
    @csrf

    <input type="text" hidden name="instr_id" value="{{$instr_id}}">

    <div class="mt-6">
        <x-label for="title" :value="__('Description')" />
        <textarea style="min-height: 100px;" id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" :value="old('description')" required autofocus></textarea>
    </div>

    <x-button class=" mt-2 ">
        {{ __('Complaint') }}
    </x-button>

</form>


@endsection