'use strict';

window.addEventListener('DOMContentLoaded', function () {

    addOnEventCallback('click', '.jsSortPrice', function (e, item) {
        e.preventDefault();
        e.stopPropagation();

        let content     = document.querySelector('.jsContent'),
            iconPrice   = document.querySelector('.jsIconSortPrice'),
            classListPrice = iconPrice.classList,
            data = Object.values(getPageJsonData().data.LAPTOP);

        for (let key in classListPrice){

            if (String(classListPrice[key]) === 'down'){

                iconPrice.innerHTML = '<i class="fa fa-caret-square-o-down" aria-hidden="true" style="color: red"></i>';
                iconPrice.classList.remove("down");
                iconPrice.classList.add("up");

                data.sort(function(a, b){
                    return a.PRISE-b.PRISE
                })

                content.innerHTML = '';

                for (let key in data){

                   content.innerHTML += '<div class="card__" style="width: 18rem; margin: 10px">' +
                                            '<img src="https://avatars.mds.yandex.net/i?id=949953ab731b6f7309311a8631fb72a5c7ae47e5-9227066-images-thumbs&amp;n=13" width="100%" alt="...">\n' +
                                            '<div class="card-body" style="padding: 25px">' +
                                                '<h5 class="card-title">'+data[key].NAME+'</h5>' +
                                                '<p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>\n' +
                                                '<p class="card-text"><b>Цена: </b>'+data[key].PRISE+' р.</p>' +
                                                '<p class="card-text"><b>Год: </b>'+data[key].YEAR+'</p>' +
                                                '<a href="'+data[key].URL+'" class="btn btn-primary">Смотреть</a>' +
                                            '</div>' +
                                        '</div>';

                }


            } else if (String(classListPrice[key]) === 'up'){

                iconPrice.innerHTML = '<i class="fa fa-caret-square-o-up" aria-hidden="true" style="color: green"></i>';
                iconPrice.classList.remove("up");
                iconPrice.classList.add("down");

                data.sort(function(a, b){
                    return b.PRISE-a.PRISE
                })

                content.innerHTML = '';

                for (let key in data){

                   content.innerHTML += '<div class="card__" style="width: 18rem; margin: 10px">' +
                                            '<img src="https://avatars.mds.yandex.net/i?id=949953ab731b6f7309311a8631fb72a5c7ae47e5-9227066-images-thumbs&amp;n=13" width="100%" alt="...">\n' +
                                            '<div class="card-body" style="padding: 25px">' +
                                                '<h5 class="card-title">'+data[key].NAME+'</h5>' +
                                                '<p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>\n' +
                                                '<p class="card-text"><b>Цена: </b>'+data[key].PRISE+' р.</p>' +
                                                '<p class="card-text"><b>Год: </b>'+data[key].YEAR+'</p>' +
                                                '<a href="'+data[key].URL+'" class="btn btn-primary">Смотреть</a>' +
                                            '</div>' +
                                        '</div>';

                }

            }

        }

    });

    addOnEventCallback('click', '.jsSortYear', function (e, item) {
        e.preventDefault();
        e.stopPropagation();

        let content     = document.querySelector('.jsContent'),
            iconPrice   = document.querySelector('.jsIconSortYear'),
            classListPrice = iconPrice.classList,
            data = Object.values(getPageJsonData().data.LAPTOP);

        for (let key in classListPrice){

            if (String(classListPrice[key]) === 'down'){

                iconPrice.innerHTML = '<i class="fa fa-caret-square-o-down" aria-hidden="true" style="color: red"></i>';
                iconPrice.classList.remove("down");
                iconPrice.classList.add("up");

                data.sort(function(a, b){
                    return a.YEAR-b.YEAR
                })

                content.innerHTML = '';

                for (let key in data){

                   content.innerHTML += '<div class="card__" style="width: 18rem; margin: 10px">' +
                                            '<img src="https://avatars.mds.yandex.net/i?id=949953ab731b6f7309311a8631fb72a5c7ae47e5-9227066-images-thumbs&amp;n=13" width="100%" alt="...">\n' +
                                            '<div class="card-body" style="padding: 25px">' +
                                                '<h5 class="card-title">'+data[key].NAME+'</h5>' +
                                                '<p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>\n' +
                                                '<p class="card-text"><b>Цена: </b>'+data[key].PRISE+' р.</p>' +
                                                '<p class="card-text"><b>Год: </b>'+data[key].YEAR+'</p>' +
                                                '<a href="'+data[key].URL+'" class="btn btn-primary">Смотреть</a>' +
                                            '</div>' +
                                        '</div>';

                }


            } else if (String(classListPrice[key]) === 'up'){

                iconPrice.innerHTML = '<i class="fa fa-caret-square-o-up" aria-hidden="true" style="color: green"></i>';
                iconPrice.classList.remove("up");
                iconPrice.classList.add("down");

                data.sort(function(a, b){
                    return b.YEAR-a.YEAR
                })

                content.innerHTML = '';

                for (let key in data){

                   content.innerHTML += '<div class="card__" style="width: 18rem; margin: 10px">' +
                                            '<img src="https://avatars.mds.yandex.net/i?id=949953ab731b6f7309311a8631fb72a5c7ae47e5-9227066-images-thumbs&amp;n=13" width="100%" alt="...">\n' +
                                            '<div class="card-body" style="padding: 25px">' +
                                                '<h5 class="card-title">'+data[key].NAME+'</h5>' +
                                                '<p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>\n' +
                                                '<p class="card-text"><b>Цена: </b>'+data[key].PRISE+' р.</p>' +
                                                '<p class="card-text"><b>Год: </b>'+data[key].YEAR+'</p>' +
                                                '<a href="'+data[key].URL+'" class="btn btn-primary">Смотреть</a>' +
                                            '</div>' +
                                        '</div>';

                }

            }

        }

    });


});

function getPageJsonData(selector='.jsPageJsonData'){
    if(document.querySelector(selector)!==null){
        return  JSON.parse(document.querySelector(selector).textContent);
    }
}

function addOnEventCallback(event,selector,callback,...arCustomArgs){
    document.addEventListener(event,function(e){
        if(e.target.closest(selector)){
            callback(e,e.target.closest(selector),arCustomArgs);
        }
    });
}
