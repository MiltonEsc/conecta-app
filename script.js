 //const contenedorCanvas = document.querySelector("#can"); // En d車nde ponemos el elemento canvas

    function tomarImagenPorSeccion(div,nombre) {
  
      html2canvas(document.querySelector("#" + div),{ letterRendering: 1, useCORS:true, allowTaint : true, onrendered : function (canvas) { } }) // Llamar a html2canvas y pasarle el elemento  
      .then(canvas => {
          var dataURL = canvas.toDataURL();
          //console.log(dataURL);
          
        // Cuando se resuelva la promesa traerá el canvas
           base = "img=" + dataURL + "&nombre=" + nombre;
           console.log(base);
           $.ajax({
            type:"POST",
            url:"../Controllers/crearImagenes.php",
            data:base,
            success:function(respuesta) {	
              respuesta = parseInt(respuesta);
              if (respuesta > 0) {
                Swal.fire(
                  'Listo!',
                  'Imagen actualizada con exito!',
                  'success'
                )
                setInterval("location.reload(true)",1200);
              } else {
                Swal.fire(
                  'error!',
                  'No se pudo crear la imagen :(',
                  'error'
                )
              }
            }
          });
      });
  }
  function tomarImagenBienvenida(div,nombre) {
  
      html2canvas(document.querySelector("#" + div),{ letterRendering: 1, useCORS:true, allowTaint : true, onrendered : function (canvas) { } }) // Llamar a html2canvas y pasarle el elemento  
      .then(canvas => {
          var dataURL = canvas.toDataURL();
          //console.log(dataURL);
          
        // Cuando se resuelva la promesa traerá el canvas
           base = "img=" + dataURL + "&nombre=" + nombre;
           console.log(base);
           $.ajax({
            type:"POST",
            url:"../Controllers/crearimagenesbienvenida.php",
            data:base,
            success:function(respuesta) {	
              respuesta = parseInt(respuesta);
              if (respuesta > 0) {
                Swal.fire(
                  'Listo!',
                  'Imagen actualizada con exito!',
                  'success'
                )
                setInterval("location.reload(true)",1200);
              } else {
                Swal.fire(
                  'error!',
                  'No se pudo crear la imagen :(',
                  'error'
                )
              }
            }
          });
      });
  }
  function tomarImagenDespedida(div,nombre) {
  
      html2canvas(document.querySelector("#" + div),{ letterRendering: 1, useCORS:true, allowTaint : true, onrendered : function (canvas) { } }) // Llamar a html2canvas y pasarle el elemento  
      .then(canvas => {
          var dataURL = canvas.toDataURL();
          //console.log(dataURL);
          
        // Cuando se resuelva la promesa traerá el canvas
           base = "img=" + dataURL + "&nombre=" + nombre;
           console.log(base);
           $.ajax({
            type:"POST",
            url:"../Controllers/crearimagenesdespedida.php",
            data:base,
            success:function(respuesta) {	
              respuesta = parseInt(respuesta);
              if (respuesta > 0) {
                Swal.fire(
                  'Listo!',
                  'Imagen actualizada con exito!',
                  'success'
                )
                setInterval("location.reload(true)",1200);
              } else {
                Swal.fire(
                  'error!',
                  'No se pudo crear la imagen :(',
                  'error'
                )
              }
            }
          });
      });
  }
  function tomarImagenPorFoto(div,nombre) {
  
    html2canvas(document.querySelector("." + div),{ letterRendering: 1, useCORS:true, allowTaint : true, onrendered : function (canvas) { } }) // Llamar a html2canvas y pasarle el elemento  
    .then(canvas => {
        var dataURL = canvas.toDataURL();
        //console.log(dataURL);
        
      // Cuando se resuelva la promesa traer芍 el canvas
         base = "img=" + dataURL + "&nombre=" + nombre;
         console.log(base);
         $.ajax({
          type:"POST",
          url:"../Controllers/crearImagenes.php",
          data:base,
          success:function(respuesta) {	
            respuesta = parseInt(respuesta);
            if (respuesta > 0) {
              Swal.fire(
                'Listo!',
                'Imagen creada con exito!',
                'success'
              )
            } else {
              Swal.fire(
                'error!',
                'No se pudo crear la imagen :(',
                'error'
              )
            }
          }
        });
    });
}