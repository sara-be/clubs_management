<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clubs') }}
            </h2>
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('clubs.create') }}" class="btn btn-primary">Ajouter Club</a>
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
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Résponsable</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Description</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Image</th>
                                    @if(auth()->user()->role === 'admin')
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Actions</th>
                                    @endif 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clubs as $club)
                                    <tr>
                                        <td class="py-2 px-4">{{ $club->name }}</td>
                                        <td class="py-2 px-4">{{ $club->responsable->name }}</td>
                                        <td class="py-2 px-4">{{ $club->description }}</td>
                                        <td class="py-2 px-4"><img src="{{ asset('storage/images/' . $club->photo) }}" width='70' height='50' class='img' /></td>
                                        @if(auth()->user()->role === 'admin')
                                        <td class="py-2 px-4 d-flex">
                                            <a href="{{ route('clubs.edit', $club) }}" class="btn btn-info btn-sm mr-2">Modifier</a>
                                            <form action="{{ route('clubs.destroy', $club) }}" method="POST" style="display:inline-block;">
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
                    {{-- Uncomment the pagination if needed --}}
                    {{-- <div class="d-flex justify-content-end mt-3">
                        {{ $clubs->links() }} 
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
