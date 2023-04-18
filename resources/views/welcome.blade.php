@extends("layouts.app")

@section("content")
    <section class="video_fondo">
        <video autoplay muted loop id="video_fondo" class="mb-5">
            <source src="{{asset('video/Fondo.mp4')}}" type="video/mp4">
        </video>
        <h1 id="titulo_gimnasio">GIMNASIO 太阳</h1>
    </section>
    <section class="instalaciones">
        <h1 class="titulo fs-1">Gimnasio en oviedo</h1>
        <div class="borde"></div>
        <p class="text-white text-center fs-3 pb-3">Con unas instalaciones deportivas de última tecnología.</p>
        <div id="carouselIndicators" class="carousel slide w-50 m-auto" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('images/inst/gym-5977600_960_720.jpg')}}" class="d-block imagen_carousel" alt="imagen_carousel_1">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/inst/machines-91849_960_720.jpg')}}" class="d-block imagen_carousel" alt="imagen_carousel_2">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/inst/pexels-photo-416717.jpeg')}}" class="d-block imagen_carousel" alt="imagen_carousel_3">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/inst/pexels-photo-3775566.jpeg')}}" class="d-block imagen_carousel" alt="imagen_carousel_4">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/inst/pexels-photo-6253307.jpeg')}}" class="d-block imagen_carousel" alt="imagen_carousel_5">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>
    <section class="actividades mt-5">
        <h1 class="titulo fs-1">Principales actividades</h1>
        <div class="borde"></div>
        <div class="mini_galeria">
            <div class="card bg-dark text-white change">
                <img src="{{asset('images/act/pexels-photo-863988.jpeg')}}" alt="Imagen Aquagym">
                <h1 class="text-uppercase texto-imagen-centrado fs-1">Aquagym</h1>
            </div>
            <div class="card bg-dark text-white">
                <img src="{{asset('images/act/pexels-photo-4754139.jpeg')}}" alt="Imagen Boxeo">
                <h1 class="text-uppercase texto-imagen-centrado fs-1">Boxeo</h1>
            </div>
            <div class="card bg-dark text-white">
                <img src="{{asset('images/act/pexels-photo-7045384.jpeg')}}" alt="Imagen Taekwondo">
                <h1 class="text-uppercase texto-imagen-centrado fs-1">Taekwondo</h1>
            </div>
        </div>
        <div class="d-grid justify-content-end">
            <button type="submit" class="btn btn-warning me-5 bg-warning">
                <a href="actividades.html" class="text-decoration-none text-black fs-4">
                    Todas las actividades
                </a>
            </button>
        </div>
    </section>
@endsection
