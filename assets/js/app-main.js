var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
    baseUrl: '/',
    waitSeconds : 60,
    urlArgs: "v=002",
    shim: {
        "bootstrap": {
            deps: ['jquery']
        },
        "cart" : {
            deps : ['jquery'],
        },
        'flexslider' : {
            deps : ['jquery']
        },
        'jq_ui' : {
            deps : ['jquery']
        },
        'mobilegmap' : {
            deps : ['jquery','googlemap']
        },
        "noty"  : {
            deps : ['jquery']
        }
    },
    
    paths: {
        // LIBRARY
        bootstrap       : '//maxcdn.bootstrapcdn.com/bootstrap/2.2.1/js/bootstrap.min',
        cart            : 'js/shop_cart',
        flexslider      : dirTema+'/assets/js/lib/jquery.flexslider',
        jq_ui           : 'js/jquery-ui',
        jquery          : '//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min',
        jquery_sharrre  : dirTema+'/assets/js/lib/jquery.sharrre',
        mobilegmap      : dirTema+'/assets/js/lib/jquery.mobilegmap',
        googlemap       : '//maps.googleapis.com/maps/api/js?sensor=false',
        noty            : 'js/jquery.noty',
        noty_util       : 'js/utils/noty',
        select_nav      : dirTema+'/assets/js/lib/selectNav',

        // ROUTE
        router          : 'js/router',

        // CONTROLLER
        blog            : dirTema+'/assets/js/pages/blog',
        home            : dirTema+'/assets/js/pages/home',
        kontak          : dirTema+'/assets/js/pages/kontak',
        member          : dirTema+'/assets/js/pages/member',
        menu            : dirTema+'/assets/js/pages/default',
        produk          : dirTema+'/assets/js/pages/produk',
    }
});
require([
    'router',
    'bootstrap',
    'menu',
    'cart',
], function(router,b,menu,cart)
{
    // HOME
    router.define('/', 'home@run');
    router.define('home', 'home@run');

    // KONTAK
    router.define('kontak', 'kontak@run');

    // MEMBER
    router.define('member/*', 'member@run');

    // PRODUK
    router.define('produk/*', 'produk@run');

    // BLOG
    router.define('blog/*', 'blog@run');
    
    router.run();
    menu.run();
    cart.run();
});