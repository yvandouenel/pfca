// JS HERE
jQuery(document).ready(function($) {


	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			vars[key] = value;
		});
		return vars;
	}
	function getUrlVars2(){
		// our test url
		var url = window.location.href ;
		// filtering the string..
		var paramsList = url.slice(url.indexOf("?")+1,url.length) ;
		var filteredList =  paramsList.split("&") ;

		// an object to store arrays
		var objArr = {} ;

		// the below loop is obvious... we just remove the [] and +.. and split into pair of key and value.. and store as an array...
		for (var i=0, l=filteredList.length; i <l; i +=1 ) {
		  var param = decodeURIComponent(filteredList[i].replace("[]","")).replace(/\+/g," ") ;
		  var pair = param.split("=") ;
		  if(!objArr[pair[0]]) {  objArr[pair[0]] = [] ;}
		  objArr[pair[0]].push(pair[1]);
		}

		return objArr;

	}	/*Pour ouvrir Bubble GMap sur clik externe*/
	//console.log('test');
	// add actions in each views row. You can change that if you use other views format
	/*$($('.gmap-link').get().reverse()).each(function(i){
		var newi = i; // marker[i] start from "0" but .views-row from "1"
		$(this).bind('click', function(){
			google.maps.event.trigger(Drupal.settings.gmap.auto1map.markers[newi].marker, 'click');
			return false;
		});
	});*/

	$('.gmap-link').bind('click', function(event){
		var nid = $(event.currentTarget).attr('data-nid');

		var imarker = -1;
		for(var index in Drupal.settings.gmap.auto1map.markers){
			var m = Drupal.settings.gmap.auto1map.markers[index];
			if(m.nid == nid){
				imarker = index;
				break;
			}
		}
		window.scrollTo(0, $('#page-title').offset().top);
		google.maps.event.trigger(Drupal.settings.gmap.auto1map.markers[imarker].marker, 'click');

		return false;
	});



	/*Moteur de recherche interlocuteurs*/
	if($('#views-exposed-form-interlocuteurs-page').length>0){
		$("#edit-field-secteurs-tid-wrapper" ).append( "<div id='more-fields'><a id='more' style='cursor:pointer;'>Plus de critère +</a></div><div id='more-fields-fields' style='diplay:none;>" );
		$("#edit-field-profil-tid-wrapper, #edit-field-prestations-tid-wrapper, #edit-field-zones-tid-wrapper").wrapAll("<div id='more-fields-fields' class='none'>");

		//test pour savoir si la recherche avancée est utilisée

		//var profil=getUrlVars()["field_profil_tid"];
		//var presta=getUrlVars()["field_prestations_tid"];
		//var zone=getUrlVars()["field_zones_tid"];


		var variables = getUrlVars2();
		var profil 	= variables['field_profil_tid'] || variables['field_profil_tid[]'] ;
		var presta 	= variables['field_prestations_tid'] || variables['field_prestations_tid[]'] ;
		var zone 	= variables['field_zones_tid'] || variables['field_zones_tid[]'];

		if (profil || presta || zone){
			$( "#more-fields-fields" ).show();
			$('#more').text("Moins de critère -");
			//$('.view-interlocuteurs').addClass('deplie');
		}

		// Si une recherche est effectuée, on scroll pour afficher le début des résultats
        var urlVars = getUrlVars();
		var recherche_exist = urlVars['title'] || urlVars["field_zone_geographique_tid%5B%5D"] || urlVars['field_secteurs_tid%5B%5D'];
        console.log(recherche_exist);
        if (recherche_exist != undefined) {
            setTimeout(function() {
                window.scrollTo(0, $('#block-system-main .views-row-1').offset().top);
            }, 500);
        }

		$( "#more" ).click(function() {
		  $( "#more-fields-fields" ).slideToggle( "slow" );
		  if($('#more').text()=="Plus de critère +"){
			  $('#more').text("Moins de critère -");
			  //$('.view-interlocuteurs').addClass('deplie');
		  }
		  else{
			  $('#more').text("Plus de critère +");
			  //$('.view-interlocuteurs').removeClass('deplie');
		  }
		});


		$('.view-interlocuteurs').addClass('deplie');



	}
	/*
	    MENU
    */
    $('<span id="btn-menu">Menu</span>').appendTo('.menu-block-wrapper.menu-block-1');
    $('#btn-menu').click(function(){
	    $('#block-menu-block-1 .menu-block-1 > ul').slideToggle();
    });
    $('#block-menu-block-1 .menu-block-1 > ul > li.expanded > a').after('<span class="bouton-expand">+&nbsp;</span>');
    $('#block-menu-block-1 .menu-block-1 .bouton-expand').click(function(){
	   $(this).next('.menu').slideToggle();
	   $(this).toggleClass('active');
    });


    /*ACCORDEONS*/
    /*$(".field-collection-item-field-page-accordeons .field-name-field-accordeon-contenu").hide();
    $(".field-collection-item-field-page-accordeons .field-name-field-accordeon-titre").addClass('ferme');
    $(".field-collection-item-field-page-accordeons .field-name-field-accordeon-titre").click( function () {

      $(this).next('div').toggle('normal');
      if($(this).hasClass('ferme')){
                $(this).removeClass("ferme");
                $(this).addClass("ouvert");
            }
        else{
                $(this).removeClass("ouvert");
                $(this).addClass("ferme");
        }

        return false;

    });*/

    /*SLIDER HOME*/
	if( $('.front').length > 0) {
		$('.view-slider .view-content ul').bxSlider({
  		 	mode: 'fade',
         	minSlides: 1,
         	maxSlides: 1,
         	slideWidth: 690,
         	controls:true,
         	pager:true,
         	infiniteLoop:true

    	});
	}


    /*SLIDER ACTU*/

    $('#bloc-sliders .view-actualites .view-content ul').bxSlider({
         minSlides: 1,
         maxSlides: 1,
         slideMargin: 0,
         slideWidth: 310,
  		 mode: 'vertical',
         controls:true,
         pager:false

    });

    /*SLIDER AGENDA*/

    $('#bloc-sliders .view-agenda .view-content ul').bxSlider({
         minSlides: 2,
         maxSlides: 2,
         slideMargin: 0,
         slideWidth: 310,
         controls:true,
         pager:false,
  		 mode: 'vertical'

    });

    /*SLIDER PAGES LES PLUS VISITEES*/

    $('#bloc-sliders .view-page-atterrissage .view-content ul').bxSlider({
    	 moveSlides: 3,
         minSlides: 10,
         maxSlides: 10,
         controls:true,
         pager:false,
  		 mode: 'vertical',
  		 adaptiveHeight:false,

    });


    /*GALERIES PAGES*/
    $('.cont-galerie ul li').css('height','95px');
    $('.cont-galerie ul').bxSlider({
        minSlides: 4,
        slideWidth: 648,
        maxSlides: 4,
        pager:false,
        infiniteLoop: false,
		hideControlOnEnd: true
    });

    /*ACCORDEONS*/
    //$(".onglets .onglet").hide();
    //$(".onglets h3").addClass('ferme');
    $(".onglets h3").click( function () {

      $(this).next('div').toggle('normal');
      if($(this).hasClass('ferme')){
                $(this).removeClass("ferme");
                $(this).addClass("ouvert");
            }
        else{
                $(this).removeClass("ouvert");
                $(this).addClass("ferme");
        }
    });

    // Styliser les selects
    if (!$.browser.opera) {
        $('select').each(function(){
           /*  var title = $(this).attr('title'); */
            var title = "- Sélectionner -";
            if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
            $(this)
                .addClass('select')
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="select">' + title + '</span>')
                .change(function(){
                    val = $('option:selected',this).text();
                    $(this).next().text(val);
                })
                $(this).parent().addClass('select_container');


        });
     }

    // Styliser les checkboxes et boutons radio
  	$('input').iCheck({
    	checkboxClass: 'icheckbox_minimal',
    	radioClass: 'iradio_minimal',
    	increaseArea: '20%' // optional
  	});


     $('#carousel').carouFredSel({
		direction: 'up',
		auto: false,
		circular: false,
		items: 1,
		width: '100%',
		scroll: {
			duration: 600,
		},
		pagination: {
			container: '#pager',
			anchorBuilder: function( nr ) {
				return '<a href="#">' + $(this).find('h3').text() + '</a>';
			}
		}
	});

	//Titre galerie
	$('.galerie').fancybox({
	  beforeShow : function(){
	   this.title =  $(this.element).data("caption");
	  }
	 });


});