$(document).ready(function(){
    $('.tabs').tabs();
    $('.slider').slider();
    // $('.materialboxed').materialbox();
    $('.tooltipped').tooltip();
    $('.dropdown-trigger').dropdown({
        coverTrigger: false
    });


    $('.sidenav').sidenav({
        edge: 'right'
    });

    $('.collapsible').collapsible();

    $('.dropdown2').dropdown({
        hover: true,
        alignment: 'right'
    });
});