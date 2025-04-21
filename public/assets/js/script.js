document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('#categorias button');
  const produtos = document.querySelectorAll('.produto');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const categoria = btn.getAttribute('data-categoria');

      produtos.forEach(p => {
        if (categoria === 'todos' || p.getAttribute('data-categoria') === categoria) {
          p.style.display = 'block';
        } else {
          p.style.display = 'none';
        }
      });
    });
  });
});
