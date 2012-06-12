---
layout: post
title: A strategy to instantiate javascript classes in a highly dynamic website
description: It is sometimes hard to keep track off the state of your JS instances. In this article I attempt to make that easier.
keywords: strategy, javascript, architecture
kind: blog
permalink: /blog/a-strategy-to-instantiate-javascript-classes-in-a-highly-dynamic-website
nav_url: /blog/
metadata: 
- role: by
  name: Tim Benniks
---

Imagine you have an endless scrolling website that loads dynamic data every time you reach a certain point.
This data contains chunks of html that have javascript events attached to them to do certain actions.

When loaded by ajax, these events have to be re-bound to the DOM nodes. 
Creating one instance of a class that listenes to all ajax calls and finds the proper DOM nodes to attach the events to is quite slow.