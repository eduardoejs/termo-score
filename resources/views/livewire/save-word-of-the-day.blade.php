<x-card>
    <x-h.2>Save Word of the day</x-h.2>    
    
    @if ($status)
        <x-alert.success>{{ $status }}</x-alert.success>        
    @endif

    <x-form wire:submit.prevent="save">        
        <x-input.text name="game_id" label="Game ID" />
        <x-input.text name="word" label="Word of the day" />
        <x-input.text name="word_confirmation" label="Confirm Word of the day" />
        <x-button.custom>Submit</x-button.custom> 
    </x-form>    
    
    {{-- @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
</x-card>

