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