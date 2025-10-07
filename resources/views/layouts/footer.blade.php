<footer class="footer">
    <div class="container">
        <div class="row gy-4 justify-content-between">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('img/prefeitura.png') }}" alt="Prefeitura de Assaí" width="60" class="me-3">
                    <div>
                        <h5 class="fw-bold mb-0">Prefeitura Municipal de Assaí</h5>
                        <small class="text-secondary d-block">{{ 'Portal da Assistência Social' }}</small>
                    </div>
                </div>
                <p class="small text-secondary text-left mb-3">
                    Trabalhando para o desenvolvimento e bem-estar dos cidadãos assaiense com transparência e
                    eficiência.
                </p>

                {{-- Redes sociais --}}
                <div class="d-flex gap-3 social-links">
                    <a href="https://www.facebook.com/prefeituraassai" target="_blank" class="social-circle"><i
                            class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/prefeituraassai" target="_blank" class="social-circle"><i
                            class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCME3TZ6wVWFkIoTd4R9lyFw" target="_blank"
                        class="social-circle"><i class="bi bi-youtube"></i></a>
                    <a href="https://wa.me/554332621313" target="_blank" class="social-circle"><i
                            class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3 fs-5">Serviços</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="https://transparencia.betha.cloud/#/yyGw8hIiYdv6bs-avrzVUg==">Portal da
                            Transparência</a></li>
                    <li class="mb-2"><a
                            href="https://transparencia.betha.cloud/#/yyGw8hIiYdv6bs-avrzVUg==/consulta/95802">Licitações</a>
                    </li>
                    <li class="mb-2"><a href="https://www.assai.pr.gov.br/concurso">Concursos Públicos</a></li>
                    <li class="mb-2"><a href="https://www.doemunicipal.com.br/prefeituras/4">Diário Oficial</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/ouvidoria">Ouvidoria</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3 fs-5">Secretarias</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/5">Educação</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/4">Saúde</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/7">Assistência Social</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/11">Obras e Serviços</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/9">Trabalho</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3 fs-5">Contato</h6>
                <ul class="list-unstyled small mb-0">
                    <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i> Av. Rio de Janeiro, 720 - Centro - Assaí/PR
                    </li>
                    <li class="mb-2"><i class="bi bi-telephone-fill me-2"></i> (43) 3262-1313</li>
                    <li class="mb-2"><i class="bi bi-envelope-fill me-2"></i> assai@assai.pr.gov.br</li>
                </ul>
            </div>
        </div>

        <div class="border-top mt-4 pt-3 text-center small text-secondary">
            © {{ date('Y') }} Prefeitura Municipal de Assaí. Todos os direitos reservados.
        </div>
    </div>
</footer>

<style>
    /* === FOOTER === */
    footer.footer {
        background-color: var(--azul-escuro);
        color: white;
        padding: 3rem 1rem 1rem;
        margin-top: 4rem;
        text-align: center;
    }

    footer .fw-bold {
        color: white;
    }

    footer .text-secondary {
        color: var(--cinza-claro) !important;
    }

    footer ul li a {
        color: var(--cinza-claro);
        text-decoration: none;
        transition: color 0.2s;
    }

    footer ul li a:hover {
        color: var(--azul-claro);
    }

    footer .bi {
        color: var(--azul-claro);
    }

    footer .border-top {
        border-color: rgba(255, 255, 255, 0.1) !important;
    }

    footer .social-links a {
        color: white;
        font-size: 1.25rem;
        transition: color 0.3s ease;
    }

    footer .social-links a:hover {
        color: var(--azul-claro);
    }

    @media (max-width: 768px) {
        footer .row {
            text-align: center;
        }

        footer .d-flex {
            justify-content: center !important;
        }
    }

    .social-circle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        transition: all 0.3s ease;
    }

    .social-circle:hover {
        background-color: #60a5fa;
        color: #fff;
        transform: scale(1.1);
    }
</style>