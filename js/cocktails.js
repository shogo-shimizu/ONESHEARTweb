var data = [];
var cName = document.querySelector('#name'); 
var base = document.querySelector('#base'); 
var ingr = document.querySelector('#ingredient'); 
var sweet = document.querySelector('#sweet'); 
var alc = document.querySelector('#alc'); 
var price = document.querySelector('#price'); 
var desc = document.querySelector('#desc'); 
var cImage = document.querySelector('#cImage'); 
var bg = document.querySelector('.bg'); 

// ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
// 画像のプリロード
// ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
  // 画像用配列
var images = [
    '../assets/images/cocktails/card-blue.png',
    '../assets/images/cocktails/card-red.png',
    '../assets/images/cocktails/card-gold.png',
    '../assets/images/cocktails/card-rainbow.png',
];

window.onload = function(){
    
    // 画像プリロード
    getImages();
    
}

// 画像プリロード用関数
function getImages(){
  for (i = 0; i < images.length; i++){
        var img = document.createElement('img');
        img.src = images[i];
    }
}
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
    // 時刻を取得
    const now = new Date();
    const after30m = now.getTime() +  (1000 * 60 * 30 * 1);
    const A30 = new Date(after30m);
    const nowYear = A30.getFullYear(); 
    const nowMon = A30.getMonth() + 1;
    const nowDate = A30.getDate();
    const nowHour = A30.getHours();
    const nowMinute = A30.getMinutes();
    // ランダムなカクテルを取り出す
    var cocktail = data[Math.floor(Math.random() * data.length)];
    console.log(cocktail);
    // 取り出したカクテル情報で書き換える
    cName.innerHTML = cocktail.name;
    base.textContent = "Base. "+cocktail.base;
    ingr.innerHTML = cocktail.base+ "<br>" + cocktail.ingredient.join('<br>');
    alc.textContent = "Alc. " + cocktail.alc + "%";
    price.textContent = "¥"+cocktail.price;
    desc.innerHTML = cocktail.desc + "<br><span>" +
    `ご注文期限 :  ${nowYear}/${nowMon}/${nowDate} ${nowHour}:${nowMinute}`; + 
     "</span>";
    cImage.src = '../assets/images/cocktails/' + cocktail.img + '.png';
    switch(cocktail.sweet){
        case 1:
            sweet.textContent = "辛★☆☆☆☆甘";
            break;
        case 2:
            sweet.textContent = "辛☆★☆☆☆甘";
            break;
        case 3:
            sweet.textContent = "辛☆☆★☆☆甘";
            break;
        case 4:
            sweet.textContent = "辛☆☆☆★☆甘";
            break;
        case 5:
            sweet.textContent = "辛☆☆☆☆★甘";
            break;
        default:
            sweet.textContent = "辛☆☆☆☆☆甘";
    }
    // 割引の抽選
    var object = {
        '../assets/images/cocktails/card-rainbow.png':1,
        '../assets/images/cocktails/card-gold.png':50,
        '../assets/images/cocktails/card-red.png':500,
        '../assets/images/cocktails/card-blue.png':2000,
        '../assets/images/cocktails/card2.jpg':7449
    };
      var number = Math.floor(Math.random() * 10000);
      var weight = 0;
      console.log(number);
      for (var key in object) {
        weight += object[key];
        if (number < weight) {
            value = key;
            break;
        }
      }
      console.log(value);
      bg.src = value;

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
