@extends("layouts.app")

@section("content")
<h1 class="titulo fs-1">Gimnasio de Oviedo</h1>
<div class="borde"></div>
<section class="row ps-5 pe-0 w-100" id="empresa">
    <img class="ms-5 mt-5 col-lg-6" src="{{asset('images/inst/pexels-photo-1954524.jpeg')}}" alt="Imagen Gimnasio">
    <p class="ms-5 mt-5 fs-4 text-white col-lg-5">Somos un pequeño gimnasio en Oviedo con <b>años de experiencia</b> ayudando a nuestros clientes a ponerse, mantenerse en forma, aprender artes marciales y mejorando su actividad física. En el centro tenemos unas <b>instalaciones deportivas de última tecnología</b> para un mejor entrenamiento, y contamos con <b>monitores y entrenadores personales profesionales</b> que ayudan a estos clientes.</p>
</section>
<h1 class="titulo fs-1 mt-5">Ubicación</h1>
<div class="borde"></div>
<section class="row ps-5 pe-0 w-100">
        <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Calle%20Pedro%20Caravia%209+(GimnasioTaiyang)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">bike gps</a></iframe>
</section>
@endsection
