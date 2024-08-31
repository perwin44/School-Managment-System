{{-- <div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
</div> --}}
<div>
    <input wire:model="search" type="text" placeholder="Search users..."/>

    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
