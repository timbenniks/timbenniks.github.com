---
layout: post
title: A pragmatic approach to accessibility
description: With many highly dynamic websites popping up and the new HTML5 document outline, accessibility is very important, but also very difficult.
keywords: Accessibility
kind: blog
permalink: /blog/a-pragmatic-approach-to-accessibility
nav_url: /blog/
published: false
change_frequency: monthly
metadata:
- role: by
  name: Tim Benniks
---

##Talk about

* Why write about this
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

##Why write about this?
Time and time again I see websites going live with bad accessibility. 
By bad accessibility I mean turning of javascript and seeing a white page without any content or 
not being able to navigate the site by keyboard because `outline: 0` is set to focusable elements.

It seems like dynamic stuff and animations are more important to a brand then a website that can 
handle browsers for the visually challenged, people with a slow connection or users with JavaScript disabled.
Even if these user are not of interest (which very well could be the case for many websites) then at least do it so the code is maintainable for future technologies 
and new devices that will no doubt appear.