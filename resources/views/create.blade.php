@extends("layouts.master")

@section("content")
<h1 style="text-align: center; margin:1rem;">Create Instruction</h1>

<x-auth-validation-errors style="text-align: center; margin:1rem;" :errors="$errors" />


<form class="create__form" method="post" enctype="multipart/form-data" action="{{ url("/create")  }}">
    @csrf

  
    <div class="mt-6" >
        <x-label for="title" :value="__('Title')" />
        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
    </div>
    
    <div  class="mt-6">
        <x-label for="title" :value="__('Description')" />
        <textarea style="min-height: 100px;" id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" :value="old('description')" required autofocus></textarea>
    </div>

    <label class="mt-6" for="category_id">Category

        <select class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="category_id" id="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>

    </label>

    <div class="mt-6" >
        <x-label for="new_category" :value="__('New Category')" />
        <x-input id="new_category" class="block mt-1 w-full" type="text" name="new_category" :value="old('title')" autofocus />
    </div>

    <div class="mt-6" >
    <input  name="path" type="file">
    </div>
    <x-button class="mt-6 mx-auto">
        {{ __('Create') }}
    </x-button>

</form>


@endsection