---
layout: post
title: Carousel Boilerplate Script
description: A simple and very extendible boilerplate for a Carousel.
keywords: jQuery, JavScript, Carousel
kind: blog
permalink: /blog/carousel-boilerplate
nav_url: /blog/
published: true
change_frequency: weekly
metadata:
- role: by
  name: Tim Benniks
- role: 'on'
  name: Github
  url: http://github.com/timbenniks/carousel
---

Many projects need a carousel of some sort.
As most libraries or plugins are big and not so easy to extend I did what any respectable developer would do.
I reinvented the wheel and created my own Carousel.

The Carousel is a plain and simple slider. It slides a `ul` behind an element which has `overflow: hidden`. 
Get the [code](http://github.com/timbenniks/carousel) on Github. 
The cloned code contains a simple example.

##How to use
A very simple setup could look like this:

{% highlight js %}
$(function()
{
	var carouselOpts =
	{
		prev: '.carousel-prev',
		next: '.carousel-next',
		loop: false,
		auto: false,
		startAt: 2,
		speed: 1000
	},

	carouselInstance = new Carousel.Base($('.carousel'), carouselOpts),
	carouselPager = new Carousel.Pager($('.carousel-pager'));
	
	// Or as a jQuery plugin		
	$('.carousel').carousel(carouselOpts);
	$('.carousel-pager').carouselPager();
});
{% endhighlight %}

##Options

For the `Carousel.Base` class:
* `speed` Speed in ms.
* `timeoutSpeed` Speed in ms, is only applied if auto is set to true.
* `easing` Default is `easeInOutExpo`.
* `auto` Enables autorun.
* `loop` If set to true the carousel will go to the first slide when clicking the next button after the last slide was shown.
* `prev` jQuery selector.
* `next` jQuery selector.
* `startAt` Start at a specific slide
* `step` use this value to override the with of the slides. Defaults the CSS with of the slides.

For the `Carousel.Pager` class:
* `activateOn` Activate the pager item after or before the carousel has moved. Defaults to: `beforemove`. Also available: `aftermove`.
* `killAutoRunAfterPagerIsUsed` If the carousel's auto option has been set, interacting with the carousel will kill the autorun.
* `carouselToMove` jQuery selector for the carousel that is being served by the pager. Defaults to the closest `ul` in their mutual parent element.

##Events
The Carousel publishes `beforemove` and `aftermove` events. Both events have the following data attached:

* `currentPos` The current viewIndex at the time of the event.
* `currentItem` The activated slide's DOM node.
* `currentCarousel` The parent DOM of the carousel.

The carousel also listens to events:
* `moveTo` Move the Carousel to a specific slide. Use `index` as variable in your event trigger.
* `stop` If the Carousel has the autorun option enabled, this will stop de autorun.
* `prev` Go to the previous slide.
* `next` Go to the next slide.
* `pause` If autorun has been set this will pause the slideshow.
* `resume` If the Carousel was paused, this will resume it.

Trigger an event like this:

{% highlight js %}
// with paramaters:
$('<carousel_selector>').trigger(
{
	type: 'moveTo',
	index: 3
});

// without paramaters:
$('<carousel_selector>').trigger('stop');
{% endhighlight %}

## Public functions
If you don't want to use event based communication you can also use the public functions exposed by the `Carousel.Base` class.

* `moveTo` Move the Carousel to a specific slide. Use `index` as variable in your event trigger.
* `prev` Go to the previous slide.
* `next` Go to the next slide.
* `pause` If autorun has been set this will pause the slideshow.
* `resume` If the Carousel was paused, this will resume it.
* `stop` If the Carousel has the autorun option enabled, this will stop de autorun.
* `currentPos` Returns teh current viewIndex.
* `totalSlides` Returns the number of slides.
* `currentItem` The activated slide's DOM node.
* `getItemByIndex` Returns a slide by viewIndex
* `destroy` Removes all bindings and stops the Carousel if autorun was set.

##Dependencies
This Carousel makes use of [jQuery](http://www.jquery.com) and [Morpheus](https://github.com/ded/morpheus).

##Easing	
The Carousel uses [easing-js](https://github.com/danro/easing-js) to to do it's fancy easings. 
Check out which ones you can use on their [documentation page](https://github.com/danro/easing-js).