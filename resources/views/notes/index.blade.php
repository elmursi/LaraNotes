<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('notes.index') ? __('Notes') :
                   
                
                __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        @forelse ($notes as $note)

            <div class="my-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex justify-between">
                        <div class="text-gray-900 font-bold text-xl mb-2">
                        <a href="{{ route('notes.show', $note) }}">

                        
                        {{ $note->title }}

                        </a>
                    
                    </div>
                        <div class="text-gray-900 font-bold text-xl mb-2">{{ $note->updated_at->diffForHumans() }}</div>
                    </div>

                    <p class="text-gray-700 text-base">
                        {{  Str::limit($note->note, 200)  }}
                    </p>

                    <div class="flex justify-end">
              
                            
                        </form>
                    </div>

                </div>
            </div>

        @empty

            <div class="my-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="text-gray-900 font-bold text-xl mb-2">No notes found.</div>

                </div>
            </div>

        @endforelse
            
            {{ $notes->links() }}   

        </div>
    </div>

    @if (request()->routeIs('notes.index'))
        <!-- Trash -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

               <!-- button to route /notes -->
                  <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    
                  Create Note
                
                </a>    
            </div>
        </div>
    @else
        <!-- Back to notes -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

               <!-- button to route /notes -->
                  <a href="{{ route('notes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    
                  Back to Notes
                
                </a>    
            </div>
        </div>
    @endif

    <!-- Create a new note -->
    
</x-app-layout>

