---
layout: post
title: A strategy to instantiate javascript classes in a highly dynamic website
description: It's sometimes hard to keep track off the state of your JS instances in a dynamic website. This is a way to make that easier.
keywords: strategy, javascript, architecture
kind: blog
permalink: /blog/a-strategy-to-instantiate-javascript-classes-in-a-highly-dynamic-website
nav_url: /blog/
metadata: 
- role: by
  name: Tim Benniks
---

Imagine you have an endless-scrolling website that loads data by an AJAX call every time you reach a certain point when scrolling.
Because the new HTML is not yet known by the browsers' JavaScript engine, the events attached to the DOM nodes will not work.

You could solve this by creating a script that subscribes to the AJAX complete event and then assigns the proper events to the DOM nodes that where loaded by the AJAX call. 
This is complicated business when you have a lot of different DOM nodes and different scripts listening to the AJAX complete event. What if you do a new AJAX call? Does your browser remove the bindings and does it garbage-collect the now unused JavaScript instances? These are both valid questions when you create a big and highly dynamic website. And next to it's complexity it's [quite slow](http://jsperf.com/jquery-live-vs-delegate-vs-on/23 "Live events are slow") when you use live events.

Wouldn't it be nice to have an automated approach to creating and removing instances and binding and unbinding of events?

We came across this exact issue in a recent project. Without page reloads and ever growing interactive content, like parallax elements, video players and image carousels, the thing became a beast. We needed a change of approach.

## The solution
The issue was solved by storing the JavaScript instance to a data attribute on the DOM node it interacts with. When you want to talk to that specific instance, just query the DOM node to get the public functions of that instance.

## Instantiating
Put the name of the class as a data-attribute on the DOM node it interacts with:

{% highlight html %}
<span id="i_am_a_tooltip" data-widget="tooltip"></span>
{% endhighlight %}

A little [piece of JavaScript](#the_javascript) will query the document (or any other piece of html) for nodes that have the data-widget attribute. Once it finds them, it will try to instantiate the value of the data-widget attribute as a JavaScript class. If it the value actually is a function, it will add the instance as a data attribute to the DOM node with the name of the class. In case of the tooltip:

{% highlight html %}
data-tooltip="new tooltip()";
{% endhighlight %}

If the instance already exists for that nide it returns that one instead of instantiating a new version.
If you want to execute a funciton within that class do this: 

{% highlight js %}
var tooltipInstance = $('#i_am_a_tooltip').data('tooltip');
{% endhighlight %}

``` tooltipInstance ``` is now the specific class that has been attached to that DOM node.

## Options
The options the class needs are also applied as a data attribute on that same DOM node. Only the options you want to override are in the data-options attribute, keep the defaults in the class to not bloat the html. 

{% highlight html %}
<span data-widget="tooltip" data-options='{"text": "I am a tooltip"}'></span>
{% endhighlight %}


The nifty thing about a data-options attribute is that the backend can fill it up from it's page controller. No more issues with internationalisation and strings in your JavaScript.

## The JavaScript
bla