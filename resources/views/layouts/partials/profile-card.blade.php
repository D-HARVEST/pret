<a class="nav-link position-relative ms-6 dropdown hover-dd" data-bs-toggle="dropdown" aria-expanded="false"
        @if (Route::currentRouteName() == 'boutique')
        onclick=" $(this).parent().find('.dropdown-menu:first').dropdown('toggle');"
        @endif
    >
    <div class="d-flex align-items-center flex-shrink-0">
        <div class="user-profile me-sm-3 me-2">
            @if (Auth::user()->image)
                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" width="45" class="rounded-circle"
                    alt="">
            @else
                <img src="{{ asset('spike/assets/images/profile/user-1.jpg') }}" width="45" class="rounded-circle"
                    alt="">
            @endif
        </div>
        <span class="d-sm-none d-block"><iconify-icon icon="solar:alt-arrow-down-line-duotone"></iconify-icon></span>


    </div>
</a>
<div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1"
    id="dropdownProfil">
    <div class="profile-dropdown position-relative" data-simplebar>
        <div class="d-flex align-items-center justify-content-between pt-3 px-7">
            <h3 class="mb-0 fs-5">Mon Compte</h3>
            <button type="button" class="border-0 bg-transparent" aria-label="Close"
                @if (Route::currentRouteName() == 'boutique')
                    onclick=" $(this).parent().find('.dropdown-menu:first').dropdown('toggle');"
                @endif
                >
                <iconify-icon icon="solar:close-circle-line-duotone" class="fs-7 text-muted"></iconify-icon>
            </button>
        </div>

        <div class="d-flex align-items-center mx-7 py-9 border-bottom">
            @if (Auth::user()->image)
                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" width="45" class="rounded-circle"
                    alt="">
            @else
                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user" width="90"
                    class="rounded-circle">
            @endif
            <div class="ms-4">
                <h4 class="mb-0 fs-5 fw-normal">{{ Auth::user()->name ?? '-' }}</h4>
                <span class="text-muted">
                    @role('Super-admin')
                        Administrateur
                    @endrole
                    @role('client')
                        Client
                    @endrole
                </span>
                <p class="text-muted mb-0 mt-1 d-flex align-items-center">
                    <iconify-icon icon="solar:mailbox-line-duotone" class="fs-4 me-1"></iconify-icon>
                    {{ Auth::user()->email ?? '-' }}
                </p>
            </div>
        </div>

        <div class="message-body">
            <a href="{{route('profile.show')}}" class="dropdown-item px-7 d-flex align-items-center py-6">
                <span class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                    <iconify-icon icon="solar:wallet-2-line-duotone" class="fs-7"></iconify-icon>
                </span>
                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                    <h5 class="mb-0 mt-1 fs-4 fw-normal">
                        Mon Compte
                    </h5>
                    <span class="fs-4 text-nowrap d-block fw-normal mt-1 text-muted">Paramètres du compte</span>
                </div>
            </a>

        </div>

        <div class="py-6 px-7 mb-1">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger w-100 rounded-1">
                    Déconnexion
                </button>

            </form>
        </div>
    </div>
</div>

<style>
    /* Augmenter la taille du dropdown */
#dropdownProfil {
    width: 350px !important; /* Augmente la largeur */
    min-height: 250px; /* Ajuste la hauteur */
}

/* Agrandir le profil utilisateur */
.profile-dropdown {
    padding: 20px;
}

/* Agrandir l'image du profil */
.profile-dropdown img.rounded-circle {
    width: 70px !important; /* Augmenter la taille */
    height: 70px !important;
}

/* Ajuster la zone des informations */
.profile-dropdown .d-flex.align-items-center.mx-7 {
    padding: 15px 10px;
}

</style>
