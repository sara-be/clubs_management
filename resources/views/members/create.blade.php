
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter membre') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <form action="{{ route('members.store') }}" method="POST">
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
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="club_id" class="form-label">Club</label>
                            <select class="form-control" id="club_id" name="club_id" required>
                                @foreach($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="annee" class="form-label">Année</label>
                            <select class="form-control" id="annee" name="annee" required>
                                <option value="annee" > année</option>

                                <option value="1ere annee">1ère année</option>
                                <option value="2eme annee">2ème année</option>
                            </select>
                        </div>
                        <div id="filiere-container" class="form-group mb-3" style="display: none;">
                            <label for="filiere" class="form-label">Filière</label>
                            <select class="form-control" id="filiere" name="filiere" required>
                               <option value="developpement">developpement</option>
                               <option value="infrastructure">infrastructure</option>
                             
                            
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
document.getElementById('annee').addEventListener('change', function() {
    const filiereContainer = document.getElementById('filiere-container');
    const filiereSelect = document.getElementById('filiere');
    filiereSelect.innerHTML = ''; // Clear existing options

    if (this.value === '1ere annee') {
        filiereContainer.style.display = 'block';
        const options = ['développement', 'infrastructure'];
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.textContent = option.charAt(0).toUpperCase() + option.slice(1);
            filiereSelect.appendChild(opt);
        });
    } else if (this.value === '2eme annee') {
        filiereContainer.style.display = 'block';
        const options = ['wfs', 'mobile', 'cloud', 'réseaux'];
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.textContent = option.charAt(0).toUpperCase() + option.slice(1);
            filiereSelect.appendChild(opt);
        });
    } else {
        filiereContainer.style.display = 'none';
    }
});
</script>

