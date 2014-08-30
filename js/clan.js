$(function(){
var $list = $(".js-list"),
    $btn_table = $(".js-table"),
    $btn_grid = $(".js-grid");

var setTable = function () {
    $list.removeClass("type_grid");
};

var setGrid = function () {
    $list.addClass("type_grid");
};

$btn_table.on("click", setTable);
$btn_grid.on("click", setGrid);
});//]]>