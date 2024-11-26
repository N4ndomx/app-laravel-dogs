@extends('layouts.template')

@section('content')
  <!--Menu superior-->
    <section class="bienvenidos">
       
        <!--Titulo de pagina-->
        <div class="texto-encabezado text-center">
            <div class="container">
                <h1 class="display-4 wow bounceIn">Nosotros</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">¿Quienes somos? y ¿Que hacemos?.</p>
            </div>
        </div>
    </section>

   
        <div class="container">
            <div class="row">
                <article class="col-md-8">
                    <!--Texto fijo-->
                    <h2>Trabajamos para tu éxito</h2>
                    <p>La veterinaria apuesta por la simplicidad, la actualidad y la originalidad.</p>
                    <p>Nuestro objetivo es conseguir que clientes y usuarios se sientan conectados en el nuevo mundo de la información con servicios y contenidos que no dificulten su relación, sino que la simplifiquen y la conviertan en un hecho cotidiano,
                        agradable y satisfactorio</p>
                    <p>
                        <!--Componente de acordeon para la mision, visión y los valores-->
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h4 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#tab-mision" aria-controls="collapseOne">
                                  Misión
                                </a>
                                    </h4>
                                </div>

                                <div id="tab-mision" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                            on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </p>
                </article>
                
            </div>
        </div>
    
@endsection