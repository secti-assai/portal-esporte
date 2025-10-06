document.addEventListener('DOMContentLoaded', function() {
    // Variáveis globais
    let currentSlide = 0;
    let isAutoPlay = true;
    let slideInterval;
    let isDarkMode = false;
    let currentModalityFilter = 'all';

    // Dados de exemplo
    const newsData = [ { id: 1, title: "Inauguração da Nova Piscina Olímpica", date: "15 de Janeiro, 2024", image: "https://placehold.co/400x300/10b981/white?text=Inauguração", excerpt: "A nova piscina olímpica municipal foi inaugurada com grande festa...", content: "A Prefeitura Municipal inaugurou oficialmente a nova piscina olímpica...", views: 1250, likes: 89, category: "Infraestrutura" }, { id: 2, title: "Campeonato Municipal de Futebol 2024", date: "10 de Janeiro, 2024", image: "https://placehold.co/400x300/3b82f6/white?text=Futebol", excerpt: "Inscrições abertas para o maior campeonato de futebol da cidade...", content: "As inscrições para o Campeonato Municipal de Futebol 2024 estão abertas...", views: 2100, likes: 156, category: "Competições" }, { id: 3, title: "Programa Esporte na Escola", date: "8 de Janeiro, 2024", image: "https://placehold.co/400x300/ef4444/white?text=Educação", excerpt: "Novo programa leva atividades esportivas para todas as escolas...", content: "O programa 'Esporte na Escola' foi lançado para promover a prática esportiva...", views: 890, likes: 67, category: "Educação" } ];
    const modalitiesData = [ { id: 1, name: "Futebol", category: "coletivo", icon: "⚽", description: "Treinos e campeonatos para todas as idades", schedule: "Seg/Qua/Sex", age: "6+ anos", participantes: "coletivo" }, { id: 2, name: "Basquete", category: "coletivo", icon: "🏀", description: "Desenvolvimento técnico e tático do basquetebol", schedule: "Ter/Qui", age: "8+ anos", participantes: "coletivo" }, { id: 3, name: "Vôlei", category: "coletivo", icon: "🏐", description: "Vôlei de quadra e vôlei de praia", schedule: "Seg/Qua/Sex", age: "10+ anos", participantes: "coletivo" }, { id: 4, name: "Futsal", category: "coletivo", icon: "⚽", description: "Modalidade rápida e dinâmica para todas as idades", schedule: "Sáb/Dom", age: "7+ anos", participantes: "coletivo" }, { id: 5, name: "Natação", category: "individual", icon: "🏊", description: "Aulas de natação para iniciantes e avançados", schedule: "Diário", age: "4+ anos", participantes: "individual" }, { id: 6, name: "Tênis", category: "individual", icon: "🎾", description: "Aulas de tênis para todos os níveis", schedule: "Ter/Qui/Sáb", age: "6+ anos", participantes: "individual" }, { id: 7, name: "Judô", category: "individual", icon: "🥋", description: "Arte marcial que desenvolve disciplina e respeito", schedule: "Seg/Qua/Sex", age: "5+ anos", participantes: "individual" }, { id: 8, name: "Atletismo", category: "individual", icon: "🏃", description: "Corrida, saltos e arremessos", schedule: "Diário", age: "8+ anos", participantes: "individual" } ];
    const eventsData = [ { id: 1, title: "Campeonato de Futebol Sub-15", date: "2025-02-25", time: "14:00", location: "Campo Municipal", description: "Final do campeonato municipal...", category: "Competição" }, { id: 2, title: "Torneio de Natação", date: "2025-02-28", time: "09:00", location: "Piscina Olímpica", description: "Competição de natação para todas as categorias...", category: "Competição" }, { id: 3, title: "Aula Aberta de Judô", date: "2025-03-02", time: "16:00", location: "Ginásio Municipal", description: "Demonstração e aula experimental...", category: "Demonstração" }, { id: 4, title: "Maratona da Cidade", date: "2026-03-15", time: "07:00", location: "Centro da Cidade", description: "5ª edição da Maratona da Cidade com percursos de 5km, 10km e 21km.", category: "Corrida" } ];
    const heroSlides = [ { title: "Esporte para Todos", subtitle: "Promovendo saúde, bem-estar e integração social" }, { title: "Nossas Instalações", subtitle: "Estrutura de qualidade para sua prática esportiva" }, { title: "Eventos e Competições", subtitle: "Participe dos maiores eventos esportivos da cidade" } ];
    const scoreboardData = { live: [ { id: 1, category: "Campeonato Municipal", date: "Hoje", time: "45'", status: "live", homeTeam: { name: "Unidos FC", logo: "U", score: 2 }, awayTeam: { name: "Esporte Clube", logo: "E", score: 1 }, location: "Campo Municipal" } ], results: [ { id: 3, category: "Campeonato Municipal", date: "Ontem", time: "Final", status: "finished", homeTeam: { name: "Palmeiras Assaí", logo: `<img src="assets/palmeiras.webp" style="width:100%; height:100%; object-fit: cover;">`, score: 4 }, awayTeam: { name: "Corinthians", logo: `<img src="assets/corinthians.png" style="width:100%; height:100%; object-fit: cover;">`, score: 2 }, location: "Campo Municipal" } ], upcoming: [ { id: 6, category: "Campeonato Municipal", date: "Amanhã", time: "15:00", status: "upcoming", homeTeam: { name: "Botafogo", logo: `<img src="assets/botafogo.png" style="width:100%; height:100%; object-fit: cover; filter: invert(1);">`, score: null }, awayTeam: { name: "Fluminense", logo: "Fl", score: null }, location: "Campo Municipal" }, { id: 7, category: "Copa da Cidade", date: "28/10", time: "16:30", status: "upcoming", homeTeam: { name: "Grêmio", logo: `<img src="assets/Gremio.webp" style="width:100%; height:100%; object-fit: cover;">`, score: null }, awayTeam: { name: "Internacional", logo: "I", score: null }, location: "Ginásio Municipal" } ] };

    // --- INICIALIZAÇÃO ---
    initializeApp();

    function initializeApp() {
        setupEventListeners();
        loadInitialData();
        startHeroSlider();
        animateStatsOnScroll();
        setupIntersectionObserver();
        initializeScoreboard();
    }

    // --- EVENT LISTENERS ---
    function setupEventListeners() {
        // Scroll suave e fechar menu ao clicar no link
        document.querySelectorAll('.nav-link, a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    scrollToSection(href.substring(1));
                     if (anchor.classList.contains('nav-link')) {
                        document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                        this.classList.add('active');
                        // Fecha o menu do Bootstrap programaticamente após o clique
                        const menu = document.getElementById('menuPrincipal');
                        if (menu && menu.classList.contains('show')) {
                            const bsCollapse = bootstrap.Collapse.getInstance(menu) || new bootstrap.Collapse(menu);
                            bsCollapse.hide();
                        }
                    }
                }
            });
        });

        // Toggle de tema escuro (se existir)
        const themeToggle = document.getElementById('themeToggle');
        if (themeToggle) {
            const themeIcon = document.getElementById('themeIcon');
            themeToggle.addEventListener('click', () => {
                isDarkMode = !isDarkMode;
                document.body.classList.toggle('dark', isDarkMode);
                themeIcon.classList.toggle('fa-moon', !isDarkMode);
                themeIcon.classList.toggle('fa-sun', isDarkMode);
                localStorage.setItem('darkMode', isDarkMode);
            });
            const savedTheme = localStorage.getItem('darkMode');
            if (savedTheme === 'true') {
                isDarkMode = true;
                document.body.classList.add('dark');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
        }

        // Controles do Hero Slider
        const heroPlayPause = document.getElementById('heroPlayPause');
        if (heroPlayPause) {
            heroPlayPause.addEventListener('click', () => {
                isAutoPlay = !isAutoPlay;
                const icon = heroPlayPause.querySelector('i');
                icon.classList.toggle('fa-play', !isAutoPlay);
                icon.classList.toggle('fa-pause', isAutoPlay);
                isAutoPlay ? startHeroSlider() : clearInterval(slideInterval);
            });
        }

        document.querySelectorAll('.hero-indicator').forEach((indicator, index) => {
            indicator.addEventListener('click', () => goToSlide(index));
        });

        // Filtros de modalidades
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                currentModalityFilter = btn.dataset.filter;
                renderModalities();
            });
        });

        // Modal de notícias
        const modal = document.getElementById('newsModal');
        const modalClose = document.getElementById('modalClose');
        if (modal && modalClose) {
            modalClose.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });
        }
        
        // CÓDIGO DE SCROLL DO HEADER FOI REMOVIDO DAQUI
    }

    // --- CORE FUNCTIONS ---
    function loadInitialData() {
        if (document.getElementById('newsGrid')) renderNews();
        if (document.getElementById('modalitiesGrid')) renderModalities();
        if (document.getElementById('eventsGrid')) renderEvents();
    }

    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            const headerHeight = document.querySelector('.main-header')?.offsetHeight || 74;
            const sectionTop = section.offsetTop - headerHeight;
            window.scrollTo({ top: sectionTop, behavior: 'smooth' });
        }
    }

    // --- HERO SLIDER ---
    function startHeroSlider() {
        if (document.querySelectorAll('.hero-slide').length <= 1) return;
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = setInterval(() => { if (isAutoPlay) nextSlide(); }, 5000);
    }

    function nextSlide() {
        const totalSlides = document.querySelectorAll('.hero-slide').length;
        goToSlide((currentSlide + 1) % totalSlides);
    }

    function goToSlide(index) {
        currentSlide = index;
        updateHeroSlide();
    }

    function updateHeroSlide() {
        document.querySelectorAll('.hero-slide').forEach((slide, idx) => slide.classList.toggle('active', idx === currentSlide));
        document.querySelectorAll('.hero-indicator').forEach((indicator, idx) => indicator.classList.toggle('active', idx === currentSlide));
        
        const heroTitle = document.getElementById('heroTitle');
        const heroSubtitle = document.getElementById('heroSubtitle');
        if (heroTitle && heroSubtitle && heroSlides[currentSlide]) {
            heroTitle.textContent = heroSlides[currentSlide].title;
            heroSubtitle.textContent = heroSlides[currentSlide].subtitle;
        }
    }

    // --- SCOREBOARD ---
    function initializeScoreboard() {
        if (!document.querySelector('.scoreboard-section')) return;
        setupScoreboardTabs();
        renderScoreboardContent('live');
        setInterval(updateLiveScores, 15000);
    }
    
    function setupScoreboardTabs() {
        document.querySelectorAll('.scoreboard-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                const tabType = tab.dataset.tab;
                document.querySelectorAll('.scoreboard-tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                document.querySelectorAll('.scoreboard-tab-content').forEach(content => content.classList.remove('active'));
                document.getElementById(tabType)?.classList.add('active');
                renderScoreboardContent(tabType);
            });
        });
    }

    function renderScoreboardContent(type) {
        const container = document.getElementById(`${type}Games`);
        if (!container) return;
        const games = scoreboardData[type] || [];
        if (games.length === 0) {
            container.innerHTML = `<div class="empty-state"><i class="fas fa-calendar-times"></i><h3>Nenhum jogo encontrado</h3><p>Não há jogos nesta categoria no momento.</p></div>`;
            return;
        }
        container.innerHTML = games.map((game, index) => `
            <div class="scoreboard-card" style="animation-delay: ${index * 0.1}s;">
                <div class="scoreboard-header">
                    <div class="match-info">
                        <div class="match-category">${game.category}</div>
                        <div class="match-date">${game.date}</div>
                    </div>
                    <div class="match-status status-${game.status}">
                        ${game.status === 'live' ? `<div class="live-indicator"><div class="live-dot"></div>AO VIVO</div>` : game.status === 'finished' ? 'ENCERRADO' : 'AGENDADO'}
                    </div>
                </div>
                <div class="scoreboard-match">
                    <div class="team"><div class="team-logo" style="padding: ${game.homeTeam.logo.includes('img') ? '0' : 'inherit'}; overflow: hidden;">${game.homeTeam.logo}</div><div class="team-name">${game.homeTeam.name}</div></div>
                    <div class="score-section">
                        ${game.status === 'upcoming' ? `<div class="match-time">${game.time}</div>` : `<div class="score">${game.homeTeam.score} <span class="score-separator">×</span> ${game.awayTeam.score}</div>`}
                        ${game.status === 'live' ? `<div class="match-time">${game.time}</div>` : ''}
                    </div>
                    <div class="team"><div class="team-logo" style="padding: ${game.awayTeam.logo.includes('img') ? '0' : 'inherit'}; overflow: hidden;">${game.awayTeam.logo}</div><div class="team-name">${game.awayTeam.name}</div></div>
                </div>
                <div class="match-details"><div class="match-location"><i class="fas fa-map-marker-alt"></i> ${game.location}</div></div>
            </div>`).join('');
    }

    function updateLiveScores() {
        if (document.querySelector('.scoreboard-tab[data-tab="live"].active')) {
            scoreboardData.live.forEach(game => {
                if (Math.random() < 0.2) { 
                    Math.random() < 0.5 ? game.homeTeam.score++ : game.awayTeam.score++;
                    const currentTime = parseInt(game.time);
                    if (currentTime < 90) game.time = `${currentTime + 1}'`;
                }
            });
            renderScoreboardContent('live');
        }
    }

    // --- DYNAMIC CONTENT RENDERING ---
    function renderNews() {
        const newsGrid = document.getElementById('newsGrid');
        if (!newsGrid) return;
        newsGrid.innerHTML = newsData.map(news => `
            <div class="news-card card" onclick="openNewsModal(${news.id})">
                <div class="news-image">
                    <img src="${news.image}" alt="${news.title}" loading="lazy">
                    <div class="news-badge badge badge-primary">${news.category}</div>
                </div>
                <div class="news-content">
                    <div class="news-date">${news.date}</div>
                    <h3 class="news-title">${news.title}</h3>
                    <p class="news-excerpt">${news.excerpt}</p>
                    <div class="news-meta">
                        <div class="news-stats">
                            <span class="news-stat"><i class="fas fa-eye"></i> ${news.views}</span>
                            <span class="news-stat"><i class="fas fa-heart"></i> ${news.likes}</span>
                        </div>
                    </div>
                </div>
            </div>`).join('');
    }
    
    window.openNewsModal = function(newsId) {
        const news = newsData.find(n => n.id === newsId);
        if (!news) return;
        const modalBody = document.getElementById('modalBody');
        modalBody.innerHTML = `
            <img src="${news.image}" alt="${news.title}" class="modal-image">
            <div class="modal-meta"><span>${news.date}</span><span class="badge badge-primary">${news.category}</span></div>
            <h2 class="modal-title">${news.title}</h2>
            <p class="modal-content-text">${news.content}</p>
            <div class="modal-actions">
                <button class="btn btn-outline" style="color: var(--gray-700); border-color: var(--gray-300);"><i class="fas fa-heart"></i> ${news.likes}</button>
                <button class="btn btn-outline" style="color: var(--gray-700); border-color: var(--gray-300);"><i class="fas fa-share-alt"></i> Compartilhar</button>
            </div>`;
        document.getElementById('newsModal').classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('newsModal')?.classList.remove('show');
        document.body.style.overflow = 'auto';
    }

    function renderModalities() {
        const grid = document.getElementById('modalitiesGrid');
        if (!grid) return;
        const filtered = currentModalityFilter === 'all' ? modalitiesData : modalitiesData.filter(m => m.category === currentModalityFilter);
        grid.innerHTML = filtered.map((mod, index) => `
            <div class="modality-card card" style="animation-delay: ${index * 0.1}s;">
                <div class="modality-icon">${mod.icon}</div>
                <h3 class="modality-title">${mod.name}</h3>
                <p class="modality-description">${mod.description}</p>
                <div class="modality-info">
                    <span><i class="fas fa-calendar"></i> ${mod.schedule}</span>
                    <span><i class="fas fa-users"></i> ${mod.age}</span>
                </div>
                <div class="badge ${mod.category === 'individual' ? 'badge-individual' : 'badge-coletivo'}">${mod.participantes}</div>
            </div>`).join('');
    }

    function renderEvents() {
        const grid = document.getElementById('eventsGrid');
        if (!grid) return;
        grid.innerHTML = eventsData.map((event, index) => `
            <div class="event-card card" style="animation-delay: ${index * 0.2}s;">
                <div class="event-header">
                    <div class="badge badge-primary">${event.category}</div>
                    <div class="event-date-info">
                        <div><i class="fas fa-calendar"></i> ${new Date(event.date).toLocaleDateString('pt-BR', {timeZone: 'UTC'})}</div>
                        <div><i class="fas fa-clock"></i> ${event.time}</div>
                    </div>
                </div>
                <h3 class="event-title">${event.title}</h3>
                <p class="event-description">${event.description}</p>
                <div class="event-location"><i class="fas fa-map-marker-alt"></i> ${event.location}</div>
            </div>`).join('');
    }
    
    // --- ANIMATIONS ---
    function animateStatsOnScroll() {
        const statsSection = document.querySelector('.stats');
        if (!statsSection) return;
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelectorAll('.stat-number').forEach(statNumber => {
                        const targetValue = parseInt(statNumber.dataset.count);
                        animateNumber(statNumber, 0, targetValue, 2000);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        observer.observe(statsSection);
    }
    
    function animateNumber(element, start, end, duration) {
        const startTime = performance.now();
        const update = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const value = Math.floor(start + (end - start) * (1 - Math.pow(1 - progress, 4))); // easeOutQuart
            element.textContent = value;
            if (progress < 1) requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    }
    
    function setupIntersectionObserver() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        document.querySelectorAll('.news-card, .modality-card, .event-card, .facility-card').forEach(el => observer.observe(el));
    }

    // --- UTILITIES ---
    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }
});