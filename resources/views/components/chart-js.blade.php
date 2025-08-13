@props(['chart'])

<div>
    <canvas id="{{ $chart->name }}" width="{{ $chart->size['width'] ?? 400 }}"
        height="{{ $chart->size['height'] ?? 200 }}"></canvas>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('{{ $chart->name }}').getContext('2d');
            new Chart(ctx, {
                type: '{{ $chart->type }}',
                data: {
                    labels: @json($chart->labels),
                    datasets: @json($chart->datasets)
                },
                options: @json($chart->options)
            });
        });
    </script>
@endpush
