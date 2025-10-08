@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">📈 Estatísticas & BI</h1>
    <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-4 py-2 rounded-lg">Voltar</a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Visitas (últimos 30 dias)</h2>
        <canvas id="chartViewsOverTime" height="160"></canvas>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Páginas mais acessadas</h2>
        <canvas id="chartTopPages" height="160"></canvas>
        <div class="mt-4 text-right">
            <button id="exportTopCsv" class="text-sm text-blue-600 hover:underline">Exportar CSV</button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Totais</h2>
        <canvas id="chartTotals" height="160"></canvas>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        async function fetchJson(url){
            const res = await fetch(url, {headers: { 'X-Requested-With': 'XMLHttpRequest' }});
            return res.ok ? res.json() : null;
        }

        // Views over time
        (async function(){
            const data = await fetchJson('{{ route('admin.api.stats.views_over_time') }}?days=30');
            if(!data) return;
            const labels = data.map(d => d.date);
            const values = data.map(d => d.views);

            new Chart(document.getElementById('chartViewsOverTime'), {
                type: 'line',
                data: { labels, datasets: [{ label: 'Visualizações', data: values, borderColor: '#2563eb', backgroundColor: 'rgba(37,99,235,0.08)', fill: true }] },
                options: { responsive: true, plugins: { legend: { display: false } } }
            });
        })();

        // Top pages
        (async function(){
            const data = await fetchJson('{{ route('admin.api.stats.top_pages') }}?limit=10');
            if(!data) return;
            const labels = data.map(d => d.path);
            const values = data.map(d => d.view_count);

            new Chart(document.getElementById('chartTopPages'), {
                type: 'bar',
                data: { labels, datasets: [{ label: 'Acessos', data: values, backgroundColor: '#f59e0b' }] },
                options: { indexAxis: 'y', responsive: true, plugins: { legend: { display: false } }, scales: { x: { beginAtZero: true } } }
            });

            // export CSV
            document.getElementById('exportTopCsv').addEventListener('click', function(){
                let csv = 'path,views\n' + data.map(d=> `${d.path.replace(/\n/g,' ')} , ${d.view_count}`).join('\n');
                const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a'); a.href = url; a.download = 'top_pages.csv'; document.body.appendChild(a); a.click(); a.remove();
            });
        })();

        // Totals
        (async function(){
            const data = await fetchJson('{{ route('admin.api.stats.totals') }}');
            if(!data) return;
            const labels = ['Users','Noticias','Eventos','Locais','Links','Faqs','Legislações','Membros'];
            const values = [data.users,data.noticias,data.eventos,data.locais,data.links_rapidos,data.faqs,data.legislacoes,data.membros_equipe];

            new Chart(document.getElementById('chartTotals'), {
                type: 'bar',
                data: { labels, datasets: [{ label: 'Totais', data: values, backgroundColor: '#10b981' }] },
                options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
            });
        })();
    </script>
@endsection
