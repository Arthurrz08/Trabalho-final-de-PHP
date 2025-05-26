const filtro = document.getElementById('filtroGenero');
const filmes = document.querySelectorAll('.filme');

filtro.addEventListener('input', () => {
    const valor = filtro.value.toLowerCase();
    filmes.forEach(filme => {
        const genero = filme.getAttribute('data-genero');
        if (genero.includes(valor) || valor === '') {
            filme.style.display = 'block';
        } else {
            filme.style.display = 'none';
        }
    });
});
