@if(session('success'))
            <div class="mb-4 px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                <p>{{ $slot }}</p>
            </div>

@endif