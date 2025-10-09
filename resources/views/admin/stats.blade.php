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
        <div id="noDataViewsOverTime" class="hidden text-center py-8 text-gray-400">
            <i class="fas fa-chart-line text-4xl mb-2"></i>
            <p class="text-sm">Sem dados de visitas ainda</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Páginas mais acessadas</h2>
        <canvas id="chartTopPages" height="160"></canvas>
        <div id="noDataTopPages" class="hidden text-center py-8 text-gray-400">
            <i class="fas fa-file-alt text-4xl mb-2"></i>
            <p class="text-sm">Sem dados de páginas ainda</p>
        </div>
        <div class="mt-4 text-right">
            <button id="exportTopCsv" class="text-sm text-blue-600 hover:underline">Exportar CSV</button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Totais</h2>
        <canvas id="chartTotals" height="160"></canvas>
        <div id="noDataTotals" class="hidden text-center py-8 text-gray-400">
            <i class="fas fa-database text-4xl mb-2"></i>
            <p class="text-sm">Sem dados ainda</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Dispositivos</h2>
        <canvas id="chartByDevice" height="160"></canvas>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Tráfego por hora (últimas 24h)</h2>
        <canvas id="chartHourly24" height="160"></canvas>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-lg font-semibold mb-4">Top páginas por dispositivo</h2>
        <div class="mb-3">
            <select id="deviceSelect" class="border p-2 rounded">
                <option value="">Todos</option>
                <option value="desktop">Desktop</option>
                <option value="mobile">Mobile</option>
                <option value="bot">Bot</option>
            </select>
            <button id="refreshTopByDevice" class="ml-2 bg-gray-200 px-3 py-1 rounded">Atualizar</button>
            <button id="exportTopByDeviceCsv" class="ml-2 text-sm text-blue-600 hover:underline">Exportar CSV</button>
        </div>
        <canvas id="chartTopByDevice" height="160"></canvas>
    </div>
</div>

