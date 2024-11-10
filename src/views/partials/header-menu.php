<!-- Header Menu -->
<header class="main-header">
    <nav>
        <ul class="nav-links">
            <li><img src="<?= $base ?>/assets/images/login/logobrose.png" alt="Logoheader" /></li>
            <li><a href="pages/skillsMatrix.html">Skills Matrix</a></li>
            <li><a href="pages/relatorios.html">Relatórios</a></li>
            <li><a href="pages/notificacoes.html">Notificações</a></li>
        </ul>
    </nav>

    <div class="header-right">
        <label for="status-filter">Buscar:</label>
        <select id="status-filter">
            <option value=""></option>
            <option value="CUR">CUR CURITIBA</option>
            <option value="GOI">GOI GOIÂNIA</option>
            <option value="SAO">SAO SÃO PAULO</option>
        </select>
        <input type="text" placeholder="Buscar..." />

        <div class="search">
            <button class="pesquisar">
                <img src="<?= $base ?>/assets/images/login/lupa.png" alt="lupa">
            </button>
        </div>

        <div class="user-logout">
            <button class="logout">
                <img src="<?= $base ?>/assets/images/login/sair.png" alt="Logotipo">
            </button>
        </div>
    </div>
</header>