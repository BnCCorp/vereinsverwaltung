$(function () {
    $(".datepicker").datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showAnim: "slideDown",
        dateFormat: "dd.mm.yy"
    });
    $('select').material_select();
});