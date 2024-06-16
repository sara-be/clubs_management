<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Membres') }}
            </h2>
            @if(auth()->user()->role === 'responsable')
                <a href="{{ route('members.create') }}" class="btn btn-primary">Ajouter Membre</a>
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
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">ID</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Nom</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Email</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Téléphone</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Club</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Année</th>
                                    <th class="py-2 px-4 bg-secondary text-white font-semibold">Filière</th>
                                    @if(auth()->user()->role === 'responsable')
                                        <th class="py-2 px-4 bg-secondary text-white font-semibold">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td class="py-2 px-4">{{ $member->id }}</td>
                                        <td class="py-2 px-4">{{ $member->name }}</td>
                                        <td class="py-2 px-4">{{ $member->email }}</td>
                                        <td class="py-2 px-4">{{ $member->phone }}</td>
                                        <td class="py-2 px-4">{{ $member->club->name }}</td>
                                        <td class="py-2 px-4">{{ $member->annee }}</td>
                                        <td class="py-2 px-4">{{ $member->filiere }}</td>
                                        @if(auth()->user()->role === 'responsable')
                                            <td class="py-2 px-4 d-flex">
                                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-info btn-sm mr-2">Modifier</a>
                                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
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
                        {{ $members->links() }} 
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
