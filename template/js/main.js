$(document).ready(function () {

    let val = {};

    // Styler-form
    setTimeout(function () {
        $('.form-details__select').styler();

        $('.form-filter__select--name-size').styler({
            onSelectClosed: function (e) {
                val['name_sort'] = $('[data-name] option:selected').val();
                ajax_send();
            }
        });


        $('.form-filter__select--item').styler({
            onSelectClosed: function (e) {
                val['limit'] = $('[data-item] option:selected').val();
                ajax_send();
            }
        });

        if ($('.view').data("id")) {
            val['cat_id'] = $('.view').data("id");
        }

        function ajax_send() {
            $.ajax({
                type: "POST",
                url: "function.php",
                data: val,
                success: function (data) {
                    $('.view').html(data);
                },
                error: function (error) {
                    alert("Ошибка отправки данных" + error);
                }
            });
        }


        $('.form-filter__select--price').styler({
            onSelectClosed: function (e) {

                history.pushState('', "", window.location.href + "&" + $('.form-filter__select--price option:selected').val());

            }
        });
        $('.form-filter__select--category').styler({
            onSelectClosed: function (e) {

                history.pushState('', "", window.location.href + "&" + $('.form-filter__select--category option:selected').val());

            }
        });
        $('.accordeon-body__block ').on('click', function (e) {


        });
    }, 100);


    //Mobile-menu
    $('.burger').on('click', function (e) {
        e.preventDefault();
        $('.burger').toggleClass('burger--active');
        $('.nav-menu').toggleClass('nav-menu--active');
        $('body').toggleClass('boby-active');
    });

    // Проверяем корзину на наличие товара
    if ($('[data-js-goods-list]').children('.goods').length > 0) {
        $('.btn__cart--checkout').css('display', 'flex');
    }
    //Clear cart
    $('[data-js-goods-clear]').on('click', function (e) {
        $('[data-js-goods-list]').fadeOut(300, function () {
            $(this).remove();
        });
        $('[data-js-empty]').html('ВАША КОРЗИНА ПУСТА');
        $('[data-js-goods-total]').remove();
        $('.btn__cart--checkout').remove();
        $(this).remove();
    });
    //Delete goods item
    // $('[data-js-close]').on('click', function () {
    //     $(this).parents('li').next().remove('hr');
    //     $(this).parent('li').remove();
    //     if ($('[data-js-goods-list]').children('.goods').length <= 0) {
    //         $('[data-js-goods-list]').fadeOut(300, function () {
    //             $(this).remove();
    //         });
    //         $('[data-js-empty]').html('Your Basket is empty');
    //         $('[data-js-goods-total]').remove();
    //         $('[data-js-goods-clear]').remove();
    //         $('.btn__cart--checkout').remove();
    //     }
    // });
    // location to product-details

    $('.products__content').on('click', 'li', function (e) { // отслеживаем событие клика по веб-документу
        let block = $(this).find('.card__add-btn'); // определяем элемент, к которому будем применять условия (можем указывать ID, класс либо любой другой идентификатор элемента)
        let id = $(this).find('.card__add-btn').attr('data-id');
        if (!block.is(e.target) // проверка условия если клик был не по нашему блоку
            && block.has(e.target).length === 0) { // проверка условия если клик не по его дочерним элементам
            let url = "http://ecommerce-mvc/product/" + id;
            $(location).attr('href', url);
        }
    });
    $('.view-grid').on('click', 'li', function (e) { // отслеживаем событие клика по веб-документу
        let block = $(this).find('.card__add-btn'); // определяем элемент, к которому будем применять условия (можем указывать ID, класс либо любой другой идентификатор элемента)
        let id = $(this).find('.card__add-btn').attr('data-id');
        if (!block.is(e.target) // проверка условия если клик был не по нашему блоку
            && block.has(e.target).length === 0) { // проверка условия если клик не по его дочерним элементам
            let url = "http://ecommerce-mvc/product/" + id;
            $(location).attr('href', url);
        }
    });
    $('.view-list').on('click', 'li', function (e) { // отслеживаем событие клика по веб-документу
        let block = $(this).find('.card__add-btn'); // определяем элемент, к которому будем применять условия (можем указывать ID, класс либо любой другой идентификатор элемента)
        let id = $(this).find('.card__add-btn').attr('data-id');
        if (!block.is(e.target) // проверка условия если клик был не по нашему блоку
            && block.has(e.target).length === 0) { // проверка условия если клик не по его дочерним элементам
            let url = "http://ecommerce-mvc/product/" + id;
            $(location).attr('href', url);
        }
    });

    // ==============================================================
    // Корзина

    /*$('.cart').on('click', function (e) {
        e.preventDefault();
        $('.cart__mini-cart').toggleClass('cart__mini-cart--show');
    });

    let cart = {};

    console.log(cart);

    $('.card__add-btn').on('click', addToCart);

    $('.cart__mini-cart').on('click', '.cart__main-link', function () {

        let url = "?option=cart&cat_id=5";
        location.href = url;
        history.pushState('', '', url);
    });

    function addToCart(e) {
        // добавляем товар в корзину
        e.preventDefault();

        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        if (cart[id] === undefined && cart[name] === undefined) {
            // cart[id] = 1;
            cart[name] = 1;
        } else {
            // cart[id]++;
            cart[name]++;
        }

        $.ajax({
            type: "POST",
            url: "cart1.php",
            data: 'id=' + id + 'name=' + name,
            dataType: 'json',
            success: function (data) {
                console.log("данные ушли " + "id=" + id + " " + "name=" + name);
                let out = "";
                out += data[id];
                out += data[name];
                $('.outer').append(out);
            },
            error: function () {
                alert("Ошибка отправки id");
            }
        });
        showMiniCart();
        saveCart();
    }

    function saveCart() {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    function loadCart() {
        //проверка записи в localStorage
        if (localStorage.getItem('cart')) {
            // если есть то расшифровываю
            cart = JSON.parse(localStorage.getItem('cart'));
            showMiniCart();
        }
    }

    loadCart();

    function showMiniCart() {
        // показываю мини-корзину
        let out = "";
        let num = 0;

        for (let key in cart) {
            out += '<div class="cart__inner">' +
                '<span class="cart__left">' + key + '</span>' + '<span class="cart__right">' + cart[key] + 'pcs' +
                '</span>' +
                '</div>';
            num += cart[key];
        }
        out += '<a href="" class="cart__main-link">To Cart</a>';
        $('.nav-cart').attr('data-count', num);
        $('.cart__mini-cart').html(out);

    }
*/


// Добавляем класс к ссылкам меню PRODUCTS COLLECTIONS

    $('.filter__link').on('click', function (e) {
        e.preventDefault();
        $('.filter__link').removeClass('filter__link--active');
        $(this).addClass('filter__link--active');
    });


// Обновляем кол-во товара в мини-корзине

    $('.card__add-btn').click(function () {
        let id = $(this).attr("data-id");
        $.ajax({
            type: 'POST',
            url: "/cart/addAjax/" + id,
            success: function (data) {
                $('#cart-count').html(data);
            }
        });
        return false;
    });


//Вывод товара на главной по категории

    $('.filter__link').on('click', function (e) {

        let link = $(this).attr('data-cat_id');

        $.ajax({
            type: "POST",
            url: "/site/ajax/" + link,
            beforeSend: function () {
                console.log(link);
            },
            success: function (data) {
                $('.products__content').html(data);
            }
        });
        return false;
    });


//Добавление товара на главной по кнопке MORE

    $('.container').on('click','.btn__product',function (e) {
        let link = $('.filter__link--active').attr('data-cat_id');
        let page = $('.btn__product').attr('data-page');

        $.ajax({
            type: "POST",
            url: "/site/ajax/" + link + '/page-' + page,
            data: {page:page},
            beforeSend: function () {
                console.log(link);
            },
            success: function (data) {
                $('.products__content').append(data);
                $('.btn__product').attr('data-page',+ page +1);

            },
            error:function (data) {
                $('.products__content').html(data);
            }
        });
        return false;
    });

// Убираем стили на главной
    if($('main').hasClass('home')){
        $('.card').css({'margin-left':'auto','margin-right':'auto'});
    }



});