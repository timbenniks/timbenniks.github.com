---
layout: post
title: A strategy to instantiate javascript classes in a highly dynamic website
description: It's sometimes hard to keep track off the state of your JS instances in a dynamic website. This is a way to make that easier.
keywords: strategy, javascript, architecture
kind: blog
permalink: /blog/a-strategy-to-instantiate-javascript-classes-in-a-highly-dynamic-website
nav_url: /blog/
published: false
change_frequency: monthly
metadata: 
- role: by
  name: Tim Benniks
---

Imagine you have an endlessly-scrolling website that loads html with an ajax call every time you reach a certain point. This new html might have dom nodes that need the same kind of events attached as the already excisting nodes. This is a pain as the current event bindings do not work on new nodes yet.

You could solve this by creating a script that subscribes to the ajax complete event and then assigns the proper events to the dom nodes that where loaded by the ajax call.
This is complicated business when you have a lot of different dom nodes and different scripts listening to the ajax complete event. Next to it's complexity, live event binding is [quite slow](http://jsperf.com/jquery-live-vs-delegate-vs-on/23 "Live events are slow").

What if you do another ajax call? Does your browser remove the bindings it had on the dom that was replaced by the new nodes? And does it garbage-collect the now unused javascript instances? When building a big and highly dynamic website these questions have to be answered before you run into a big pile of shit while keeping strack of all bindings and states of your instances.

Wouldn't it be nice to have an automated approach for creating / removing instances and binding / unbinding of events on any dom node?

## The solution
The issue is solved by storing the javascript instance to a data attribute on the dom node it interacts with. When you want to talk to that specific instance, just query the dom node to get the public functions of that instance.

## How it works
A nice paragraph

## Instantiating
Put the name of the class as a data-attribute on the dom node it interacts with:

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

`tooltipInstance` is now the specific class that has been attached to that DOM node.

## Options
The options the class needs are also applied as a data attribute on that same DOM node. Only the options you want to override are in the data-options attribute, keep the defaults in the class to not bloat the html. 

{% highlight html %}
<span data-widget="tooltip" data-options='{"text": "I am a tooltip"}'></span>
{% endhighlight %}

The nifty thing about a data-options attribute is that the backend can fill it up from it's page controller. No more issues with internationalisation and strings in your JavaScript.

## The JavaScript
{% highlight js %}
var scanner: 
{
    getAttrToScan: function()
    {	
        return '[data-widget]';
    },
		
    createScanSelector: function(context)
    {
        return context.find(this.getAttrToScan());
    },
		
    scan: function(context)
    {
        this.scannedElements = this.createScanSelector(context);
		this.scannedElements.each($.proxy(function(index, element)
        {
            this.instantiate(element, $(element).data('widget'));	
		
		}, this));
    },
	
    instantiate: function(element, widgetName)
    {
        var instanceName = this.cleanUpInstanceName(widgetName);
		
        if(typeof instanceName === 'string')
        {
            return false;
        }

        if(!widgetName || typeof instanceName !== 'function')
        {
            return false;
        }

        var options = $(element).data('options') || {},
			existingWidget = $.data(element, widgetName),
		    instance;
		
        instance = existingWidget 
                || $.data(element, widgetName, new instanceName(element, options));
		
        if(typeof instance.destroy !== 'function')
        {
            throw(instance.widget + ' does not have a destroy function');
        }

        return instance;
    },
	
    cleanUpInstanceName: function(widgetName)
    {
        var parts = widgetName.split('.');
		
        switch(parts.length)
        {
            case 1: return ns[ parts[0] ];
            case 2: return ns[ parts[0] ] [ parts[1] ];
            case 3: return ns[ parts[0] ] [ parts[1] ] [ parts[2] ];
            case 4: return ns[ parts[0] ] [ parts[1] ] [ parts[2] ] [ parts[3] ];
			
            default: 
                throe('Cannot convert into a constructor');
        }
    }
},

getWidgetBySelector: function(selector, widget)
{
    return selector.data(widget);
},

getWidgetsInContext: function(context, widget)
{
    var widgets = [];
    context = context || $(document.body);
	
    context.find('[data-widget="'+ widget +'"]').each(function()
    {
        widgets.push(scanner.getWidgetBySelector($(this), widget));
    });
	
    return widgets;
},

destroyWidget: function(selector, widget)
{
    var widgetInstance = scanner.getWidgetBySelector(selector, widget);
	
    if(!widgetInstance)
    {
        return;
    }

    if(typeof widgetInstance.destroy === 'function')
    {
        widgetInstance.destroy();
    }
	
    $.removeData(selector[0], widget);
}
{% endhighlight %}