@extends('layouts.app')
@section('title', 'The list of tasks')
@section('content')
    <!-- Header -->
    <header class="text-center mb-8">
        <h1 class="text-3xl font-bold">Task Application</h1>
    </header>

    <!-- Add Task Button -->
    <div class="mb-4 flex justify-center">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
            Add Task
        </a>
    </div>

    <!-- Task List -->
    <ul id="taskList">
        @forelse($tasks as $task)
        <li class="flex justify-between items-center bg-white rounded-lg shadow-md p-4 mb-2">
            <span @class(['line-through' => $task->completed, 'text-lg'])>{{ $task->title }}</span>
            <div class="flex">
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="text-blue-500 hover:text-blue-600 mr-2">
                   Show
                </a>

                <form action="{{ route('tasks.complete', ['id' => $task->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="text-green-500 hover:text-green-600 mr-2">
                        {{ $task->completed ? 'Not completed' : 'Completed' }}
                    </button>
                </form>

                <a href="{{ route('tasks.edit', ['id' => $task->id ]) }}" class="text-yellow-500 hover:text-yellow-600 mr-2">
                    Edit
                </a>

                <form action="{{ route('tasks.delete', ['id' => $task->id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="text-red-500 hover:text-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </li>
        @empty
            <div>There are no tasks!</div>
        @endforelse
    </ul>
    <div>
    @if($tasks->count())
            {{ $tasks->links('pagination::task-pagination') }}
    @endif
    </div>

@endsection


