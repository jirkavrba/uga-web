@extends("layout.master")

@section("header")
    <header style="background: #7289DA;">
        <div class="container py-5">
            <div class="row d-flex align-items-center">
                <div class="col-sm-12 col-md-6 text-center text-md-left">
                    <h1 class="display-3 text-white font-weight-bold">UGA</h1>
                    <h2 class="h4 text-white">Univerzitní Gaming Asociace</h2>
                </div>
                <a class="col-sm-12 col-md-6 text-center d-block" href="https://discord.gg/BpuFRRB" target="_blank">
                    <img src="{{ asset("/images/invite.png") }}" alt="Discord invite link"
                         style="width: 200px; height: 200px;">
                    <div class="text-center mt-2 lead text-white">Náš Discord server</div>
                </a>
            </div>
        </div>
    </header>
@endsection
