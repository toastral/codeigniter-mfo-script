$("#ex6").slider({
	tooltip: 'always'
});
$("#ex6").on("slide", function(slideEvt) {
	$("#ex6SliderVal").text(slideEvt.value);
});