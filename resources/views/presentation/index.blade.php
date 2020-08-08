@extends("layout.master")

@section("header")
    <header class="@admin bg-danger @else bg-discord @endadmin">
        <div class="container py-5">
            <div class="row d-flex flex-column flex-md-row align-items-center align-items-md-center">
                <div class="flex-grow-1 text-center text-md-left">
                    <h1 class="display-3 text-white font-weight-bold">UGA</h1>
                    <h2 class="h4 text-white">Univerzitní Gaming Asociace</h2>
                </div>
                <a class="flex-grow-0 text-center d-block" href="https://discord.gg/BpuFRRB" target="_blank">
                    <div class="text-center">
                        <img src="{{ asset("/images/invite.png") }}" alt="Discord invite link"
                             style="width: 200px; height: 200px;">
                        <div class="text-center mt-2 lead text-white">Náš Discord server</div>
                    </div>
                </a>
            </div>
        </div>
    </header>
@endsection
