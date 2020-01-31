<!--home news panel + box acontece na puc inicio-->
<section class="container-fluid">
    <div class="row no-gutters">
        <div class="col-12 wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="title-sub-pages">
                        <h2>Artigos</h2>
                        <p>Índice geral de artigos publicados organizados pela data de publicação.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">


                    <!--listagem -noticias inicio-->
                    <div class="listagem-container drupal-view-render">
                        
                        <?php 
                        $arg = arg(2);
                        print $view = views_embed_view('artigo', 'page_artigo_list_category', $arg); 

                        ?>
                    </div>
                    <!--listagem -noticias fim-->

                </div>
                <div class="col-md-4 col-sm-12 -side-bar">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-sm-6 -side-bar-item">
                            <!--sub-home last news col right inicio-->
                            <section class="container-fluid news-list-wrapper">
                                <div class="row no-gutters">
                                    <div class="col">
                                        <!--title bar inicio-->
                                        <div class="title-bar -icon-eye -agenda -plus">
                                            <h3><a href="#">Os Artigos Mais Lidos</a></h3>
                                            <!--<a href="#" class="-plus"><span>Mais</span></a>-->
                                        </div>
                                        <!--title bar fim-->
                                        <div class="news-list">
                                            <?php   print $artigos_mais_lidos = views_embed_view('artigo', 'artigos_mais_lidos');  ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--sub-home last news col right fim-->
                        </div>
                        <div class="col-md-12 col-sm-6 -side-bar-item">
                            <!--sub-home agenda col right inicio-->
                            <?php /* Bloco Agenda Slider inicio */?>
                                            <?php
                                                $agora = new DateTime();
                                                $ano_agenda = $agora->format("Y");
                                                $mes_agenda = $agora->format("n");
                                            ?>
                                            <section class="container-fluid agenda-wrapper -sub-home">
                                                <!--<div class="row no-gutters">-->
                                                    <div class="wrapper">
                                                        <!--title bar inicio-->
                                                        <div class="title-bar -icon-agenda -agenda -plus">
                                                            <h3><a href="/agenda/<?php print $ano_agenda;?>/<?php print $mes_agenda;?>">Agenda</a></h3>
                                                            <div class="agenda-legend">
                                                                <span class="-eventos"><a href="#" data-title-legend="eventos">eventos</a></span>
                                                                <span class="-institucional"><a href="#" data-title-legend="calendário institucional">cal. institucional (destaques)</a></span>
                                                                <span class="-comemorativas"><a href="#" data-title-legend="datas comemorativas">datas comemorativas</a></span>
                                                                <span class="-feriados"><a href="#" data-title-legend="feriados">feriados</a></span>
                                                                <!--<span class="-todos"><a href="#">todos os itens</a></span>-->
                                                            </div>
                                                            <a href="/agenda/<?php print $ano_agenda;?>/<?php print $mes_agenda;?>" class="-plus"><span>Mais</span></a>
                                                        </div>
                                                        <!--title bar fim-->
                                                        <!--agenda slider inicio-->
                                                        <div class="agenda-slider" data-filter="-eventos">
                                                            <div class="inner">
                                                                <?php 
                                                print $agenda_slider = views_embed_view('agenda', 'agenda_slider');
                                            ?>

                                                            </div>
                                                        </div>
                                                        <!--agenda slider fim-->
                                                    </div>
                                                <!--</div>-->
                                            </section>
                                            <?php /* Bloco Agenda Slider fim */?>
                            <!--sub-home agenda col right fim-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
<!--home news panel + box acontece na puc fim-->
