<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Créer Résponsable') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <form action="{{ route('responsables.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Numero de téléphone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="photo">
                                Image :</label>

                            <input type="file" name="photo" accept="image/*" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-2">Créer Résponsable</button>
                            <a href="{{ route('responsables.index') }}" class="btn btn-secondary">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    @media (max-width: 768px) {
        .container {
            padding: 0 15px;
        }
        .card-body {
            padding: 15px;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-label {
            margin-bottom: .5rem;
        }
    }
</style>
