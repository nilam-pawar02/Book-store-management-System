
const openAside = document.getElementById('hammer');
const closeAside = document.getElementById('close-aside');
const asideSlider = document.getElementById('aside-slider');
const body = document.querySelector('body');
openAside.addEventListener('click',()=>{
    checkAsideVisibility();
    // aside navigations
    gsap.from(".aside a",{
        x: -100,
        opacity: 0.7,
        stagger:.1,
    })
    // closeAside Cross
    gsap.from(".cross-aside",{
        // y: -100,
        delay:.2,
        duration:.7,
        scale: 0.5,
        rotate:360,
    })
    gsap.from(".pf-lg a",{
        // y: -100,
        delay:.2,
        scale: 0,
    })
});
closeAside.addEventListener('click',()=>{
    checkAsideVisibility();
});

function checkAsideVisibility(){
    // if(asideSlider.classList.contains('hidden'))
    if(asideSlider.classList.contains('hidden'))
    {
        asideSlider.classList.remove('hidden')
        body.classList.add('overflow-hidden');
    }
    else
    {
        asideSlider.classList.add('hidden');
        body.classList.remove('overflow-hidden');
    }
}