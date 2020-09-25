<a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
    <span class="lang-selected">
        <img class="lang-flag" src="{{ asset("admin/img/flags/" . App::getLocale() . ".png") }}">
    </span>
</a>

<!--Language selector menu-->
<ul class="head-list dropdown-menu">
    <li>
        <!--Brazil-->
        <a href="#" active>
            <img class="lang-flag" src="{{ asset("admin/img/flags/pt-br.png ") }}" alt="Brazil">
            <span class="lang-id">BR</span>
            <span class="lang-name">Português - Brasil</span>
        </a>
    </li>
    @if(false)
        <li class="disabled">
            <!--Spain-->
            <a href="#">
                <img class="lang-flag" src="{{ asset(" img/flags/es.png ") }}" alt="Spain">
                <span class="lang-id">ES</span>
                <span class="lang-name">@lang('messages.Espanhol')</span>
            </a>
        </li>
        <li class="disabled">
            <!--English-->
            <a href="#">
                <img class="lang-flag" src="{{ asset(" img/flags/en.png ") }}" alt="English">
                <span class="lang-id">EN</span>
                <span class="lang-name">@lang('messages.Ingles')</span>
            </a>
        </li>
        <li class="disabled">
            <!--France-->
            <a href="#">
                <img class="lang-flag" src="{{ asset(" img/flags/fr.png ") }}" alt="France">
                <span class="lang-id">FR</span>
                <span class="lang-name">@lang('messages.Frances')</span>
            </a>
        </li>
        <li class="disabled">
            <!--Germany-->
            <a href="#">
                <img class="lang-flag" src="{{ asset(" img/flags/de.png ") }}" alt="Germany">
                <span class="lang-id">DE</span>
                <span class="lang-name">@lang('messages.Alemao')</span>
            </a>
        </li>
        <li class="disabled">
            <!--Italy-->
            <a href="#">
                <img class="lang-flag" src="{{ asset(" img/flags/it.png ") }}" alt="Italy">
                <span class="lang-id">IT</span>
                <span class="lang-name">@lang('messages.Italiano')</span>
            </a>
        </li>
    @endif
</ul>
