<!-- Header -->
<header class="main-header">
    <nav>
        <ul class="nav-links">
            <li><a href="<?= $base ?>"><img src="<?= $base ?>/assets/images/login/logobrose.png" alt="Logoheader" /></a>
            </li>
            <!-- <li><a href="../pages/notificacoes.html">Notificações</a></li> -->
        </ul>
    </nav>
    <div class="header-right">
        <div class="search">
            <form action="<?= $base ?>/search" method="get">
                <label for="status-filter">Buscar:</label>
                <input type="text" name="search" placeholder="Buscar..." />
                <a href="#">
                    <button class="pesquisar">
                        <img src="<?= $base ?>/assets/images/login/lupa.png" alt="lupa">
                    </button>
                </a>
            </form>
        </div>
        <div class="user-logout">
            <a href="<?= $base ?>/logout">
                <button class="logout">
                    <img src="<?= $base ?>/assets/images/login/sair.png" alt="sair">
                </button>
            </a>
        </div>
        <!-- <div>
            <a href="#">
                <button class="notificacoes">
                    <img src="<?= $base ?>/assets/images/notificacao.png" alt="notificacao">
                </button>
            </a>
        </div> -->
</header>