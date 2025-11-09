<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Imagem no navegador -->

    <link rel="shortcut icon" type="imagex/png" href="img/icones/imgEnderecoNavegador.ico">

    <!-- Arquivos CSS -->

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estacoes.css') }}">

    <!-- Arquivos JS -->

    <script type="module" src="{{ asset('js/maps.js')}}"></script>
    <script type="module" src="{{ asset('js/menu.js') }}"></script>
    <script type="module" src="{{ asset('js/pop-up.js') }}"></script>

    <!-- Fontes -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <title>Rodaki</title>
</head>

<body>
    <header>
        <nav class="cabecalho_container" id="container_inicio">
            <div class="cabecalho_logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('img/icones/logo.svg') }}" alt="imagem da logo" class="icone_logo-cabecalho">
                </a>
                <p class="nome_logo-cabecalho">Rodaki</p>
            </div>
            <div class="cabecalho_container-links">
                <ul class="cabecalho_links-lista" id="menu-links">
                    <ul class="links_navegacao">
                        <li class="link-lista-item">
                            <a href="{{ route('index') }}" class="link_item">Inicio</a>
                        </li>
                        <li class="link-lista-item">
                            <a href="{{ route('estacoes') }}" class="link_item estacao">Estações</a>
                        </li>
                        <li class="link-lista-item">
                            <a href="{{ route('planos') }}" class="link_item estacao">Planos</a>
                        </li>
                    </ul>
                    <ul class="links_acesso">
                        @auth
                        <li class="link-lista-item">
                            <a href="{{ route('profile.edit') }}" class="link_item perfil">
                                <img src="{{ asset('img/icones/icone-usuario.svg')}}" alt="imagem usuario">
                                <p>Perfil</p>
                            </a>
                        </li>
                        <li class="link-lista-item">
                            <form action="{{ route('logout') }}" method="POST" class="link_sair">
                                @csrf
                                <a href="{{ route('logout') }}" class="link_item sair" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Sair
                                </a>
                            </form>
                        </li>
                        <li class="link-lista-item">
                            <a href="{{ route('profile.edit') }}" class="link_item perfilRes">
                                Perfil
                            </a>
                        </li>
                        <li class="link-lista-item">
                            <form action="{{ route('logout') }}" method="POST" class="link_sair">
                                @csrf
                                <a href="{{ route('logout') }}" class="link_item sairRes" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Sair
                                </a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="link-lista-item">
                            <a href="{{ route('login') }}" class="link_item login">Login</a>
                        </li>
                        <li class="link-lista-item">
                            <a href="{{ route('register')}}" class="link_item cadastrar">Cadastre-se</a>
                        </li>
                        <li class="link-lista-item">
                            <a href="{{ route('login') }}" class="link_item loginRes">Login</a>
                        </li>
                        <li class="link-lista-item">
                            <a href="{{ route('register')}}" class="link_item cadastrarRes">Cadastre-se</a>
                        </li>
                        @endguest
                    </ul>
                </ul>
            </div>
            <img src="{{ asset('img/icones/icone-menuPreto.svg') }}" alt="icone do menu hamburguer" class="menu-hamburguer" id="menu-btn">
        </nav>
    </header>

    <section class="estacoes">
        <!-- Mapa do google maps das estaçoes -->
        <div id="map"></div>
        <script>
            (g => {
                var h, a, k, p = "The Google Maps JavaScript API",
                    c = "google",
                    l = "importLibrary",
                    q = "__ib__",
                    m = document,
                    b = window;
                b = b[c] || (b[c] = {});
                var d = b.maps || (b.maps = {}),
                    r = new Set,
                    e = new URLSearchParams,
                    u = () => h || (h = new Promise(async (f, n) => {
                        await (a = m.createElement("script"));
                        e.set("libraries", [...r] + "");
                        for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                        e.set("callback", c + ".maps." + q);
                        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                        d[q] = f;
                        a.onerror = () => h = n(Error(p + " could not load."));
                        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                        m.head.append(a)
                    }));
                d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
            })
            ({
                key: "{{ env('GOOGLE_MAP_KEY') }}",
                v: "weekly"
            });
        </script>


        <!-- Quantidade de bicicletas e patinetes disponiveis -->

        <div class="container_qtd">
            <button class="btn-locar" id="open-modal-btn">Retira / devolver</button>
            <div class="container_qtd-lista">
                <div class="estacoes_qtd-item">
                    <p class="estacoes_qtd-nome">Point Lourdes </p>
                    <p class="estacoes_qtd-texto">7 bicletas disponiveis</p>
                    <p class="estacoes_qtd-texto">9 patinetes disponiveis</p>
                </div>
                <div class="estacoes_qtd-item">
                    <p class="estacoes_qtd-nome">Point Raul</p>
                    <p class="estacoes_qtd-texto">10 bicletas</p>
                    <p class="estacoes_qtd-texto">10 patinetes disponiveis</p>
                </div>
                <div class="estacoes_qtd-item">
                    <p class="estacoes_qtd-nome">Point liberdade </p>
                    <p class="estacoes_qtd-texto">7 bicletas disponiveis</p>
                    <p class="estacoes_qtd-texto">6 patinetes disponiveis</p>
                </div>
                <div class="estacoes_qtd-item">
                    <p class="estacoes_qtd-nome">Point Savassi </p>
                    <p class="estacoes_qtd-texto">10 bicletas disponiveis</p>
                    <p class="estacoes_qtd-texto">10 patinetes disponiveis</p>
                </div>
                <div class="estacoes_qtd-item">
                    <p class="estacoes_qtd-nome">Point Santa Casa</p>
                    <p class="estacoes_qtd-texto">9 bicletas disponiveis</p>
                    <p class="estacoes_qtd-texto">9 patinetes disponiveis</p>
                </div>
                <div class="estacoes_qtd-item">
                    <p class="estacoes_qtd-nome">Point Parque</p>
                    <p class="estacoes_qtd-texto">8 bicletas disponiveis</p>
                    <p class="estacoes_qtd-texto">9 patinetes disponiveis</p>
                </div>
                <div class="estacoes_qtd-item">
                    <p class="estacoes_qtd-nome">Point Lagoinha </p>
                    <p class="estacoes_qtd-texto">10 bicletas disponiveis</p>
                    <p class="estacoes_qtd-texto">10 patinetes disponiveis</p>
                </div>
                <div class="estacoes_qtd-item">
                    <p class="estacoes_qtd-nome">Point Canadá </p>
                    <p class="estacoes_qtd-texto">10 bicletas disponiveis</p>
                    <p class="estacoes_qtd-texto">10 patinetes disponiveis</p>
                </div>
            </div>
        </div>

        <div id="modal-locacao" class="modal-container">
            <form class="container_locacao-form">
                <img src="{{ asset('img/icones/icone-fechar.svg') }}" alt="imagem da logo" class="modal-close-btn" id="close-modal-btn">
                <select name="locacao" id="locacao" class="locacao-opcoes">
                    <option value="retirar" id="retirar" class="locacao-opcoes-texto">Retirar</option>
                    <option value="devolver" id="devolver" class="locacao-opcoes-texto">Devolver</option>
                </select>
                <label for="nome-estacao" class="nome-label">Insira o numero da estação</label>
                <input type="text" name="nome-estacao" id="nome-estacao" class="estacao-input" placeholder="00" maxlength="2" minlength="2" required>
                <label for="codigo" id="nome-codigo" class="codigo-label">Insira o codigo de 5 digitos</label>
                <input type="text" name="codigo" id="codigo" class="codigo-input" placeholder="00000" maxlength="5" minlength="5" required>
                <button id="btn-submit" class="btn-submit">Retirar</button>
            </form>

        </div>

    </section>

    <!-- Rodape -->
    <!-- <hr>
    <footer class="rodape">
        <div class="rodape_container-logo">
            <div class="rodape_logo-rodape">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('img/icones/logo.svg') }}" alt="imagem da logo" class="icone_logo-rodape">
                </a>
                <p class="nome_logo-rodape">Rodaki</p>
            </div>
            <div class="rodape_redes">
                <img src="{{ asset('img/icones/icone-linkedin.svg') }}" alt="Icone do linkedin" class="rodape_img-redes">
                <img src="{{ asset('img/icones/icone-instagram.svg') }}" alt="icone do instagram" class="rodape_img-redes">
                <img src="{{ asset('img/icones/icone-facebook.svg') }}" alt="icone do facebook" class="rodape_img-redes">
            </div>
        </div>
        <div class="rodape_empresa">
            <p class="rodape_titulo-coluna">Rodaki LTDA</p>
            <p class="rodape_cnpj">CNPJ: 00.000.000/0000-00</p>
            <p class="rodape_endereco">Belo horizonte MG - Brasil</p>
            <p class="rodape_endereco">Rua Rodaki, 80 - Meio Ambiente</p>
        </div>
        <div class="rodape_navegacao">
            <p class="rodape_titulo-coluna">Navegação</p>
            <a href="{{ route('index') }}" class="rodape_link">Inicio</a>
            <a href="{{ route('estacoes') }}" class="rodape_link">Estações</a>
            <a href="{{ route('planos') }}" class="rodape_link">Planos</a>
        </div>
        <div class="rodape_contatos">
            <p class="rodape_titulo-coluna">Contatos</p>
            <div class="rodape_numero">
                <img src="{{ asset('img/icones/icone-telefone.svg') }}" alt="imagem do icone do telefone" class="rodape_icone-contatos">
                <p class="numero">0800 000 0000</p>
            </div>
            <div class="rodape_email">
                <img src="{{ asset('img/icones/icone-email.svg') }}" alt="imagem do icone do e-mail" class="rodape_icone-contatos">
                <p>ecopoint@ecopoint.com.br</p>
            </div>
        </div>
    </footer> -->
</body>

</html>