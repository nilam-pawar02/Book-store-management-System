const shareButton=document.querySelector('.share-button');
const bookName= document.querySelector('.book-title');
shareButton.addEventListener('click', () => {
    var textArea = document.createElement('textarea');
    textArea.value = 'Check out '+ bookName.innerHTML + window.location.href;
    // Append the textarea to the document
    document.body.appendChild(textArea);

    // Select the text in the textarea
    textArea.select();

    try {
        // Copy the text to the clipboard
        document.execCommand('copy');
        alert('instead of this alert add a drop down msg box for show the msg copied to clipboard');
    } catch (err) {
        console.error('Unable to copy to clipboard', err);
    }
    document.body.removeChild(textArea);

});
