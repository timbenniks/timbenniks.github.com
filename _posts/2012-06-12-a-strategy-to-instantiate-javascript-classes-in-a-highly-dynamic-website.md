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

We came across this exact issue in a recent project. Without page reloads and ever growing interactive content like parallax elements, video players, customized Omniture (a google analytics like beast) it became clear that our initial approach 

















