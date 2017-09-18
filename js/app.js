var config = window.config = {};

// Config reference element
var $ref = $("#ref");

// Configure responsive bootstrap toolkit
config.ResponsiveBootstrapToolkitVisibilityDivs = {
    'xs': $('<div class="device-xs 				  hidden-sm-up"></div>'),
    'sm': $('<div class="device-sm hidden-xs-down hidden-md-up"></div>'),
    'md': $('<div class="device-md hidden-sm-down hidden-lg-up"></div>'),
    'lg': $('<div class="device-lg hidden-md-down hidden-xl-up"></div>'),
    'xl': $('<div class="device-xl hidden-lg-down			  "></div>'),
};

ResponsiveBootstrapToolkit.use('Custom', config.ResponsiveBootstrapToolkitVisibilityDivs);

//validation configuration
config.validations = {
	debug: true,
	errorClass:'has-error',
	validClass:'success',
	errorElement:"span",

	// add error class
	highlight: function(element, errorClass, validClass) {
		$(element).parents("div.form-group")
		.addClass(errorClass)
		.removeClass(validClass); 
	}, 

	// add error class
	unhighlight: function(element, errorClass, validClass) {
		$(element).parents(".has-error")
		.removeClass(errorClass)
		.addClass(validClass); 
	},

	// submit handler
    submitHandler: function(form) {
        form.submit();
    }
}

//delay time configuration
config.delayTime = 50;

// chart configurations
config.chart = {};

config.chart.colorPrimary = tinycolor($ref.find(".chart .color-primary").css("color"));
config.chart.colorSecondary = tinycolor($ref.find(".chart .color-secondary").css("color"));
/***********************************************
*        Animation Settings
***********************************************/
function animate(options) {
	var animationName = "animated " + options.name;
	var animationEnd = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
	$(options.selector)
	.addClass(animationName)
	.one(animationEnd, 
		function(){
			$(this).removeClass(animationName);
		}
	);
}

$(function() {
	var $itemActions = $(".item-actions-dropdown");

	$(document).on('click',function(e) {
		if (!$(e.target).closest('.item-actions-dropdown').length) {
			$itemActions.removeClass('active');
		}
	});
	
	$('.item-actions-toggle-btn').on('click',function(e){
		e.preventDefault();

		var $thisActionList = $(this).closest('.item-actions-dropdown');

		$itemActions.not($thisActionList).removeClass('active');

		$thisActionList.toggleClass('active');	
	});
});

/***********************************************
*        NProgress Settings
***********************************************/
var npSettings = { 
	easing: 'ease', 
	speed: 500 
}

NProgress.configure(npSettings);
$(function() {
	setSameHeights();

	var resizeTimer;

	$(window).resize(function() {
		clearTimeout(resizeTimer);
        resizeTimer = setTimeout(setSameHeights, 150);
	});
});


function setSameHeights($container) {

	$container = $container || $('.sameheight-container');

	var viewport = ResponsiveBootstrapToolkit.current();

	$container.each(function() {

		var $items = $(this).find(".sameheight-item");

		// Get max height of items in container
		var maxHeight = 0;

		$items.each(function() {
			$(this).css({height: 'auto'});
			maxHeight = Math.max(maxHeight, $(this).innerHeight());
		});


		// Set heights of items
		$items.each(function() {
			// Ignored viewports for item
			var excludedStr = $(this).data('exclude') || '';
			var excluded = excludedStr.split(',');

			// Set height of element if it's not excluded on 
			if (excluded.indexOf(viewport) === -1) {
				$(this).innerHeight(maxHeight);
			}
		});
	});
}

