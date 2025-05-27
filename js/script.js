const filtro = document.getElementById('filtroGenero');
const filmes = document.querySelectorAll('.filme');

filtro.addEventListener('change', () => {
    const genero = filtro.value.toLowerCase();
    filmes.forEach(filme => {
        const generoFilme = filme.dataset.genero;
        filme.style.display = genero === '' || generoFilme === genero ? 'block' : 'none';
    });
});
