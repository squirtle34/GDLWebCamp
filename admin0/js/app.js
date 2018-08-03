$(document).ready(function () {
      $('.sidebar-menu').tree()
      


      $('#registros').DataTable({
        'paging'      : true,
        'pageLength'  : 10,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'language' : {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Último',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay registros',
            infoEmpty: '0 Registros',
            search: 'Buscar: '
        }
    });
    
    $('#crear_registro_admin').attr('disabled', true);
    
    $('#repetir_password').on('input', function() {
        var password_nuevo = $('#password').val();
        
        if($(this).val() == password_nuevo ) {
            $('#resultado_password').text('Correcto');
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('#crear_registro_admin').attr('disabled', false);
        } else {
            $('#resultado_password').text('No son iguales!');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        }
    });
      

    //Date picker
    $('#fecha').datepicker({
      autoclose: true
    });

    $('.seleccionar').select2();

    $('.timepicker').timepicker({
      showInputs: false,   
    });

    $('#icono').iconpicker();


    $('input[type="checkbox"].minimal, input[type="radio"k].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
  });
  
  $.getJSON('servicio-registrados.php', function(data) {
      var line = new Morris.Line({
        element: 'grafica-registros',
        resize: true,
        data: data,
        xkey: 'fecha',
        ykeys: ['cantidad'],
        labels: ['Item 1'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
      });
  });


})