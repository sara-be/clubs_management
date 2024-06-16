<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users"></i> Total des Clubs</h5>
                            <p class="card-text">{{ $totalClubs }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user-friends"></i> Total des Membres</h5>
                            <p class="card-text">{{ $totalMembers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user-tie"></i> Total des Responsables</h5>
                            <p class="card-text">{{ $totalResponsables }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-calendar-day"></i> Événements mensuels</h5>
                            <p class="card-text">{{ $monthlyEvents }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                
                <div class="col-md-12 mb-4">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-calendar-check"></i> Événements à venir</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($upcomingEvents as $event)
                                    <li class="list-group-item bg-light text-dark">{{ $event->name }} - {{ $event->date }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-calendar-week"></i> Derniers événements</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($latestEvents as $event)
                                    <li class="list-group-item bg-light text-dark">{{ $event->name }} - {{ $event->date }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <canvas id="eventsChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <canvas id="membersPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var eventsCtx = document.getElementById('eventsChart').getContext('2d');
        var eventsChart = new Chart(eventsCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Nombre d\'événements',
                    data: {!! json_encode($eventsPerMonth) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.8)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    
        var membersCtx = document.getElementById('membersPieChart').getContext('2d');
        var membersPieChart = new Chart(membersCtx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($groupNames) !!},
                datasets: [{
                    label: 'Membres par groupe',
                    data: {!! json_encode($membersPerGroup) !!},
                    backgroundColor: [
                        'rgba(120, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(120, 0, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(120, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(120, 0, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' membres';
                            }
                        }
                    }
                }
            }
        });
    </script>
    
    <style>
        #membersPieChart {
            height: 400px !important;
        }
    </style>
</x-app-layout>
