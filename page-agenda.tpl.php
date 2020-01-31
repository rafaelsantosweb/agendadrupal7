<!--MAIN INICIO-->
<main class="main -main"> 
    <?php
        $agora = new DateTime();
        $ano_agenda = $agora->format("Y");
        $mes_agenda = $agora->format("n");
        $dia_agenda = $agora->format("d");
    ?>
        <!--home news panel + box acontece na puc inicio-->
        <section class="container-fluid">
            <div class="row no-gutters">
                <div class="col-md-12 wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title-sub-pages">
                                <h2>Agenda</h2>
                                <p><a href="http://www.pucsp.br/universidade/calendario" target="_blank">Acesse o calendário institucional na íntegra - clique aqui.</a></p>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 agenda-col">
                            <!--agenda inicio-->
                            <div class="listagem-container agenda-listagem-wrapper">
                                <div class="calendar" data-ano="<?php print $ano_agenda;?>" data-mes="<?php print $mes_agenda;?>" data-dia="<?php print $dia_agenda;?>">
                                    <!-- print agenda -->
                                    <?php print $variables['agenda']; ?>
                                    <!-- print agenda fim -->
                                </div>
                                <div id="ajax-target"></div>
                            </div>
                            <!--agenda fim-->


                        </div>

                        <!--marcação acontece na puc fim-->

                        <div class="col-md-4 col-sm-12 -side-bar">
                            <!--sub-home agenda col right inicio-->

                            <!--eventos slider inicio-->
                            <section class="events-slider-container">
                                <div class="titleMain">
                                    <div class="arrows-container"></div>
                                    <h3><a href="#">Acontece na PUC</a></h3>
                                </div>
                                <div class="inner">
                                    <!--evento item inicio-->
                                    <?php 
                                print $acontece_na_puc = views_embed_view('agenda', 'acontece_na_puc');
                            ?>
                                </div>
                            </section>
                            <!--eventos slider fim-->

                            <!--sub-home agenda col right fim-->

                        </div>
                        <!--marcação acontece na puc fim-->
                    </div>



                </div>
            </div>
        </section>
        <!--home news panel + box acontece na puc fim-->
</main>
<!--MAIN FIM-->

<script>
    (function() {
        var $diaLink = jQuery(".calendar-row").children('td').children('a');

        $diaLink.click(function(e) {

            e.preventDefault();
            $diaLink.removeClass('status-active');
            jQuery(this).addClass('status-active');
            var dia = this.getAttribute('id');
            var mes = this.getAttribute('data-mes');
            console.log(dia);
            console.log(mes);
            jQuery("#ajax-target").load("/agendas/" + mes + "/" + dia);
        });

    })();

    function agenda_ajax_load() {



    }

</script>

<script>
    (function() {
        var $diaLink = jQuery(".calendar-row").children('td').children('a');
        jQuery("div.sorting ul li a").click(function(e) {
            $diaLink.removeClass('status-active');
            e.preventDefault();
            var eventos = this.getAttribute('id');
			var mes = this.getAttribute('data-mes');
            console.log(eventos);
            jQuery("#ajax-target").load("/agenda/tipo-evento/" + eventos + "/" + mes);
        });

    })();

    function eventos_ajax_load() {



    }

</script>

<script>
    (function() {

        jQuery("#todos-eventos").click(function(e) {

            e.preventDefault();
            var eventos = this.id;
			var mes = this.getAttribute('data-mes');
            jQuery("#ajax-target").load("/agenda/todos-eventos/" + mes);
        });
        
        window.addEventListener('load',function(){
            var mes = jQuery("#todos-eventos").attr('data-mes');
            jQuery("#ajax-target").load("/agenda/todos-eventos/" + mes);
            
        }, false);

    })();

    function eventos_ajax_load() {



    }

</script>
<script>
    (function(win, doc) {
        'use strict';

        var $calendario = doc.querySelector('.calendar');

        function verifyCalendar(e) {
            return $calendario != undefined;
        }

        if (verifyCalendar() == true) {

            var $url = win.location,

                $ano = $url.toString().match(/(\/\d\d\d\d)/g),
                $ano = $ano.toString().replace('/', ''),

                $mes = $url.toString().match(/(\/\d\d\d\d)(\/\d\d?)/g),
                $mes = $mes.toString().replace('/' + $ano + '/', ''),

                $ano_servidor = $calendario.getAttribute('data-ano'),
                $mes_servidor = $calendario.getAttribute('data-mes'),
                $dia_servidor = $calendario.getAttribute('data-dia'),

                $btnPrev = doc.querySelector('.calendar-prev'),
                $btnNext = doc.querySelector('.calendar-next');

            console.log('Ano no servidor: ' + $ano_servidor);
            console.log('Mes no servidor: ' + $mes_servidor);
            console.log('Dia no servidor: ' + $dia_servidor);

            $btnPrev.addEventListener('click', prevtMonth, false);

            $btnNext.addEventListener('click', nextMonth, false);

            function prevtMonth() {
                if ($mes == 1) {
                    win.location.href = '/agenda/' + $ano + '/' + 12;
                } else {
                    win.location.href = '/agenda/' + $ano + '/' + (+$mes - 1);
                }
            }

            function nextMonth() {
                if ($mes == 12) {
                    win.location.href = '/agenda/' + $ano + '/' + 1;
                } else {
                    win.location.href = '/agenda/' + $ano + '/' + (+$mes + 1);
                }
            }

            doc.addEventListener('DOMContentLoaded', function() {

                if ($mes == $mes_servidor) {


                    var $diaBotao = jQuery(".calendar-row").children('td').children('a#' + $dia_servidor);
                    $diaBotao.addClass('status-active');

                    jQuery("#ajax-target").load("/agendas/" + $mes + "/" + $dia_servidor);
                } else {

                    console.log('não estamos no mês corrente');
                }

            }, false);
            //https://regex101.com/r/Z98F1M/3
        }
        //console.log(verifyCalendar());

    })(window, document);

</script>