$(function() {
	animate({
		name: 'flipInY',
		selector: '.error-card > .error-title-block'
	});


	setTimeout(function(){
		var $el = $('.error-card > .error-container');

		animate({
			name: 'fadeInUp',
			selector: $el 
		});

		$el.addClass('visible');
	}, 1000);
})
//LoginForm validation
$(function() {
	if (!$('#login-form').length) {
        return false;
    }

    var loginValidationSettings = {
	    rules: {
	        username: {
	            required: true,
	            email: true
	        },
	        password: "required",
	        agree: "required"
	    },
	    messages: {
	        username: {
	            required: "Please enter username",
	            email: "Please enter a valid email address"
	        },
	        password:  "Please enter password",
	        agree: "Please accept our policy"
	    },
	    invalidHandler: function() {
			animate({
				name: 'shake',
				selector: '.auth-container > .card'
			});
		}
	}

	$.extend(loginValidationSettings, config.validations);

    $('#login-form').validate(loginValidationSettings);
})
//ResetForm validation
$(function() {
	if (!$('#reset-form').length) {
        return false;
    }

    var resetValidationSettings = {
	    rules: {
	        email1: {
	            required: true,
	            email: true
	        }
	    },
	    messages: {
	        email1: {
	            required: "Please enter email address",
	            email: "Please enter a valid email address"
	        }
	    },
	    invalidHandler: function() {
			animate({
				name: 'shake',
				selector: '.auth-container > .card'
			});
		}
	}

	$.extend(resetValidationSettings, config.validations);

    $('#reset-form').validate(resetValidationSettings);
})
//SignupForm validation
$(function() {
	if (!$('#signup-form').length) {
        return false;
    }

    var signupValidationSettings = {
	    rules: {
	    	firstname: {
	    		required: true,
	    	},
	    	lastname: {
	    		required: true,
	    	},
	        email: {
	            required: true,
	            email: true
	        },
	        password: {
				required: true,
				minlength: 8
	        },
	        retype_password: {
				required: true,
				minlength: 8,
				equalTo: "#password"
			},
			agree: {
				required: true,
			}
	    },
	    groups: {
	    	name: "firstname lastname",
			pass: "password retype_password",
		},
		errorPlacement: function(error, element) {
			if (
				element.attr("name") == "firstname" || 
				element.attr("name") == "lastname" 
			) {
				error.insertAfter($("#lastname").closest('.row'));
				element.parents("div.form-group")
				.addClass('has-error');
			} 
			else if (
				element.attr("name") == "password" || 
				element.attr("name") == "retype_password" 
			) {
				error.insertAfter($("#retype_password").closest('.row'));
				element.parents("div.form-group")
				.addClass('has-error');
			}
			else if (element.attr("name") == "agree") {
				error.insertAfter("#agree-text");
			}
			else {
				error.insertAfter(element);
			}
		},
	    messages: {
	    	firstname: "Please enter firstname and lastname",
	    	lastname: "Please enter firstname and lastname",
	        email: {
	            required: "Please enter email",
	            email: "Please enter a valid email address"
	        },
	        password: {
	        	required: "Please enter password fields.",
	        	minlength: "Passwords should be at least 8 characters."
	        },
	        retype_password: {
	        	required: "Please enter password fields.",
	        	minlength: "Passwords should be at least 8 characters."
	        },
	        agree: "Please accept our policy"
	    },
	    invalidHandler: function() {
			animate({
				name: 'shake',
				selector: '.auth-container > .card'
			});
		}
	}

	$.extend(signupValidationSettings, config.validations);

    $('#signup-form').validate(signupValidationSettings);
});
$(function() {

	$(".wyswyg").each(function() {

		var $toolbar = $(this).find(".toolbar");
		var $editor = $(this).find(".editor");


		var editor = new Quill($editor.get(0), {
			theme: 'snow'
		});

		editor.addModule('toolbar', {
			container: $toolbar.get(0)     // Selector for toolbar container
		});



	});
	
});
$(function () {

	$('#sidebar-menu, #customize-menu').metisMenu({
		activeClass: 'open'
	});


	$('#sidebar-collapse-btn').on('click', function(event){
		event.preventDefault();
		
		$("#app").toggleClass("sidebar-open");
	});

	$("#sidebar-overlay").on('click', function() {
		$("#app").removeClass("sidebar-open");
	});
	
});
//Flot Bar Chart
$(function() {

    if (!$('#flot-bar-chart').length) {
        return false;
    }

    function drawFlotCharts() {

        var barOptions = {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.6,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.8
                        }, {
                            opacity: 0.8
                        }]
                    }
                }
            },
            xaxis: {
                tickDecimals: 0
            },
            colors: [config.chart.colorPrimary],
            grid: {
                color: "#999999",
                hoverable: true,
                clickable: true,
                tickColor: "#D4D4D4",
                borderWidth:0
            },
            legend: {
                show: false
            },
            tooltip: true,
            tooltipOpts: {
                content: "x: %x, y: %y"
            }
        };
        var barData = {
            label: "bar",
            data: [
                [1, 34],
                [2, 25],
                [3, 19],
                [4, 34],
                [5, 32],
                [6, 44]
            ]
        };
        $.plot($("#flot-bar-chart"), [barData], barOptions);


        // Flot line chart
        var lineOptions = {
            series: {
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.0
                        }, {
                            opacity: 0.0
                        }]
                    }
                }
            },
            xaxis: {
                tickDecimals: 0
            },
            colors: [config.chart.colorPrimary],
            grid: {
                color: "#999999",
                hoverable: true,
                clickable: true,
                tickColor: "#D4D4D4",
                borderWidth:0
            },
            legend: {
                show: false
            },
            tooltip: true,
            tooltipOpts: {
                content: "x: %x, y: %y"
            }
        };
        var barData = {
            label: "bar",
            data: [
                [1, 34],
                [2, 25],
                [3, 19],
                [4, 34],
                [5, 32],
                [6, 44]
            ]
        };
        $.plot($("#flot-line-chart"), [barData], lineOptions);

        //Flot Pie Chart
        var data = [{
            label: "Sales 1",
            data: 21,
            color: tinycolor(config.chart.colorPrimary.toString()).lighten(20),
        }, {
            label: "Sales 2",
            data: 15,
            color: tinycolor(config.chart.colorPrimary.toString()).lighten(10),
        }, {
            label: "Sales 3",
            data: 7,
            color: tinycolor(config.chart.colorPrimary.toString()),
        }, {
            label: "Sales 4",
            data: 52,
            color: tinycolor(config.chart.colorPrimary.toString()).darken(10),
        }];

        var plotObj = $.plot($("#flot-pie-chart"), data, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });


        //live chart example
        var container = $("#flot-line-chart-moving");
        container.empty();
        // Determine how many data points to keep based on the placeholder's initial size;
        // this gives us a nice high-res plot while avoiding more than one point per pixel.

        var maximum = container.outerWidth() / 10 || 100;

        //

        var data = [];

        function getRandomData() {

            if (data.length) {
                data = data.slice(1);
            }

            while (data.length < maximum) {
                var previous = data.length ? data[data.length - 1] : 50;
                var y = previous + Math.random() * 10 - 5;
                data.push(y < 0 ? 0 : y > 100 ? 100 : y);
            }

            // zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res;
        }

        series = [{
            data: getRandomData(),
            lines: {
                fill: true
            }
        }];


        var plot = $.plot(container, series, {
            grid: {

                color: "#999999",
                tickColor: "#D4D4D4",
                borderWidth:0,
                minBorderMargin: 20,
                labelMargin: 10,
                backgroundColor: {
                    colors: ["#ffffff", "#ffffff"]
                },
                margin: {
                    top: 8,
                    bottom: 20,
                    left: 20
                },
                markings: function(axes) {
                    var markings = [];
                    var xaxis = axes.xaxis;
                    for (var x = Math.floor(xaxis.min); x < xaxis.max; x += xaxis.tickSize * 2) {
                        markings.push({
                            xaxis: {
                                from: x,
                                to: x + xaxis.tickSize
                            },
                            color: "#fff"
                        });
                    }
                    return markings;
                }
            },
            colors: [config.chart.colorPrimary.toString()],
            xaxis: {
                tickFormatter: function() {
                    return "";
                }
            },
            yaxis: {
                min: 0,
                max: 110
            },
            legend: {
                show: true
            }
        });

        // Update the random dataset at 25FPS for a smoothly-animating chart

        setInterval(function updateRandom() {
            series[0].data = getRandomData();
            plot.setData(series);
            plot.draw();
        }, 40);


        //Flot Multiple Axes Line Chart


        oilprices = [];
        exchangerates = [];


        oilpricesFull.map(function(item, index) {
            if (index % 8 === 0) {
                oilprices.push(item);
            }
        });

        exchangeratesFull.map(function(item, index) {
            if (index % 8 === 0) {
                exchangerates.push(item);
            }
        });



        function euroFormatter(v, axis) {
            return v.toFixed(axis.tickDecimals) + "€";
        }

        function doPlot(position) {
            $.plot($("#flot-line-chart-multi"), [{
                data: oilprices,
                label: "Oil price ($)"
            }, {
                data: exchangerates,
                label: "USD/EUR exchange rate",
                yaxis: 2
            }], {
                xaxes: [{
                    mode: 'time'
                }],
                yaxes: [{
                    min: 0
                }, {
                    // align if we are to the right
                    alignTicksWithAxis: position == "right" ? 1 : null,
                    position: position,
                    tickFormatter: euroFormatter
                }],
                legend: {
                    position: 'sw'
                },
                colors: [config.chart.colorPrimary.toString()],
                grid: {
                    color: "#999999",
                    hoverable: true,
                    clickable: true,
                    tickColor: "#D4D4D4",
                    borderWidth:0,
                    hoverable: true //IMPORTANT! this is needed for tooltip to work,

                },
                tooltip: true,
                tooltipOpts: {
                    content: "%s for %x was %y",
                    xDateFormat: "%y-%m-%d",

                    onHover: function(flotItem, $tooltipEl) {
                        // console.log(flotItem, $tooltipEl);
                    }
                }

            });
        }

        doPlot("right");

        $("button").click(function() {
            doPlot($(this).text());
        });

    }

    drawFlotCharts();

    $(document).on("themechange", function(){
        drawFlotCharts();
    });

});
$(function() {
    
    if (!$('#morris-one-line-chart').length) {
        return false;
    }

    function drawMorrisCharts() {

        $('#morris-one-line-chart').empty();
        
        Morris.Line({
            element: 'morris-one-line-chart',
                data: [
                    { year: '2008', value: 5 },
                    { year: '2009', value: 10 },
                    { year: '2010', value: 8 },
                    { year: '2011', value: 22 },
                    { year: '2012', value: 8 },
                    { year: '2014', value: 10 },
                    { year: '2015', value: 5 }
                ],
            xkey: 'year',
            ykeys: ['value'],
            resize: true,
            lineWidth:4,
            labels: ['Value'],
            lineColors: [config.chart.colorPrimary.toString()],
            pointSize:5,
        });

        $('#morris-area-chart').empty();

        Morris.Area({
            element: 'morris-area-chart',
            data: [{ period: '2010 Q1', iphone: 2666, ipad: null, itouch: 2647 },
                { period: '2010 Q2', iphone: 2778, ipad: 2294, itouch: 2441 },
                { period: '2010 Q3', iphone: 4912, ipad: 1969, itouch: 2501 },
                { period: '2010 Q4', iphone: 3767, ipad: 3597, itouch: 5689 },
                { period: '2011 Q1', iphone: 6810, ipad: 1914, itouch: 2293 },
                { period: '2011 Q2', iphone: 5670, ipad: 4293, itouch: 1881 },
                { period: '2011 Q3', iphone: 4820, ipad: 3795, itouch: 1588 },
                { period: '2011 Q4', iphone: 15073, ipad: 5967, itouch: 5175 },
                { period: '2012 Q1', iphone: 10687, ipad: 4460, itouch: 2028 },
                { period: '2012 Q2', iphone: 8432, ipad: 5713, itouch: 1791 } ],
            xkey: 'period',
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['iPhone', 'iPad', 'iPod Touch'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true,
            lineColors: [
                tinycolor(config.chart.colorPrimary.toString()).lighten(10).toString(),
                tinycolor(config.chart.colorPrimary.toString()).darken(10).toString(),
                config.chart.colorPrimary.toString()
            ],
            lineWidth:2,
            pointSize:1,
        });

        $('#morris-donut-chart').empty();

        Morris.Donut({
            element: 'morris-donut-chart',
            data: [{ label: "Download Sales", value: 12 },
                { label: "In-Store Sales", value: 30 },
                { label: "Mail-Order Sales", value: 20 } ],
            resize: true,
            colors: [
                tinycolor(config.chart.colorPrimary.toString()).lighten(10).toString(),
                tinycolor(config.chart.colorPrimary.toString()).darken(10).toString(),
                config.chart.colorPrimary.toString()
            ],
        });

        $('#morris-bar-chart').empty();

        Morris.Bar({
            element: 'morris-bar-chart',
            data: [{ y: '2006', a: 60, b: 50 },
                { y: '2007', a: 75, b: 65 },
                { y: '2008', a: 50, b: 40 },
                { y: '2009', a: 75, b: 65 },
                { y: '2010', a: 50, b: 40 },
                { y: '2011', a: 75, b: 65 },
                { y: '2012', a: 100, b: 90 } ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            hideHover: 'auto',
            resize: true,
            barColors: [
                config.chart.colorPrimary.toString(),
                tinycolor(config.chart.colorPrimary.toString()).darken(10).toString()
            ],
        });

        $('#morris-line-chart').empty();

        Morris.Line({
            element: 'morris-line-chart',
            data: [{ y: '2006', a: 100, b: 90 },
                { y: '2007', a: 75, b: 65 },
                { y: '2008', a: 50, b: 40 },
                { y: '2009', a: 75, b: 65 },
                { y: '2010', a: 50, b: 40 },
                { y: '2011', a: 75, b: 65 },
                { y: '2012', a: 100, b: 90 } ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            hideHover: 'auto',
            resize: true,
            lineColors: [
                config.chart.colorPrimary.toString(),
                tinycolor(config.chart.colorPrimary.toString()).darken(10).toString()
            ],
        });
    }

    drawMorrisCharts();

    $(document).on("themechange", function(){
        drawMorrisCharts();
    });
});
$(function(){

	// set sortable options
	$('.images-container').sortable({
		animation: 150,
		handle: ".control-btn.move",
		draggable: ".image-container",
		onMove: function (evt) {
			var $relatedElem = $(evt.related);

	        if ($relatedElem.hasClass('add-image')) {
	        	return false;
	        }
	    }
	});


	$controlsButtons = $('.controls');

	$controlsButtonsStar = $controlsButtons.find('.star');
	$controlsButtonsRemove = $controlsButtons.find('.remove');

	$controlsButtonsStar.on('click',function(e){
		e.preventDefault();

		$controlsButtonsStar.removeClass('active');
		$controlsButtonsStar.parents('.image-container').removeClass('main');

		$(this).addClass('active');

		$(this).parents('.image-container').addClass('main');
	})

})
$(function() {

    if (!$('#select-all-items').length) {
        return false;
    }


    $('#select-all-items').on('change', function() {
        var $this = $(this).children(':checkbox').get(0);    

        $(this).parents('li')
            .siblings()
            .find(':checkbox')
            .prop('checked', $this.checked)
            .val($this.checked)
            .change();
    });


    function drawItemsListSparklines(){
        $(".items-list-page .sparkline").each(function() {
            var type = $(this).data('type');

            // Generate random data
            var data = [];
            for (var i = 0; i < 17; i++) {
                data.push(Math.round(100 * Math.random()));
            }

            $(this).sparkline(data, {
                barColor: config.chart.colorPrimary.toString(),
                height: $(this).height(),
                type: type
            });
        });
    }

    drawItemsListSparklines();

    $(document).on("themechange", function(){
        drawItemsListSparklines();
    });

});
$(function() {

    if (!$('#dashboard-visits-chart').length) {
        return false;
    }

    // drawing visits chart
    drawVisitsChart();

    var el = null;
    var item = 'visits';

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
       
       el = e.target;
       item = $(el).attr('href').replace('#', '');
       switchHistoryCharts(item);
       
    });

    $(document).on("themechange", function(){
        switchHistoryCharts(item);
    });

    function switchHistoryCharts(item){
        var chartSelector = "#dashboard-" + item + "-chart";

        if ($(chartSelector).has('svg').length) {
            $(chartSelector).empty();
        }

        switch(item){
            case 'visits':
                drawVisitsChart();
                break;
             case 'downloads':
                drawDownloadsChart();
                break;
        }
    }

    function drawVisitsChart(){
        var dataVisits = [
            { x: '2015-09-01', y: 70},
            { x: '2015-09-02', y: 75 },
            { x: '2015-09-03', y: 50},
            { x: '2015-09-04', y: 75 },
            { x: '2015-09-05', y: 50 },
            { x: '2015-09-06', y: 75 },
            { x: '2015-09-07', y: 86 } 
        ];


        Morris.Line({
            element: 'dashboard-visits-chart',
            data: dataVisits,
            xkey: 'x',
            ykeys: ['y'],
            ymin: 'auto 40',
            labels: ['Visits'],
            xLabels: "day",
            hideHover: 'auto',
            yLabelFormat: function (y) {
                // Only integers
                if (y === parseInt(y, 10)) {
                    return y;
                }
                else {
                    return '';
                }
            },
            resize: true,
            lineColors: [
                config.chart.colorSecondary.toString(),
            ],
            pointFillColors: [
                 config.chart.colorPrimary.toString(),
            ]
        });
    }

    function drawDownloadsChart(){

        var dataDownloads = [
            { 
                year: '2006',
                downloads: 1300
            },
            { 
                year: '2007', 
                downloads: 1526
            },
            { 
                year: '2008', 
                downloads: 2000
            },
            { 
                year: '2009', 
                downloads: 1800
            },
            { 
                year: '2010', 
                downloads: 1650
            },    
            { 
                year: '2011', 
                downloads: 620
            },
            { 
                year: '2012', 
                downloads: 1000
            },
            { 
                year: '2013', 
                downloads: 1896
            },
            { 
                year: '2014', 
                downloads: 850
            },
            { 
                year: '2015', 
                downloads: 1500
            }  
        ];


        Morris.Bar({
            element: 'dashboard-downloads-chart',
            data: dataDownloads,
            xkey: 'year',
            ykeys: ['downloads'],
            labels: ['Downloads'],
            hideHover: 'auto',
            resize: true,
            barColors: [
                config.chart.colorPrimary.toString(),
                tinycolor(config.chart.colorPrimary.toString()).darken(10).toString()
            ],
        });
    }
});




$(function() {

    var $dashboardSalesBreakdownChart = $('#dashboard-sales-breakdown-chart');

    if (!$dashboardSalesBreakdownChart.length) {
        return false;
    } 

    function drawSalesChart(){

    $dashboardSalesBreakdownChart.empty();

        Morris.Donut({
            element: 'dashboard-sales-breakdown-chart',
            data: [{ label: "Download Sales", value: 12 },
                { label: "In-Store Sales", value: 30 },
                { label: "Mail-Order Sales", value: 20 } ],
            resize: true,
            colors: [
                tinycolor(config.chart.colorPrimary.toString()).lighten(10).toString(),
                tinycolor(config.chart.colorPrimary.toString()).darken(8).toString(),
                config.chart.colorPrimary.toString()
            ],
        });

        var $sameheightContainer = $dashboardSalesBreakdownChart.closest(".sameheight-container");

        setSameHeights($sameheightContainer);
    }

    drawSalesChart();

    $(document).on("themechange", function(){
       drawSalesChart();
    });
    
})
$(function() {
	

	function drawDashboardItemsListSparklines(){
		$(".dashboard-page .items .sparkline").each(function() {
			var type = $(this).data('type');

			// There is predefined data
			if ($(this).data('data')) {
				var data = $(this).data('data').split(',').map(function(item) {
					if (item.indexOf(":") > 0) {
						return item.split(":");
					}
					else {
						return item;
					}
				});
			}
			// Generate random data
			else {
				var data = [];
				for (var i = 0; i < 17; i++) {
					data.push(Math.round(100 * Math.random()));
				}
			}


			$(this).sparkline(data, {
				barColor: config.chart.colorPrimary.toString(),
				height: $(this).height(),
				type: type
			});
		});
	}

	drawDashboardItemsListSparklines();

	$(document).on("themechange", function(){
        drawDashboardItemsListSparklines();
    });
});
$(function() {

    var $dashboardSalesMap = $('#dashboard-sales-map');

    if (!$dashboardSalesMap.length) {
        return false;
    }

    function drawSalesMap() {

        $dashboardSalesMap.empty();

        var color = config.chart.colorPrimary.toHexString();
        var darkColor = tinycolor(config.chart.colorPrimary.toString()).darken(40).toHexString();
        var selectedColor = tinycolor(config.chart.colorPrimary.toString()).darken(10).toHexString();

        var sales_data = {
            us: 2000,
            ru: 2000, 
            gb: 10000,
            fr: 10000,
            de: 10000,
            cn: 10000,
            in: 10000,
            sa: 10000,
            ca: 10000,
            br: 5000,
            au: 5000
        };

        $dashboardSalesMap.vectorMap({
            map: 'world_en',
            backgroundColor: 'transparent',
            color: '#E5E3E5',
            hoverOpacity: 0.7,
            selectedColor: selectedColor,
            enableZoom: true,
            showTooltip: true,
            values: sales_data,
            scaleColors: [ color, darkColor],
            normalizeFunction: 'linear'
        });
    }

    drawSalesMap();

    $(document).on("themechange", function(){
       drawSalesMap();
    });
});
$(function() {

	$('.actions-list > li').on('click', '.check', function(e){
		e.preventDefault();

		$(this).parents('.tasks-item')
		.find('.checkbox')
		.prop("checked",  true);

		removeActionList();
	});

});
//LoginForm validation
$(function() {
	if (!$('.form-control').length) {
        return false;
    }

    $('.form-control').focus(function() {
		$(this).siblings('.input-group-addon').addClass('focus');
	});

	$('.form-control').blur(function() {
		$(this).siblings('.input-group-addon').removeClass('focus');
	});
});
var modalMedia = {
	$el: $("#modal-media"),
	result: {},
	options: {},
	open: function(options) {
		options = options || {};
		this.options = options;


		this.$el.modal('show');
	},
	close: function() {
		if ($.isFunction(this.options.beforeClose)) {
			this.options.beforeClose(this.result);
		}

		this.$el.modal('hide');

		if ($.isFunction(this.options.afterClose)) {
			this.options.beforeClose(this.result);
		}
	}
};
$(function() {
	$('.nav-profile > li > a').on('click', function() {
		var $el = $(this).next();

		animate({
			name: 'flipInX',
			selector: $el
		});
	});
})
$(function () {

	// Local storage settings
	var themeSettings = getThemeSettings();

	// Elements

	var $app = $('#app');
	var $styleLink = $('#theme-style');
	var $customizeMenu = $('#customize-menu');

	// Color switcher
	var $customizeMenuColorBtns = $customizeMenu.find('.color-item');

	// Position switchers
	var $customizeMenuRadioBtns = $customizeMenu.find('.radio');


	// /////////////////////////////////////////////////

	// Initial state

	// On setting event, set corresponding options

	// Update customize view based on options

	// Update theme based on options

	/************************************************
	*				Initial State
	*************************************************/

	setThemeSettings();

	/************************************************
	*					Events
	*************************************************/

	// set theme type
	$customizeMenuColorBtns.on('click', function() {
		themeSettings.themeName = $(this).data('theme');

		setThemeSettings();
	});


	$customizeMenuRadioBtns.on('click', function() {

		var optionName = $(this).prop('name');
		var value = $(this).val();

		themeSettings[optionName] = value;

		setThemeSettings();
	});

	function setThemeSettings() {
		setThemeState()
		.delay(config.delayTime)
		.queue(function (next) {

			setThemeColor();
			setThemeControlsState();
			saveThemeSettings();

			$(document).trigger("themechange");	
			
			next();
		});	
	}

	/************************************************
	*			Update theme based on options
	*************************************************/

	function setThemeState() {
		// set theme type
		if (themeSettings.themeName) {
			$styleLink.attr('href', 'css/app-' + themeSettings.themeName + '.min.css');
		}
		else {
			$styleLink.attr('href', 'css/app.min.css');
		}

		// App classes
		$app.removeClass('header-fixed footer-fixed sidebar-fixed');

		// set header
		$app.addClass(themeSettings.headerPosition);

		// set footer
		$app.addClass(themeSettings.footerPosition);

		// set footer
		$app.addClass(themeSettings.sidebarPosition);

		return $app;
	}

	/************************************************
	*			Update theme controls based on options
	*************************************************/

	function setThemeControlsState() {
		// set color switcher
		$customizeMenuColorBtns.each(function() {
			if($(this).data('theme') === themeSettings.themeName) {
				$(this).addClass('active');
			}
			else {
				$(this).removeClass('active');
			}
		});

		// set radio buttons
		$customizeMenuRadioBtns.each(function() {
			var name = $(this).prop('name');
			var value = $(this).val();

			if (themeSettings[name] === value) {
				$(this).prop("checked", true );
			}
			else {
				$(this).prop("checked", false );
			}
		});
	}

	/************************************************
	*			Update theme color
	*************************************************/
	function setThemeColor(){
		config.chart.colorPrimary = tinycolor($ref.find(".chart .color-primary").css("color"));	
		config.chart.colorSecondary = tinycolor($ref.find(".chart .color-secondary").css("color"));	
	}

	/************************************************
	*				Storage Functions
	*************************************************/

	function getThemeSettings() {
		var settings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : {};

		settings.headerPosition = settings.headerPosition || '';
		settings.sidebarPosition = settings.sidebarPosition || '';
		settings.footerPosition = settings.footerPosition || '';

		return settings;
	}

	function saveThemeSettings() {
		localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
	}

});
$(function() {

	$("body").addClass("loaded");

});


/***********************************************
*        NProgress Settings
***********************************************/

// start load bar
NProgress.start();

// end loading bar 
NProgress.done();
