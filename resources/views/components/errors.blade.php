@if($errors->count())
    <div class="bg-red-400 fixed bottom-5 right-0 text-white p-4">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
