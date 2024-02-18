 const tipo = document.getElementById('tipo');
    const disco=document.getElementById('disco');
    const pelicula=document.getElementById('pelicula');
    const libro=document.getElementById('libro');
    tipo.addEventListener('change', (event) => {
        if (event.target.value === 'libro') {
          libro.style.display='block';
          disco.style.display='none';
            pelicula.style.display='none';
        } else if (event.target.value === 'pelicula') {
            pelicula.style.display='block';
            libro.style.display='none';
            disco.style.display='none';
        } else if (event.target.value === 'disco') {
            disco.style.display= 'block';
            libro.style.display='none';
            pelicula.style.display='none';
        } else {
            libro.style.display='none';
            pelicula.style.display='none';
            disco.style.display='none';
        }
    });