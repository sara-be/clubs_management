

<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modifier Membre') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <form action="{{ route('members.update', $member->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $member->phone }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="club_id" class="form-label">Club</label>
                            <select class="form-control" id="club_id" name="club_id" required>
                                @foreach($clubs as $club)
                                    <option value="{{ $club->id }}" {{ $member->club_id == $club->id ? 'selected' : '' }}>{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="annee" class="form-label">Année</label>
                            <select class="form-control" id="annee" name="annee" required>
                                <option value="1ere annee" {{ $member->annee == '1ere annee' ? 'selected' : '' }}>1ère année</option>
                                <option value="2eme annee" {{ $member->annee == '2eme annee' ? 'selected' : '' }}>2ème année</option>
                            </select>
                        </div>
                        <div id="filiere-container" class="form-group mb-3" style="{{ $member->annee ? 'display: block;' : 'display: none;' }}">
                            <label for="filiere" class="form-label">Filière</label>
                            <select class="form-control" id="filiere" name="filiere" required>
                                <!-- Options will be populated based on the selected year -->
                                @if($member->annee == '1ere annee')
                                    <option value="développement" {{ $member->filiere == 'développement' ? 'selected' : '' }}>Développement</option>
                                    <option value="infrastructure" {{ $member->filiere == 'infrastructure' ? 'selected' : '' }}>Infrastructure</option>
                                @elseif($member->annee == '2eme annee')
                                    <option value="wfs" {{ $member->filiere == 'wfs' ? 'selected' : '' }}>WFS</option>
                                    <option value="mobile" {{ $member->filiere == 'mobile' ? 'selected' : '' }}>Mobile</option>
                                    <option value="cloud" {{ $member->filiere == 'cloud' ? 'selected' : '' }}>Cloud</option>
                                    <option value="réseaux" {{ $member->filiere == 'réseaux' ? 'selected' : '' }}>Réseaux</option>
                                @endif
                            </select>
                        </div>
                        <div class="btn-group mt-3" role="group">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
</x-app-layout>

