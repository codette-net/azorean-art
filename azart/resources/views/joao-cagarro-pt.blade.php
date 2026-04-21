@extends('layouts.app')

@yield('title', 'João Caggaro')

@section('content')
<div class="main-wrapper">
  <main id="joao-cagarro">
    <header class="main-header">
      <h1 class="h1-logo">Azorean<span class="sr-only">Art</span><span>r</span><span>t</span></h1>
    </header>
    <div class="lang-switch">
      <a href="joao-cagarro.html" class="lang-link" aria-label="Switch to English version"
        title="Switch to English version">EN</a>
      <span class="lang-separator">|</span>
      <a href="joao-cagarro-pt.html" class="lang-link active" aria-label="Mudar para a versão em português"
        title="Mudar para a versão em português">PT</a>

    </div>
    <section class="hero-joao gradient-darkpurple-overlay">
      <header class="hero-content wrapper">

        <p class="eyebrow">Aventura Ilustrada dos Açores</p>
        <h1 class="product-title">João Cagarro e o Segredo de Santa Bárbara</h1>
        <p class="product-subtitle">
          Um romance gráfico cheio de mistério, passado em São Jorge, onde a história da ilha,
          as grutas escondidas, os documentos perdidos e o Oceano Atlântico se juntam numa história açoriana
          inesquecível.
        </p>
        <div class="hero-actions">
          <a href="#about-book" class="button primary">Descobrir a História</a>
          <a href="#contact" class="button secondary">Pedir Informações</a>
        </div>
      </header>

      <img src="{{ asset('photos/JC & M Walking the trails-xl.png') }}" srcset="{{ asset('photos/JC & M Walking the trails-xl.png') }} 1200w,
                  {{ asset('photos/JC & M Walking the trails-lg.png') }} 800w,
                  {{ asset('photos/JC & M Walking the trails-md.png') }} 400w"
        sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 1200px"
        alt="João Cagarro e Maria a caminhar pelos trilhos de São Jorge, nos Açores, ilustração de Pieter Adriaans"
        class="lozad" data-loaded="false">
    </section>

    <section id="about-book" class="section wrapper">
      <header class="section-heading">
        <p class="eyebrow">Sobre o Livro</p>
        <h2>Uma aventura açoriana de mistério, história e descoberta</h2>
      </header>

      <div class="rj-box content-grid">
        <div class="content-main">
          <p>
            <strong>João Cagarro e o Segredo de Santa Bárbara</strong> acompanha João, um cagarro algo desastrado, mas
            aventureiro, e a sua amiga Maria na ilha de São Jorge, nos Açores.
          </p>

          <p>
            Quando um homem misterioso quase morre durante um mergulho noturno perigoso, João e Maria descobrem um
            rasto de pistas: uma carteira perdida, documentos antigos e um mapa escondido. A investigação leva-os a
            uma gruta secreta, por baixo da Igreja de Santa Bárbara, e a um mistério com séculos de história,
            envolvendo povoadores flamengos, naufrágios e tesouros escondidos.
          </p>

          <p>
            À medida que mergulham nas profundezas do oceano e do passado, percebem que não estão sozinhos. Há mais
            alguém à procura do segredo... e disposto a tudo para o obter.
          </p>

          <p>
            Tendo como pano de fundo as paisagens impressionantes de São Jorge, esta história ilustrada junta ambiente
            açoriano, aventura e imaginação histórica num livro cultural único para leitores, visitantes e amantes das
            ilhas.
          </p>
        </div>

        <aside class="content-side content-grid">
          <div class="info-card">
            <h3>Detalhes do Livro</h3>
            <ul class="info-list alt">
              <li><strong>Formato:</strong> Capa mole</li>
              <li><strong>Extensão:</strong> 42 páginas</li>
              <li><strong>Tamanho:</strong> A4</li>
              <li><strong>Cenário:</strong> São Jorge, Açores</li>
              <li><strong>Línguas:</strong> Inglês / Português</li>
            </ul>
            <div class="info-price">
              <p><strong>Preço:</strong> <span>14 €</span></p>
              <small class="info-note">*portes de envio não incluídos; <a href="#contact">contacte-nos</a> para mais
                informações.</small>
            </div>
          </div>
        </aside>
        <div class="book-cover">
            <img src="{{ asset('photos/Joao-Cagarro-Cover-xl.jpg') }}" srcset="{{ asset('photos/Joao-Cagarro-Cover-xl.jpg') }} 1200w,
                      {{ asset('photos/Joao-Cagarro-Cover-lg.jpg') }} 800w,
                      {{ asset('photos/Joao-Cagarro-Cover-md.jpg') }} 400w"
              sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 1200px"
              alt="Cover of João Cagarro and the Secret of Santa Bárbara, an illustrated book by Pieter Adriaans set in the Azores"
              class="lozad" data-loaded="false">
          </div>

      </div>
    </section>

    <section class="section wrapper">
      <header class="section-heading">
        <p class="eyebrow">O Que o Torna Especial</p>
        <h2>Uma história enraizada nos Açores</h2>
      </header>

      <div class="feature-grid">
        <article class="feature-card">
          <h3>Passado em São Jorge</h3>
          <p>
            Das Velas a Santa Bárbara, passando pela paisagem costeira da ilha, a história está profundamente ligada
            a lugares reais dos Açores.
          </p>
        </article>

        <article class="feature-card">
          <h3>História e ficção</h3>
          <p>
            O livro inspira-se na história da ilha, nas antigas rotas marítimas, nas ligações flamengas e nas lendas
            escondidas no passado atlântico.
          </p>
        </article>

        <article class="feature-card">
          <h3>Arte de Pieter Adriaans</h3>
          <p>
            Criado no universo mais alargado da Azorean Art, este projecto combina narrativa visual, identidade local
            e um forte sentido de lugar.
          </p>
        </article>
      </div>
    </section>

    <section class="section wrapper">
      <header class="section-heading">
        <p class="eyebrow">Ideal Para</p>
        <h2>Leitores, visitantes e a diáspora açoriana</h2>
      </header>

      <div class="audience-grid">
        <div class="audience-card">
          <h3>Visitantes dos Açores</h3>
          <p>
            Uma recordação ilustrada com significado, vinda de São Jorge — algo entre romance gráfico, lembrança
            cultural e objecto artístico.
          </p>
        </div>
        <div class="audience-card">
          <h3>Famílias açorianas no estrangeiro</h3>
          <p>
            Uma história de lugar, memória e identidade insular para açorianos e descendentes que vivem nos Estados
            Unidos,
            no Canadá e noutros países.
          </p>
        </div>
        <div class="audience-card">
          <h3>Amantes da história insular</h3>
          <p>
            Ideal para leitores atraídos pelo Atlântico, pelo folclore, pela descoberta, pelas grutas escondidas e
            pelo mistério histórico.
          </p>
        </div>
      </div>
    </section>

    <div class="bg-img-divider joao-bg">
      <header class="cta-box">
        <p class="eyebrow">Azorean Art</p>
        <h2>Tem interesse em João Cagarro?</h2>
        <p>
          Contacte-nos para informações sobre disponibilidade, stock, parcerias ou vendas.
          Também pode descobrir mais obras de Pieter Adriaans através da colecção Azorean Art.
        </p>
        <div class="hero-actions">
          <a href="index.html#art" class="button primary">Ver Mais Arte</a>
        </div>
      </header>
    </div>

    <section class="section wrapper cta-section">
      <section class="contact-page gradient-darkpurple-overlay" id="contact">
        <form class="contact-form" action="" method="post" enctype="multipart/form-data">
          <div class="fields">
            <div class="field half">
              <label for="first_name">Nome <span class="form-required">* obrigatório</span></label>
              <input type="text" id="first_name" name="first_name" placeholder="Introduza o seu nome"
                title="O nome deve conter apenas letras." required>
            </div>

            <div class="field half">
              <label for="last_name">Apelido <span class="form-required">* obrigatório</span></label>
              <input type="text" id="last_name" name="last_name" placeholder="Introduza o seu apelido"
                title="O apelido deve conter apenas letras." required>
            </div>

            <div class="field half">
              <label for="email">E-mail <span class="form-required">* obrigatório</span></label>
              <input type="email" id="email" name="email" placeholder="Introduza o seu e-mail"
                title="Introduza um endereço de e-mail válido." required>
            </div>

            <div class="field half">
              <label for="phone">Telefone</label>
              <input type="text" name="phone" id="phone" placeholder="Introduza o seu número de telefone"
                title="Introduza um número de telefone válido.">
            </div>

            <div class="field half">
              <label for="address">Morada</label>
              <input type="text" name="address" id="address" placeholder="Introduza a sua morada (rua, número)">
            </div>

            <div class="field half">
              <label for="city">Localidade (e distrito/região)</label>
              <input type="text" name="city" id="city" placeholder="Introduza a sua localidade/região">
            </div>

            <div class="field half">
              <label for="postal_code">Código Postal</label>
              <input type="text" name="postal_code" id="postal_code" placeholder="Introduza o seu código postal">
            </div>

            <div class="field half">
              <label for="country">País</label>
              <input type="text" name="country" id="country" placeholder="Introduza o seu país">
            </div>

            <div class="field half">
              <label for="contact_method">Forma de contacto preferida</label>
              <select name="contact_method" id="contact_method">
                <option value="mail">E-mail</option>
                <option value="phone">Telefone</option>
              </select>
            </div>

            <div class="field">
              <label for="message">Mensagem</label>
              <textarea name="message" id="message"
                rows="4">Gostaria de reservar um exemplar de João Cagarro, na versão em português.</textarea>
            </div>

            <div class="field last-field">
              <p class="errors-msg"></p>
              <div class="g-recaptcha" data-sitekey="6LfUEvQpAAAAABZlIBzegXpvRMnnVGGwtCKaUMZ2"></div>

              <div class="field">
                <ul class="actions">
                  <li><input type="submit" value="Enviar Mensagem" class="button primary" /></li>
                  <li><input type="reset" value="Limpar" class="clear-form" /></li>
                </ul>
              </div>
            </div>
          </div>
        </form>
      </section>
    </section>
  </main>

@endsection