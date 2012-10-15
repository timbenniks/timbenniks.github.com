---
layout: post
title: A pragmatic approach to accessibility
description: With many highly dynamic websites popping up and the new HTML5 document outline, accessibility is very important, but also very difficult.
keywords: Accessibility
kind: blog
permalink: /blog/a-pragmatic-approach-to-accessibility
nav_url: /blog/
published: true
change_frequency: monthly
metadata:
- role: by
  name: Tim Benniks
---

##I can't keep it in, I need to rant a little.
Time and time again I see websites with bad accessibility. 
By bad accessibility I mean seeying a white screen when turning of javascript
or when `outline: 0` is set to focusable elements so keyboard navigation is disabled.

It seems like fancy stuff is more important to a site owner then a website that can 
handle browsers for the visually challenged or users with JavaScript disabled.
Even if these users are not of interest (which is the case for many websites) 
then at least do it so the code is maintainable and suitable for future devices and technologies.

Where has the content first approach gone? A developer should not fight the browser while coding.
Just make stuff fit into the standards and keep it simple. 
If that isn't enough, enhance according to the features the browser offers. 

Quit creating fancy stuff and degrade for less capable browsers. 
This makes things more complicated and there is a big change you forget to 
create custom javascript code to make the website accessible.

##Enough is enough. Take a deep breath.
Let's talk about a couple of simple things you can do to make a websote more accessible.

* Document outline
	- Semantics
	- WAI-ARIA landmarks (aria-labelledby, aria-described-by)
	- tabindex = -1 for tab flow.
* Focus
	- forms
	- keyboard navigation
	- outline styles
* `<iframe role="presentation" tabindex="-1"></iframe>`
* No JavaScript version
* Scalability of content (responsive design)
* Content first approach
* sources: http://yaccessibilityblog.com, http://yaccessibilityblog.com/library/test-aria-focus-bookmarklets.html
