<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier événement') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Déscription</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $event->description }}</textarea>
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}" required>
                        </div>

                        <!-- Club -->
                        <div class="mb-3">
                            <label for="club" class="form-label">Club</label>
                            <select class="form-select" id="club" name="club_id" required>
                                @foreach ($clubs as $club)
                                    <option   class=" text-gray-800 " value="{{ $club->id }}" @if($club->id === $event->club_id) selected @endif>{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <!-- Photo -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div> --}}

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
