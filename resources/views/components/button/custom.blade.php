<button type="submit" 
    {{ $attributes->class(
        [
            'bg-indigo-100 text-indigo-500 px-4 py-2 rounded-md text-xs focus:outline-none focus:ring-2 
            focus:ring-offset-2 focus:ring-indigo-500 hover:bg-indigo-500 hover:text-indigo-100 tracking-widest font-bold 
            border border-indigo-500 transition-all uppercase'
        ]) }}>
    {{ $slot }}
</button>