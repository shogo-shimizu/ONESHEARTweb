var data = [];
var cName = document.querySelector('#name'); 
var base = document.querySelector('#base'); 
var ingr = document.querySelector('#ingredient'); 
var sweet = document.querySelector('#sweet'); 
var alc = document.querySelector('#alc'); 
var price = document.querySelector('#price'); 
var desc = document.querySelector('#desc'); 
var cImage = document.querySelector('#cImage'); 

// ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
// jsondata取得
// ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

window.addEventListener('DOMContentLoaded',async function(){
 
    const url = "../assets/json/coctail.json";
 
    async function getData(){
        return await fetch(url).then(res => res.json())
    };

    data = await getData();
    console.log(data);

});

// ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

let randomButton = document.getElementById('randomBtn');

function randomChoice(){
    
    // ランダムなカクテルを取り出す
    var cocktail = data[Math.floor(Math.random() * data.length)];
    console.log(cocktail);
    // 取り出したカクテル情報で書き換える
    cName.innerHTML = cocktail.name;
    base.textContent = "Base. "+cocktail.base;
    ingr.innerHTML = cocktail.base+ "<br>" + cocktail.ingredient.join('<br>');
    alc.textContent = "Alc. " + cocktail.alc + "%";
    price.textContent = "¥"+cocktail.price;
    desc.textContent = cocktail.desc;
    cImage.src = '../assets/images/cocktails/' + cocktail.img + '.png';
    switch(cocktail.sweet){
        case 1:
            sweet.textContent = "甘さ : ★☆☆☆☆";
            break;
        case 2:
            sweet.textContent = "甘さ : ★★☆☆☆";
            break;
        case 3:
            sweet.textContent = "甘さ : ★★★☆☆";
            break;
        case 4:
            sweet.textContent = "甘さ : ★★★★☆";
            break;
        case 5:
            sweet.textContent = "甘さ : ★★★★★";
            break;
        default:
            sweet.textContent = "甘さ : ☆☆☆☆☆";
    }
};



// *******************

var maincard = document.querySelector(".card");
var coverElement = document.querySelectorAll(".cover-card");
var coverElement3 = document.querySelector('.cover-card3');
var coverElement2 = document.querySelector('.cover-card2');
var coverElement1 = document.querySelector('.cover-card1');
var descElement = document.getElementById('desc');

// シャッフルアニメーションのクラス付与

function addAnimationClass(){
    console.log(coverElement);
    coverElement.forEach(function(i){
        i.classList.add('cover-start');
        randomButton.classList.add('fade');
        descElement.classList.add('fade');
        maincard.classList.add('scaledown');

    });
};
// *******************
// クリックしたら発動
randomButton.addEventListener('click',addAnimationClass);


// カバーアニメーションが終了したら発動
coverElement3.addEventListener('animationend', () => {
    randomChoice();
    var sample = new Promise(function(resolve, reject) {
        setTimeout(function() {
            resolve();
            coverElement2.classList.add('cover-end');
            maincard.classList.add('scaleup');
            coverElement.forEach(function(i){
                i.classList.remove('cover-start');
            });
        }, 1000);
    });
    
    sample.then(function(value) {
        descElement.classList.remove('fade');
        setTimeout(function(){
            coverElement2.classList.remove('cover-end');
            maincard.classList.remove('scaleup');
            maincard.classList.remove('scaledown');
            randomButton.classList.remove('fade');
        },2000);
    });
});
coverElement3.addEventListener('webkitAnimationEnd', () => {
    randomChoice();
});
