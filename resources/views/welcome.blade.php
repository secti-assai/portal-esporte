<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Esportes - Prefeitura Municipal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<style>
    /* Reset and Base Styles */
    root {
        --primary-color: #760e0eff;
        --secondary-color: #470202ff;
        --tertiary-color: #790d0d;
        --quaternary-color: #8e0c0c;
    }
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: #333;
    overflow-x: hidden;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header Styles */
.header {
    background-color: #760e0eff;
    color: white;
    padding: 1rem 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-brand {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.brand-text h1 {
    font-size: 1.5rem;
    font-weight: 700;
}

.brand-text span {
    font-size: 0.9rem;
    opacity: 0.9;
}

.nav-menu ul {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.nav-link {
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: 0.5rem 1rem;
    border-radius: 5px;
}

.nav-link:hover,
.nav-link.active {
    background-color: #470202ff
    transform: translateY(-2px);
}

.mobile-menu-btn {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
}

/* Hero Section */
.hero {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.93) 20%, #b71c1c 80%);
    padding: 120px 0 80px;
    display: flex;
    align-items: center;
    min-height: 80vh;
    position: relative;
    overflow: hidden;
}
.hero::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 0;
    backdrop-filter: blur(100px);
    -webkit-backdrop-filter: blur(100px);
    pointer-events: none;
}
.hero > * {
    position: relative;
    z-index: 1;
}

.hero-content {
    flex: 1;
    padding: 0 20px;
}

.hero-content h2 {
    font-size: 3.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.hero-content p {
    font-size: 1.2rem;
    color: #fff;
    margin-bottom: 2rem;
    max-width: 500px;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.hero-image {
    flex: 1;
    text-align: center;
}

.hero-image img {
    max-width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

/* Button Styles */
.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
}

.btn-primary {
    background-color: #760e0eff;
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(44, 85, 48, 0.3);
}

.btn-secondary {
    background: transparent;
    color: black;
    border: 2px solid #790d0d;
}

.btn-secondary:hover {
    background: #790d0d;
    color: white;
    transform: translateY(-2px);
}

.btn-outline {
    background: transparent;
    color: #4a7c59;
    border: 2px solid #4a7c59;
}

.btn-outline:hover {
    background: #4a7c59;
    color: white;
}

/* Stats Section */
.stats {
    background: #790d0d;
    color: white;
    padding: 60px 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    text-align: center;
}

.stat-item i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #fff;
}

.stat-item h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-item p {
    font-size: 1.1rem;
    opacity: 0.9;
}

/* Section Styles */
section {
    padding: 80px 0;
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 700;
    color: black;
    margin-bottom: 3rem;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, #2c5530, #4a7c59);
    border-radius: 2px;
}

/* News Section */
.news {
    background: #f8f9fa;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.news-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    cursor: pointer;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.news-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.news-card-content {
    padding: 1.5rem;
}

.news-card h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2c5530;
    margin-bottom: 0.5rem;
}

.news-card .date {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.news-card p {
    color: #666;
    line-height: 1.6;
}

/* Modalities Section */
.modalities-filter {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 10px 20px;
    border: 2px solid #790d0d;
    background: transparent;
    color: #790d0d;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
}

.filter-btn.active,
.filter-btn:hover {
    background: #790d0d;
    color: white;
}

.modalities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.modality-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.modality-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.modality-card i {
    font-size: 3rem;
    color: #790d0d;
    margin-bottom: 1rem;
}

.modality-card h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #790d0d;
    margin-bottom: 1rem;
}

.modality-card p {
    color: #666;
    margin-bottom: 1.5rem;
}

.modality-info {
    display: flex;
    justify-content: space-between;
    font-size: 0.9rem;
    color: #666;
}

.modality-location {
    margin-top: 1rem;
    color: #790d0d;
    font-size: 0.95rem;
}

/* Events Section */
.events {
    background: #f8f9fa;
}

.events-calendar {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 3rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.calendar-header h3 {
    font-size: 1.5rem;
    color: #790d0d;
}

.calendar-nav {
    background: #790d0d;
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.calendar-nav:hover {
    background: #790d0d;
    transform: scale(1.1);
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 1px;
    background: #e9ecef;
    border-radius: 10px;
    overflow: hidden;
}

.calendar-day {
    background: white;
    padding: 1rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    min-height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.calendar-day:hover {
    background: #f8f9fa;
}

.calendar-day.has-event {
    background: #e8f5e8;
    color: #790d0d;
    font-weight: 600;
}

.calendar-day.other-month {
    color: #ccc;
}

.events-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.event-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-left: 5px solid #790d0d;
}

.event-date {
    color: #790d0d;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.event-card h3 {
    color: #790d0d;
    margin-bottom: 1rem;
}

.event-card p {
    color: #666;
    margin-bottom: 1rem;
}

.event-location {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #666;
    font-size: 0.9rem;
}

/* Facilities Section */
.facilities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.facility-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.facility-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.facility-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.facility-info {
    padding: 2rem;
}

.facility-info h3 {
    font-size: 1.5rem;
    color: #790d0d;
    margin-bottom: 1rem;
}

.facility-info p {
    color: #666;
    margin-bottom: 1.5rem;
}

.facility-features {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.facility-features span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #790d0d;
    font-size: 0.9rem;
    font-weight: 500;
}

/* Contact Section */
.contact {
    background: #f8f9fa;
}

.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
}

.contact-info h3 {
    color: #790d0d;
    font-size: 1.5rem;
    margin-bottom: 2rem;
}

.contact-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.contact-item i {
    color: #790d0d;
    font-size: 1.2rem;
    margin-top: 0.2rem;
}

.contact-item strong {
    color: #790d0d;
    display: block;
    margin-bottom: 0.5rem;
}

.contact-form {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #2c5530;
    font-weight: 500;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #4a7c59;
    box-shadow: 0 0 0 3px rgba(74, 124, 89, 0.1);
}

/* Footer */
.footer {
    background: #790d0d;
    color: white;
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
    color: #f8f9fa;
}

.footer-section p {
    opacity: 0.9;
    line-height: 1.6;
}

.footer-section ul {
    list-style: none;
}

.footer-section ul li {
    margin-bottom: 0.5rem;
}

.footer-section ul li a {
    color: white;
    text-decoration: none;
    opacity: 0.9;
    transition: all 0.3s ease;
}

.footer-section ul li a:hover {
    opacity: 1;
    color: #90c695;
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
    width: 40px;
    height: 40px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: #90c695;
    transform: translateY(-2px);
}

.footer-bottom {
    text-align: center;
    padding-top: 2rem;
    border-top: 1px solid rgba(255,255,255,0.1);
    opacity: 0.8;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 2000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.8);
    animation: fadeIn 0.3s ease;
}

.modal-content {
    background: white;
    margin: 5% auto;
    padding: 2rem;
    border-radius: 15px;
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
    position: relative;
    animation: slideIn 0.3s ease;
}

.close {
    position: absolute;
    right: 1rem;
    top: 1rem;
    font-size: 2rem;
    cursor: pointer;
    color: #666;
    transition: color 0.3s ease;
}

.close:hover {
    color: #2c5530;
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

@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .mobile-menu-btn {
        display: block;
    }
    
    .nav-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #2c5530;
        padding: 1rem 0;
    }
    
    .nav-menu.active {
        display: block;
    }
    
    .nav-menu ul {
        flex-direction: column;
        gap: 0;
    }
    
    .nav-link {
        display: block;
        padding: 1rem 2rem;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .hero {
        flex-direction: column;
        text-align: center;
        padding: 100px 0 60px;
    }
    
    .hero-content h2 {
        font-size: 2.5rem;
    }
    
    .hero-buttons {
        justify-content: center;
    }
    
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .calendar-day {
        min-height: 40px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .hero-content h2 {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .modalities-filter {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}

/* Header */
    .main-header {
      background-color: #760e0eff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      z-index: 1000;
      position: sticky;
      top: 0;
      width: 100%;
    }

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 0;
      gap: 30px;
      position: relative;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-shrink: 0;
    }

    .logo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: 2px solid #fff;
    }

    .brand-text h1 {
      color: white;
      font-size: 20px;
      font-weight: 700;
      margin: 0;
      line-height: 1.2;
    }

    .brand-text span {
      color: white;
      font-size: 14px;
      font-weight: 500;
    }

    .navbar-nav {
      display: flex;
      list-style: none;
      gap: 8px;
      margin: 0;
      padding: 0;
      flex: 1;
      justify-content: center;
      transition: max-height 0.3s;
    }

    .navbar-nav .nav-link {
      display: block;
      color: rgba(255, 255, 255, 0.9);
      text-decoration: none;
      font-weight: 600;
      padding: 12px 20px;
      border-radius: 8px;
      transition: background 0.2s, color 0.2s, transform 0.2s;
      font-size: 15px;
      position: relative;
      white-space: nowrap;
    }

    .navbar-nav .nav-link:hover {
      color: white;
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateY(-2px);
    }

    .navbar-nav .nav-link.active {
      color: white;
      background-color: #760e0eff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .navbar-nav .nav-link.active:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .navbar-actions {
      display: flex;
      align-items: center;
      gap: 15px;
      flex-shrink: 0;
    }

    .navbar-actions .btn {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
      padding: 10px 16px;
      background-color: white;
      color: #760e0eff;
      border: none;
      font-weight: 600;
    }

    .navbar-actions .btn:hover {
      background-color: #65a30d;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .mobile-menu-toggle {
      display: none;
      background: none;
      border: 2px solid white;
      color: white;
      padding: 8px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 18px;
      transition: background 0.2s, color 0.2s;
      position: relative;
      z-index: 1100;
    }
    .mobile-menu-toggle .hamburger {
      display: inline-block;
      width: 28px;
      height: 22px;
      position: relative;
    }
    .mobile-menu-toggle .hamburger span {
      display: block;
      height: 4px;
      width: 100%;
      background: white;
      border-radius: 2px;
      margin-bottom: 5px;
      transition: 0.3s;
    }
    .mobile-menu-toggle .hamburger span:last-child {
      margin-bottom: 0;
    }
    @media (max-width: 900px) {
  .container {
    padding: 0 10px;
  }
}
@media (max-width: 900px) {
  .hero-content h2 { font-size: 2.2rem; }
}
@media (max-width: 700px) {
  .navbar {
    flex-wrap: wrap;
    gap: 0;
  }
  .navbar-brand {
    gap: 8px;
  }
  .navbar-nav {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #760e0eff;
    flex-direction: column;
    align-items: flex-start;
    gap: 0;
    width: 100%;
    padding: 0;
    max-height: 0;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    z-index: 1001;
    transition: max-height 0.3s;
  }
  .navbar-nav.open {
    max-height: 400px;
    padding: 10px 0;
  }
  .navbar-nav .nav-link {
    width: 100%;
    padding: 14px 24px;
    border-radius: 0;
    border-bottom: 1px solid rgba(255,255,255,0.07);
  }
  .navbar-actions {
    gap: 8px;
  }
  .mobile-menu-toggle {
    display: block;
  }
  .hero {
    flex-direction: column;
    text-align: center;
    padding: 80px 0 40px;
  }
  .hero-image {
    margin-bottom: 20px;
    width: 100%;
    justify-content: center;
  }
  .hero-image img {
    max-width: 95%;
  }
  .hero-content {
    padding: 0 8px;
  }
  .hero-buttons {
    flex-direction: column;
    gap: 10px;
    align-items: center;
  }
  .scoreboard {
    min-width: unset !important;
    width: 100% !important;
    flex-direction: column !important;
    align-items: center !important;
    gap: 1rem !important;
    padding: 1.2rem !important;
  }
  .scoreboard img {
    width: 48px !important;
    height: 48px !important;
  }
  .scoreboard > div[style*="font-size:2.5rem"] {
    font-size: 2rem !important;
    margin: 0.5rem 0 !important;
  }
}
@media (max-width: 480px) {
  .container {
    padding: 0 4px;
  }
  .hero-content h2 { font-size: 1.3rem; }
  .hero-content p { font-size: 1rem; }
  .scoreboard {
    padding: 0.8rem !important;
  }
  .scoreboard img {
    width: 38px !important;
    height: 38px !important;
  }
  .scoreboard > div[style*="font-size:2.5rem"] {
    font-size: 1.3rem !important;
  }
}
/* ...existing code... */
</style>
<body>
    <!-- Header -->
<header class="main-header">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-brand">
                <img src="{{ asset('assets/Brasao.png') }}" alt="Brasão de Assaí" class="logo">
                <div class="brand-text">
                    <h1>Secretaria de Esportes</h1>
                    <span>Assaí - PR</span>
                </div>
            </div>
            <ul class="navbar-nav" id="mainNav">
                <li><a href="#home" class="nav-link active">Início</a></li>
                <li><a href="#news" class="nav-link">Notícias</a></li>
                <li><a href="#about" class="nav-link">Serviços</a></li>
                <li><a href="#programs" class="nav-link">Calendário</a></li>
                <li><a href="#transparency" class="nav-link">Transparência</a></li>
                <li><a href="#contact" class="nav-link">Contato</a></li>
            </ul>
            <div class="navbar-actions">
                <button class="mobile-menu-toggle" aria-label="Menu mobile" id="menuToggleBtn">
                    <span class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section id="inicio" class="hero">
    <div class="hero-image" style="text-align:center;display:flex;align-items:center;justify-content:center;flex:1;min-width:0;">
        <!-- Imagem ilustrativa adicionada ao hero -->
        <img src="/assets/secretaria.jpg" alt="Esportistas em ação" style="max-width:80%;height:auto;border-radius:15px;box-shadow:0 20px 40px rgba(0,0,0,0.1);">
    </div>
    <div class="hero-content">
        <h2>Esporte para Todos</h2>
        <p>Promovendo saúde, bem-estar e integração social através do esporte em nossa cidade</p>
        <div class="hero-buttons">
            <button class="btn btn-primary" onclick="scrollToSection('modalidades')">
                <i class="fas fa-running"></i>
                Conheça as Modalidades
            </button>
            <button class="btn btn-secondary" onclick="scrollToSection('eventos')">
                <i class="fas fa-calendar"></i>
                Próximos Eventos
            </button>
        </div>
    </div>
</section>

    <!-- Stats Section -->
    <section class="stats" style="background:#790d0d;padding:60px 0;">
    <div class="container">
        <div style="display:flex;flex-wrap:wrap;gap:3rem;justify-content:center;">
            <!-- Placar 1 -->
            <div class="scoreboard" style="background:white;border-radius:15px;box-shadow:0 10px 30px rgba(0,0,0,0.1);padding:2rem;min-width:300px;display:flex;align-items:center;gap:2rem;">
                <div style="text-align:center;">
                    <img src="/assets/palmeiras.webp" alt="Time A" style="width:60px;height:60px;border-radius:50%;margin-bottom:0.5rem;">
                    <div style="font-weight:600;color:#790d0d;">Assaí FC</div>
                </div>
                <div style="font-size:2.5rem;font-weight:700;color:#790d0d;">2 <span style="color:#333;">x</span> 1</div>
                <div style="text-align:center;">
                    <img src="/assets/corinthians.png" alt="Time B" style="width:60px;height:60px;border-radius:50%;margin-bottom:0.5rem;">
                    <div style="font-weight:600;color:#790d0d;">Santa Cruz</div>
                </div>
            </div>
            <!-- Placar 2 -->
            <div class="scoreboard" style="background:white;border-radius:15px;box-shadow:0 10px 30px rgba(0,0,0,0.1);padding:2rem;min-width:300px;display:flex;align-items:center;gap:2rem;">
                <div style="text-align:center;">
                    <img src="/assets/botafogo.png" alt="Time C" style="width:60px;height:60px;border-radius:50%;margin-bottom:0.5rem;">
                    <div style="font-weight:600;color:#790d0d;">Vila Real</div>
                </div>
                <div style="font-size:2.5rem;font-weight:700;color:#790d0d;">0 <span style="color:#333;">x</span> 0</div>
                <div style="text-align:center;">
                    <img src="/assets/Gremio.webp" alt="Time D" style="width:60px;height:60px;border-radius:50%;margin-bottom:0.5rem;">
                    <div style="font-weight:600;color:#790d0d;">Juventude</div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- News Section -->
    <section id="noticias" class="news">
        <div class="container">
            <h2 class="section-title">Últimas Notícias</h2>
            <div class="news-grid" id="newsGrid">
                <!-- News items will be populated by JavaScript -->
            </div>
            <section id="instalacoes" class="facilities">
        <div class="container">
            <h2 class="section-title">Nossas Instalações</h2>
            <div class="facilities-grid">
                <div class="facility-card">
                    <img src="/placeholder.svg?height=200&width=300" alt="Ginásio Municipal">
                    <div class="facility-info">
                        <h3>Ginásio Municipal</h3>
                        <p>Espaço completo para modalidades indoor com capacidade para 500 pessoas</p>
                        <div class="facility-features">
                            <span><i class="fas fa-users"></i> 500 lugares</span>
                            <span><i class="fas fa-clock"></i> 6h às 22h</span>
                        </div>
                    </div>
                </div>
                <div class="facility-card">
                    <img src="/placeholder.svg?height=200&width=300" alt="Piscina Olímpica">
                    <div class="facility-info">
                        <h3>Piscina Olímpica</h3>
                        <p>Piscina semiolímpica para natação, polo eaquático e atividades aquáticas</p>
                        <div class="facility-features">
                            <span><i class="fas fa-swimming-pool"></i> 25m</span>
                            <span><i class="fas fa-thermometer-half"></i> Aquecida</span>
                        </div>
                    </div>
                </div>
                <div class="facility-card">
                    <img src="/placeholder.svg?height=200&width=300" alt="Campo de Futebol">
                    <div class="facility-info">
                        <h3>Campo Municipal</h3>
                        <p>Campo oficial de futebol com grama sintética e iluminação noturna</p>
                        <div class="facility-features">
                            <span><i class="fas fa-futbol"></i> Oficial</span>
                            <span><i class="fas fa-lightbulb"></i> Iluminado</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        </div>
    </section>

    <!-- Sports Modalities -->
    <section id="modalidades" class="modalities">
        <div class="container">
            <h2 class="section-title">Modalidades Esportivas</h2>
            <div class="modalities-filter">
                <button class="filter-btn active" data-filter="all">Todas</button>
                <button class="filter-btn" data-filter="individual">Individual</button>
                <button class="filter-btn" data-filter="coletivo">Coletivo</button>
            </div>
            <div class="modalities-grid" id="modalitiesGrid">
                <!-- Modalidades Coletivo -->
                <div class="modality-card" data-category="coletivo">
                    <i class="fas fa-futbol"></i>
                    <h3>Futebol</h3>
                    <p>Treinos e campeonatos para todas as idades.</p>
                    <div class="modality-info">
                        <span><i class="fas fa-calendar"></i> Seg/Qua/Sex</span>
                        <span><i class="fas fa-users"></i> 6+ anos</span>
                    </div>
                    <div class="modality-location" style="margin-top:1rem;color:#790d0d;font-size:0.95rem;">
                        <i class="fas fa-users"></i> Coletivo
                    </div>
                </div>
                <div class="modality-card" data-category="coletivo">
                    <i class="fas fa-basketball-ball"></i>
                    <h3>Basquete</h3>
                    <p>Desenvolvimento técnico e tático do basquetebol.</p>
                    <div class="modality-info">
                        <span><i class="fas fa-calendar"></i> Ter/Qui</span>
                        <span><i class="fas fa-users"></i> 8+ anos</span>
                    </div>
                    <div class="modality-location" style="margin-top:1rem;color:#790d0d;font-size:0.95rem;">
                        <i class="fas fa-users"></i> Coletivo
                    </div>
                </div>
                <div class="modality-card" data-category="coletivo">
                    <i class="fas fa-volleyball-ball"></i>
                    <h3>Vôlei</h3>
                    <p>Vôlei de quadra e vôlei de praia.</p>
                    <div class="modality-info">
                        <span><i class="fas fa-calendar"></i> Seg/Qua/Sex</span>
                        <span><i class="fas fa-users"></i> 10+ anos</span>
                    </div>
                    <div class="modality-location" style="margin-top:1rem;color:#790d0d;font-size:0.95rem;">
                        <i class="fas fa-users"></i> Coletivo
                    </div>
                </div>
                <div class="modality-card" data-category="coletivo">
                    <i class="fas fa-futbol"></i>
                    <h3>Futsal</h3>
                    <p>Modalidade rápida e dinâmica para todas as idades.</p>
                    <div class="modality-info">
                        <span><i class="fas fa-calendar"></i> Sáb/Dom</span>
                        <span><i class="fas fa-users"></i> 7+ anos</span>
                    </div>
                    <div class="modality-location" style="margin-top:1rem;color:#790d0d;font-size:0.95rem;">
                        <i class="fas fa-users"></i> Coletivo
                    </div>
                </div>
                <!-- Modalidades Individual -->
                <div class="modality-card" data-category="individual">
                    <i class="fas fa-running"></i>
                    <h3>Atletismo</h3>
                    <p>Corrida, saltos e arremessos.</p>
                    <div class="modality-info">
                        <span><i class="fas fa-calendar"></i> Diário</span>
                        <span><i class="fas fa-users"></i> 8+ anos</span>
                    </div>
                    <div class="modality-location" style="margin-top:1rem;color:#2c5530;font-size:0.95rem;">
                        <i class="fas fa-user"></i> Individual
                    </div>
                </div>
                <div class="modality-card" data-category="individual">
                    <i class="fas fa-table-tennis"></i>
                    <h3>Tênis</h3>
                    <p>Aulas de tênis para todos os níveis.</p>
                    <div class="modality-info">
                        <span><i class="fas fa-calendar"></i> Ter/Qui/Sáb</span>
                        <span><i class="fas fa-users"></i> 6+ anos</span>
                    </div>
                    <div class="modality-location" style="margin-top:1rem;color:#2c5530;font-size:0.95rem;">
                        <i class="fas fa-user"></i> Individual
                    </div>
                </div>
                <div class="modality-card" data-category="individual">
                    <i class="fas fa-fist-raised"></i>
                    <h3>Judô</h3>
                    <p>Arte marcial que desenvolve disciplina e respeito.</p>
                    <div class="modality-info">
                        <span><i class="fas fa-calendar"></i> Seg/Qua/Sex</span>
                        <span><i class="fas fa-users"></i> 5+ anos</span>
                    </div>
                    <div class="modality-location" style="margin-top:1rem;color:#2c5530;font-size:0.95rem;">
                        <i class="fas fa-user"></i> Individual
                    </div>
                </div>
                <div class="modality-card" data-category="individual">
                    <i class="fas fa-bullseye"></i>
                    <h3>Xadrez</h3>
                    <p>Desenvolvimento do raciocínio lógico e estratégia.</p>
                    <div class="modality-info">
                        <span><i class="fas fa-calendar"></i> Sáb</span>
                        <span><i class="fas fa-users"></i> 8+ anos</span>
                    </div>
                    <div class="modality-location" style="margin-top:1rem;color:#2c5530;font-size:0.95rem;">
                        <i class="fas fa-user"></i> Individual
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="eventos" class="events">
        <div class="container">
            <h2 class="section-title">Próximos Eventos</h2>
            <div class="events-calendar">
                <div class="calendar-header">
                    <button class="calendar-nav" id="prevMonth">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h3 id="currentMonth"></h3>
                    <button class="calendar-nav" id="nextMonth">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="calendar-grid" id="calendarGrid">
                    <!-- Calendar will be populated by JavaScript -->
                </div>
            </div>
            <div class="events-list" id="eventsList">
                <!-- Events list will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="instalacoes" class="facilities">
        <div class="container">
            <h2 class="section-title">Nossas Instalações</h2>
            <div class="facilities-grid">
                <div class="facility-card">
                    <img src="/placeholder.svg?height=200&width=300" alt="Ginásio Municipal">
                    <div class="facility-info">
                        <h3>Ginásio Municipal</h3>
                        <p>Espaço completo para modalidades indoor com capacidade para 500 pessoas</p>
                        <div class="facility-features">
                            <span><i class="fas fa-users"></i> 500 lugares</span>
                            <span><i class="fas fa-clock"></i> 6h às 22h</span>
                        </div>
                    </div>
                </div>
                <div class="facility-card">
                    <img src="/placeholder.svg?height=200&width=300" alt="Piscina Olímpica">
                    <div class="facility-info">
                        <h3>Piscina Olímpica</h3>
                        <p>Piscina semiolímpica para natação, polo aquático e atividades aquáticas</p>
                        <div class="facility-features">
                            <span><i class="fas fa-swimming-pool"></i> 25m</span>
                            <span><i class="fas fa-thermometer-half"></i> Aquecida</span>
                        </div>
                    </div>
                </div>
                <div class="facility-card">
                    <img src="/placeholder.svg?height=200&width=300" alt="Campo de Futebol">
                    <div class="facility-info">
                        <h3>Campo Municipal</h3>
                        <p>Campo oficial de futebol com grama sintética e iluminação noturna</p>
                        <div class="facility-features">
                            <span><i class="fas fa-futbol"></i> Oficial</span>
                            <span><i class="fas fa-lightbulb"></i> Iluminado</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Portal de Esportes</h3>
                    <p>Promovendo o esporte e a qualidade de vida para todos os cidadãos.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
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
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Prefeitura Municipal. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Modal for News Details -->
    <div class="modal" id="newsModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <div id="modalContent">
                <!-- Modal content will be populated by JavaScript -->
            </div>
        </div>
    </div>


</body>
<script>
    // Global variables
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let newsData = [];
let modalitiesData = [];
let eventsData = [];

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    setupEventListeners();
    loadInitialData();
    animateStats();
    generateCalendar();
    setupIntersectionObserver();
}

// Event Listeners
function setupEventListeners() {
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navMenu = document.getElementById('navMenu');
    
    mobileMenuBtn.addEventListener('click', () => {
        navMenu.classList.toggle('active');
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
            navMenu.classList.remove('active');
        });
    });

    // Modality filters
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            filterModalities(btn.dataset.filter);
        });
    });

    // Calendar navigation
    document.getElementById('prevMonth').addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar();
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar();
    });

    // Contact form
    document.getElementById('contactForm').addEventListener('submit', handleContactForm);

    // Modal
    document.getElementById('closeModal').addEventListener('click', closeModal);
    window.addEventListener('click', (e) => {
        if (e.target === document.getElementById('newsModal')) {
            closeModal();
        }
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

// Load initial data
function loadInitialData() {
    loadNewsData();
    loadModalitiesData();
    loadEventsData();
}

// News data and functions
function loadNewsData() {
    newsData = [
        {
            id: 1,
            title: "Inauguração da Nova Piscina Olímpica",
            date: "15 de Janeiro, 2024",
            image: "/placeholder.svg?height=200&width=350",
            excerpt: "A nova piscina olímpica municipal foi inaugurada com grande festa e já está disponível para a população.",
            content: "A Prefeitura Municipal inaugurou oficialmente a nova piscina olímpica, um investimento de R$ 2 milhões que beneficiará milhares de cidadãos. A instalação conta com 8 raias, sistema de aquecimento e acessibilidade completa."
        },
        {
            id: 2,
            title: "Campeonato Municipal de Futebol 2024",
            date: "10 de Janeiro, 2024",
            image: "/placeholder.svg?height=200&width=350",
            excerpt: "Inscrições abertas para o maior campeonato de futebol da cidade. Participe e mostre seu talento!",
            content: "As inscrições para o Campeonato Municipal de Futebol 2024 estão abertas até o dia 30 de janeiro. O torneio contará com categorias sub-15, sub-17 e adulto, com premiação total de R$ 15.000."
        },
        {
            id: 3,
            title: "Programa Esporte na Escola",
            date: "8 de Janeiro, 2024",
            image: "/placeholder.svg?height=200&width=350",
            excerpt: "Novo programa leva atividades esportivas para todas as escolas municipais da cidade.",
            content: "O programa 'Esporte na Escola' foi lançado para promover a prática esportiva entre estudantes de 6 a 14 anos. Serão oferecidas aulas de futebol, vôlei, basquete e atletismo em todas as 25 escolas municipais."
        },
        {
            id: 4,
            title: "Maratona da Cidade 2024",
            date: "5 de Janeiro, 2024",
            image: "/placeholder.svg?height=200&width=350",
            excerpt: "Prepare-se para a maior corrida do ano! Inscrições já estão abertas para corredores de todos os níveis.",
            content: "A 5ª Maratona da Cidade acontecerá no dia 15 de março, com percursos de 5km, 10km e 21km. Esperamos mais de 2.000 participantes neste evento que promove saúde e integração social."
        }
    ];
    
    renderNews();
}

function renderNews() {
    const newsGrid = document.getElementById('newsGrid');
    const newsToShow = newsData.slice(0, 3);
    
    newsGrid.innerHTML = newsToShow.map(news => `
        <div class="news-card" onclick="openNewsModal(${news.id})">
            <img src="${news.image}" alt="${news.title}">
            <div class="news-card-content">
                <div class="date">${news.date}</div>
                <h3>${news.title}</h3>
                <p>${news.excerpt}</p>
            </div>
        </div>
    `).join('');
}

function loadMoreNews() {
    // Simulate loading more news
    const moreNews = [
        {
            id: 5,
            title: "Reforma do Ginásio Municipal",
            date: "2 de Janeiro, 2024",
            image: "/placeholder.svg?height=200&width=350",
            excerpt: "Ginásio municipal passa por reforma completa para melhor atender a população.",
            content: "O ginásio municipal está passando por uma reforma completa que inclui nova quadra, arquibancadas e sistema de iluminação LED. A obra deve ser concluída em março."
        },
        {
            id: 6,
            title: "Escolinha de Natação",
            date: "28 de Dezembro, 2023",
            image: "/placeholder.svg?height=200&width=350",
            excerpt: "Novas turmas da escolinha de natação para crianças de 4 a 12 anos.",
            content: "A escolinha de natação municipal abriu novas turmas para atender a demanda crescente. As aulas são gratuitas e acontecem de segunda a sexta, nos períodos manhã e tarde."
        }
    ];
    
    newsData = [...newsData, ...moreNews];
    renderNews();
}

function openNewsModal(newsId) {
    const news = newsData.find(n => n.id === newsId);
    if (news) {
        const modalContent = document.getElementById('modalContent');
        modalContent.innerHTML = `
            <img src="${news.image}" alt="${news.title}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 1rem;">
            <div class="date" style="color: #666; margin-bottom: 1rem;">${news.date}</div>
            <h2 style="color: #2c5530; margin-bottom: 1rem;">${news.title}</h2>
            <p style="line-height: 1.6; color: #333;">${news.content}</p>
        `;
        document.getElementById('newsModal').style.display = 'block';
    }
}

function closeModal() {
    document.getElementById('newsModal').style.display = 'none';
}

// Modalities data and functions
function loadModalitiesData() {
    modalitiesData = [
        {
            name: "Futebol",
            category: "coletivo",
            icon: "fas fa-futbol",
            description: "Treinos e campeonatos para todas as idades",
            schedule: "Seg/Qua/Sex",
            age: "6+ anos"
        },
        {
            name: "Natação",
            category: "aquatico",
            icon: "fas fa-swimmer",
            description: "Aulas de natação para iniciantes e avançados",
            schedule: "Ter/Qui/Sáb",
            age: "4+ anos"
        },
        {
            name: "Basquete",
            category: "coletivo",
            icon: "fas fa-basketball-ball",
            description: "Desenvolvimento técnico e tático do basquetebol",
            schedule: "Seg/Qua/Sex",
            age: "8+ anos"
        },
        {
            name: "Vôlei",
            category: "coletivo",
            icon: "fas fa-volleyball-ball",
            description: "Vôlei de quadra e vôlei de praia",
            schedule: "Ter/Qui/Sáb",
            age: "10+ anos"
        },
        {
            name: "Atletismo",
            category: "individual",
            icon: "fas fa-running",
            description: "Corrida, saltos e arremessos",
            schedule: "Diário",
            age: "8+ anos"
        },
        {
            name: "Tênis",
            category: "individual",
            icon: "fas fa-table-tennis",
            description: "Aulas de tênis para todos os níveis",
            schedule: "Ter/Qui/Sáb",
            age: "6+ anos"
        },
        {
            name: "Judô",
            category: "individual",
            icon: "fas fa-fist-raised",
            description: "Arte marcial que desenvolve disciplina e respeito",
            schedule: "Seg/Qua/Sex",
            age: "5+ anos"
        },
        {
            name: "Polo Aquático",
            category: "aquatico",
            icon: "fas fa-water",
            description: "Esporte aquático coletivo dinâmico e desafiador",
            schedule: "Ter/Qui",
            age: "12+ anos"
        }
    ];
    
    renderModalities();
}

function renderModalities(filter = 'all') {
    const modalitiesGrid = document.getElementById('modalitiesGrid');
    const filteredModalities = filter === 'all' 
        ? modalitiesData 
        : modalitiesData.filter(m => m.category === filter);
    
    modalitiesGrid.innerHTML = filteredModalities.map(modality => `
        <div class="modality-card" data-category="${modality.category}">
            <i class="${modality.icon}"></i>
            <h3>${modality.name}</h3>
            <p>${modality.description}</p>
            <div class="modality-info">
                <span><i class="fas fa-calendar"></i> ${modality.schedule}</span>
                <span><i class="fas fa-users"></i> ${modality.age}</span>
            </div>
        </div>
    `).join('');
}

function filterModalities(filter) {
    renderModalities(filter);
}

// Events data and functions
function loadEventsData() {
    eventsData = [
        {
            id: 1,
            title: "Campeonato de Futebol Sub-15",
            date: "2025-07-25",
            time: "14:00",
            location: "Campo Municipal",
            description: "Final do campeonato municipal de futebol categoria sub-15"
        },
        {
            id: 2,
            title: "Torneio de Natação",
            date: "2024-01-28",
            time: "09:00",
            location: "Piscina Olímpica",
            description: "Competição de natação para todas as categorias"
        },
        {
            id: 3,
            title: "Aula Aberta de Judô",
            date: "2024-02-02",
            time: "16:00",
            location: "Ginásio Municipal",
            description: "Demonstração e aula experimental de judô"
        },
        {
            id: 4,
            title: "Maratona da Cidade",
            date: "2024-03-15",
            time: "07:00",
            location: "Centro da Cidade",
            description: "5ª edição da Maratona da Cidade com percursos de 5km, 10km e 21km"
        }
    ];
    
    renderEvents();
}

function renderEvents() {
    const eventsList = document.getElementById('eventsList');
    
    eventsList.innerHTML = eventsData.map(event => {
        const eventDate = new Date(event.date);
        const formattedDate = eventDate.toLocaleDateString('pt-BR', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
        
        return `
            <div class="event-card">
                <div class="event-date">${formattedDate} - ${event.time}</div>
                <h3>${event.title}</h3>
                <p>${event.description}</p>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i>
                    ${event.location}
                </div>
            </div>
        `;
    }).join('');
}

// Calendar functions
function generateCalendar() {
    const calendarGrid = document.getElementById('calendarGrid');
    const currentMonthElement = document.getElementById('currentMonth');
    
    const monthNames = [
        'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
    ];
    
    currentMonthElement.textContent = `${monthNames[currentMonth]} ${currentYear}`;
    
    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const daysInPrevMonth = new Date(currentYear, currentMonth, 0).getDate();
    
    let calendarHTML = '';
    
    // Previous month days
    for (let i = firstDay - 1; i >= 0; i--) {
        const day = daysInPrevMonth - i;
        calendarHTML += `<div class="calendar-day other-month">${day}</div>`;
    }
    
    // Current month days
    for (let day = 1; day <= daysInMonth; day++) {
        const dateString = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const hasEvent = eventsData.some(event => event.date === dateString);
        const eventClass = hasEvent ? 'has-event' : '';
        
        calendarHTML += `<div class="calendar-day ${eventClass}" data-date="${dateString}">${day}</div>`;
    }
    
    // Next month days (optional, for better UX)
    const remainingCells = 42 - (firstDay + daysInMonth);
    for (let i = 1; i <= remainingCells; i++) {
        calendarHTML += `<div class="calendar-day other-month">${i}</div>`;
    }
    
    calendarGrid.innerHTML = calendarHTML;
    attachEventListenersToCalendarDays();
}

function attachEventListenersToCalendarDays() {
    document.querySelectorAll('.calendar-day').forEach(dayElement => {
        dayElement.addEventListener('click', () => {
            const date = dayElement.getAttribute('data-date');
            const isOtherMonth = dayElement.classList.contains('other-month');
            
            if (!isOtherMonth) {
                // Open events for the selected date
                openEventsForDate(date);
            } else {
                // Optionally, you can navigate to the previous/next month
                // currentMonth += (dayElement.textContent > 15) ? 1 : -1;
                // generateCalendar();
            }
        });
    });
}

function openEventsForDate(date) {
    const eventsForDate = eventsData.filter(event => event.date === date);
    const eventsList = document.getElementById('eventsList');
    
    if (eventsForDate.length > 0) {
        eventsList.innerHTML = eventsForDate.map(event => {
            const eventDate = new Date(event.date);
            const formattedDate = eventDate.toLocaleDateString('pt-BR', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
            
            return `
                <div class="event-card">
                    <div class="event-date">${formattedDate} - ${event.time}</div>
                    <h3>${event.title}</h3>
                    <p>${event.description}</p>
                    <div class="event-location">
                        <i class="fas fa-map-marker-alt"></i>
                        ${event.location}
                    </div>
                </div>
            `;
        }).join('');
    } else {
        eventsList.innerHTML = '<p style="text-align:center;color:#666;">Nenhum evento encontrado para esta data.</p>';
    }
}

// Intersection Observer for lazy loading images
function setupIntersectionObserver() {
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.getAttribute('data-src');
                img.onload = () => img.classList.add('fade-in');
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '0px 0px -100px 0px'
    });
    
    document.querySelectorAll('img[data-src]').forEach(img => {
        observer.observe(img);
    });
}

// Animate stats numbers
function animateStats() {
    const stats = [
        { id: 'athletesCount', endValue: 1500 },
        { id: 'modalitiesCount', endValue: 12 },
        { id: 'facilitiesCount', endValue: 8 },
        { id: 'eventsCount', endValue: 25 }
    ];
    
    stats.forEach(stat => {
        const statElement = document.getElementById(stat.id);
        let startValue = 0;
        const duration = 2000;
        const stepTime = Math.abs(Math.floor(duration / stat.endValue));
        let timer = setInterval(() => {
            startValue += 1;
            statElement.innerHTML = startValue;
            
            if (startValue === stat.endValue) {
                clearInterval(timer);
            }
        }, stepTime);
    });
}

// Contact form handling
function handleContactForm(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    // Simulate form submission
    setTimeout(() => {
        alert('Formulário enviado com sucesso!');
        form.reset();
    }, 1000);
}

// Modalities filter logic
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        document.querySelectorAll('.modality-card').forEach(card => {
            if (filter === 'all') {
                card.style.display = '';
            } else if (card.getAttribute('data-category') === filter) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
});

// Exibe apenas as modalidades corretas ao carregar a página (default: todas)
document.addEventListener('DOMContentLoaded', function() {
    const activeBtn = document.querySelector('.filter-btn.active');
    if (activeBtn) {
        const filter = activeBtn.dataset.filter;
        document.querySelectorAll('.modality-card').forEach(card => {
            if (filter === 'all') {
                card.style.display = '';
            } else if (card.getAttribute('data-category') === filter) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }
});

// Hamburguer menu toggle for mobile
document.addEventListener('DOMContentLoaded', function() {
    var menuBtn = document.getElementById('menuToggleBtn');
    var nav = document.getElementById('mainNav');
    menuBtn.addEventListener('click', function() {
        nav.classList.toggle('open');
        menuBtn.classList.toggle('active');
    });
    // Fecha o menu ao clicar em um link (mobile)
    nav.querySelectorAll('.nav-link').forEach(function(link) {
        link.addEventListener('click', function() {
            if(window.innerWidth <= 700) {
                nav.classList.remove('open');
                menuBtn.classList.remove('active');
            }
        });
    });
});
</script>
</html>
