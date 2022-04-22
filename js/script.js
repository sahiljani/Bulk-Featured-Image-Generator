function fold(input, lineSize, lineArray) {
	lineArray = lineArray || [];
	if (input.length <= lineSize) {
		lineArray.push(input);
		return lineArray;
	}

	lineArray.push(input.substring(0, lineSize));
	var tail = input.substring(lineSize);
	return fold(tail, lineSize, lineArray);
}





function imggen() {



	// variable declaration
	var bulk_image_generator_url = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_url]"]').value;
	// var bulk_image_generator_font_size = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_font_size]"]').value;
	var bulk_image_generator_color = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_color]"]').value;
	var bulk_image_generator_width = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_width]"]').value;
	var bulk_image_generator_wordwrap = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_wordwrap]"]').value;
	var bulk_image_generator_height = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_height]"]').value;
	var bulk_image_generator_opacity = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_opacity]"]').value;
	var bulk_image_generator_posX = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_posX]"]').value;
	var bulk_image_generator_posY = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_posY]"]').value;
	var bulk_image_generator_align = document.querySelector('select[name="bulk_image_generator_options[bulk_image_generator_align]"]').value;
	var bulk_image_generator_position_gravity = document.querySelector('select[name="bulk_image_generator_options[bulk_image_generator_position_gravity]"]').value;
	var bulk_image_generator_Fstyle = document.querySelector('select[name="bulk_image_generator_options[bulk_image_generator_Fstyle]"]').value;
	var bulk_image_generator_Fsize = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_Fsize]"]').value + "%";
	var bulk_image_generator_FFamily = document.querySelector('select[name="bulk_image_generator_options[bulk_image_generator_FFamily]"]').value;
	var bulk_image_generator_Fweight = document.querySelector('select[name="bulk_image_generator_options[bulk_image_generator_Fweight]"]').value;
	var bulk_image_generator_Oweight = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_Oweight]"]').value;
	var bulk_image_generator_Ocolor = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_Ocolor]"]').value;
	var bulk_image_generator_Oopacity = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_Oopacity]"]').value;
	var bulk_image_generator_Oblur = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_Oblur]"]').value;
	var bulk_image_generator_Bcolor = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_Bcolor]"]').value;
	var bulk_image_generator_Bopacity = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_Bopacity]"]').value;
	var img = document.querySelector('#render_img');


	var text = document.querySelector('input[name="bulk_image_generator_options[bulk_image_generator_text]"]').value;



	var arrayOfLines = fold(text, bulk_image_generator_wordwrap);
	var foldedString = arrayOfLines.join('%0A');
	var foldedString = foldedString.replaceAll(' ', '%20');
	var text = foldedString;





	const params = new URLSearchParams({
		"text": text,
		"text.size": bulk_image_generator_Fsize,
		"text.color": bulk_image_generator_color.replace("#", "").toUpperCase(),
		"text.opacity": bulk_image_generator_opacity,
		"text.position.gravity": bulk_image_generator_position_gravity,
		"text.position.x": bulk_image_generator_posX,
		"text.position.y": bulk_image_generator_posY,
		"text.align": bulk_image_generator_align,
		"text.font.family": bulk_image_generator_FFamily,
		"text.font.style": bulk_image_generator_Fstyle,
		"text.font.weight": bulk_image_generator_Fweight,
		"text.width": bulk_image_generator_width,

		"text.height": bulk_image_generator_height,
		"text.outline.width": bulk_image_generator_Oweight,
		"text.outline.opacity": bulk_image_generator_Oopacity,
		"text.outline.color": bulk_image_generator_Ocolor.replace("#", "").toUpperCase(),
		"text.outline.blur": bulk_image_generator_Oblur,
		"text.background.color": bulk_image_generator_Bcolor.replace("#", "").toUpperCase(),
		"text.background.opacity": bulk_image_generator_Bopacity,
	});

	const arguments = params.toString();
	console.log(bulk_image_generator_url + "?" + decodeURIComponent(arguments));
	img.src = bulk_image_generator_url + "?" + decodeURIComponent(arguments);
}

