<div id="mainnav-profile" class="mainnav-profile">
    <div class="profile-wrap">
        <div class="pad-btm">
            <img src="{{ Auth::user()->getProfilePicture() }}"
                 class="img-lg img-border img-circle"
                 alt="Profile Picture">
        </div>
        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
            <span class="pull-right dropdown-toggle">
                <i class="dropdown-caret"></i>
            </span>

            @if(Auth::check())
                <p class="mnp-name">&#64;{{ Auth::user()->username }}</p>
                <span class="mnp-desc">{{ Auth::user()->perfil->name }}</span>
            @endif
        </a>
    </div>

    <div id="profile-nav" class="collapse list-group bg-trans">

        <a href="#" class="list-group-item" onclick="logout();">
            <i class="demo-pli-unlock icon-lg icon-fw"></i> Sair
        </a>

        @push("scripts")
            <script type="text/javascript">
                function logout()
                {
                    $("#frmLogoutProfile").submit();
                }
            </script>
        @endpush

    </div>
</div>

