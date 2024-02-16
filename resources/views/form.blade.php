@extends('layouts.app')
@section('title', isset($task) ? 'Edit task' : 'Add tasks')
@section('content')
    <!-- Header -->
    <header class="text-center mb-8">
        <h1 class="text-3xl font-bold">{{ isset($task) ? 'Edit task' : 'Add tasks' }}</h1>
    </header>

    <!-- Add Task Form -->
    <form action="{{ isset($task) ? route('tasks.update', ['id' => $task->id]) : route('tasks.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6 mb-6">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
            <input type="text" id="title" name="title" class="mt-1 p-2 block w-full rounded-md border-gray-300" value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description Textarea -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="5" class="mt-1 p-2 block w-full rounded-md border-gray-300"> {{ $task->description ?? old('description') }} </textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Long Description Textarea -->
        <div class="mb-4">
            <label for="longDescription" class="block text-sm font-medium text-gray-700">Long Description</label>
            <textarea id="longDescription" name="long_description" rows="10" class="mt-1 p-2 block w-full rounded-md border-gray-300">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Add Button -->
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
            </button>
    </form>

    <!-- Back Link -->
    <div class="flex justify-center">
        @isset($task)
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Back</a>
        @else
            <a href="{{ route('tasks.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Back</a>
            @endisset
    </div>
@endsection
