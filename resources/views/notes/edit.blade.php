<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <!-- Display errors -->
                    @foreach ($errors->all() as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach
                    
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{ route('notes.update', $note) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="{{ $note->title }}" required>
                            </div>
    
        
                            <div class="mb-8">
                                <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                                <textarea name="note" id="note" class="border-2 border-gray-500">
                                    {{ $note->note }}
                                </textarea>
                            </div>
    
                            <div class="flex p-1">
                            
                                <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace( 'note' );
        </script>
    </x-app-layout>
