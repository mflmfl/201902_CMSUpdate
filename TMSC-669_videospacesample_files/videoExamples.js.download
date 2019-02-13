// *** Routines for loading Media Manager videos and the background video ***
// usage examples:
//    <div class="mm-player-custom html5" data-autoplay data-loop data-muted data-src="https://sdl-marketing.dist.sdlmedia.com/distributions/?o=88D948AC-B1B3-4E03-8F92-5C5176808C1E"></div>
//    <div class="mm-player" data-src="https://sdl-marketing.dist.sdlmedia.com/distributions/?o=88D948AC-B1B3-4E03-8F92-5C5176808C1E"></div>
//    <div class="mm-player" data-autoplay data-src="https://sdl-marketing.dist.sdlmedia.com/distributions/?o=88D948AC-B1B3-4E03-8F92-5C5176808C1E"></div>
//    <div class="mm-player" data-modal-autoplay data-src="https://sdl-marketing.dist.sdlmedia.com/distributions/?o=88D948AC-B1B3-4E03-8F92-5C5176808C1E"></div>

$(document).ready(function () {
    modalPlayers = $('.mm-player').filter(function (i, element) {
        return $(element).attr('data-modal-autoplay') !== undefined
    })

    modalPlayers.each(function (i, player) {
        // chcek if there are .mm-player elements with the data-modal-autoplay attribute which are not wrapped in a .modal and thow a warning
        modal = $(player).closest(".modal").first()
        if (modal.size() == 0) {
            return false;
        }
    })

    modals = modalPlayers.closest(".modal")

    modals.on('shown.bs.modal', function (event) {
        player = $(event.target).find('.mm-player').first().trigger('play')
    })
    
	$(".modal").on('hidden.bs.modal', function () {
	    this.querySelector('video').pause();
	    $("div.modal-backdrop.fade.in").remove();
    });

    $('.modal').on('shown.bs.modal', function () {
    })

    renderVideo();

    renderThumbnails();
})

function getDefaultPosterUrl(distributionJsonUrl) {
    var posterUrl = distributionJsonUrl.toLowerCase().replace("/json/", "/distributions/?f=").concat("&ext=.jpg");
    return posterUrl;
}

function renderThumbnails() {
    $('*[id*=clinicalThumbnail]').each(function () {
        var currentElement = $(this);
        var distributionJsonUrl = $(this).find('img').attr('src');
        currentElement.find('img')[0].src = getDefaultPosterUrl(distributionJsonUrl);
        $.ajax(distributionJsonUrl, {
            async: false,
            type: "GET",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                if (response.assetContainers.length > 0) {
                    var assetContainer = response.assetContainers[0];
                    if (assetContainer.assets != null && assetContainer.assets.length > 0) {
                        var asset = assetContainer.assets[0];
                        if (asset.renditionGroups != null && asset.renditionGroups.length > 0) {
                            asset.renditionGroups.forEach(function (renditionGroup) {
                                switch (renditionGroup.name) {
                                    case 'Thumbnail - Source':
                                        renditionGroup.renditions.forEach(function (rendition) {
                                            if (rendition.name == "HighResThumb") {
                                                currentElement.find('img')[0].src = rendition.url;
                                            }
                                        });
                                        break;
                                    default:
                                        break;
                                }
                            });
                        }
                    }
                }
            },
            error: function (response) {
                console.log("Error in Json call");
            }
        });
        console.log("Thumbnails Rendered");
    }); 
}

function uniquePlayerId() {
    return Math.round(new Date().getTime() + (Math.random() * 100));
}

function getDistributionUrl(distributionUrl) {
    distributionUrl = distributionUrl.toLowerCase().
    replace("/distribution/", "/distributions/")

    if (distributionUrl.toLowerCase().indexOf('/distributions/') == -1 ||
        !distributionUrl.indexOf('o=') ||
        distributionUrl.indexOf('/embed/') != -1 ||
        distributionUrl.indexOf('&') != -1) {
        return false;
    }
    return distributionUrl
}

function embedUrlFromDistribution(distributionUrl, playerId, responsive) {
    // todo test with old style media manager URLs
    responsive = (responsive === undefined) ? true : responsive

    return distributionUrl.
    replace("distributions/?o=", "distributions/embed/?o=").
    concat("&trgt=" + playerId).
    concat((responsive ? "&responsive=true" : ''));
}

