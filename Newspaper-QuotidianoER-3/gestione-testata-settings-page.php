<?php
/* ----------------- INIZIO Definizione per setting Gestione notizie in testata ----------------- */
	
// Definizione della classe per la creazione
// pagina delle opzioni nel pannello Admin per il Gestione notizie in testata  


	
	
class GestioneTestataSettingsPage
{
  // Memorizzazione opzioni per callback
  private $options;
  
  private $the_query_master;
  
  

  public function feed_the_cbtv_loop() {
	global $urljsonvideo;
	$cbtv_posts = array();
	         //Loop per video di CBTV
			 //$response = wp_remote_get( $urljsonvideo );
			 $response = wp_remote_get( 'https://cronacabianca.eu/tv/wp-json/wp/v2/video' );
	  
			 if ( is_wp_error( $response ) ) {
				 return;
			 }
		 
		   
			 $posts = json_decode( wp_remote_retrieve_body( $response ) );
	  
			 if ( ! empty( $posts ) ) {
	  
			  // For each post.
			  foreach ( $posts as $post ) {
				 $cbtv_posts[] = $post;
	              
				  //echo '	<option value="' .$post->id. '" ';
				  //if($post->id == $option) echo 'selected';
				  //echo ' >' . $post->title->rendered .'(sorgente:CBTV)'. '</option>';
	  
				  }
			  }
	  
			  //FINE LOOP CBTV
			
			return $cbtv_posts;
			
			}



  // Funzione costruttore per aggiungere le funzioni di
  // azione durante gli hook di admin_init e admin_menu  
  public function __construct() {
    add_action('admin_init',array($this,'page_init'));
    add_action('admin_menu',array($this,'page_menu'));
  }
  
  // Registrazione delle opzioni di configurazione
  // con definizione gruppo e sezione  
  public function page_init()
  {
    // Registrazione impostazioni che identificano il nome
    // del gruppo che sar� utilizzato nel form e la callback 
    register_setting(
      'my_option_group',           // option group
      'my_option_name',            // option name
      array($this,'page_sanitize') // sanitize
	);


	
    // Aggiungo la sezione che contiene i campi
    // che ci interessano come width e height 
    add_settings_section(
		'my_option_section_1',         // ID
		'Configurazione layout',      // title
		 array($this,'page_section_layout_testata'), // callback
		'my-setting-admin'           // page
	  );


	 
	// Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
		'layout_testata',              // ID
		'Scegli il layout della testata',  // title
		array( $this,'page_layout_testata'), // callback
		'my-setting-admin',          // page
		'my_option_section_1'         // section
	);
	
	
  
    // Aggiungo la sezione che contiene i campi
    // che ci interessano come width e height 
    add_settings_section(
      'my_option_section',         // ID
      'Configurazione Gestione notizie in testata',      // title
      array($this,'page_section'), // callback
      'my-setting-admin'           // page
	);
	

    // Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
      'articolo_id_1',              // ID
      'Apertura Sinistra',  // title
      array( $this,'page_articolo_id_1'), // callback
      'my-setting-admin',          // page
	  'my_option_section',          // section
	  array( 'class' => 'articolo_id_1' )   //class
	);
	

  	// Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
		'articolo_id_9',              // ID
		'Apertura Destra',  // title
		array( $this,'page_articolo_id_9'), // callback
		'my-setting-admin',          // page
		'my_option_section',          // section
		array( 'class' => 'articolo_id_9' )   //class
	  );

	// Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
		'articolo_id_10',              // ID
		'Apertura UNICA',  // title
		array( $this,'page_articolo_id_10'), // callback
		'my-setting-admin',          // page
		'my_option_section',          // section
		array( 'class' => 'articolo_id_10' )   //class
	  );
    
    // Aggiungo il campo per id video
	// nella sezione definita precedentemente 
	
    add_settings_field(
      'articolo_id_2',              // ID
      'Spalla unica',  // title
      array( $this,'page_articolo_id_2'), // callback
      'my-setting-admin',          // page
	  'my_option_section',          // section
	  array( 'class' => 'articolo_id_2' )   //class
	);
	
    
    // Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
      'articolo_id_3',              // ID
      'Spalla alta',  // title
      array( $this,'page_articolo_id_3'), // callback
      'my-setting-admin',          // page
	  'my_option_section',          // section
	  array( 'class' => 'articolo_id_3' )   //class
    );
    
    // Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
      'articolo_id_4',              // ID
      'Spalla bassa',  // title
      array( $this,'page_articolo_id_4'), // callback
      'my-setting-admin',          // page
	  'my_option_section',          // section
	  array( 'class' => 'articolo_id_4' )  //class
    );
    
	
    // Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
      'articolo_id_5',              // ID
      'Taglio  basso 1',  // title
      array( $this,'page_articolo_id_5'), // callback
      'my-setting-admin',          // page
	  'my_option_section',          // section
	  array( 'class' => 'articolo_id_5' )   //class
    );
    
    // Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
      'articolo_id_6',              // ID
      'Taglio  basso 2',  // title
      array( $this,'page_articolo_id_6'), // callback
      'my-setting-admin',          // page
	  'my_option_section',          // section
	  array( 'class' => 'articolo_id_6')   //class
	);
	
	// Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
		'articolo_id_7',              // ID
		'Taglio  basso 3',  // title
		array( $this,'page_articolo_id_7'), // callback
		'my-setting-admin',          // page
		'my_option_section',          // section
		array( 'class' => 'articolo_id_7' )   //class
	  );

	// Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
		'articolo_id_8',              // ID
		'Taglio  basso 4',  // title
		array( $this,'page_articolo_id_8'), // callback
		'my-setting-admin',          // page
		'my_option_section',          // section
		array( 'class' => 'articolo_id_8' )   //class
	  );
	// Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
		'articolo_id_11',              // ID
		'Spalla sinistra',  // title
		array( $this,'page_articolo_id_11'), // callback
		'my-setting-admin',          // page
		'my_option_section',          // section
		array( 'class' => 'articolo_id_11' )   //class
	  );

	// Aggiungo il campo per id video
    // nella sezione definita precedentemente 
    add_settings_field(
		'articolo_id_12',              // ID
		'Spalla destra',  // title
		array( $this,'page_articolo_id_12'), // callback
		'my-setting-admin',          // page
		'my_option_section',          // section
		array( 'class' => 'articolo_id_12' )   //class
	  );



	
  }


 
  // Aggiungo un template HTML da visualizzare
  // durante l'elaborazione della sezione definita
 
  public function page_section() {
    echo 'Inserisci i valori del Gestione notizie in testata.';
  }

  //pannello di controllo dei layout
  public function page_section_layout_testata() {
	echo 'Scegli il layout della testata.<br>';
  }


  public function page_layout_testata() {

    if(!isset($this->options['layout_testata'])) $option_layout = '';
	  else $option_layout = esc_attr($this->options['layout_testata']);	

	echo '<div class="ui-widget">'; 	
	echo '<select id="layout_testata" name="my_option_name[layout_testata]">';
	echo '<option value ="0" selected="selected">Scegli il layout</option>';
	echo '<option value="1" ';
	if ($option_layout == '1') echo 'selected';
	echo '>Primo layout</option>';
	echo '<option value="2" ';
	if ($option_layout == '2') echo 'selected';
	echo '>Secondo layout</option>';
	echo '<option value="3" ';
	if ($option_layout == '3') echo 'selected';
	echo '>Terzo layout</option>';
	echo '<option value="4" ';
	if ($option_layout == '4') echo 'selected';
	echo '>Quarto layout</option>';
	echo '</select>';
	echo '</div>';

  ?>
  <script>
	
	document.getElementById("layout_testata").addEventListener("change", function(e){
	var articolo_id_1 = document.getElementsByClassName('articolo_id_1'),i;
	var articolo_id_2 = document.getElementsByClassName('articolo_id_2'),i;
	var articolo_id_3 = document.getElementsByClassName('articolo_id_3'),i;
	var articolo_id_4 = document.getElementsByClassName('articolo_id_4'),i;
	var articolo_id_5 = document.getElementsByClassName('articolo_id_5'),i;
	var articolo_id_6 = document.getElementsByClassName('articolo_id_6'),i;
	var articolo_id_7 = document.getElementsByClassName('articolo_id_7'),i;
	var articolo_id_8 = document.getElementsByClassName('articolo_id_8'),i;
	var articolo_id_9 = document.getElementsByClassName('articolo_id_9'),i;
	var articolo_id_10 = document.getElementsByClassName('articolo_id_10'),i;
	var articolo_id_11 = document.getElementsByClassName('articolo_id_11'),i;
	var articolo_id_12 = document.getElementsByClassName('articolo_id_12'),i;

	if(this.value == "2"){
    articolo_id_1[0].style.display = '';
	articolo_id_2[0].style.display = '';
	articolo_id_3[0].style.display = 'none';
	articolo_id_4[0].style.display = 'none';
	articolo_id_5[0].style.display = '';
	articolo_id_6[0].style.display = '';
	articolo_id_7[0].style.display = '';
	articolo_id_8[0].style.display = '';
	articolo_id_9[0].style.display = 'none';
	articolo_id_10[0].style.display = 'none';
	articolo_id_11[0].style.display = 'none';
	articolo_id_12[0].style.display = 'none';
	} 
	else if(this.value == "3"){
    articolo_id_1[0].style.display = '';
	articolo_id_2[0].style.display = 'none';
	articolo_id_3[0].style.display = 'none';
	articolo_id_4[0].style.display = 'none';
	articolo_id_5[0].style.display = '';
	articolo_id_6[0].style.display = '';
	articolo_id_7[0].style.display = '';
	articolo_id_8[0].style.display = '';
	articolo_id_9[0].style.display = '';
	articolo_id_10[0].style.display = 'none';
	articolo_id_11[0].style.display = 'none';
	articolo_id_12[0].style.display = 'none';
	} 
	else if(this.value == "4"){
    articolo_id_1[0].style.display = 'none';
	articolo_id_2[0].style.display = 'none';
	articolo_id_3[0].style.display = 'none';
	articolo_id_4[0].style.display = 'none';
	articolo_id_5[0].style.display = 'none';
	articolo_id_6[0].style.display = 'none';
	articolo_id_7[0].style.display = 'none';
	articolo_id_8[0].style.display = 'none';
	articolo_id_9[0].style.display = 'none';
	articolo_id_10[0].style.display = '';
	articolo_id_11[0].style.display = '';
	articolo_id_12[0].style.display = '';
	} 
	else { 
	articolo_id_1[0].style.display = '';
	articolo_id_2[0].style.display = 'none';
	articolo_id_3[0].style.display = '';
	articolo_id_4[0].style.display = '';
	articolo_id_5[0].style.display = '';
	articolo_id_6[0].style.display = '';
	articolo_id_7[0].style.display = '';
	articolo_id_8[0].style.display = '';
	articolo_id_9[0].style.display = 'none';
	articolo_id_10[0].style.display = 'none';
	articolo_id_11[0].style.display = 'none';
	articolo_id_12[0].style.display = 'none';
	}

}, false);

</script>
<?php 

return $option_layout;
}
 
  // Funzione per i controlli formali sui campi di input
  // ed eventualmente applicazione di filtri personalizzati 
  public function page_sanitize($input)
  {
    $new_input = array();
  
    if(isset($input['articolo_id_1']))
      $new_input['articolo_id_1'] = absint($input['articolo_id_1']);	 
  
    if(isset($input['articolo_id_2']))
      $new_input['articolo_id_2'] = absint($input['articolo_id_2']);	
  
    if(isset($input['articolo_id_3']))
      $new_input['articolo_id_3'] = absint($input['articolo_id_3']);	
  
    if(isset($input['articolo_id_4']))
      $new_input['articolo_id_4'] = absint($input['articolo_id_4']);	 
  
    if(isset($input['articolo_id_5']))
      $new_input['articolo_id_5'] = absint($input['articolo_id_5']);	
  
    if(isset($input['articolo_id_6']))
	  $new_input['articolo_id_6'] = absint($input['articolo_id_6']);
	  
	if(isset($input['articolo_id_7']))
	  $new_input['articolo_id_7'] = absint($input['articolo_id_7']); 
	
	if(isset($input['articolo_id_8']))
	  $new_input['articolo_id_8'] = absint($input['articolo_id_8']); 
	
	if(isset($input['articolo_id_9']))
	  $new_input['articolo_id_9'] = absint($input['articolo_id_9']); 
	
    if(isset($input['articolo_id_10']))
	  $new_input['articolo_id_10'] = absint($input['articolo_id_10']); 
	
	if(isset($input['articolo_id_11']))
	  $new_input['articolo_id_11'] = absint($input['articolo_id_11']); 
	  
	if(isset($input['articolo_id_12']))
	  $new_input['articolo_id_12'] = absint($input['articolo_id_12']); 

	if(isset($input['layout_testata']))
	  $new_input['layout_testata'] = absint($input['layout_testata']);
	  

    return $new_input;
  }
   
  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 1 
  public function page_articolo_id_1()
  {
	
    if(!isset($this->options['articolo_id_1'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_1']);	  
	  
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 30,
		'meta_key' => 'mostra_in_testata',
		'meta_value' => '1',
		'orderby' => 'date'
	);
	$this->the_query_master = new WP_Query( $args );
	
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_1" ).combobox();
	});
	</script>

	<?php	

	if ($this->options['layout_testata'] == '4') {
	?>
	<script>
	var articolo_id_1 = document.getElementsByClassName('articolo_id_1'),i;
	articolo_id_1[0].style.display = 'none';
	</script>
	<?php
	}	

	 
		
	

	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_1" '.'name="my_option_name[articolo_id_1]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';
		
		foreach ( $this->feed_the_cbtv_loop() as $post ) {
			 
			 echo '	<option value="' .$post->id. '" ';
			 if($post->id == $option) echo 'selected';
			 echo ' >' . $post->title->rendered .'(sorgente:CBTV)'. '</option>';
 
			 }
		
		



		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				//echo ' >('. get_post_meta( get_the_ID(), 'mostra_in_testata', true ) . ')' . get_the_title() . '</option>';
				
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }
  
  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 2 
  public function page_articolo_id_2()
  {
	
    if(!isset($this->options['articolo_id_2'])) $option = '';
	  else $option = esc_attr($this->options['articolo_id_2']);	  

	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_2" ).combobox();
	});
	</script>

	<?php
	

	if ($this->options['layout_testata'] != '2') {
	?>
	<script>
	var articolo_id_2 = document.getElementsByClassName('articolo_id_2'),i;
	articolo_id_2[0].style.display = 'none';
	</script>
	<?php
	}	


  

	echo '<div class="ui-widget">';
	
	printf('<select id="articolo_id_2" '.'name="my_option_name[articolo_id_2]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';


		
		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';
	
	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }
 
 // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 3
  public function page_articolo_id_3()
  {
	
    if(!isset($this->options['articolo_id_3'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_3']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_3" ).combobox();
	});
	</script>

	<?php
		if ($this->options['layout_testata'] != '1') {
			?>
			<script>
			var articolo_id_3 = document.getElementsByClassName('articolo_id_3'),i;
			articolo_id_3[0].style.display = 'none';
			</script>
			<?php
			}	

	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_3" '.'name="my_option_name[articolo_id_3]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';

		

		
		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }
  
  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 4
  public function page_articolo_id_4()
  {
	
    if(!isset($this->options['articolo_id_4'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_4']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_4" ).combobox();
	});
	</script>

	<?php

if ($this->options['layout_testata'] != '1') {
	?>
	<script>
	var articolo_id_4 = document.getElementsByClassName('articolo_id_4'),i;
	articolo_id_4[0].style.display = 'none';
	</script>
	<?php
	}

	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_4" '.'name="my_option_name[articolo_id_4]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';


		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }
   
   
  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 5
  public function page_articolo_id_5()
  {
	
    if(!isset($this->options['articolo_id_5'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_5']);	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_5" ).combobox();
	});
	</script>

	<?php

	if ($this->options['layout_testata'] == '4') {
	?>
	<script>
	var articolo_id_5 = document.getElementsByClassName('articolo_id_5'),i;
	articolo_id_5[0].style.display = 'none';
	</script>
	<?php
	}

	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_5" '.'name="my_option_name[articolo_id_5]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';

		

		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }
  
  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 6
  public function page_articolo_id_6()
  {
	
    if(!isset($this->options['articolo_id_6'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_6']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_6" ).combobox();
	});
	</script>

	<?php

	if ($this->options['layout_testata'] == '4') {
	?>
	<script>
	var articolo_id_6 = document.getElementsByClassName('articolo_id_6'),i;
	articolo_id_6[0].style.display = 'none';
	</script>
	<?php
	}


	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_6" '.'name="my_option_name[articolo_id_6]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';

		
		foreach ( $this->feed_the_cbtv_loop() as $post ) {
			 
			echo '	<option value="' .$post->id. '" ';
			if($post->id == $option) echo 'selected';
			echo ' >' . $post->title->rendered .'(sorgente:CBTV)'. '</option>';

			}
		
		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }

  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 7
  public function page_articolo_id_7()
  {

    if(!isset($this->options['articolo_id_7'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_7']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_7" ).combobox();
	});
	</script>

	<?php

	if ($this->options['layout_testata'] == '4') {
	?>
	<script>
	var articolo_id_7 = document.getElementsByClassName('articolo_id_7'),i;
	articolo_id_7[0].style.display = 'none';
	</script>
	<?php
	}

	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_7" '.'name="my_option_name[articolo_id_7]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';

		

		
		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }  

  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 8
  public function page_articolo_id_8()
  {
	
    if(!isset($this->options['articolo_id_8'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_8']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_8" ).combobox();
	});
	</script>

	<?php

	if ($this->options['layout_testata'] == '4') {
	?>
	<script>
	var articolo_id_8 = document.getElementsByClassName('articolo_id_8'),i;
	articolo_id_8[0].style.display = 'none';
	</script>
	<?php
	}

	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_8" '.'name="my_option_name[articolo_id_8]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';


		
		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }  

// Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 8
  public function page_articolo_id_9()
  {
	
    if(!isset($this->options['articolo_id_9'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_9']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_9" ).combobox();
	});
	</script>

	<?php
		if ($this->options['layout_testata'] != '3') {
			?>
			<script>
			var articolo_id_9 = document.getElementsByClassName('articolo_id_9'),i;
			articolo_id_9[0].style.display = 'none';
			</script>
			<?php
			}


	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_9" '.'name="my_option_name[articolo_id_9]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';

		foreach ( $this->feed_the_cbtv_loop() as $post ) {
			 
			echo '	<option value="' .$post->id. '" ';
			if($post->id == $option) echo 'selected';
			echo ' >' . $post->title->rendered .'(sorgente:CBTV)'. '</option>';

			}
		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }  


  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 10
  public function page_articolo_id_10()
  {

    if(!isset($this->options['articolo_id_10'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_10']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_10" ).combobox();
	});
	</script>

	<?php

	if ($this->options['layout_testata'] != '4') {
	?>
	<script>
	var articolo_id_10 = document.getElementsByClassName('articolo_id_10'),i;
	articolo_id_10[0].style.display = 'none';
	</script>
	<?php
	}


	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_10" '.'name="my_option_name[articolo_id_10]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';


		
		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }  

   // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 11
  public function page_articolo_id_11()
  {

    if(!isset($this->options['articolo_id_11'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_11']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_11" ).combobox();
	});
	</script>

	<?php
	
	if ($this->options['layout_testata'] != '4') {
		?>
		<script>
		var articolo_id_11 = document.getElementsByClassName('articolo_id_11'),i;
		articolo_id_11[0].style.display = 'none';
		</script>
		<?php
		}

	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_11" '.'name="my_option_name[articolo_id_11]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';


		
		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }  


  // Definizione delle funzione per esecuzione
  // callback che riguarda l'opzione di selezione notizia 12
  public function page_articolo_id_12()
  {
	
    if(!isset($this->options['articolo_id_12'])) $option = '';
      else $option = esc_attr($this->options['articolo_id_12']);	  
	  
	  /*
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	*/
	
	?>
	<style>
		.custom-combobox { position: relative; display: inline-block; }
		.custom-combobox-toggle {	position: absolute;	top: 0;	bottom: 0;	margin-left: -1px;	padding: 0;	}
		.custom-combobox-input {	margin: 0;	padding: 5px 10px;	}
	</style>
	<script>
	(function( jQuery ) {
		jQuery.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = jQuery( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );
				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},
			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
				value = selected.val() ? selected.text() : "";
				this.input = jQuery( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", "" )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: jQuery.proxy( this, "_source" )
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});
				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},
					autocompletechange: "_removeIfInvalid"
				});
			},
			_createShowAllButton: function() {
				var input = this.input,
				wasOpen = false;
				jQuery( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Mostra tutti gli elementi" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();
					// Close if already visible
					if ( wasOpen ) {
						return;
					}
					// Pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
				});
			},
			_source: function( request, response ) {
				var matcher = new RegExp( jQuery.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = jQuery( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
					return {
					label: text,
					value: text,
					option: this
					};
				}) );
			},
			_removeIfInvalid: function( event, ui ) {
				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}
				// Search for a match (case-insensitive)
				var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
				this.element.children( "option" ).each(function() {
					if ( jQuery( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});
				// Found a match, nothing to do
				if ( valid ) {
					return;
				}
				// Remove invalid value
				this.input
				.val( "" )
				.attr( "title", value + " didn't match any item" )
				.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},
			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	jQuery(function() {
		jQuery( "#articolo_id_12" ).combobox();
	});
	</script>

	<?php

if ($this->options['layout_testata'] != '4') {
	?>
	<script>
	var articolo_id_12 = document.getElementsByClassName('articolo_id_12'),i;
	articolo_id_12[0].style.display = 'none';
	</script>
	<?php
	}

	echo '<div class="ui-widget">';
	printf('<select id="articolo_id_12" '.'name="my_option_name[articolo_id_12]" />');
		echo '	<option value="0" ';
		if(get_the_ID() == $option) echo 'selected';
		echo ' >(Predefinito)</option>';


		// Il Loop
		while ( $this->the_query_master->have_posts() ) :
			$this->the_query_master->the_post();
			
			// controllo di mettere solo i video e non gli audio
			//if(  get_post_meta( get_the_ID(), 'mostra_in_testata', true )   ) {
				echo '	<option value="' . get_the_ID(). '" ';
				if(get_the_ID() == $option) echo 'selected';
				echo ' >' . get_the_title() . '</option>';
			//}
		endwhile;
	echo '</select>';
	echo '</div>';

	// Ripristina Query & Post Data originali
	//wp_reset_query();
	//wp_reset_postdata();
  }  



  // Definzione funzione per aggiungere la pagina
  // nel menu delle impostazioni su sidebar di wordpress 
  public function page_menu()
  {
    add_dashboard_page(
      'Settings Admin',          	// windows title
      'Gestione notizie in testata', 	// menu title
      'read',          				// dashboard
      'my-setting-admin',        	// page
      array( $this,'page_admin')	// callback
    );
  }
  
  // Funzione di callback per emissione HTML della
  // pagina con le opzioni definite 
  public function page_admin()
  {
    $this->options = get_option('my_option_name');
 
    echo '<div class="wrap">';
    echo '<h2>Gestione notizie in testata</h2>';
    echo '<form method="post" action="options.php">';
 
    settings_fields('my_option_group');
    do_settings_sections('my-setting-admin');
    submit_button();

    echo '</form>';
    echo '</div>';
  }
}
  
// Se la funzione viene richiamata dal backend eseguo
// la creazione dell'istanza e eseguo l'elaborazione
  
if(is_admin()) $myoptions = new GestioneTestataSettingsPage();
/* ----------------- FINE Definizione per setting Gestione notizie in testata ----------------- */
?>
