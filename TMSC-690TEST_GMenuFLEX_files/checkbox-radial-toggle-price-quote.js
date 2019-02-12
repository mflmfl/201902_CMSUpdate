$("#priceQuote").click(function () {
	if ($(this).is(":checked")) {
		$("#priceQuoteInfo").show();
	} else {
		$("#priceQuoteInfo").hide();
	}
});
$("#generalInfo").click(function () {
	if ($(this).is(":checked")) {
		$("#priceQuoteInfo").hide();
	} else {
		$("#priceQuoteInfo").show();
	}
});