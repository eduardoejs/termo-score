<div class="bg-blue-50 w-full">
    {{--   --}}
    @foreach ($notifications as $notification)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 gap-6 text-blue-700 font-bold tracking-wider text-lg p-4">
            {{ $notification->data['message'] }}
        </div>
    @endforeach
</div>
