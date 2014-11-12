/* $(function(){
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

var word;
$("#js-list").find("a").click(function() {
    word = $("#js-list").attr("class");
    if(word == 'type_grid') {
        $('#js-list').removeClass("type_grid").addClass("aga");
    }
    else {
         $('#switch').removeClass("aga").addClass("type_grid");
    }
});
*/
$(function() {
    $( "#switch" ).click(function() {
    $( ".js-list" ).toggleClass( "type_grid", 10 );                   
 }); 
});