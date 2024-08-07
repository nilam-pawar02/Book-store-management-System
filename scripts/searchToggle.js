const searchButton = document.getElementById('search-tg');
const searchBar = document.getElementById('search-bar');
const searchBarInp = document.querySelector('#search-bar input');
searchButton.addEventListener('click',()=>{
    if(searchBar.classList.contains('hidden'))
    {
        searchBar.classList.replace('hidden','flex');
        searchBarInp.focus();
    }
    else
        searchBar.classList.replace('flex','hidden');

    gsap.from("#search-bar",{
        opacity:0,
        width:0,
        delay:.2
    })    

});