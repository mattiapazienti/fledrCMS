function sortPop(b, a) {
  return (parseInt(- $(b).find(".views").text(), 10) - parseInt(- $(a).find(".views").text(), 10));
}

//remove minus before $(b) and $(a) to sort by unpopular

$(".pop").click(function() {
$("li").sort(sortPop).appendTo("ul");    
});

