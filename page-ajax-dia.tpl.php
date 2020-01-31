<div class="listagem-resultados">
    <div class="col-md-12">
	
	     <?php foreach($node as $key => $value): ?>
			<?php  $dia1[$key]   = $node[$key]->field_data_do_evento['und'][0]['value']; ?>
			<?php  $titulo[$key] = $node[$key]->title; ?>
		<?php endforeach; ?>
		<?php array_multisort($dia1, SORT_ASC, $titulo, SORT_ASC, $node); ?>
		
        <?php foreach($node as $key => $value): ?>
			<?php  $dia_field  = date('d', $node[$key]->field_data_do_evento['und'][0]['value']); ?>
			<?php  $mes_field  = date('n', $node[$key]->field_data_do_evento['und'][0]['value']); ?>
			<?php  $dia_field2 = date('d', $node[$key]->field_data_do_evento['und'][0]['value2']); ?>
			<?php  $mes_field2 = date('n', $node[$key]->field_data_do_evento['und'][0]['value2']); ?>
		
        <?php if($dia == $dia_field && $mes == $mes_field): ?>
        
        <div class="box-eventos" data-filter="-eventos" data-tipo-evento="<?php print $node[$key]->field_tipo_de_evento['und'][0]['tid'];?>">

            <div class="ev-periodo ev-cor-eventos">
                <?php if(date('d', $node[$key]->field_data_do_evento['und'][0]['value']) != date('d', $node[$key]->field_data_do_evento['und'][0]['value2']) && $node[$key]->status == 1): ?>
                <span class="ev-date-box">
                    <span class="ev-dia"><?php print date('d', $node[$key]->field_data_do_evento['und'][0]['value']); ?></span>
                    <span class="ev-mes"><?php print t(date('M', $node[$key]->field_data_do_evento['und'][0]['value'])); ?></span>
		       
                </span>
                <?php endif; ?>
                <span class="ev-date-box">
                    <span class="ev-dia"><?php print date('d', $node[$key]->field_data_do_evento['und'][0]['value2']); ?></span>
                    <span class="ev-mes"><?php print t(date('M', $node[$key]->field_data_do_evento['und'][0]['value2'])); ?></span>
					
                </span>
            </div>
            <p class="ev-descricao">
                <a href="/node/<?php print $node[$key]->tid;?>"><?php print utf8_encode($node[$key]->title); ?></a>
            </p>
        </div>
        <?php elseif($dia == $dia_field2 && $mes == $mes_field2): ?>
        
        <div class="box-eventos" data-filter="-eventos" data-tipo-evento="<?php print $node[$key]->field_tipo_de_evento['und'][0]['tid'];?>">

            <div class="ev-periodo ev-cor-eventos">
                <?php if(date('d', $node[$key]->field_data_do_evento['und'][0]['value']) != date('d', $node[$key]->field_data_do_evento['und'][0]['value2']) && $node[$key]->status == 1): ?>
                <span class="ev-date-box">
                    <span class="ev-dia"><?php print date('d', $node[$key]->field_data_do_evento['und'][0]['value']); ?></span>
                    <span class="ev-mes"><?php print t(date('M', $node[$key]->field_data_do_evento['und'][0]['value'])); ?></span>
                </span>
                <?php endif; ?>
                <span class="ev-date-box">
                    <span class="ev-dia"><?php print date('d', $node[$key]->field_data_do_evento['und'][0]['value2']); ?></span>
                    <span class="ev-mes"><?php print t(date('M', $node[$key]->field_data_do_evento['und'][0]['value2'])); ?></span>
                </span>
            </div>
            <p class="ev-descricao">
                <a href="/node/XYZ<?php print $node[$key]->tid;?>"><?php print $node[$key]->title;?></a>
            </p>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
	
    </div>
</div>
