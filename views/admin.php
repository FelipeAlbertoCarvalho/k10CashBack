<!-- PAINEL ADMIN <br>
com tudo o que o admin pode fazer. O que ele pode faazer? <br>
- colocar um link para cadastrar o admin com um form. NAO PRECISA, TALVEZ <br>
- colocar um botao para cadastrar as lojas e os clientes <br>
- colocar um botao de logout <br> -->
<header class="header-painel">
  <div class="container">
    <div class="nav-logo">
      <a href="<?php echo BASE_URL; ?>">K10</a>
      <div>
        <i class="fas fa-bars"></i>
      </div>
    </div>

    <p>Olá, <?php echo $datas["info"]["nome"]; ?> !</p>

    <nav class="nav-logout">
      <ul>
        <li>
          <a href="" id="nav-avatar">
            <div class="info-nav">
              <img src="<?php echo BASE_URL; ?>media/admin/<?php echo $datas['info']['img']; ?>" alt="Avatar Usuário">
              <i class="fas fa-caret-down"></i>
            </div>
          </a>

          <ul>
            <li><a href=""><i class="fas fa-user"></i> Perfil</a></li>
            <li><a href="<?php echo BASE_URL; ?>admin/logout"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="login-sucesso"></div>
  </div>
</header>

<section class="main">
  <aside class="dashboard">
    <div class="box-usuario">
      <div class="avatar-usuario">
        <?php if ($datas["info"]["img"] == null) : ?>
          <i class="fa fa-user"></i>
        <?php else : ?>
          <img src="<?php echo BASE_URL; ?>media/admin/<?php echo $datas['info']['img']; ?>" alt="Avatar usuário">
        <?php endif; ?>
      </div>

      <div class="info-usuario">
        <h4><?php echo $datas["info"]["nome"]; ?></h4>
        <?php if ($_SESSION["login"] === true) : ?>
          <h5><span></span> Online</h5>
        <?php endif; ?>
      </div>
    </div>

    <nav class="nav-aside">
      <h2>Administração</h2>
      <a href=""><i class="fas fa-users"></i> Cadastrar</a>

      <h2>Cadastro</h2>
      <a href=""><i class="fas fa-users"></i> Clientes</a>
      <a href=""><i class="fas fa-handshake"></i> Lojas</a>

      <h2>Gestão</h2>
      <a href=""><i class="fas fa-sliders-h"></i> Relatórios</a>
      <a href=""><i class="fas fa-stream"></i> Default</a>
      <a href=""><i class="far fa-list-alt"></i> Default</a>

      <h2>Configurações gerais</h2>
      <a href=""><i class="fas fa-edit"></i> Default</a>
    </nav>
  </aside>
  <!--dashboard-->

  <section class="content-main">
    <nav class="nav-content">
      <i class="fas fa-home"></i>
      <h1>Painel de controle</h1>
    </nav>
  </section>
</section>
<footer>
  footer
</footer>