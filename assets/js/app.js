
$(document).ready(function () {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > 10) {
            $(".navbar").css("background", "white");
            $(".navbar").css("box-shadow", "rgba(0, 0, 0, 0.16) 0px 1px 4px")
        }

        else {
            $(".navbar").css("background", "transparent");
            $(".navbar").css("box-shadow", "none")
        }
    })

})

let count = document.querySelectorAll(".count");
let arr = Array.from(count);

let observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            startCounter(entry.target);
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

arr.forEach(item => {
    observer.observe(item);
});

function startCounter(item) {
    let startnumber = 0;
    let stop = setInterval(function() {
        startnumber++;
        item.innerHTML = startnumber;

        if (startnumber == item.dataset.number) {
            clearInterval(stop);
        }
    }, 7);
}
