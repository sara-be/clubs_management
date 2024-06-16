<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modifier Club') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <form action="{{ route('clubs.update', $club) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $club->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Déscription</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $club->description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="responsable_id" class="form-label">Résponsable</label>
                            <select class="form-control" id="responsable_id" name="responsable_id" required>
                                @foreach ($responsables as $responsable)
                                    <option value="{{ $responsable->id }}" {{ $club->responsable_id == $responsable->id ? 'selected' : '' }}>{{ $responsable->name }}</option>
                                @endforeach
                            </select>
                            <a href="{{ route('responsables.create') }}" class="btn btn-secondary btn-sm mt-2">Créer nouveau résponsable</a>
                        </div>
                        <div class="btn-group mt-3" role="group">
                            <button type="submit" class="btn btn-primary">Modifier Club</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