function fUrlFromDistribution(distributionUrl) {
    // todo test with old media manager URLs
    return distributionUrl.
    replace("distributions/?o=", "distributions/?f=")
}

function stillUrlFromDistribution(distributionUrl) {
    // todo test with old media manager URLs
    return fUrlFromDistribution(distributionUrl).
    concat("&ext=.jpg");
}

function mp4UrlFromDistribution(distributionUrl) {
    // todo test with old media manager URLs
    return fUrlFromDistribution(distributionUrl).
    concat("&ext=.mp4");
}

function webmUrlFromDistribution(distributionUrl) {
    // todo test with old media manager URLs
    return fUrlFromDistribution(distributionUrl).
    concat("&ext=.webm");
}

function renderVideo() {
    $('.mm-player').bind("player-ready", function (event) {
        player = $(event.target).closest('.mm-player').first()
        if (!player.hasClass('player-ready')) {
            player.addClass('player-ready')
            player.trigger('mm-show-player', event.target)

            if (player.attr('data-pause-when-ready') == undefined &&
                (player.attr('data-autoplay') == '' ||
                player.attr('data-autoplay') == 'true' ||
                player.attr('data-play-when-ready') != undefined)) {
                player.trigger('play')
            } else {
                player.trigger('pause')
            }
            player.removeAttr('data-play-when-ready')
            player.removeAttr('data-pause-when-ready')
        }
    });

    $('.mm-player').on("play", function (event) {
        player = $(event.target)
        if (player.hasClass('player-ready')) {
            player.find('.video').children().trigger('play')
        } else {
            player.attr('data-play-when-ready', '')
        }
        player.removeAttr('data-pause-when-ready')
    });

    $('.mm-player').on("pause", function (event) {
        player = $(event.target)
        if (player.hasClass('player-ready')) {
            player.find('.video').children().trigger('pause')
        } else {
            //delayed stop when the Media Manager player is not ready yet
            player.attr('data-pause-when-ready', '')
        }
        player.removeAttr('data-play-when-ready')
    });

    $('.mm-player').on("mm-load-video", function (event) {
        player = $(event.target)
        videoPlayerId = player.find('.video').first().attr('id')
        distributionUrl = getDistributionUrl(player.attr('data-src'))
        if (!distributionUrl) {
            return
        }
        embedUrl = embedUrlFromDistribution(distributionUrl, videoPlayerId)
        //player.find('.still').first().append('<img src="' + stillUrl + '" width="600px"/>');
        $.getScript(embedUrl)
    })

    $('.mm-player').on("mm-load", function (event) {
        player = $(event.target)
        if (!player.hasClass('player-loaded')) {
            player.addClass('player-loaded')

            videoPlayerId = uniquePlayerId()
            player.append('<div class="video" id="' + videoPlayerId + '"></div>');
            player.trigger('mm-load-video')
        }
    })

    $('.mm-player-custom.html5').on("mm-load", function (event) {
        player = $(event.target)
        if (!player.hasClass('player-loaded')) {
            player.addClass('player-loaded')

            distributionUrl = getDistributionUrl(player.attr('data-src'))
            if (!distributionUrl) {
                return
            }


            posterUrl = stillUrlFromDistribution(distributionUrl)
            mp4Url = mp4UrlFromDistribution(distributionUrl)
            webmUrl = webmUrlFromDistribution(distributionUrl)

            autoplay = (player.attr('data-autoplay') !== undefined ? 'autoplay data-keepplaying="true"' : '')
            loop = (player.attr('data-loop') !== undefined ? 'loop' : '')
            muted = (player.attr('data-muted') !== undefined ? 'muted' : '')
            controls = (player.attr('data-controls') !== undefined ? 'controls' : '')
            videoElement = $('<video ' + autoplay + ' ' + loop + ' ' + muted + ' ' + controls + ' poster="' + posterUrl + '">')
            videoElement.append($('<source src="' + mp4Url + '" type="video/mp4">'))
            videoElement.append($('<source src="' + webmUrl + '" type="video/webm">'))
            player.append(videoElement)
        }
    })

    $('.mm-player-custom').trigger("mm-load");
    $('.mm-player').trigger("mm-load");

    $('.video-in-tile').on('mouseover', function (event) {
        player = $(event.target)
        player.trigger('play')
    });

    $('.video-in-tile').on('mouseout', function (event) {
        player = $(event.target)
        player.trigger('pause')
    });
}

