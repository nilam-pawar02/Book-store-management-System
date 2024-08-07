const userProfile = document.querySelector('.user-profile');
const showProfile = document.querySelector('.desktop-profile');
const deskCross = document.querySelector('.desktop-cross');
showProfile.addEventListener('click',()=>{
    userProfile.classList.toggle('hidden');
});
deskCross.addEventListener('click',()=>{
    userProfile.classList.add('hidden');
});