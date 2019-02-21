$(document).ready(function() {
    $('img.svgColorWh').each(function() {
        var $img = $(this);
        var imgURL = $img.attr('src');
        var attributes = $img.prop("attributes");
        var fillColor = $img.data("changecolor");
		console.log(fillColor)
		
        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find('svg');

            // Remove any invalid XML tags
            $svg = $svg.removeAttr('xmlns:a');

            // Loop through IMG attributes and apply on SVG
            $.each(attributes, function() {
                $svg.attr(this.name, this.value);
            });
			$svg.find('path').css('fill',fillColor);
            // Replace IMG with SVG
            $img.replaceWith($svg);
        }, 'xml');
    });
});