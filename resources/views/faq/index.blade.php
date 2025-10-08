<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas Frequentes - Portal Oficial</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet">
</head>

<body class="font-inter bg-gray-50 text-gray-800">

@include('layouts.header')

<section class="py-16 md:py-20 bg-white min-h-screen">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-900 mb-3">
                <i class="fas fa-question-circle mr-3"></i>Perguntas Frequentes
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Encontre respostas rápidas para as dúvidas mais comuns sobre nossos serviços.
            </p>
        </div>

        <!-- Busca -->
        <div class="max-w-2xl mx-auto mb-12">
            <div class="relative">
                <input type="text" id="searchFaq" placeholder="Buscar por pergunta ou palavra-chave..."
                    class="w-full px-4 py-3 pl-12 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>

        <div class="max-w-4xl mx-auto">
            @if($faqs->count() > 0)
                <!-- Lista de FAQs -->
                <div class="space-y-4" id="faqContainer">
                    @foreach($faqs as $index => $faq)
                        <div class="bg-white rounded-lg shadow-md border border-gray-200 faq-item">
                            <button class="w-full px-6 py-4 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg faq-button"
                                    onclick="toggleFaq({{ $index }})">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold text-gray-800 pr-4 faq-question">
                                        {{ $faq->pergunta }}
                                    </h3>
                                    <i class="fas fa-chevron-down text-blue-600 transition-transform duration-200 faq-icon" id="icon-{{ $index }}"></i>
                                </div>
                            </button>
                            
                            <div class="faq-answer px-6 pb-6 hidden" id="answer-{{ $index }}">
                                <div class="pt-4 border-t border-gray-200">
                                    <p class="text-gray-700 leading-relaxed">
                                        {!! nl2br(e($faq->resposta)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Mensagem quando não há resultados da busca -->
                <div id="noResults" class="hidden text-center py-12">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">Nenhuma pergunta encontrada com os termos pesquisados.</p>
                    <p class="text-gray-400 text-sm mt-2">Tente usar palavras-chave diferentes ou entre em contato conosco.</p>
                </div>
            @else
                <!-- Quando não há FAQs cadastradas -->
                <div class="text-center py-12">
                    <i class="fas fa-question-circle text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">Nenhuma pergunta frequente cadastrada ainda.</p>
                    <p class="text-gray-400 text-sm mt-2">Entre em contato conosco para esclarecer suas dúvidas.</p>
                </div>
            @endif
        </div>

        <!-- Seção de contato -->
        <div class="max-w-4xl mx-auto mt-12">
            <div class="bg-blue-50 rounded-lg p-8">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold text-blue-900 mb-2">
                        <i class="fas fa-headset mr-2"></i>Não encontrou sua resposta?
                    </h3>
                    <p class="text-gray-600">
                        Nossa equipe está pronta para ajudar você com qualquer dúvida.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <div class="text-blue-600 text-3xl mb-3">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Telefone</h4>
                        <p class="text-gray-600 text-sm mb-3">(43) 3262-1234</p>
                        <p class="text-gray-500 text-xs">Segunda à Sexta<br>8h às 17h</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <div class="text-blue-600 text-3xl mb-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">E-mail</h4>
                        <p class="text-gray-600 text-sm mb-3">contato@prefeitura.gov.br</p>
                        <p class="text-gray-500 text-xs">Resposta em até<br>24 horas úteis</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <div class="text-blue-600 text-3xl mb-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Presencial</h4>
                        <p class="text-gray-600 text-sm mb-3">Protocolo Geral</p>
                        <p class="text-gray-500 text-xs">Segunda à Sexta<br>8h às 17h</p>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('agendamentos.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition-colors">
                        <i class="fas fa-calendar-plus mr-2"></i>
                        Agendar Atendimento
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

<script>
// Função para toggle do FAQ
function toggleFaq(index) {
    const answer = document.getElementById(`answer-${index}`);
    const icon = document.getElementById(`icon-${index}`);
    
    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
    } else {
        answer.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
    }
}

// Função de busca
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchFaq');
    const faqItems = document.querySelectorAll('.faq-item');
    const noResults = document.getElementById('noResults');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            let visibleCount = 0;

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
                
                if (searchTerm === '' || question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Mostrar/ocultar mensagem de "não encontrado"
            if (noResults) {
                if (visibleCount === 0 && searchTerm !== '') {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }
        });
    }
});
</script>

</body>
</html>