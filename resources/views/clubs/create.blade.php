<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('AjouterClub') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <form action="{{ route('clubs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Déscription</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                       {{-- image --}}
                       <div class="form-group mb-3">
                        <label for="photo">
                            Image :</label>

                        <input type="file" name="photo" accept="image/*" required>
                    </div>
                        <div class="form-group mb-3">
                            <label for="responsable_id" class="form-label">Résponsable</label>
                            <select class="form-control" id="responsable_id" name="responsable_id" required>
                                @foreach ($responsables as $responsable)
                                    <option value="{{ $responsable->id }}">{{ $responsable->name }}</option>
                                @endforeach
                            </select>
                            <a href="{{ route('responsables.create') }}" class="btn btn-secondary btn-sm mt-2">Créer nouveau résponsable</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter Club</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