// generate image
const inputs = document.querySelectorAll('input, select');
inputs.forEach(input => {
	input.addEventListener('change', function handleClick(event) {
		if (input.value == "") {
			input.value = 0;
		}
		imggen();
	});
});

var url_string = window.location.href; //window.location.href
var url = new URL(url_string);
var page = url.searchParams.get("tab");
console.log(page);

if (page == "settings") {
	imggen();
}



jQuery(document).ready(function () {

	jQuery("#sbmtbtn").click(function () {

		jQuery('#set_all_output').empty();
		//  idlist
		var idlist = document.querySelector('#idlist');

		var idlist_array = JSON.parse("[" + idlist.value + "]");


		var i = 1;                  //  set your counter to 1

		function myLoop() {         //  create a loop function
			setTimeout(function () {   //  call a 3s setTimeout when the loop is called
				// event.preventDefault();
				var link = "admin-ajax.php";
				var formData = new FormData;

				formData.append('action', 'setfeatured');
				formData.append('setfeatured', idlist_array[0][i]);
				jQuery.ajax({
					url: link,

					data: formData,
					processData: false,
					contentType: false,
					type: 'post',
					success: function (result) {
						console.log(idlist_array[0][i] + " is done");

						document.getElementsByClassName('set_all_output')[0].innerHTML += "<p>" + result.data + "</p>";


					}
				});
				i++;
				if (i < idlist_array[0].length) {
					myLoop();
				}
				else {

					document.getElementById("sbmtbtn").classList.remove("loading");
				}
			}, 1500)
		}

		myLoop();


	});


});


var sbmtbtn = document.getElementById("sbmtbtn");
if (typeof (sbmtbtn) != 'undefined' && sbmtbtn != null) {

	sbmtbtn.addEventListener('click', () => {

		sbmtbtn.classList.add("loading");

		jQuery('#set_all_output').addClass("set_all_output");

	});
}







jQuery(document).ready(function ($) {

	$("#doughnutChart").drawDoughnutChart([
		{ title: "Without Featured Features", value: parseInt(jQuery('input[name="without_featured"]').val()), color: "#EF4444" },
		{ title: "With Featured Features", value: parseInt(jQuery('input[name="with_featured"]').val()), color: "#23C55F" }
	]);
});

