
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

        new TypeIt("#desc3", {
            speed: 100,
            loop: false,
        })
        .pause(1000)
        .delete(10, { delay: 1000})
        .type('그리고 다시 작성됩니다.')
        .go();

        new TypeIt("#desc4", {
            speed: 5,
            loop: true,
        })
        .pause(1000)
        .go();

        new TypeIt("#desc5", {
            speed: 15,
            loop: true,
        })
        .pause(1000)
        .delete(300, { delay: 1000})
        .type('영문이 아니라 한글로 작성하기')
        .pause(3000)
        .go();
    });

    