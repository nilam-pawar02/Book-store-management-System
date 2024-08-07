const uplaodProfile = document.querySelector('.upload-profile');
const input = document.createElement('input');
const allInputs = document.querySelector('.all-inputs');
input.name="profile-pic";
input.type="file";
input.classList.add('opacity-0');
console.log(input); 
uplaodProfile.addEventListener('click',()=>{
    input.click();
    allInputs.prepend(input);
})

input.addEventListener('change', function() {
    // Handle the selected file(s) here
    var selectedFile = this.files[0];
    console.log(selectedFile.type);
    if(!selectedFile.type.includes("image"))
    {
        input.value ="";
        alert("We only Accept image as a profile pic🥺");
    }
  });