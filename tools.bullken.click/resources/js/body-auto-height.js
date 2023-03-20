const bodyArea = document.getElementById('bodyArea');

bodyArea.addEventListener('input', () => {
    bodyArea.style.height = 'auto';
    bodyArea.style.height = `${bodyArea.scrollHeight}px`;
});
