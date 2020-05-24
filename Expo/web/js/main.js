

 function soloFechas(e){

	key = e.keyCode || e.which;

	tecla = String.fromCharCode(key).toLowerCase();

	letras = "";

	especiales = ""; 

	tecla_especial = false;

	for(var i in especiales){

		 if(key == especiales[i]){

			 tecla_especial = true;

			 break;

		 }

	 }



	 if(letras.indexOf(tecla)==-1 && !tecla_especial){

		 return false;

	 }

 }

 function soloLetras(e){

	key = e.keyCode || e.which;

	tecla = String.fromCharCode(key).toLowerCase();

	letras = "abcdefghijklmnopqrstuvwxyñz ";

	especiales = "46";



	tecla_especial = false;

	for(var i in especiales){

		 if(key == especiales[i]){

			 tecla_especial = true;

			 break;

		 }

	 }



	 if(letras.indexOf(tecla)==-1 && !tecla_especial){

		 return false;

	 }

 }

 function solonumeros(e)

 {

	 key=e.keyCode || e.which;

	 teclado=String.fromCharCode(key);

	 numeros="0123456789";

	 teclado_especial=false;

	 especiales="8-37-38-46";

	 for(var i in especiales)

	 {

		 if(key==especiales[i])

		 {

			 teclado_especial=true;

		 }

	 }

	 if(numeros.indexOf(teclado)==-1 && !teclado_especial)

	 {

	 return false;

	 }

 }



$(".button-collapse").sideNav();

$(document).ready(function(){

    $('.slider').slider(); 

      $('.parallax').parallax(); 

      $(".dropdown-button").dropdown(); 

      $('ul.tabs').tabs();

    $('select').material_select(); 

    $('.modal-trigger').leanModal(); 

    $('.materialboxed').materialbox();

    $('.dropdown-button').dropdown({ 

        inDuration: 300,

        outDuration: 225,

        hover: true, // Activate on hover 

        belowOrigin: true, // Displays dropdown below the button

        alignment: 'right' // Displays dropdown with edge aligned to the left of button  

        

    }

    ); 

    $('.modal').modal();  

    $('.tooltipped').tooltip({ delay: 50 }); 

  });  

  (function($){

    $.fn.leanModal = function(options) {

      if( $('.modal').length > 0 ){

          $('.modal').modal(options);

      }

    };

  

    $.fn.openModal = function(options) {

      $(this).modal(options);

      $(this).modal('open');

    };

  

    $.fn.closeModal = function() {

      $(this).modal('close');

    };

  })(jQuery); 

    $(function() {

     $('#file-input').change(function(e) {

         addImage(e); 

        });

   

        function addImage(e){

         var file = e.target.files[0],

         imageType = /image.*/;

       

         if (!file.type.match(imageType))

          return;

     

         var reader = new FileReader();

         reader.onload = fileOnload;

         reader.readAsDataURL(file);

        } 

        function fileOnload(e) {

         var result=e.target.result;

         $('#imgSalida').attr("src",result);

        }

       }); 

       $('.datepicker').pickadate({

        selectMonths: true, // Creates a dropdown to control month

        selectYears: 15, // Creates a dropdown of 15 years to control year,

        today: 'Today',

        clear: 'Clear', 

        close: 'Ok',

        min: new Date(1958,3,20),

        max: new Date(2000,5,14),

        format: 'yyyy-mm-dd',

        closeOnSelect: false // Close upon selecting a date,

      }); 

      $('.datepicker1').pickadate({

        selectMonths: true, // Creates a dropdown to control month

        selectYears: 15, // Creates a dropdown of 15 years to control year,

        today: 'Today',

        clear: 'Clear', 

        close: 'Ok', 

        format: 'yyyy-mm-dd',

        closeOnSelect: false // Close upon selecting a date,

      });


        