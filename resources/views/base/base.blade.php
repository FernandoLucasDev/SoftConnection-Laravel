<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>

  <section>
    <header>
      <div class="header-content">
        <img src="{{ asset('img/logo.png') }}" class="logo-header" alt="logotipo">
          @if(session('isLogged') == false)
            <div class="button-header @yield('is_active_home')" onclick="window.location.assign('/')">
              <p class="header-links-text"><i class="fa-solid fa-house icon-header"></i> Home</p>
            </div>
          @endif
          @if(session('type') == 'C' || session('isLogged') == false)
            <div class="button-header @yield('is_active_progress')" 
              @if(session('isLogged'))
                onclick="window.location.assign('/cliprogress')"
              @else
                onclick="window.location.assign('/clicad')"
              @endif
              >
           <p class="header-links-text">
             @if(session('isLogged'))
             <i class="fa-solid fa-percent icon-header"></i>
              Projetos em andamento
             @else
             <i class="fa-solid fa-user icon-header"></i> 
              Sou cliente
             @endif
           </p>
          </div>
         @if(session('type') == 'C')
            <div class="button-header @yield('is_active_planning')" onclick="window.location.assign('/cliplannig')">
              <p class="header-links-text"><i class="fa-solid fa-star icon-header"></i> Projetos em planejamento</p>
            </div>
            <div class="button-header @yield('is_active_customers')" onclick="window.location.assign('/clitoplannig')">
              <p class="header-links-text"><i class="fa-solid fa-clock icon-header"></i> Projetos para planejar</p>
            </div>
          @endif
          @endif
        @if(session('type') == 'A')
            <div class="button-header @yield('is_active_admin')"onclick="window.location.assign('/admin')" >
            <p class="header-links-text"><i class="fa-solid fa-lock icon-header"></i> Admin</p>
          </div>
          @endif
          @if(session('type') == 'D' || session('isLogged') == false)
            <div class="button-header @yield('is_active_devs')" 
              @if(session('isLogged'))
                onclick="window.location.assign('/')"
              @else
                onclick="window.location.assign('/devcad')"
              @endif
              >
            <p class="header-links-text"><i class="fa-solid fa-mug-hot icon-header"></i> Sou profissional</p>
          </div>
          @endif
        <div class="button-header @yield('is_active_about')" onclick="window.location.assign('/')">
          <p class="header-links-text"><i class="fa-solid fa-info icon-header"></i>Sobre</p>
        </div>
        @if (session('isLogged'))
          <div class="button-header @yield('is_active_about')" onclick="window.location.assign('/logout')" style="color:orangered;">
          <p class="header-links-text"><i class="fa-solid fa-arrow-right-from-bracket icon-header"></i>Logout</p>
        </div>
        @endif
         <div class="button-header-mob @yield('is_active_about')" onclick="" style="border:none;">
         <i class="" id="mob-menu" onclick="openMenu();"></i>
        </div>
      </div>
    </header>
    <div id="space-to-menu"></div>
  </section>
  @yield('content')

  <section>
    <div class="div-footer">
      <p><strong>SoftConn&copy; {{ date('Y') }}</strong</p>
    </div>
  </section>

 <script>

    let menu_button = document.getElementById("mob-menu");
    const links = document.querySelectorAll('.header-links-text');
    const divs = document.querySelectorAll('.button-header');

   function heddenElemet(){
       
        for(let i = 0; i < divs.length; i++) {
            divs[i].style.display = 'none';
            divs[i].style.width = '0px';
        }
        for(let i = 0; i < links.length; i++) {
            links[i].style.display = 'none';
        }
        menu_button.className = "fa-solid fa-bars fa-lg icon-header";
    }

    function apearElemet(){
        for(let i = 0; i < divs.length; i++) {
            divs[i].style.display = 'block';
            divs[i].style.width = 'fit-content';
            divs[i].style.display = 'flex';
            divs[i].styleplaceItems  = 'center';
            // divs[i].style.width = 'fit-content';
        }
        for(let i = 0; i < links.length; i++) {
            links[i].style.display = 'block';
        }
        menu_button.className = "";
    }

   function openMenu(){
        let menu = document.getElementById("mob-menu");
        let mobButton = document.getElementById('space-to-menu');
        mobButton.innerHTML = `<div class="mob-content-menu" style="background:#330066;">
      @if (!session('isLogged'))
        <div onclick="window.location.assign('/')" style="padding: 15px; display:grid; place-items:center; width: 70%;">
          <p>Home</p>
        </div>
        <div onclick="window.location.assign('/clicad')" style="padding: 15px; display:grid; place-items:center; width: 70%;">
          <p>Sou cliente</p>
        </div>
        <div onclick="window.location.assign('/devcad')" style="padding: 15px; display:grid; place-items:center; width: 70%;">
          <p>Sou desenvolvedor</p>
        </div>
      @endif
      @if(session('type') == 'C')
        <div onclick="window.location.assign('/cliprogress')" style="padding: 15px; display:grid; place-items:center; width: 70%;">
            <p>Projetos em andamento</p>
        </div>
        <div onclick="window.location.assign('/cliplannig')" style="padding: 15px; display:grid; place-items:center; width: 70%;">
            <p>Projetos em planejamento</p>
        </div>
        <div onclick="window.location.assign('/clitoplannig')" style="padding: 15px; display:grid; place-items:center; width: 70%;">
            <p>Projetos para planejar</p>
        </div>
      @endif
      @if(session('type') == 'D')
        <div style="padding: 15px; display:grid; place-items:center; width: 70%;">
            <p>Projetos em execução</p>
        </div>
        <div style="padding: 15px; display:grid; place-items:center; width: 70%;">
            <p>Seu perfil</p>
        </div>
        <div style="padding: 15px; display:grid; place-items:center; width: 70%;">
            <p>Ver currículo</p>
        </div>
      @endif
      <div style="padding: 15px; display:grid; place-items:center; width: 70%;">
        <p>Sobre</p>
      </div>
      @if(session('isLogged'))
      <div onclick="window.location.assign('/logout')" style="padding: 15px; display:grid; place-items:center; width: 70%;">
        <p>Logout</p>
      </div>
      @endif
    </div>`;
      menu.onclick = closeMenu;
      menu_button.className = "fa-solid fa-x fa-lg icon-header";
    }

   const mediaQuery = window.matchMedia('(max-width: 750px)');
    
    if (mediaQuery.matches) {
        heddenElemet();
    } 
    mediaQuery.addListener((mediaQueryList) => {
        if (mediaQueryList.matches) {
            heddenElemet();
        } else {
           apearElemet();
        }
    });

    function closeMenu(){
        let menu = document.getElementById("space-to-menu");
        let mobButton = document.getElementById('mob-menu');
        menu.innerHTML = ``;
        menu_button.className = "fa-solid fa-bars fa-lg icon-header";
        mobButton.onclick = openMenu;
    }

  
</script>
    
</body>
</html>