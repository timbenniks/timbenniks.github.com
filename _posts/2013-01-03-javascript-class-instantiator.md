---
layout: post
title: JavaScript Class Instantiator
description: A script that instantiates javascript classes by scanning the DOM nodes they are bound to by a data tag
keywords: strategy, javascript, architecture, instantiator, class, widget
kind: blog
permalink: /blog/javascript-class-instantiator
nav_url: /blog/
published: true
change_frequency: daily
priority: 0.5
metadata: 
- role: by
  name: Tim Benniks
- role: 'on'
  name: Github
  url: https://github.com/timbenniks/jsClassInstantiator
---

This piece of code makes instantiating JavaScript classes a breeze.
Get the [code](http://github.com/timbenniks/jsClassInstantiator) on Github. 

## Why
We mostly create highly dynamic websites with loads of JavaScript and little page reloads.
Contents get's added by ajax and DOM events are all over the place.

Keeping track of events and JavaScript that is bound to DOM nodes can be a pain when the html is big and new content is constantly loaded with ajax.

I created this script to avoid having to worry about the state of events and classes.

## How
The ClassInstantiator instantiates classes by scanning DOM nodes that have the `data-widget` tag.
It binds the instance of the widget it found to the DOM node that has the `data-widget` attribute.
Because the instance has been bound to the DOM node you just have to query the node to gain access to the public functions of the class.

The `data-widget` tag gives extra semantics to the html and also enables less technical people to add JavaScript to a new piece of html in an easy way. Just add `data-widget="tooltip"` and you are done.

The instantiator is not meant for classes that do not interact with the DOM.

## How to use

{% highlight html %}
<div class="my-awesome-html">
    <p>
        Some nice <span data-widget="tooltip" title="I am a tooltip">text</span> about something.
    </p>
</div>
{% endhighlight %}

{% highlight js %}
$(function($, ns)
{
    ns.ClassInstantiatorInstance = new ns.ClassInstantiator();

    // After your content / html has been loaded:
    ns.ClassInstantiatorInstance.scan($('.my-awesome-html'));

}(jQuery, window.NAMESPACE = window.NAMESPACE || {}));
{% endhighlight %}

### After an ajax call
When new content has been loaded into an html element, new nodes with the `data-widget` attribute could have been added. Rescan the element after the ajax call to instantiate new classes.

If the nodes already have an instance, the script will return that instance and will not create a new instance. If the instance does not exist the script will instantiate the class for that node.

### Adding options to instances
If you add `data-options` attribute to a node which has a `data-widget` attribute, the script will grab the contents of the `data-options` attribute and adds these as an object to the class it instantiates.

{% highlight html %}
<p>Some nice <span data-widget="tooltip" data-options='{"title":"I am a tooltip"}'>text</span> about something.</p>
{% endhighlight %}

Notice the single quotes around the object in the `data-options` attribute.

### Public functions
The ClassInstantiator provides four public functions. Check the source code to see which variables they need.
* `Scan` Scan for elements that contain data-widget and instantiate the widget that is associated to the element.
* `getWidgetBySelector` Get the widget instance for a DOM node
* `getWidgetsInContext` Get all widgets inside a DOM node
* `destroyWidget` Destroy the widget instance by calling the destroy function and by removing the data form the DOM node

### How your classes have to look
Your classes can be an object literal or a prototype, as long as they live in a namespace and have a public `destroy` function.

{% highlight js %}
(function($, ns)
{
    "use strict";

    ns.EXAMPLE_CLASS = function(element, options)
    {
        var el = $(element),

        init = function()
        {
            // Do init stuff here or bind an event.
        },

        privateFunction = function()
        {
            // I'm a private function
        },

        publicFunction = function()
        {
            // I'm a public function because I am returned at the bottom.
        },

        destroy = function()
        {
            // If events where bound, unbind them here.
        };

        init();

        return {
            destroy: destroy,
            publicFunction: publicFunction
        };
    };

}(jQuery, window.NAMESPACE = window.NAMESPACE || {}));
{% endhighlight %}

## Dependencies
jQuery