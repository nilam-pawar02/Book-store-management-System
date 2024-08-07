try {
    const hideWarning = document.querySelector('.close-warning');
    const fileWarn = document.querySelector('.file-warn');
    
    hideWarning.addEventListener('click',()=>{
        fileWarn.classList.replace('flex','hidden');
    });
    
} catch (error) {
    
}