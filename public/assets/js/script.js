const navigation = document.querySelector('nav');
const titleSpans = document.querySelectorAll('.titleSpans span')

// anim load title
window.addEventListener ('load', () =>{
    
    const TL = gsap.timeline({pause:true});

    TL
    .staggerFrom(titleSpans, 1, { opacity: 0, ease: "power2.out"}, 0.3)

    TL.play();
})
// apparition bloc en js 
const ratio = .1
const option ={
    root:null,
    rootMargin: '0px',
    threshold: ratio
}

const handleIntersect = function(entries, observer){
    entries.forEach(function(entry){
        console.log(entry.intersectionRatio)
        if (entry.intersectionRatio > ratio){
            entry.target.classList.add('reveal-visible')
            observer.unobserve(entry.target)
        }
    })
}

var observer = new IntersectionObserver(handleIntersect, option)
document.querySelectorAll('.reveal').forEach(function (r){
    observer.observe(r)
})

// Thumbs movement : 
function moveThumbs(x) {
    x.classList.toggle("bi bi-hand-thumbs-down");
}