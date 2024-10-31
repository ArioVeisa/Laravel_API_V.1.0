@extends('layouts.app')

@section('title', 'Resource List')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Resources List</h2>
        <a href="{{ url('/resources/create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add
            Resource</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-4">#</th>
                <th class="p-4">Name</th>
                <th class="p-4">Description</th>
                <th class="p-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($resources as $resource)
                <tr class="border-t">
                    <td class="p-4">{{ $resource->id }}</td>
                    <td class="p-4">{{ $resource->name }}</td>
                    <td class="p-4">{{ $resource->description }}</td>
                    <td class="p-4">
                        <a href="{{ url('/resources/edit', $resource->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ url('/resources', $resource->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">No resources found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
