var pesquisar = document.getElementById('pesquisar');

    function pesquisarDados() {
        window.location = 'index.php?pesquisar=' + pesquisar.value;
    }