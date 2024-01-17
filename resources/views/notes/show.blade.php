<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <x-alert-success>
            {{ session('success') }}
       </x-alert-success>
        <!-- created at -->
        <div class="text-gray-900 font-bold text-xl mb-2">Created at : {{ $note->created_at->diffForHumans() }}</div>

        <!-- Updated at -->
        <div class="text-gray-900 font-bold text-xl mb-2">Updated at : {{ $note->updated_at->diffForHumans() }}</div>
        
        <!-- display the note -->
            <div class="my-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex justify-between">
                        <div class="text-gray-900 font-bold text-xl mb-2">
                        <a href="{{ route('notes.show', $note->id) }}">

                        
                        {{ $note->title }}

                        </a>
                    
                    </div>
                        <div class="text-gray-900 font-bold text-xl mb-2">{{ $note->updated_at->diffForHumans() }}</div>
                    </div>

                    <p class="text-gray-700 text-base">
                        {{ $note->note }}
                    </p>

                    <div class="flex justify-end">
                        <a href="{{ route('notes.edit', $note) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this note?')">
                            
                            Move to Trash
                        
                        </button>

                        </form>
                    </div>

                    

                </div>
                <!-- back  -->
                <div class="flex justify-end">
                        <a href="{{ route('notes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                        
                    </div>
            </div>

        </div>
        
    </div>
    



</x-app-layout>