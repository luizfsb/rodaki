const openModalButton = document.getElementById('open-modal-btn');
const closeModalButton = document.getElementById('close-modal-btn');
const modal = document.getElementById('modal-locacao');

openModalButton.addEventListener('click', () => {
    modal.classList.add('active');
});

closeModalButton.addEventListener('click', () => {
    modal.classList.remove('active');
});

// Fechar o modal ao clicar fora do formulário
modal.addEventListener('click', (event) => {
    // Se o alvo do clique for o próprio container do modal (o fundo)
    if (event.target === modal) {
        modal.classList.remove('active');
    }
});