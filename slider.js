let currentSlide = 1; 
const slides = document.querySelectorAll('.task-table tbody tr');
const pointer = document.createElement('div');
pointer.classList.add('pointer');
slides[1].appendChild(pointer); 

let slideInterval = setInterval(nextSlide, 2000);

const highlightRow = document.getElementById('highlighted-task');

function nextSlide() {
    slides[currentSlide].removeChild(pointer);
    
    currentSlide = (currentSlide + 1) % slides.length; 
    if (currentSlide === 0) currentSlide++; 
    slides[currentSlide].appendChild(pointer);
    
    const taskTitle = slides[currentSlide].children[1].innerText;
    const taskDescription = slides[currentSlide].children[2].innerText;
    highlightRow.innerHTML = `<td colspan="3"><strong>${taskTitle}</strong><br>${taskDescription}</td>`;
    highlightRow.style.display = 'table-row';
}

slides.forEach((slide, index) => {
    slide.addEventListener('mouseenter', () => {
        clearInterval(slideInterval);
        slides[currentSlide].removeChild(pointer);
        currentSlide = index;
        if (currentSlide === 0) currentSlide = 1; 
        slides[currentSlide].appendChild(pointer);

        const taskTitle = slides[currentSlide].children[1].innerText;
        const taskDescription = slides[currentSlide].children[2].innerText;
        highlightRow.innerHTML = `<td colspan="3"><strong>${taskTitle}</strong><br>${taskDescription}</td>`;
        highlightRow.style.display = 'table-row';
    });

    slide.addEventListener('mouseleave', () => {
        slideInterval = setInterval(nextSlide, 2000);
    });
});
