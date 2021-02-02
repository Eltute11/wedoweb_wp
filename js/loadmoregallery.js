jQuery(function($){
	$('#load_more_items_gallery').click(function(){

    var spinner = $('.spinner');
		var button = $(this),
		    data = {
          'action': 'loadmore',
          'query': posts_myajax, // recuperamos los datos obtenidos desde el Front
			    'page' : current_page_myajax // recuperamos los datos obtenidos desde el Front
		};
 
		$.ajax({ 
			url : loadmore_params.ajaxurl, 
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
        spinner.removeClass('hidden');
				button.text('Loading...');
			},
			success : function( data ){
				if( data ) { 
          spinner.addClass('hidden');
          button.text( 'Load more' );
          $('#gallery_list').append(data); // insertamos el nuevo contenido
					current_page_myajax++;
 
          // Si es la última página, eliminamos los botones
					if ( current_page_myajax == max_page_myajax ){
						button.remove();
            spinner.addClass('hidden');
          }
 
					// Recomendado para ciertos plugins que deben ser informados
					$( document.body ).trigger( 'post-load' );
				} else {
          // Aca no debería entrar nunca la ejecucion
          // Si no hay datos eliminamos el boton
					button.remove(); 
				}
      },
      error: function(data){
        spinner.addClass('hidden');
        button.text( data.messeage);
      }
		});
	});
});