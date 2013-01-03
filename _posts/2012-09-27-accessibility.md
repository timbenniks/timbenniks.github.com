---
layout: post
title: A pragmatic approach to accessibility
description: This post provides a bunch of tricks to make your website more accessible.
keywords: Accessibility
kind: blog
permalink: /blog/a-pragmatic-approach-to-accessibility
nav_url: /blog/
published: false
change_frequency: daily
priority: 0.5
metadata:
- role: by
  name: Tim Benniks
---

##Ranting needed...
Time and time again I see websites with bad accessibility.
By bad accessibility I mean seeying a white screen when turning of javascript
or when `outline: 0` is set to focusable elements.

It seems like fancy stuff is more important to a site owner then a website that can
handle browsers for the visually challenged or users with JavaScript disabled.
Even if these users are not of interest (which is the case for many websites)
then at least do it so the code is maintainable and suitable for future devices and technologies.

A developer should not fight the browser while coding.
Just make stuff fit into the standards and keep it simple.
If that isn't enough, enhance according to the features the browser offers.

Simple things like adding focus to a dialog popup makes it keyboard friendly instanly.
An awesome quick-win I hardly ever see.

Quit creating fancy stuff that degrades down for less capable browsers.
This requires more code and there is a big chance you forget about accessibility because the complicated process of writing code that degrates consumed all your time in the first place.
Use [progressive enhancement](http://www.alistapart.com/articles/understandingprogressiveenhancement/) instead.

I think we need an approach in which we make the accessibility of content most important. This includes designing for small screens first as it's way easier to upscale layout than to compress it. It also makes you focus on content first.

##Enough ranting for now.
Let's talk about a couple of simple adjustments you can make to enhance the accessibility of your website.

### Document outline
 * html5 outline
 * backward compatability with html4
 * go oldschool or use WAI-ARIA landmarks (aria-labelledby, aria-described-by)
 * tab flow (tabindex)

### Accessible content
 * forms
 * keyboard navigation
 * outline styles
 * images

### Tools and sources
 * http://yaccessibilityblog.com
 * http://yaccessibilityblog.com/library/test-aria-focus-bookmarklets.html
