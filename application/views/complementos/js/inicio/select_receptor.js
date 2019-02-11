$(document).ready(function(){
  $('#Receptor').on('change', function(){
    var id = $('#Receptor').val()
    $.ajax({
      type: 'POST',
      url: 'php/cargar_receptor.php',
      data: {'id': id}
    })
    .done(function(receptor){
    
    alert(receptor)
    
      $('#razon_social').val(receptor)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
})

  $('#lista_reproduccion').on('change', function(){
    var id = $('#lista_reproduccion').val()
    $.ajax({
      type: 'POST',
      url: 'php/cargar_array.php',
      data: {'id': id}
    })

    .done(function(listas_rep){
      alert(listas_rep)
      $("#nombre").val(listas_rep)
      $("#duracion").val(id)

    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })
})