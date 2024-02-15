@extends('layouts.app')
@section('style')
    <style>
        body {
            font-family: 'Open Sans', sans-serif; /* Use a readable, modern font */
            margin: 20px;
            background-color: #f2f2f2; /* Light gray background */
            color: #333; /* Darker gray for text */
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Title uses same text color */
            font-size: 1.5em; /* Slightly larger title */
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: white; /* White form background */
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 5px; /* Rounded corners for softer look */
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input, textarea {
            border: 1px solid #ccc;
            padding: 5px;
            width: 100%;
            border-radius: 3px; /* Rounded corners for inputs */
        }
        button {
            background-color: #4CAF50; /* Green button */
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px; /* Rounded corners for button */
            transition: background-color 0.2s ease-in-out; /* Smooth hover effect */
        }
        button:hover {
            background-color: #3e8e41; /* Darker green on hover */
        }
        button:disabled {
            opacity: 0.5;
            cursor: default;
        }
        a {
            text-decoration: none;
            color: #4CAF50; /* Green link color */
            font-weight: bold;
            transition: color 0.2s ease-in-out; /* Smooth hover effect */
        }
        a:hover {
            color: #3e8e41; /* Darker green on hover */
        }
    </style>
@endsection
@section('title', 'Add tasks')
@section('content')
<form method="post" action="{{ route('tasks.store') }}">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5"></textarea>
    </div>
    <div>
        <label for="long_description">Long Description:</label>
        <textarea id="long_description" name="long_description" rows="10"></textarea>
    </div>
    <div>
        <button type="submit">Add Task</button>
        <a href="#">Back</a>
    </div>

</form>
@endsection
