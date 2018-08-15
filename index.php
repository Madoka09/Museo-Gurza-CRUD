<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo de los Gurza</title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="css/uikit.min.css">

    <link rel="stylesheet" href="css/layouts/side-menu.css">
    <link rel="icon" type="image/png" href="img/favico.png">
</head>

<body>

    <div id="layout">
        <!-- Menu toggle -->
        <a href="#menu" id="menuLink" class="menu-link">
            <!-- Hamburger icon -->
            <span></span>
        </a>

        <div id="menu">
            <div class="pure-menu">
                <a class="pure-menu-heading" href="index.html">
                    <img src="img/gurza-logo.jpg">
                </a>

                <ul class="pure-menu-list">
                    <li class="pure-menu-item">
                        <a href="#gallery-cont" class="pure-menu-link" uk-scroll>Exposiciones</a>
                    </li>

                    <li class="pure-menu-item">
                        <a href="#video-cont" class="pure-menu-link" uk-scroll>Videos</a>
                    </li>

                    <li class="pure-menu-item">
                        <a href="#social" uk-toggle class="pure-menu-link">Redes Sociales</a>
                    </li>
                    
                    <li class="pure-menu-item">
                        <a href="#" class="pure-menu-link">Libreria</a>
                    </li>                    

                    <li class="pure-menu-item menu-item-divided pure-menu-selected">
                        <a href="#contact" uk-toggle class="pure-menu-link">Encuéntranos</a>
                    </li>
                </ul>
                
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h1 id="#top">Museo de Historia y Arte</h1>
                <h2>Palacio de los Gurza</h2>
            </div>
            
            <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="animation: push; autoplay: true">    
            <ul class="uk-slideshow-items">
            <?php
                    include 'dbConfig.php';
                    //Obtener imagenes de la base de datos
                    $query_slide = $db->query("SELECT * FROM slideshow");
                    if ($query_slide->num_rows > 0) {
                        while ($row = $query_slide->fetch_assoc()) {
                            $slide_element = $row['slide_img'];
                ?>
                
                    <li>
                        <img src="<?php echo $slide_element; ?>" uk-cover>
                    </li>
                    <?php } ?>
            <?php } ?>
                </ul>
                
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                
            </div>
            

            <!--MODAL CONTACTO-->
            <div id="modal-close-default" uk-modal>
                <div id="contact" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <h2 class="uk-modal-title uk-text-center">Contacto</h2>
                        <div class="uk-column-1-2 uk-column-divider">
                            <ul class="uk-list">
                                <li>Dirección</li>
                                <li>Negrete 901, Pte. Zona Centro</li>
                                <hr class="uk-divider-icon">
                                <li>Horario</li>
                                <li>De martes a viernes de 10:00 a 18:00 hrs. Sábado y domingo de 11:00 a 18:00 hrs.</li>
                                <hr class="uk-divider-icon">
                                <li>Costo</li>
                                <li>$10.00</li>
                                <li>$5.00 (Estudiantes con credencial y personas de la tercera edad)</li>
                                <hr class="uk-divider-icon">
                                <li>Teléfono</li>
                                <li>(618) 811 17 20</li>
                                <hr class="uk-divider-icon">
                                <li>Mapa</li>
                            </ul>
                            <div id="map">
                                <script src="js/map.js"></script>
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YIN1OhNoeS6o0hegdVOw8TbOlZejO_I&callback=initMap">
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--MODAL REDES SOCIALES-->
            <div id="modal-close-default" uk-modal>
                <div id="social" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <h2 class="uk-modal-title uk-text-center">Nuestras Redes Sociales</h2>
                        <hr class="uk-divider-icon">
                        <a href="https://www.facebook.com/palacio.delosgurza/"><img src="img/fb-logo.png" style="width: 8vh; height: 8vh;"></a>
                    </div>
                </div>
            </div>

             <!--MODAL VIDEO-->
             <div id="modal-close-default" uk-modal>
                <div id="video" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <h2 class="uk-modal-title uk-text-center">Videos</h2>
                        <hr class="uk-divider-icon">
                        <div id="fb-root"></div>
                        <ul class="uk-thumbnav" uk-margin uk-lightbox>
                        <?php
                            include 'dbConfig.php';
                            //Obtener imagenes de la base de datos
                            $query_vid = $db->query("SELECT * FROM videos");
                            if ($query_vid->num_rows > 0) {
                                while ($row = $query_vid->fetch_assoc()) {
                                    $vid_element = $row['vid_link'];
                                    $exploded = explode("=", $vid_element);
                                    $video_route = "http://img.youtube.com/vi/".$exploded[1]."/0.jpg";
                            ?>

                            <li><a href='<?php echo $vid_element;?>'><img id="boxy" src='<?php echo $video_route; ?>'></a></li>
                        

                            <?php } ?>
                           <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>


        </div>


        <div class="content">
            <h2 class="content-subhead" uk-parallax="opacity: 0,1,1; x: -100,-100,0; viewport: 0.5">¿Qué es?</h2>
            <iframe src="https://www.youtube.com/embed/96qDAyhLz4Q#t=10h" width="560" height="315" frameborder="0" allowfullscreen uk-responsive uk-video uk-parallax="opacity: 0,1,1; x: -100,-100,0; viewport: 0.5"></iframe>
        </div>
        <div class="uk-height-large uk-background-cover uk-overflow-hidden uk-light uk-flex uk-flex-top" style="background-image: url('img/parallax-bg-1.jpg');">
            <div class="uk-width-1-2@m uk-text-justify uk-margin-auto uk-margin-auto-vertical">
                <h1 class="uk-text-center" uk-parallax="opacity: 0,1,1; y: -100,0,0; x: 100,100,0; scale: 2,1,1; viewport: 0.5;">Algo de Historia...</h1>
                <hr class="uk-divider-icon">
                <p uk-parallax="opacity: 0,1,1; y: 100,0,0; x: -100,-100,0; scale: 0.5,1,1; viewport: 0.5;">El Museo de Historia y Arte; Palacio de los Gurza, fue inaugurado el día 8 de Septiembre de 2010. Durante
                    casi seis décadas (1953-2009), albergó al periódico "El Sol de Durango". Su historia se remonta a fines
                    del siglo XVIII y es descrita en esa época como "una casa vieja, maltratada y de adobe".
                </p>
                <p uk-parallax="opacity: 0,1,1; y: 100,0,0; x: -100,-100,0; scale: 0.5,1,1; viewport: 0.5;">En ese entonces el inmueble era propiedad de María Gertrudis Javiera Barraza, esposa del Teniente de Alcalde
                    Mayor de Santiago Papasquiaro.</p>
            </div>
        </div>

        <br>

        <div class="content">
            <h2 class="content-subhead" id="gallery-cont" uk-parallax="opacity: 0,1,1; y: -100,0,0; x: -100,-100,0; scale: 2,1,1; viewport: 0.5;">Exposiciones</h2>
            <ul class="content" uk-accordion>
            <?php
            include 'dbConfig.php';
            $query = $db->query("SELECT * FROM expo");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $nombre_expo = $row["nombre_expo"];
                    $descripcion_expo = $row["descripcion_expo"];
                    $galeria_expo = $row["galeria"];
                    $date = $row["fecha"];
                    ?>
                    
                <li>
                    <a class="uk-accordion-title"><?php echo $nombre_expo; ?></a>
                    <div class="uk-accordion-content"><?php echo $descripcion_expo; ?>
                    <hr clas="uk-nav-divider">
                    <div class="uk-column-1-4@m" uk-lightbox>
                            <?php
                            $query_img = $db->query("SELECT * FROM images WHERE galeria = $galeria_expo");
                            if ($query_img->num_rows > 0) {
                                while ($row = $query_img->fetch_assoc()) {
                                    $file_name = $row["file_name"];
                                    $galeria = $row["galeria"];
                                ?>

                            <a class="uk-inline" href="<?php echo $file_name; ?>">
                                <img src="<?php echo $file_name; ?>" alt="">
                            </a>
                
                        

                    <?php 
                  }
                  ?></div>
                  <p class="uk-text-meta">Posteado en:</p>
                  <p class="uk-text-meta"><?php echo $date; ?></p>
                    </div> <?php }?>
                    
    
                </li>
                
                <?php 
            }
        } ?>

        </div>

        <div class="uk-height-large uk-background-cover uk-overflow-hidden uk-light uk-flex uk-flex-top uk-margin-auto" style="background-image: url('img/parallax-bg-1.jpg');">
            <div class="uk-width-1-2@m uk-text-justify uk-margin-auto uk-margin-auto-vertical">
                <h1 class="uk-text-center" uk-parallax="opacity: 0,1,1; y: -100,0,0; x: 100,100,0; scale: 2,1,1; viewport: 0.5;">Videos</h1>
                <hr class="uk-divider-icon">
                <a uk-parallax="opacity: 0,1,1; y: 100,0,0; x: -100,-100,0; scale: 0.5,1,1; viewport: 0.5;" class="uk-button uk-button-default uk-align-center" href="#video" uk-toggle>Abrir Sección de Videos</a>
            </div>
        </div>
        <div>
        </div>

        <a id="video-cont" class="uk-button uk-button-default uk-width-1-1" href="#top" uk-scroll>Ir al Cielo</a>
    </div>
    </div>
    <script src="js/ui.js"></script>
    <script src="js/uikit.js"></script>
    <script src="js/uikit-icons.js"></script>
</body>
</html>