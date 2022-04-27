
    document.addEventListener('DOMContentLoaded', () => {
        new TypeIt("h1", {
        strings: "타이핑 제어하기 플러그인 입니다.",
        speed: 100,
        loop: false,
    })
    .pause(1000)
    .delete(5, { delay: 1000})
    .type('!!!')
    .go();

    new TypeIt("p", {
        speed: 50,
        loop: false,
    })
    .pause(1000)
    .delete(5, { delay: 1000})
    .type('!!!')
    .go();
    });
    
