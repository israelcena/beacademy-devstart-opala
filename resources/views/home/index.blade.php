<x-guest-layout>
    {{$id = Auth::user()->id}};
    <div>
        @include('layouts.navbar')
    </div>
</x-guest-layout>