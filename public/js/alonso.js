$(document).ready(function() {
    $('nav > button').hover(function(){
      $('.fa-power-off').css("color","#F34219");
    }, function(){
      $('.fa-power-off').css("color","#fff");
    });

    $('ul#links > a > li').hover(function(){
      $(this).css("border-right", "5px solid #F34219");
    }, function(){
      $(this).css("border-right", "1px solid #000");
    });

    $('input[name=ContractQtPayment]').change(function(){
      $('#Payment').html('<h4>Parcelas:</h4>');
      if($('input[name=ContractAmount]').val() != '' && !isNaN($('input[name=ContractAmount]').val()) && $('input[name=ContractQtPayment]').val() > 0) {
        var parcela = $('input[name=ContractQtPayment]').val();
        var valorparcela = parseFloat(($('input[name=ContractAmount]').val() / parcela).toFixed(2));
        for(i=0; i < parcela; i++) {
          $('<div class="form-row"><div class="form-group col-md-6"><input id="Payment'+i+'" name="Payment'+i+'" type="number" readonly value="'+valorparcela+'" class=""></div><div class="form-group col-md-6"><label for="DataPayment'+i+'">Data da parcela R$</label><input id="DataPayment'+i+'" name="DataPayment'+i+'" type="date" required></div></div>').appendTo($('#Payment'));
          }
        }
     });

     $("td#editavel").dblclick(function () {
        var idContract = $('p#idContract').text();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        $(this).html('<form class="col-md-12" id="FormStatus" method="post" action="http://127.0.0.1/contract/editar/status/'+ idContract +'" enctype="multipart/form-data"><select class="form-control" id="ContractStatus" name="ContractStatus"><option value="" disabled selected>Selecione o status</option><option value="aberto" selected>Aberto</option><option value="fechado">Fechado</option></select><input type="hidden" name="_method" value="PUT"><input type="hidden" name="_token" value="'+csrf_token+'"></form>');

        $('form#FormStatus').on('submit', function (f) {
          $.ajax({
           type:'PUT',
           dataType: 'json',
           url:'/contract/editar/status/'+idContract,
           data:$('form#FormStatus').serialize(),
           success:function(){
              console.log("Funciona");
           }
         });

      });
    });

    $('select#ContractStatus').change(function (e) {
      $('form#FormStatus').submit();
    });

});
