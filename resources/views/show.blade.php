@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <!-- Header -->
    <header class="text-center mb-8">
        <h1 class="text-3xl font-bold">Task Details</h1>
    </header>

    <!-- Task Details -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">{{ $task->title }}</h2>
        <p class="mb-2"><strong>Description:</strong> {{ $task->description }} </p>
        <p class="mb-2"><strong>Long Description:</strong> {{ $task->long_description }} </p>
        <p class="mb-2"><strong>Created At:</strong> {{ date('H:i:s d-m-Y', strtotime($task->created_at)) }}</p>
        <p class="mb-2"><strong>Updated At:</strong> {{ date('H:i:s d-m-Y', strtotime($task->updated_at)) }}</p>
    </div>

    <!-- Completed and Deleted Forms -->
    <div class="flex justify-center mb-8">
        <form action="{{ route('tasks.complete', ['id' => $task->id]) }}" method="POST" class="mr-4">
            @csrf
            @method('PUT')
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
                Mark as {{ $task->completed ? 'not completed' : 'completed'}}
            </button>
        </form>
        <form action="{{ route('tasks.delete', ['id' => $task->id]) }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
                Delete
            </button>
        </form>
    </div>

    <!-- Edit and Go Back Links -->
    <div class="flex justify-center">
        <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded mr-4">
            Edit Task
        </a>
        <a href="{{ route('tasks.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
            Go to main
        </a>
    </div>
@endsection