<!-- Seção de análise por página específica -->
<div class="mt-8 bg-gradient-to-r from-purple-50 to-blue-50 p-6 rounded-xl shadow-md border-2 border-purple-200">
    <h2 class="text-xl font-bold text-gray-800 mb-4">
        <i class="fas fa-search-location mr-2 text-purple-600"></i>
        Análise de Página Específica
    </h2>
    <p class="text-gray-600 mb-4">Digite o caminho da página (ex: "noticias/123") para ver métricas detalhadas:</p>
    
    <div class="flex gap-3 mb-6">
        <input type="text" id="pagePathInput" placeholder="Ex: noticias/123" 
               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
        <button id="loadPageStats" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-2 rounded-lg transition-colors">
            <i class="fas fa-chart-area mr-2"></i>Carregar Dados
        </button>
        <button id="useCurrentPage" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition-colors" title="Usar caminho da página atual">
            <i class="fas fa-link mr-2"></i>Página Atual
        </button>
    </div>

    <div id="pageStatsContainer" class="hidden">
        <div class="bg-white p-4 rounded-lg mb-4">
            <h3 class="font-semibold text-gray-700 mb-2">
                <i class="fas fa-file-alt mr-2 text-purple-500"></i>
                Analisando: <span id="currentPagePath" class="text-purple-700 font-mono"></span>
            </h3>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">
                    <i class="fas fa-calendar-week mr-2 text-purple-500"></i>
                    Visualizações (últimos 30 dias)
                </h3>
                <canvas id="chartPageViewsOverTime" height="200"></canvas>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">
                    <i class="fas fa-mobile-alt mr-2 text-purple-500"></i>
                    Dispositivos
                </h3>
                <canvas id="chartPageByDevice" height="200"></canvas>
                <div class="mt-4 text-center">
                    <button id="exportPageStatsCsv" class="text-sm text-purple-600 hover:underline">
                        <i class="fas fa-download mr-1"></i>Exportar dados CSV
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="pageStatsEmpty" class="text-center py-8 text-gray-500">
        <i class="fas fa-chart-line text-6xl text-gray-300 mb-3"></i>
        <p>Digite um caminho de página e clique em "Carregar Dados" para ver as estatísticas</p>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dados carregados do servidor
        const statsData = {
            totals: @json($totals),
            viewsOverTime: @json($viewsOverTime),
            topPages: @json($topPages),
            byDevice: @json($byDevice),
            hourlyLast24: @json($hourlyLast24),
            topPagesByDevice: @json($topPagesByDevice)
        };

        // Debug: ver dados no console
        console.log('📊 Dados de Estatísticas:', statsData);

        async function fetchJson(url){
            const res = await fetch(url, {headers: { 'X-Requested-With': 'XMLHttpRequest' }});
            return res.ok ? res.json() : null;
        }

        // Views over time (usando dados do servidor)
        (function(){
            const data = statsData.viewsOverTime;
            if(!data || data.length === 0) {
                document.getElementById('chartViewsOverTime').style.display = 'none';
                document.getElementById('noDataViewsOverTime').classList.remove('hidden');
                return;
            }
            const labels = data.map(d => d.date);
            const values = data.map(d => d.views);

            new Chart(document.getElementById('chartViewsOverTime'), {
                type: 'line',
                data: { labels, datasets: [{ label: 'Visualizações', data: values, borderColor: '#2563eb', backgroundColor: 'rgba(37,99,235,0.08)', fill: true }] },
                options: { responsive: true, plugins: { legend: { display: false } } }
            });
        })();

        // By device (usando dados do servidor)
        (function(){
            const data = statsData.byDevice;
            if(!data || Object.keys(data).length === 0) return;
            const labels = Object.keys(data);
            const values = Object.values(data);

            new Chart(document.getElementById('chartByDevice'), {
                type: 'doughnut',
                data: { labels, datasets: [{ data: values, backgroundColor: ['#2563eb','#f59e0b','#10b981','#9ca3af'] }] },
                options: { responsive: true }
            });
        })();

        // Hourly last 24 (usando dados do servidor)
        (function(){
            const data = statsData.hourlyLast24;
            if(!data) return;

            new Chart(document.getElementById('chartHourly24'), {
                type: 'line',
                data: { labels: data.labels, datasets: [{ label: 'Views', data: data.values, borderColor: '#7c3aed', backgroundColor: 'rgba(124,58,237,0.08)', fill: true }] },
                options: { responsive: true, plugins: { legend: { display: false } } }
            });
        })();

        // Top by device with selector (inicial com dados do servidor)
        (function(){
            let currentData = statsData.topPagesByDevice;
            let chart = null;

            function render(data){
                currentData = data;
                const labels = data.map(d=>d.path);
                const values = data.map(d=>d.view_count);

                if(chart) chart.destroy();
                chart = new Chart(document.getElementById('chartTopByDevice'), {
                    type: 'bar',
                    data: { labels, datasets: [{ label: 'Acessos', data: values, backgroundColor: '#f97316' }] },
                    options: { indexAxis: 'y', responsive: true, plugins: { legend: { display: false } }, scales: { x: { beginAtZero: true } } }
                });
            }

            async function load(device){
                const url = '{{ route('admin.api.stats.top_pages_by_device') }}?limit=10' + (device ? '&device='+device : '');
                const data = await fetchJson(url);
                if(!data) return;
                render(data);
            }

            document.getElementById('refreshTopByDevice').addEventListener('click', function(){
                const device = document.getElementById('deviceSelect').value;
                load(device);
            });

            document.getElementById('exportTopByDeviceCsv').addEventListener('click', function(){
                if(!currentData.length) return;
                let csv = 'path,views\n' + currentData.map(d=> `${d.path.replace(/\n/g,' ')},${d.view_count}`).join('\n');
                const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a'); a.href = url; a.download = 'top_pages_by_device.csv'; document.body.appendChild(a); a.click(); a.remove();
            });

            // initial load com dados do servidor
            render(currentData);
        })();

        // Top pages (usando dados do servidor)
        (function(){
            const data = statsData.topPages;
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
                let csv = 'path,views\n' + data.map(d=> `${d.path.replace(/\n/g,' ')},${d.view_count}`).join('\n');
                const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a'); a.href = url; a.download = 'top_pages.csv'; document.body.appendChild(a); a.click(); a.remove();
            });
        })();

        // Totals (usando dados do servidor)
        (function(){
            const data = statsData.totals;
            if(!data) return;
            const labels = ['Users','Noticias','Eventos','Locais','Links','Faqs','Legislações','Membros'];
            const values = [data.users,data.noticias,data.eventos,data.locais,data.links_rapidos,data.faqs,data.legislacoes,data.membros_equipe];

            new Chart(document.getElementById('chartTotals'), {
                type: 'bar',
                data: { labels, datasets: [{ label: 'Totais', data: values, backgroundColor: '#10b981' }] },
                options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
            });
        })();

        // === ANÁLISE DE PÁGINA ESPECÍFICA ===
        let pageViewsChart = null;
        let pageDeviceChart = null;
        let currentPageData = { views: [], devices: {} };

        document.getElementById('loadPageStats').addEventListener('click', loadPageSpecificStats);
        document.getElementById('pagePathInput').addEventListener('keypress', function(e){
            if(e.key === 'Enter') loadPageSpecificStats();
        });
        document.getElementById('useCurrentPage').addEventListener('click', function(){
            const currentPath = window.location.pathname.replace(/^\//, '');
            document.getElementById('pagePathInput').value = currentPath;
            loadPageSpecificStats();
        });

        async function loadPageSpecificStats() {
            const path = document.getElementById('pagePathInput').value.trim();
            if(!path) {
                alert('Digite um caminho de página válido!');
                return;
            }

            // Show loading
            document.getElementById('pageStatsEmpty').innerHTML = '<i class="fas fa-spinner fa-spin text-4xl text-purple-500"></i><p class="mt-3">Carregando dados...</p>';
            document.getElementById('pageStatsContainer').classList.add('hidden');

            try {
                // Fetch data
                const viewsData = await fetchJson('{{ route('admin.api.stats.page_views_over_time') }}?path=' + encodeURIComponent(path) + '&days=30');
                const deviceData = await fetchJson('{{ route('admin.api.stats.page_by_device') }}?path=' + encodeURIComponent(path));

                if(!viewsData && !deviceData) {
                    document.getElementById('pageStatsEmpty').innerHTML = '<i class="fas fa-exclamation-triangle text-4xl text-yellow-500 mb-3"></i><p>Erro ao carregar dados. Verifique o caminho e tente novamente.</p>';
                    return;
                }

                currentPageData = { views: viewsData || [], devices: deviceData || {} };

                // Update UI
                document.getElementById('currentPagePath').textContent = path;
                document.getElementById('pageStatsEmpty').classList.add('hidden');
                document.getElementById('pageStatsContainer').classList.remove('hidden');

                // Draw charts
                drawPageViewsChart(viewsData || []);
                drawPageDeviceChart(deviceData || {});

            } catch(err) {
                console.error(err);
                document.getElementById('pageStatsEmpty').innerHTML = '<i class="fas fa-exclamation-circle text-4xl text-red-500 mb-3"></i><p>Erro ao carregar dados.</p>';
            }
        }

        function drawPageViewsChart(data) {
            const labels = data.map(d => d.date);
            const values = data.map(d => d.views);

            if(pageViewsChart) pageViewsChart.destroy();
            pageViewsChart = new Chart(document.getElementById('chartPageViewsOverTime'), {
                type: 'line',
                data: { 
                    labels, 
                    datasets: [{ 
                        label: 'Views', 
                        data: values, 
                        borderColor: '#9333ea', 
                        backgroundColor: 'rgba(147,51,234,0.1)', 
                        fill: true,
                        tension: 0.4
                    }] 
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: true,
                    plugins: { 
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Visualizações: ' + context.parsed.y;
                                }
                            }
                        }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        }

        function drawPageDeviceChart(data) {
            const labels = Object.keys(data);
            const values = Object.values(data);

            if(!labels.length) {
                document.getElementById('chartPageByDevice').parentElement.innerHTML = '<p class="text-gray-500 text-center py-8">Sem dados de dispositivos para esta página</p>';
                return;
            }

            if(pageDeviceChart) pageDeviceChart.destroy();
            pageDeviceChart = new Chart(document.getElementById('chartPageByDevice'), {
                type: 'doughnut',
                data: { 
                    labels, 
                    datasets: [{ 
                        data: values, 
                        backgroundColor: ['#9333ea','#f59e0b','#10b981','#3b82f6','#ef4444'] 
                    }] 
                },
                options: { 
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { 
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                font: { size: 12 }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                                }
                            }
                        }
                    }
                }
            });
        }

        document.getElementById('exportPageStatsCsv').addEventListener('click', function(){
            const path = document.getElementById('currentPagePath').textContent;
            if(!path) return;

            let csv = 'Análise de Página: ' + path + '\n\n';
            csv += 'Data,Views\n';
            csv += currentPageData.views.map(d => d.date + ',' + d.views).join('\n');
            csv += '\n\nDispositivo,Views\n';
            csv += Object.entries(currentPageData.devices).map(([k,v]) => k + ',' + v).join('\n');

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a'); 
            a.href = url; 
            a.download = 'page_stats_' + path.replace(/\//g, '_') + '.csv'; 
            document.body.appendChild(a); 
            a.click(); 
            a.remove();
        });
    </script>
@endsection
