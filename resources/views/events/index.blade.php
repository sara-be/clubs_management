<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Evénements') }}
            </h2> 
             @if(auth()->user()->role === 'admin')
            <a href="{{ route('events.create') }}" class="btn btn-primary">Ajouter événement</a>
            @endif 
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-light table-striped">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Nom</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Description</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Date</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Club</th>
                                    @if(auth()->user()->role === 'admin')
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Actions</th>
                                    @endif 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td class="py-2 px-4">{{ $event->name }}</td>
                                        <td class="py-2 px-4">{{ $event->description }}</td>
                                        <td class="py-2 px-4">{{ $event->date }}</td>
                                        <td class="py-2 px-4">{{ $event->club->name }}</td>
                                        @if(auth()->user()->role === 'admin')
                                        <td class="py-2 px-4">
                                            <a href="{{ route('events.edit', $event) }}" class="btn btn-info btn-sm mr-2">Modifier</a>
                                            <form action="{{ route('events.destroy', $event) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                            </form>
                                        </td>
                                        @endif 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
