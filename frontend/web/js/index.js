jQuery(document).ready(function($) {

							var ocClients = $("#oc-clients");

							ocClients.owlCarousel({
								margin: 60,
								loop: true,
								nav: false,
								autoplay: true,
								dots: false,
								autoplayHoverPause: true,
								responsive:{
									0:{ items:2 },
									480:{ items:3 },
									768:{ items:4 },
									992:{ items:5 },
									1200:{ items:6 }
								}
							});

						});

jQuery(window).load(function(){

						var $container = $('#portfolio');

						$container.isotope({
							transitionDuration: '0.65s',
							masonry: {
								columnWidth: $container.find('.portfolio-item:not(.wide)')[0]
							}
						});

						$('#page-menu a').click(function(){
							$('#page-menu li').removeClass('current');
							$(this).parent('li').addClass('current');
							var selector = $(this).attr('data-filter');
							$container.isotope({ filter: selector });
							return false;
						});

						$(window).resize(function() {
							$container.isotope('layout');
						});

					});
