alert("WELCOME TO SEAFOOD BANG BANG");

function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}

//hapus
const lis= document.querySelectorAll('li');
const list=document.querySelector('ul');

//hapus list item
lis[0].remove();

const newspaperSpinning = [
    { transform: 'rotate(0) scale(1)' },
    { transform: 'rotate(360deg) scale(0)' }
  ];
  
  const newspaperTiming = {
    duration: 2000,
    iterations: 1,
  }
  
  const newspaper = document.querySelector(".newspaper");
  
  newspaper.addEventListener('click', () => {
    newspaper.animate(newspaperSpinning, newspaperTiming);
});