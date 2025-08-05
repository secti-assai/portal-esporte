<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Esportes - Secretaria Municipal de Assaí</title>
    <meta name="description" content="Promovendo saúde, bem-estar e integração social através do esporte em nossa cidade">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
    <style>
        :root {
            --primary-red: #dc2626;
            --primary-red-dark: #b91c1c;
            --primary-red-light: #ef4444;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --white: #ffffff;
            --black: #000000;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --radius: 0.5rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--gray-900);
            overflow-x: hidden;
            transition: all 0.3s ease;
        }

        body.dark {
            background-color: var(--gray-900);
            color: var(--white);
        }

        html {
            scroll-behavior: smooth;
        }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        body.dark ::-webkit-scrollbar-track {
            background: var(--gray-800);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gray-400);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gray-500);
        }

        /* Utilitários */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: var(--radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
            color: var(--white);
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--primary-red-light), var(--primary-red));
        }

        .btn-outline {
            background: transparent;
            color: var(--white);
            border: 2px solid var(--white);
        }

        .btn-outline:hover {
            background: var(--white);
            color: var(--gray-900);
            transform: translateY(-2px);
        }

        .btn-ghost {
            background: transparent;
            color: var(--gray-700);
            border: none;
            padding: 0.5rem;
        }

        body.dark .btn-ghost {
            color: var(--gray-300);
        }

        .btn-ghost:hover {
            background: var(--gray-100);
            transform: translateY(-1px);
        }

        body.dark .btn-ghost:hover {
            background: var(--gray-800);
        }

        .card {
            background: var(--white);
            border-radius: calc(var(--radius) * 2);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        body.dark .card {
            background: var(--gray-800);
            border: 1px solid var(--gray-700);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-2xl);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 9999px;
            background: var(--gray-100);
            color: var(--gray-800);
        }

        body.dark .badge {
            background: var(--gray-700);
            color: var(--gray-200);
        }

        .badge-primary {
            background: var(--primary-red);
            color: var(--white);
        }

        .badge-individual {
            background: #3b82f6;
            color: var(--white);
        }

        .badge-coletivo {
            background: #10b981;
            color: var(--white);
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            animation: slideDown 0.6s ease-out;
        }

        body.dark .header {
            background: rgba(17, 24, 39, 0.8);
            border-bottom-color: var(--gray-700);
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4rem;
            gap: 2rem;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .logo {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .brand-text{
            display: flex;
              flex-direction: column;
             gap: 0.05rem;
        }

        .brand-text h1 {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--gray-900);
        }

        body.dark .brand-text h1 {
            color: var(--white);
        }

        .brand-text span {
            font-size: 0.75rem;
            color: var(--gray-600);
        }

        body.dark .brand-text span {
            color: var(--gray-400);
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 2rem;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: var(--gray-700);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--radius);
            transition: all 0.3s ease;
            position: relative;
        }

        body.dark .nav-link {
            color: var(--gray-300);
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-red);
            transform: translateY(-2px);
        }

        body.dark .nav-link:hover,
        body.dark .nav-link.active {
            color: var(--primary-red-light);
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: 2px solid var(--gray-300);
            color: var(--gray-700);
            padding: 0.5rem;
            border-radius: var(--radius);
            cursor: pointer;
            font-size: 1.125rem;
            transition: all 0.3s ease;
        }

        body.dark .mobile-menu-toggle {
            border-color: var(--gray-600);
            color: var(--gray-300);
        }

        .mobile-menu-toggle:hover {
            background: var(--gray-100);
            transform: scale(1.05);
        }

        body.dark .mobile-menu-toggle:hover {
            background: var(--gray-800);
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.7s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transform: scale(1.1);
            transition: transform 0.7s ease;
        }

        .hero-slide.active .hero-bg {
            transform: scale(1);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(220, 38, 38, 0.3) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            max-width: 42rem;
            animation: slideUp 1s ease-out;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 1.5rem;
            line-height: 1.1;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero-controls {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 1rem;
            z-index: 10;
        }

        .hero-indicators {
            display: flex;
            gap: 0.5rem;
        }

        .hero-indicator {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .hero-indicator.active {
            width: 2rem;
            background: var(--white);
        }

        /* Stats Section */
        .stats {
            padding: 5rem 0;
            background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
            color: var(--white);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            text-align: center;
        }

        .stat-item {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .stat-item:nth-child(1) { animation-delay: 0.1s; }
        .stat-item:nth-child(2) { animation-delay: 0.2s; }
        .stat-item:nth-child(3) { animation-delay: 0.3s; }
        .stat-item:nth-child(4) { animation-delay: 0.4s; }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .stat-label {
            font-size: 1.125rem;
            opacity: 0.9;
        }

        /* Scoreboard Section */
        .scoreboard-section {
            background: linear-gradient(135deg, var(--gray-50) 0%, var(--white) 100%);
        }

        body.dark .scoreboard-section {
            background: linear-gradient(135deg, var(--gray-800) 0%, var(--gray-900) 100%);
        }

        .scoreboard-tabs {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .scoreboard-tab {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: calc(var(--radius) * 2);
            color: var(--gray-700);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        body.dark .scoreboard-tab {
            background: var(--gray-800);
            border-color: var(--gray-600);
            color: var(--gray-300);
        }

        .scoreboard-tab:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-red);
        }

        .scoreboard-tab.active {
            background: var(--primary-red);
            border-color: var(--primary-red);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .scoreboard-tab-content {
            display: none;
            animation: fadeInUp 0.5s ease-out;
        }

        .scoreboard-tab-content.active {
            display: block;
        }

        .scoreboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .scoreboard-card {
            background: var(--white);
            border-radius: calc(var(--radius) * 2);
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        body.dark .scoreboard-card {
            background: var(--gray-800);
            border-color: var(--gray-700);
        }

        .scoreboard-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-2xl);
        }

        .scoreboard-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-200);
        }

        body.dark .scoreboard-header {
            border-bottom-color: var(--gray-700);
        }

        .match-info {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .match-category {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--primary-red);
            text-transform: uppercase;
        }

        .match-date {
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        body.dark .match-date {
            color: var(--gray-400);
        }

        .match-status {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-live {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: var(--white);
            animation: pulse 2s infinite;
        }

        .status-finished {
            background: var(--gray-100);
            color: var(--gray-700);
        }

        body.dark .status-finished {
            background: var(--gray-700);
            color: var(--gray-300);
        }

        .status-upcoming {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: var(--white);
        }

        .scoreboard-match {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .team {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
        }

        .team-logo {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.25rem;
            font-weight: 700;
            box-shadow: var(--shadow-md);
        }

        .team-name {
            font-weight: 600;
            color: var(--gray-900);
            text-align: center;
            font-size: 0.875rem;
        }

        body.dark .team-name {
            color: var(--white);
        }

        .score-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            min-width: 4rem;
        }

        .score {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-900);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        body.dark .score {
            color: var(--white);
        }

        .score-separator {
            font-size: 1.5rem;
            color: var(--gray-400);
            font-weight: 300;
        }

        .match-time {
            font-size: 0.875rem;
            color: var(--primary-red);
            font-weight: 600;
            background: rgba(220, 38, 38, 0.1);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
        }

        .match-details {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        body.dark .match-details {
            border-top-color: var(--gray-700);
            color: var(--gray-400);
        }

        .match-location {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .match-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.5rem;
            background: var(--gray-100);
            border: none;
            border-radius: var(--radius);
            color: var(--gray-600);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        body.dark .action-btn {
            background: var(--gray-700);
            color: var(--gray-300);
        }

        .action-btn:hover {
            background: var(--primary-red);
            color: var(--white);
            transform: scale(1.1);
        }

        /* Live indicator animation */
        .live-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .live-dot {
            width: 0.5rem;
            height: 0.5rem;
            background: #ef4444;
            border-radius: 50%;
            animation: livePulse 1.5s infinite;
        }

        @keyframes livePulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(1.2);
            }
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--gray-500);
        }

        body.dark .empty-state {
            color: var(--gray-400);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--gray-700);
        }

        body.dark .empty-state h3 {
            color: var(--gray-300);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .scoreboard-tabs {
                flex-direction: column;
                align-items: center;
            }

            .scoreboard-tab {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .scoreboard-grid {
                grid-template-columns: 1fr;
            }

            .scoreboard-match {
                flex-direction: column;
                gap: 1.5rem;
            }

            .team {
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
            }

            .score-section {
                order: -1;
                flex-direction: row;
                gap: 1rem;
                margin-bottom: 1rem;
            }
        }

        /* Sections */
        .section {
            padding: 5rem 0;
        }

        .instalacoes {
                        background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
                        padding: 5rem 0
                    }

        .section-alt {
            background: var(--gray-50);
        }

        body.dark .section-alt {
            background: var(--gray-800);
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 1rem;
        }

        body.dark .section-title {
            color: var(--white);
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.125rem;
            color: var(--gray-600);
            max-width: 42rem;
            margin: 0 auto 4rem;
        }

        body.dark .section-subtitle {
            color: var(--gray-400);
        }

        /* News Section */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .news-card {
            cursor: pointer;
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .news-card:nth-child(1) { animation-delay: 0.1s; }
        .news-card:nth-child(2) { animation-delay: 0.2s; }
        .news-card:nth-child(3) { animation-delay: 0.3s; }

        .news-image {
            position: relative;
            overflow: hidden;
            height: 12rem;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.1);
        }

        .news-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
        }

        .news-content {
            padding: 1.5rem;
        }

        .news-date {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin-bottom: 0.5rem;
        }

        body.dark .news-date {
            color: var(--gray-400);
        }

        .news-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.75rem;
            transition: color 0.3s ease;
        }

        body.dark .news-title {
            color: var(--white);
        }

        .news-card:hover .news-title {
            color: var(--primary-red);
        }

        .news-excerpt {
            color: var(--gray-600);
            margin-bottom: 1rem;
        }

        body.dark .news-excerpt {
            color: var(--gray-400);
        }

        .news-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        body.dark .news-meta {
            color: var(--gray-400);
        }

        .news-stats {
            display: flex;
            gap: 1rem;
        }

        .news-stat {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* Modalities Section */
        .modalities-filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--primary-red);
            background: transparent;
            color: var(--primary-red);
            border-radius: 9999px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: var(--primary-red);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .modalities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .modality-card {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(135deg, var(--white) 0%, var(--gray-50) 100%);
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        body.dark .modality-card {
            background: linear-gradient(135deg, var(--gray-800) 0%, var(--gray-900) 100%);
        }

        .modality-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .modality-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
        }

        body.dark .modality-title {
            color: var(--white);
        }

        .modality-description {
            color: var(--gray-600);
            margin-bottom: 1.5rem;
        }

        body.dark .modality-description {
            color: var(--gray-400);
        }

        .modality-info {
            display: flex;
            justify-content: center;
            gap: 1rem;
            font-size: 0.875rem;
            color: var(--gray-500);
            margin-bottom: 1rem;
        }

        body.dark .modality-info {
            color: var(--gray-400);
        }

        .modality-info span {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* Events Section */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .event-card {
            padding: 2rem;
            border-left: 4px solid var(--primary-red);
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .event-header {
            display: flex;
            align-items: start;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .event-date-info {
            text-align: right;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        body.dark .event-date-info {
            color: var(--gray-400);
        }

        .event-date-info div {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.25rem;
            margin-bottom: 0.25rem;
        }

        .event-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        body.dark .event-title {
            color: var(--white);
        }

        .event-description {
            color: var(--gray-600);
            margin-bottom: 1rem;
        }

        body.dark .event-description {
            color: var(--gray-400);
        }

        .event-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        body.dark .event-location {
            color: var(--gray-400);
        }

        /* Facilities Section */
        .facilities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .facility-card {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .facility-card:nth-child(1) { animation-delay: 0.1s; }
        .facility-card:nth-child(2) { animation-delay: 0.2s; }
        .facility-card:nth-child(3) { animation-delay: 0.3s; }

        .facility-image {
            position: relative;
            overflow: hidden;
            height: 12rem;
        }

        .facility-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .facility-card:hover .facility-image img {
            transform: scale(1.1);
        }

        .facility-content {
            padding: 2rem;
        }

        .facility-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
        }

        body.dark .facility-title {
            color: var(--white);
        }

        .facility-description {
            color: var(--gray-600);
            margin-bottom: 1.5rem;
        }

        body.dark .facility-description {
            color: var(--gray-400);
        }

        .facility-features {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        /* Contact Section */
        .contact {
            background: linear-gradient(135deg, var(--primary-red), var(--primary-red-dark));
            color: var(--white);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .contact-info {
            animation: slideInLeft 0.8s ease-out;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .contact-icon {
            width: 3rem;
            height: 3rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .contact-details h3 {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .contact-details p {
            opacity: 0.9;
        }

        .contact-form {
            background: var(--white);
            padding: 2rem;
            border-radius: calc(var(--radius) * 2);
            box-shadow: var(--shadow-2xl);
            animation: slideInRight 0.8s ease-out;
        }

        .contact-form h3 {
            color: var(--gray-900);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--gray-700);
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 8rem;
        }

        /* Footer */
        .footer {
            background: var(--gray-900);
            color: var(--white);
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3,
        .footer-section h4 {
            margin-bottom: 1rem;
            color: var(--gray-100);
        }

        .footer-section p {
            opacity: 0.9;
            line-height: 1.6;
            color: var(--gray-300);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: var(--gray-300);
            text-decoration: none;
            opacity: 0.9;
            transition: all 0.3s ease;
        }

        .footer-section ul li a:hover {
            opacity: 1;
            color: var(--primary-red-light);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-red);
            transform: translateY(-2px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-700);
            opacity: 0.8;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: var(--white);
            margin: 2rem;
            padding: 2rem;
            border-radius: calc(var(--radius) * 2);
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            animation: slideIn 0.3s ease;
        }

        body.dark .modal-content {
            background: var(--gray-800);
            color: var(--white);
        }

        .modal-close {
            position: absolute;
            right: 1rem;
            top: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray-500);
            transition: color 0.3s ease;
        }

        .modal-close:hover {
            color: var(--gray-900);
        }

        body.dark .modal-close {
            color: var(--gray-400);
        }

        body.dark .modal-close:hover {
            color: var(--white);
        }

        .modal-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: var(--radius);
            margin-bottom: 1rem;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
        }

        body.dark .modal-title {
            color: var(--white);
        }

        .modal-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        body.dark .modal-meta {
            color: var(--gray-400);
        }

        .modal-content-text {
            color: var(--gray-700);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        body.dark .modal-content-text {
            color: var(--gray-300);
        }

        .modal-actions {
            display: flex;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        body.dark .modal-actions {
            border-top-color: var(--gray-700);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes slideInLeft {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes slideInRight {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translateY(0); }
            40%, 43% { transform: translateY(-10px); }
            70% { transform: translateY(-5px); }
            90% { transform: translateY(-2px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--white);
                flex-direction: column;
                gap: 0;
                padding: 1rem 0;
                box-shadow: var(--shadow-lg);
                transform: translateY(-10px);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            body.dark .navbar-nav {
                background: var(--gray-900);
                border-top: 1px solid var(--gray-700);
            }

            .navbar-nav.show {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .nav-link {
                padding: 1rem 2rem;
                border-bottom: 1px solid var(--gray-100);
            }

            body.dark .nav-link {
                border-bottom-color: var(--gray-800);
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .container {
                padding: 0 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .modalities-filters {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .hero-buttons .btn {
                width: 100%;
            }
        }

        /* Loading Animation */
        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Utility Classes */
        .hidden { display: none !important; }
        .visible { display: block !important; }
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        .mb-0 { margin-bottom: 0; }
        .mb-1 { margin-bottom: 0.25rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 0.75rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mt-4 { margin-top: 1rem; }
        .p-4 { padding: 1rem; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-brand">
                    <div class="logo">
                        <img src="{{ asset('assets/Brasao.png') }}" alt="Brasão de Assaí" class="logo">
                    </div>
                    <div class="brand-text">
                        <h1>Secretaria de Esportes</h1>
                        <span>Assaí - PR</span>
                    </div>
                </div>
                <ul class="navbar-nav" id="navbarNav">
                    <li><a href="#inicio" class="nav-link active">Início</a></li>
                    <li><a href="#noticias" class="nav-link">Notícias</a></li>
                    <li><a href="#modalidades" class="nav-link">Modalidades</a></li>
                    <li><a href="#eventos" class="nav-link">Eventos</a></li>
                    <li><a href="#instalacoes" class="nav-link">Instalações</a></li>
                    <li><a href="#contato" class="nav-link">Contato</a></li>
                </ul>
                <div class="navbar-actions">
                    <button class="btn-ghost" id="themeToggle" title="Alternar tema">
                        <i class="fas fa-moon" id="themeIcon"></i>
                    </button>
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="inicio" class="hero">
        <div class="hero-slide active">
            <div class="hero-bg" style="background-image: url('{{ asset('assets/secretaria.jpg') }}')"></div>
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-slide">
            <div class="hero-bg" style="background-image: url('/placeholder.svg?height=800&width=120')"></div>
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-slide">
            <div class="hero-bg" style="background-image: url('/placeholder.svg?height=800&width=1200')"></div>
            <div class="hero-overlay"></div>
        </div>

        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title" id="heroTitle">Esporte para Todos</h1>
                <p class="hero-subtitle" id="heroSubtitle">Promovendo saúde, bem-estar e integração social através do esporte em nossa cidade</p>
                <div class="hero-buttons">
                    <a href="#modalidades" class="btn btn-primary">
                        <i class="fas fa-running"></i>
                        Conheça as Modalidades
                    </a>
                    <a href="#eventos" class="btn btn-outline">
                        <i class="fas fa-calendar"></i>
                        Próximos Eventos
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-controls">
            <button class="btn-ghost" id="heroPlayPause" title="Play/Pause">
                <i class="fas fa-pause"></i>
            </button>
            <div class="hero-indicators">
                <div class="hero-indicator active" data-slide="0"></div>
                <div class="hero-indicator" data-slide="1"></div>
                <div class="hero-indicator" data-slide="2"></div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number" data-count="600"><span>+</span></div>
                    <div class="stat-label">Atletas Ativos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="stat-number" data-count="12">0</div>
                    <div class="stat-label">Modalidades</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-number" data-count="8">0</div>
                    <div class="stat-label">Instalações</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-number" data-count="25">0</div>
                    <div class="stat-label">Eventos/Ano</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scoreboard Section -->
    <section class="section scoreboard-section">
        <div class="container">
            <h2 class="section-title">Placares e Resultados</h2>
            <p class="section-subtitle">Acompanhe os resultados dos jogos e próximas partidas</p>
            
            <div class="scoreboard-tabs">
                <button class="scoreboard-tab active" data-tab="live">
                    <i class="fas fa-play-circle"></i>
                    Ao Vivo
                </button>
                <button class="scoreboard-tab" data-tab="results">
                    <i class="fas fa-trophy"></i>
                    Resultados
                </button>
                <button class="scoreboard-tab" data-tab="upcoming">
                    <i class="fas fa-calendar-alt"></i>
                    Próximos Jogos
                </button>
            </div>

            <div class="scoreboard-content">
                <!-- Live Games -->
                <div class="scoreboard-tab-content active" id="live">
                    <div class="scoreboard-grid" id="liveGames">
                        <!-- Live games will be populated by JavaScript -->
                    </div>
                </div>

                <!-- Results -->
                <div class="scoreboard-tab-content" id="results">
                    <div class="scoreboard-grid" id="resultsGames">
                        <!-- Results will be populated by JavaScript -->
                    </div>
                </div>

                <!-- Upcoming Games -->
                <div class="scoreboard-tab-content" id="upcoming">
                    <div class="scoreboard-grid" id="upcomingGames">
                        <!-- Upcoming games will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="noticias" class="section section-alt">
        <div class="container">
            <h2 class="section-title">Últimas Notícias</h2>
            <p class="section-subtitle">Fique por dentro de tudo que acontece no mundo dos esportes em nossa cidade</p>
            <div class="news-grid" id="newsGrid">
                <!-- News items will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Modalities Section -->
    <section id="modalidades" class="section">
        <div class="container">
            <h2 class="section-title">Modalidades Esportivas</h2>
            <p class="section-subtitle">Descubra as diversas modalidades esportivas disponíveis em nossa cidade</p>
            
            <div class="modalities-filters">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-filter"></i>
                    Todas
                </button>
                <button class="filter-btn" data-filter="coletivo">
                    <i class="fas fa-users"></i>
                    Coletivo
                </button>
                <button class="filter-btn" data-filter="individual">
                    <i class="fas fa-user"></i>
                    Individual
                </button>
            </div>

            <div class="modalities-grid" id="modalitiesGrid">
                            
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="eventos" class="section section-alt">
        <div class="container">
            <h2 class="section-title">Próximos Eventos</h2>
            <p class="section-subtitle">Não perca os eventos esportivos mais importantes da cidade</p>
            <div class="events-grid" id="eventsGrid">
                <!-- Events will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="instalacoes" class="instalacoes">
        <div class="container">
            <h2 class="section-title">Nossas Instalações</h2>
            <p class="section-subtitle">Conheça nossas modernas instalações esportivas</p>
            <div class="facilities-grid">
                <div class="facility-card card">
                    <div class="facility-image">
                        <img src="/placeholder.svg?height=300&width=400" alt="Ginásio Municipal">
                    </div>
                    <div class="facility-content">
                        <h3 class="facility-title">Ginásio Municipal</h3>
                        <p class="facility-description">Espaço completo para modalidades indoor com capacidade para 500 pessoas</p>
                        <div class="facility-features">
                            <span class="badge">500 lugares</span>
                            <span class="badge">6h às 22h</span>
                            <span class="badge">Ar condicionado</span>
                        </div>
                    </div>
                </div>

                <div class="facility-card card">
                    <div class="facility-image">
                        <img src="/placeholder.svg?height=300&width=400" alt="Piscina Olímpica">
                    </div>
                    <div class="facility-content">
                        <h3 class="facility-title">Piscina Olímpica</h3>
                        <p class="facility-description">Piscina semiolímpica para natação, polo aquático e atividades aquáticas</p>
                        <div class="facility-features">
                            <span class="badge">25m</span>
                            <span class="badge">Aquecida</span>
                            <span class="badge">8 raias</span>
                        </div>
                    </div>
                </div>

                <div class="facility-card card">
                    <div class="facility-image">
                        <img src="/placeholder.svg?height=300&width=400" alt="Campo Municipal">
                    </div>
                    <div class="facility-content">
                        <h3 class="facility-title">Campo Municipal</h3>
                        <p class="facility-description">Campo oficial de futebol com grama sintética e iluminação noturna</p>
                        <div class="facility-features">
                            <span class="badge">Oficial</span>
                            <span class="badge">Iluminado</span>
                            <span class="badge">Grama sintética</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contato" class="section contact" style="display: none;">
        <div class="container">
            <h2 class="section-title">Entre em Contato</h2>
            <p class="section-subtitle">Tem dúvidas ou quer participar de nossas atividades? Entre em contato conosco!</p>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Endereço</h3>
                            <p>Rua dos Esportes, 123 - Centro<br>Assaí - PR, CEP 86220-000</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Telefone</h3>
                            <p>(43) 3262-1234<br>(43) 99999-9999</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Horário de Funcionamento</h3>
                            <p>Segunda a Sexta: 8h às 17h<br>Sábado: 8h às 12h<br>Domingo: Fechado</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Envie sua Mensagem</h3>
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="name">Nome Completo</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Assunto</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <i class="fas fa-paper-plane"></i>
                            Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <div class="logo">
                            <img src="{{ asset('assets/Brasao.png') }}" alt="Brasão de Assaí" class="logo">
                        </div>
                        <div>
                            <h3>Secretaria de Esportes</h3>
                            <p style="font-size: 0.875rem; margin: 0;">Assaí - PR</p>
                        </div>
                    </div>
                    <p>Promovendo o esporte e a qualidade de vida para todos os cidadãos de nossa cidade.</p>
                    <div class="social-links">
                        <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Links Úteis</h4>
                    <ul>
                        <li><a href="#modalidades">Modalidades</a></li>
                        <li><a href="#eventos">Eventos</a></li>
                        <li><a href="#instalacoes">Instalações</a></li>
                        <li><a href="#contato">Contato</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Horários</h4>
                    <ul>
                        <li>Segunda a Sexta: 8h às 17h</li>
                        <li>Sábado: 8h às 12h</li>
                        <li>Domingo: Fechado</li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Contato</h4>
                    <ul>
                        <li><i class="fas fa-phone"></i> (43) 3262-1964</li>
                        <li><i class="fas fa-envelope"></i> esportes@assai.pr.gov.br</li>
                        <li><i class="fas fa-map-marker-alt"></i>  Av. Rio de Janeiro, 720 CEP 86220-000 - Assaí - PR</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Prefeitura Municipal de Assaí. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- News Modal -->
    <div class="modal" id="newsModal">
        <div class="modal-content">
            <button class="modal-close" id="modalClose">
                <i class="fas fa-times"></i>
            </button>
            <div id="modalBody">
                <!-- Modal content will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentSlide = 0;
        let isAutoPlay = true;
        let slideInterval;
        let isDarkMode = false;
        let currentModalityFilter = 'all';

        // Sample data
        const newsData = [
            {
                id: 1,
                title: "Inauguração da Nova Piscina Olímpica",
                date: "15 de Janeiro, 2024",
                image: "/placeholder.svg?height=300&width=400",
                excerpt: "A nova piscina olímpica municipal foi inaugurada com grande festa e já está disponível para a população.",
                content: "A Prefeitura Municipal inaugurou oficialmente a nova piscina olímpica, um investimento de R$ 2 milhões que beneficiará milhares de cidadãos. A instalação conta com 8 raias, sistema de aquecimento e acessibilidade completa. O evento de inauguração contou com a presença do prefeito, vereadores e centenas de munícipes que puderam conhecer de perto a nova estrutura.",
                views: 1250,
                likes: 89,
                category: "Infraestrutura"
            },
            {
                id: 2,
                title: "Campeonato Municipal de Futebol 2024",
                date: "10 de Janeiro, 2024",
                image: "/placeholder.svg?height=300&width=400",
                excerpt: "Inscrições abertas para o maior campeonato de futebol da cidade. Participe e mostre seu talento!",
                content: "As inscrições para o Campeonato Municipal de Futebol 2024 estão abertas até o dia 30 de janeiro. O torneio contará com categorias sub-15, sub-17 e adulto, com premiação total de R$ 15.000. Os jogos serão realizados no Campo Municipal aos finais de semana, com início previsto para fevereiro.",
                views: 2100,
                likes: 156,
                category: "Competições"
            },
            {
                id: 3,
                title: "Programa Esporte na Escola",
                date: "8 de Janeiro, 2024",
                image: "/placeholder.svg?height=300&width=400",
                excerpt: "Novo programa leva atividades esportivas para todas as escolas municipais da cidade.",
                content: "O programa 'Esporte na Escola' foi lançado para promover a prática esportiva entre estudantes de 6 a 14 anos. Serão oferecidas aulas de futebol, vôlei, basquete e atletismo em todas as 25 escolas municipais. O projeto conta com professores especializados e equipamentos novos.",
                views: 890,
                likes: 67,
                category: "Educação"
            }
        ];

        const modalitiesData = [
            {
                id: 1,
                name: "Futebol",
                category: "coletivo",
                icon: "⚽",
                description: "Treinos e campeonatos para todas as idades",
                schedule: "Seg/Qua/Sex",
                age: "6+ anos",
                participantes: "coletivo",
                level: "Iniciante a Avançado"
            },
            {
                id: 2,
                name: "Basquete",
                category: "coletivo",
                icon: "🏀",
                description: "Desenvolvimento técnico e tático do basquetebol",
                schedule: "Ter/Qui",
                age: "8+ anos",
                participantes: "coletivo",
                level: "Iniciante a Avançado"
            },
            {
                id: 3,
                name: "Vôlei",
                category: "coletivo",
                icon: "🏐",
                description: "Vôlei de quadra e vôlei de praia",
                schedule: "Seg/Qua/Sex",
                age: "10+ anos",
                participantes: "coletivo",
                level: "Iniciante a Avançado"
            },
            {
                id: 4,
                name: "Futsal",
                category: "coletivo",
                icon: "⚽",
                description: "Modalidade rápida e dinâmica para todas as idades",
                schedule: "Sáb/Dom",
                age: "7+ anos",
                participantes: "coletivo",
                level: "Iniciante a Avançado"
            },
            {
                id: 5,
                name: "Natação",
                category: "individual",
                icon: "🏊",
                description: "Aulas de natação para iniciantes e avançados",
                schedule: "Diário",
                age: "4+ anos",
                participantes: "individual",
                level: "Todos os níveis"
            },
            {
                id: 6,
                name: "Tênis",
                category: "individual",
                icon: "🎾",
                description: "Aulas de tênis para todos os níveis",
                schedule: "Ter/Qui/Sáb",
                age: "6+ anos",
                participantes: "individual",
                level: "Iniciante a Avançado"
            },
            {
                id: 7,
                name: "Judô",
                category: "individual",
                icon: "🥋",
                description: "Arte marcial que desenvolve disciplina e respeito",
                schedule: "Seg/Qua/Sex",
                age: "5+ anos",
                participantes: "individual",
                level: "Iniciante a Avançado"
            },
            {
                id: 8,
                name: "Atletismo",
                category: "individual",
                icon: "🏃",
                description: "Corrida, saltos e arremessos",
                schedule: "Diário",
                age: "8+ anos",
                participantes: "individual",
                level: "Iniciante a Avançado"
            }
        ];

        const eventsData = [
            {
                id: 1,
                title: "Campeonato de Futebol Sub-15",
                date: "2024-02-25",
                time: "14:00",
                location: "Campo Municipal",
                description: "Final do campeonato municipal de futebol categoria sub-15. Venha torcer pelos nossos jovens talentos!",
                category: "Competição"
            },
            {
                id: 2,
                title: "Torneio de Natação",
                date: "2024-02-28",
                time: "09:00",
                location: "Piscina Olímpica",
                description: "Competição de natação para todas as categorias. Inscrições abertas até 20/02.",
                category: "Competição"
            },
            {
                id: 3,
                title: "Aula Aberta de Judô",
                date: "2024-03-02",
                time: "16:00",
                location: "Ginásio Municipal",
                description: "Demonstração e aula experimental de judô para crianças e adultos interessados.",
                category: "Demonstração"
            },
            {
                id: 4,
                title: "Maratona da Cidade",
                date: "2024-03-15",
                time: "07:00",
                location: "Centro da Cidade",
                description: "5ª edição da Maratona da Cidade com percursos de 5km, 10km e 21km. Inscrições no site oficial.",
                category: "Corrida"
            }
        ];

        const heroSlides = [
            {
                title: "Esporte para Todos",
                subtitle: "Promovendo saúde, bem-estar e integração social através do esporte em nossa cidade",
                cta: "Conheça as Modalidades"
            },
            {
                title: "Nossas Instalações",
                subtitle: "Equipamentos modernos e estrutura de qualidade para sua prática esportiva",
                cta: "Visite Nossas Instalações"
            },
            {
                title: "Eventos e Competições",
                subtitle: "Participe dos maiores eventos esportivos da cidade e mostre seu talento",
                cta: "Ver Calendário"
            }
        ];

        // Scoreboard data
        const scoreboardData = {
            live: [
                {
                    id: 1,
                    category: "Campeonato Municipal",
                    date: "Hoje",
                    time: "45'",
                    status: "live",
                    homeTeam: { name: "Unidos FC", logo: "U", score: 2 },
                    awayTeam: { name: "Esporte Clube", logo: "E", score: 1 },
                    location: "Campo Municipal",
                    details: "2º Tempo"
                },
                {
                    id: 2,
                    category: "Copa da Cidade",
                    date: "Hoje",
                    time: "78'",
                    status: "live",
                    homeTeam: { name: "Atlético Assaí", logo: "A", score: 0 },
                    awayTeam: { name: "Juventude", logo: "J", score: 3 },
                    location: "Ginásio Municipal",
                    details: "2º Tempo"
                }
            ],
            results: [
                {
                    id: 3,
                    category: "Campeonato Municipal",
                    date: "Ontem",
                    time: "Final",
                    status: "finished",
                    homeTeam: { name: "Palmeiras Assaí", logo: "P", score: 4 },
                    awayTeam: { name: "Corinthians", logo: "C", score: 2 },
                    location: "Campo Municipal",
                    details: "Partida encerrada"
                },
                {
                    id: 4,
                    category: "Copa da Cidade",
                    date: "23/01",
                    time: "Final",
                    status: "finished",
                    homeTeam: { name: "São Paulo", logo: "S", score: 1 },
                    awayTeam: { name: "Santos FC", logo: "Sa", score: 1 },
                    location: "Ginásio Municipal",
                    details: "Empate"
                },
                {
                    id: 5,
                    category: "Torneio de Futsal",
                    date: "22/01",
                    time: "Final",
                    status: "finished",
                    homeTeam: { name: "Flamengo", logo: "F", score: 5 },
                    awayTeam: { name: "Vasco", logo: "V", score: 3 },
                    location: "Ginásio Municipal",
                    details: "Partida encerrada"
                }
            ],
            upcoming: [
                {
                    id: 6,
                    category: "Campeonato Municipal",
                    date: "Amanhã",
                    time: "15:00",
                    status: "upcoming",
                    homeTeam: { name: "Botafogo", logo: "B", score: null },
                    awayTeam: { name: "Fluminense", logo: "Fl", score: null },
                    location: "Campo Municipal",
                    details: "Semifinal"
                },
                {
                    id: 7,
                    category: "Copa da Cidade",
                    date: "28/01",
                    time: "16:30",
                    status: "upcoming",
                    homeTeam: { name: "Grêmio", logo: "G", score: null },
                    awayTeam: { name: "Internacional", logo: "I", score: null },
                    location: "Ginásio Municipal",
                    details: "Quartas de final"
                },
                {
                    id: 8,
                    category: "Torneio Juvenil",
                    date: "30/01",
                    time: "14:00",
                    status: "upcoming",
                    homeTeam: { name: "Cruzeiro", logo: "Cr", score: null },
                    awayTeam: { name: "Atlético MG", logo: "At", score: null },
                    location: "Campo Municipal",
                    details: "Final"
                }
            ]
        };

        // Scoreboard functions
        function initializeScoreboard() {
            setupScoreboardTabs();
            renderScoreboardContent('live');
        }

        function setupScoreboardTabs() {
            document.querySelectorAll('.scoreboard-tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabType = tab.dataset.tab;
                    
                    // Update active tab
                    document.querySelectorAll('.scoreboard-tab').forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    
                    // Update content
                    document.querySelectorAll('.scoreboard-tab-content').forEach(content => {
                        content.classList.remove('active');
                    });
                    document.getElementById(tabType).classList.add('active');
                    
                    // Render content
                    renderScoreboardContent(tabType);
                });
            });
        }

        function renderScoreboardContent(type) {
            const container = document.getElementById(`${type}Games`);
            const games = scoreboardData[type];
            
            if (games.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <h3>Nenhum jogo encontrado</h3>
                        <p>Não há jogos ${type === 'live' ? 'ao vivo' : type === 'results' ? 'finalizados' : 'agendados'} no momento.</p>
                    </div>
                `;
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
                            ${game.status === 'live' ? `<div class="live-indicator"><div class="live-dot"></div>AO VIVO</div>` :
                               game.status === 'finished' ? 'ENCERRADO' : 'AGENDADO'}
                        </div>
                    </div>
                    
                    <div class="scoreboard-match">
                        <div class="team">
                            <div class="team-logo">${game.homeTeam.logo}</div>
                            <div class="team-name">${game.homeTeam.name}</div>
                        </div>
                        
                        <div class="score-section">
                            ${game.status === 'upcoming' ?
                                 `<div class="match-time">${game.time}</div>` :
                                `<div class="score">
                                    ${game.homeTeam.score}
                                    <span class="score-separator">×</span>
                                    ${game.awayTeam.score}
                                </div>
                                ${game.status === 'live' ? `<div class="match-time">${game.time}</div>` : ''}`
                            }
                        </div>
                        
                        <div class="team">
                            <div class="team-logo">${game.awayTeam.logo}</div>
                            <div class="team-name">${game.awayTeam.name}</div>
                        </div>
                    </div>
                    
                    <div class="match-details">
                        <div class="match-location">
                            <i class="fas fa-map-marker-alt"></i>
                            ${game.location}
                        </div>
                        <div class="match-actions">
                            <button class="action-btn" title="Compartilhar">
                                <i class="fas fa-share-alt"></i>
                            </button>
                            <button class="action-btn" title="Favoritar">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Update live scores (simulate real-time updates)
        function updateLiveScores() {
            if (document.querySelector('.scoreboard-tab[data-tab="live"].active')) {
                // Simulate score updates for live games
                scoreboardData.live.forEach(game => {
                    if (Math.random() < 0.1) { // 10% chance of score update
                        if (Math.random() < 0.5) {
                            game.homeTeam.score++;
                        } else {
                            game.awayTeam.score++;
                        }
                        
                        // Update time
                        const currentTime = parseInt(game.time);
                        if (currentTime < 90) {
                            game.time = `${currentTime + 1}'`;
                        }
                    }
                });
                
                renderScoreboardContent('live');
            }
        }

        // Start live updates
        setInterval(updateLiveScores, 30000); // Update every 30 seconds

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            initializeApp();
        });

        function initializeApp() {
            setupEventListeners();
            loadInitialData();
            startHeroSlider();
            animateStats();
            setupIntersectionObserver();
            initializeScoreboard();
        }

        // Event Listeners
        function setupEventListeners() {
            // Mobile menu toggle
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const navbarNav = document.getElementById('navbarNav');
            
            mobileMenuToggle.addEventListener('click', () => {
                navbarNav.classList.toggle('show');
                const icon = mobileMenuToggle.querySelector('i');
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            });

            // Navigation links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('href').substring(1);
                    scrollToSection(targetId);
                    
                    // Update active link
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                    
                    // Close mobile menu
                    navbarNav.classList.remove('show');
                    const mobileIcon = mobileMenuToggle.querySelector('i');
                    mobileIcon.classList.add('fa-bars');
                    mobileIcon.classList.remove('fa-times');
                });
            });

            // Theme toggle
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            
            themeToggle.addEventListener('click', () => {
                isDarkMode = !isDarkMode;
                document.body.classList.toggle('dark', isDarkMode);
                themeIcon.classList.toggle('fa-moon', !isDarkMode);
                themeIcon.classList.toggle('fa-sun', isDarkMode);
                localStorage.setItem('darkMode', isDarkMode);
            });

            // Load saved theme
            const savedTheme = localStorage.getItem('darkMode');
            if (savedTheme === 'true') {
                isDarkMode = true;
                document.body.classList.add('dark');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }

            // Hero controls
            const heroPlayPause = document.getElementById('heroPlayPause');
            heroPlayPause.addEventListener('click', () => {
                isAutoPlay = !isAutoPlay;
                const icon = heroPlayPause.querySelector('i');
                icon.classList.toggle('fa-play', !isAutoPlay);
                icon.classList.toggle('fa-pause', isAutoPlay);
                
                if (isAutoPlay) {
                    startHeroSlider();
                } else {
                    clearInterval(slideInterval);
                }
            });

            // Hero indicators
            document.querySelectorAll('.hero-indicator').forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    goToSlide(index);
                });
            });

            // Modality filters
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    currentModalityFilter = btn.dataset.filter;
                    renderModalities();
                });
            });

            // Contact form
            const contactForm = document.getElementById('contactForm');
            contactForm.addEventListener('submit', handleContactForm);

            // Modal
            const modal = document.getElementById('newsModal');
            const modalClose = document.getElementById('modalClose');
            
            modalClose.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Smooth scrolling for hero buttons
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    scrollToSection(targetId);
                });
            });
        }

        // Smooth scrolling function
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const sectionTop = section.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: sectionTop,
                    behavior: 'smooth'
                });
            }
        }

        // Hero slider functions
        function startHeroSlider() {
            if (slideInterval) clearInterval(slideInterval);
            
            slideInterval = setInterval(() => {
                if (isAutoPlay) {
                    nextSlide();
                }
            }, 5000);
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % heroSlides.length;
            updateHeroSlide();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateHeroSlide();
        }

        function updateHeroSlide() {
            // Update slide visibility
            document.querySelectorAll('.hero-slide').forEach((slide, index) => {
                slide.classList.toggle('active', index === currentSlide);
            });

            // Update indicators
            document.querySelectorAll('.hero-indicator').forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });

            // Update content
            const heroTitle = document.getElementById('heroTitle');
            const heroSubtitle = document.getElementById('heroSubtitle');
            
            heroTitle.textContent = heroSlides[currentSlide].title;
            heroSubtitle.textContent = heroSlides[currentSlide].subtitle;
        }

        // Load initial data
        function loadInitialData() {
            renderNews();
            renderModalities();
            renderEvents();
        }

        // News functions
        function renderNews() {
            const newsGrid = document.getElementById('newsGrid');
            
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
                                <span class="news-stat">
                                    <i class="fas fa-eye"></i>
                                    ${news.views}
                                </span>
                                <span class="news-stat">
                                    <i class="fas fa-heart"></i>
                                    ${news.likes}
                                </span>
                            </div>
                            <i class="fas fa-share-alt"></i>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function openNewsModal(newsId) {
            const news = newsData.find(n => n.id === newsId);
            if (!news) return;

            const modalBody = document.getElementById('modalBody');
            modalBody.innerHTML = `
                <img src="${news.image}" alt="${news.title}" class="modal-image">
                <div class="modal-meta">
                    <span>${news.date}</span>
                    <span class="badge badge-primary">${news.category}</span>
                </div>
                <h2 class="modal-title">${news.title}</h2>
                <p class="modal-content-text">${news.content}</p>
                <div class="modal-actions">
                    <button class="btn btn-outline" style="color: var(--gray-700); border-color: var(--gray-300);">
                        <i class="fas fa-heart"></i>
                        ${news.likes}
                    </button>
                    <button class="btn btn-outline" style="color: var(--gray-700); border-color: var(--gray-300);">
                        <i class="fas fa-share-alt"></i>
                        Compartilhar
                    </button>
                </div>
            `;

            document.getElementById('newsModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('newsModal').classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        // Modalities functions
        function renderModalities() {
            const modalitiesGrid = document.getElementById('modalitiesGrid');
            const filteredModalities = currentModalityFilter === 'all' 
                ? modalitiesData 
                : modalitiesData.filter(m => m.category === currentModalityFilter);

            modalitiesGrid.innerHTML = filteredModalities.map((modality, index) => `
    <div class="modality-card card" style="animation-delay: ${index * 0.1}s;">
        <div class="modality-icon">${modality.icon}</div>
        <h3 class="modality-title">${modality.name}</h3>
        <p class="modality-description">${modality.description}</p>
        <div class="modality-info">
            <span>
                <i class="fas fa-calendar"></i>
                ${modality.schedule}
            </span>
            <span>
                <i class="fas fa-users"></i>
                ${modality.age}
            </span>
        </div>
        <div class="badge ${modality.category === 'individual' ? 'badge-individual' : 'badge-coletivo'}">${modality.participantes}</div>
    </div>
`).join('');
        }

        // Events functions
        function renderEvents() {
            const eventsGrid = document.getElementById('eventsGrid');
            
            eventsGrid.innerHTML = eventsData.map((event, index) => {
                const eventDate = new Date(event.date);
                const formattedDate = eventDate.toLocaleDateString('pt-BR', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });

                return `
                    <div class="event-card card" style="animation-delay: ${index * 0.2}s;">
                        <div class="event-header">
                            <div class="badge badge-primary">${event.category}</div>
                            <div class="event-date-info">
                                <div>
                                    <i class="fas fa-calendar"></i>
                                    ${formattedDate}
                                </div>
                                <div>
                                    <i class="fas fa-clock"></i>
                                    ${event.time}
                                </div>
                            </div>
                        </div>
                        <h3 class="event-title">${event.title}</h3>
                        <p class="event-description">${event.description}</p>
                        <div class="event-location">
                            <i class="fas fa-map-marker-alt"></i>
                            ${event.location}
                        </div>
                    </div>
                `;
            }).join('');
        }

        // Stats animation
        function animateStats() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statNumbers = entry.target.querySelectorAll('.stat-number');
                        statNumbers.forEach(statNumber => {
                            const targetValue = parseInt(statNumber.dataset.count);
                            animateNumber(statNumber, 0, targetValue, 2000);
                        });
                        observer.unobserve(entry.target);
                    }
                });
            });

            const statsSection = document.querySelector('.stats');
            if (statsSection) {
                observer.observe(statsSection);
            }
        }

        function animateNumber(element, start, end, duration) {
            const startTime = performance.now();
            
            function updateNumber(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                const current = Math.floor(start + (end - start) * easeOutQuart(progress));
                element.textContent = current;
                
                if (progress < 1) {
                    requestAnimationFrame(updateNumber);
                }
            }
            
            requestAnimationFrame(updateNumber);
        }

        function easeOutQuart(t) {
            return 1 - Math.pow(1 - t, 4);
        }

        // Contact form handling
        function handleContactForm(e) {
            e.preventDefault();
            
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());
            
            // Show loading state
            const submitBtn = e.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
            submitBtn.disabled = true;
            
            // Simulate form submission
            setTimeout(() => {
                alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
                e.target.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        }

        // Intersection Observer for animations
        function setupIntersectionObserver() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Observe animated elements
            document.querySelectorAll('.news-card, .modality-card, .event-card, .facility-card').forEach(el => {
                observer.observe(el);
            });
        }

        // Utility functions
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Handle window resize
        window.addEventListener('resize', debounce(() => {
            // Close mobile menu on resize
            const navbarNav = document.getElementById('navbarNav');
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            
            if (window.innerWidth > 768) {
                navbarNav.classList.remove('show');
                const icon = mobileMenuToggle.querySelector('i');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            }
        }, 250));

        // Handle scroll for header
        let lastScrollTop = 0;
        window.addEventListener('scroll', debounce(() => {
            const header = document.querySelector('.header');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down
                header.style.transform = 'translateY(-100%)';
            } else {
                // Scrolling up
                header.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
        }, 100));

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            // Close modal with Escape key
            if (e.key === 'Escape') {
                closeModal();
            }
            
            // Hero slider navigation with arrow keys
            if (e.key === 'ArrowLeft') {
                currentSlide = currentSlide === 0 ? heroSlides.length - 1 : currentSlide - 1;
                updateHeroSlide();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
            }
        });

        // Service Worker registration (optional)
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('SW registered: ', registration);
                    })
                    .catch(registrationError => {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
    </script>
</body>
</html>
