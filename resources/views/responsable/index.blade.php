<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Résponsables') }}
            </h2>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('responsables.create') }}" class="btn btn-primary">Ajouter Résponsable</a>
            @endif
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-secondary text-dark font-semibold">Nom</th>
                            <th class="py-2 px-4 bg-secondary text-dark font-semibold">Email</th>
                            <th class="py-2 px-4 bg-secondary text-dark font-semibold">image</th>

                            @if(auth()->user()->role === 'admin')
                                <th class="py-2 px-4 bg-secondary text-dark font-semibold">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($responsables as $responsable)
                            <tr>
                                <td class="py-2 px-4">{{ $responsable->name }}</td>
                                <td class="py-2 px-4">{{ $responsable->email }}</td>
                                
                                <td><img src="{{ asset('storage/images/' . $responsable->photo) }}" width='70'
                                    height='50' class='img' />
                                </td>
                                @if(auth()->user()->role === 'admin')
                                    <td class="py-2 px-4">
                                        <a href="{{ route('responsables.edit', $responsable) }}" class="btn btn-info btn-sm mr-2">Modifier</a>
                                        <form action="{{ route('responsables.destroy', $responsable) }}" method="POST" style="display:inline-block;">
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
</x-app-layout>