; (function ($, undefined) {
	$.fn.drawDoughnutChart = function (data, options) {
		var $this = this,
			W = $this.width(),
			H = $this.height(),
			centerX = W / 2,
			centerY = H / 2,
			cos = Math.cos,
			sin = Math.sin,
			PI = Math.PI,
			settings = $.extend({
				segmentShowStroke: true,
				segmentStrokeColor: "#0C1013",
				segmentStrokeWidth: 1,
				baseColor: "rgba(0,0,0,0.5)",
				baseOffset: 4,
				edgeOffset: 10,//offset from edge of $this
				percentageInnerCutout: 75,
				animation: true,
				animationSteps: 90,
				animationEasing: "easeInOutExpo",
				animateRotate: true,
				tipOffsetX: -8,
				tipOffsetY: -45,
				tipClass: "doughnutTip",
				summaryClass: "doughnutSummary",
				summaryTitle: "TOTAL:",
				summaryTitleClass: "doughnutSummaryTitle",
				summaryNumberClass: "doughnutSummaryNumber",
				beforeDraw: function () { },
				afterDrawed: function () { },
				onPathEnter: function (e, data) { },
				onPathLeave: function (e, data) { }
			}, options),
			animationOptions = {
				linear: function (t) {
					return t;
				},
				easeInOutExpo: function (t) {
					var v = t < .5 ? 8 * t * t * t * t : 1 - 8 * (--t) * t * t * t;
					return (v > 1) ? 1 : v;
				}
			},
			requestAnimFrame = function () {
				return window.requestAnimationFrame ||
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame ||
					window.oRequestAnimationFrame ||
					window.msRequestAnimationFrame ||
					function (callback) {
						window.setTimeout(callback, 1000 / 60);
					};
			}();

		settings.beforeDraw.call($this);

		var $svg = $('<svg width="300" height="300" viewBox="0 0 ' + W + ' ' + H + '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>').appendTo($this),
			$paths = [],
			easingFunction = animationOptions[settings.animationEasing],
			doughnutRadius = Min([H / 2, W / 2]) - settings.edgeOffset,
			cutoutRadius = doughnutRadius * (settings.percentageInnerCutout / 100),
			segmentTotal = 0;

		//Draw base doughnut
		var baseDoughnutRadius = doughnutRadius + settings.baseOffset,
			baseCutoutRadius = cutoutRadius - settings.baseOffset;
		$(document.createElementNS('http://www.w3.org/2000/svg', 'path'))
			.attr({
				"d": getHollowCirclePath(baseDoughnutRadius, baseCutoutRadius),
				"fill": settings.baseColor
			})
			.appendTo($svg);

		//Set up pie segments wrapper
		var $pathGroup = $(document.createElementNS('http://www.w3.org/2000/svg', 'g'));
		$pathGroup.attr({ opacity: 0 }).appendTo($svg);

		//Set up tooltip
		var $tip = $('<div class="' + settings.tipClass + '" />').appendTo('body').hide(),
			tipW = $tip.width(),
			tipH = $tip.height();

		//Set up center text area
		var summarySize = (cutoutRadius - (doughnutRadius - cutoutRadius)) * 2,
			$summary = $('<div class="' + settings.summaryClass + '" />')
				.appendTo($this)
				.css({
					// width: summarySize + "px",
					// height: summarySize + "px"
					// "margin-left": -(summarySize / 2) + "px",
					// "margin-top": -(summarySize / 2) + "px"
				});
		var $summaryTitle = $('').appendTo($summary);
		var $summaryNumber = $('').appendTo($summary).css({ opacity: 0 });

		for (var i = 0, len = data.length; i < len; i++) {
			segmentTotal += data[i].value;
			$paths[i] = $(document.createElementNS('http://www.w3.org/2000/svg', 'path'))
				.attr({
					"stroke-width": settings.segmentStrokeWidth,
					"stroke": settings.segmentStrokeColor,
					"fill": data[i].color,
					"data-order": i
				})
				.appendTo($pathGroup)
				.on("mouseenter", pathMouseEnter)
				.on("mouseleave", pathMouseLeave)
				.on("mousemove", pathMouseMove);
		}

		//Animation start
		animationLoop(drawPieSegments);

		//Functions
		function getHollowCirclePath(doughnutRadius, cutoutRadius) {
			//Calculate values for the path.
			//We needn't calculate startRadius, segmentAngle and endRadius, because base doughnut doesn't animate.
			var startRadius = -1.570,// -Math.PI/2
				segmentAngle = 6.2831,// 1 * ((99.9999/100) * (PI*2)),
				endRadius = 4.7131,// startRadius + segmentAngle
				startX = centerX + cos(startRadius) * doughnutRadius,
				startY = centerY + sin(startRadius) * doughnutRadius,
				endX2 = centerX + cos(startRadius) * cutoutRadius,
				endY2 = centerY + sin(startRadius) * cutoutRadius,
				endX = centerX + cos(endRadius) * doughnutRadius,
				endY = centerY + sin(endRadius) * doughnutRadius,
				startX2 = centerX + cos(endRadius) * cutoutRadius,
				startY2 = centerY + sin(endRadius) * cutoutRadius;
			var cmd = [
				'M', startX, startY,
				'A', doughnutRadius, doughnutRadius, 0, 1, 1, endX, endY,//Draw outer circle
				'Z',//Close path
				'M', startX2, startY2,//Move pointer
				'A', cutoutRadius, cutoutRadius, 0, 1, 0, endX2, endY2,//Draw inner circle
				'Z'
			];
			cmd = cmd.join(' ');
			return cmd;
		};
		function pathMouseEnter(e) {
			var order = $(this).data().order;
			$tip.text(data[order].title + ": " + data[order].value)
				.fadeIn(200);
			settings.onPathEnter.apply($(this), [e, data]);
		}
		function pathMouseLeave(e) {
			$tip.hide();
			settings.onPathLeave.apply($(this), [e, data]);
		}
		function pathMouseMove(e) {
			$tip.css({
				top: e.pageY + settings.tipOffsetY,
				left: e.pageX - $tip.width() / 2 + settings.tipOffsetX
			});
		}
		function drawPieSegments(animationDecimal) {
			var startRadius = -PI / 2,//-90 degree
				rotateAnimation = 1;
			if (settings.animation && settings.animateRotate) rotateAnimation = animationDecimal;//count up between0~1

			drawDoughnutText(animationDecimal, segmentTotal);

			$pathGroup.attr("opacity", animationDecimal);

			//If data have only one value, we draw hollow circle(#1).
			if (data.length === 1 && (4.7122 < (rotateAnimation * ((data[0].value / segmentTotal) * (PI * 2)) + startRadius))) {
				$paths[0].attr("d", getHollowCirclePath(doughnutRadius, cutoutRadius));
				return;
			}
			for (var i = 0, len = data.length; i < len; i++) {
				var segmentAngle = rotateAnimation * ((data[i].value / segmentTotal) * (PI * 2)),
					endRadius = startRadius + segmentAngle,
					largeArc = ((endRadius - startRadius) % (PI * 2)) > PI ? 1 : 0,
					startX = centerX + cos(startRadius) * doughnutRadius,
					startY = centerY + sin(startRadius) * doughnutRadius,
					endX2 = centerX + cos(startRadius) * cutoutRadius,
					endY2 = centerY + sin(startRadius) * cutoutRadius,
					endX = centerX + cos(endRadius) * doughnutRadius,
					endY = centerY + sin(endRadius) * doughnutRadius,
					startX2 = centerX + cos(endRadius) * cutoutRadius,
					startY2 = centerY + sin(endRadius) * cutoutRadius;
				var cmd = [
					'M', startX, startY,//Move pointer
					'A', doughnutRadius, doughnutRadius, 0, largeArc, 1, endX, endY,//Draw outer arc path
					'L', startX2, startY2,//Draw line path(this line connects outer and innner arc paths)
					'A', cutoutRadius, cutoutRadius, 0, largeArc, 0, endX2, endY2,//Draw inner arc path
					'Z'//Cloth path
				];
				$paths[i].attr("d", cmd.join(' '));
				startRadius += segmentAngle;
			}
		}
		function drawDoughnutText(animationDecimal, segmentTotal) {
			$summaryNumber
				.css({ opacity: animationDecimal })
				.text((segmentTotal * animationDecimal).toFixed(1));
		}
		function animateFrame(cnt, drawData) {
			var easeAdjustedAnimationPercent = (settings.animation) ? CapValue(easingFunction(cnt), null, 0) : 1;
			drawData(easeAdjustedAnimationPercent);
		}
		function animationLoop(drawData) {
			var animFrameAmount = (settings.animation) ? 1 / CapValue(settings.animationSteps, Number.MAX_VALUE, 1) : 1,
				cnt = (settings.animation) ? 0 : 1;
			requestAnimFrame(function () {
				cnt += animFrameAmount;
				animateFrame(cnt, drawData);
				if (cnt <= 1) {
					requestAnimFrame(arguments.callee);
				} else {
					settings.afterDrawed.call($this);
				}
			});
		}
		function Max(arr) {
			return Math.max.apply(null, arr);
		}
		function Min(arr) {
			return Math.min.apply(null, arr);
		}
		function isNumber(n) {
			return !isNaN(parseFloat(n)) && isFinite(n);
		}
		function CapValue(valueToCap, maxValue, minValue) {
			if (isNumber(maxValue) && valueToCap > maxValue) return maxValue;
			if (isNumber(minValue) && valueToCap < minValue) return minValue;
			return valueToCap;
		}
		return $this;
	};
})(jQuery);