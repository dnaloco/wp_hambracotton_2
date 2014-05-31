<!DOCTYPE html>

<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hambra Cotton</title>
    
    <link rel="icon" 
      type="image/png" 
      href="<?php bloginfo('template_url') ?>/favicon.png" />
    
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
  </head>
  
  <body data-ng-app="HCApp">

  <div id="wrapper" data-ng-controller="BlogCtrl">

    <div class="row">

      <header id="cabecalho">
        <div class="large-2 columns">
          <div class="logo">
            <div class="img-logo"></div>
          </div>
        </div>

        <div class="large-10 columns">

            <div class="large-12 columns">
              <?php get_template_part('nav'); ?>
            </div>

            

            <div class="large-6 columns">
              <h1 class="header_title">HAMBRA COTTON Corretora</h1>
              <h4 class="header_subtitle">Cadastre seu email e receba as melhores ofertas do agronegócio em seu email!</h2>
            </div>
            <div class="large-6 columns">
              <div class="adr">
                <div class="street-address">Rua Plínio Pasque, n.° 151</div>
                <div class="extended-address">Parada Inglesa</div>
                <span class="locality">São Paulo</span>,
                <span class="postal-code">CEP 02244-030</span>
                <div class="telephone"><span class="tel">Telefone: 11 2631 3864 | Celular: 11 99287 0024 </span></div>
              </div>

            </div>
            
            <div class="large-6 columns" style="float: right;">

            </div>

        </div>


        <div class="clearfix"></div>
      </header>
    </div>
    
  