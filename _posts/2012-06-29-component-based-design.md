---
layout: post
title: Component based design
description: How to tackle the overhead of a large project team with a pattern called component based design.
keywords: developement, startegy, pattern
kind: blog
permalink: /blog/component-based-design
nav_url: /blog/
metadata: 
- role: by
  name: Tim Benniks
---

Since a year and a bit I have been working in a big multidisciplinary team. If we work on a global platform website a team usually includes a whole bunch of people: multiple designers, an art-director, a copywriter, 
an account manager, a project manager, a UI designer, a web-developer, multiple back-end developers, an analytics person, a QA, a technical architect and a technical delivery manager.

Working with such a large group of people is bound to generate overhead, even if the end result is usually good. In my experience people tend to work alongside each-other as they all have their own specialities and little islands of knowledge. Most disciplines have a different termonology and project approach. 

We need a process enhancement to kill as much communication overhead as possible.
I think the component based design pattern can help us with getting the basics right. 
With the groundwork in place we should have more time to tackle that hard twenty percent at the end of a project and go the extra mile with quality assurance.

I think that process enhancement is the component based design pattern.

## What I think component based design is

>Component based design is a pattern in which software (A website in this case) is composed of separate, interchangeable items by breaking down their functions into components, each of which accomplishes one function and contains everything necessary to accomplish this. Conceptually this represents a separation of concerns and improves maintainability by having no cross-dependencies between the components.

When creating a component based design, instead of creating a [monolithic application](http://en.wikipedia.org/wiki/Monolithic_application "Monolithic application") (where the smallest component is the whole), several smaller components are built separately that, when composed together, will construct the actual UI. These components have their own responsibilities and are reusable throughout the website.

If you design the component properly you only have to create it once and then reuse it all over the site. You can obviously tweak the styling and adapt the rules a bit according to the context the component is used in.

## This pattern is to be used by all disciplines.
You will benifit a lot if all disciplines know what components are needed to create the website. Communication will be easier when everybody knows what you are talking about when you say that the search filter section needs to go to the compact version when it is displayed after the masthead and while viewed on a small screen.

Have a big a whiteboard session at the beginning of your project and define what blocks you need. Then name them and define their rules and responsibilities.

### Benefits for the client
If the client understands the component pattern, they can easily prioritise certain components over others and have input on their behaviour just as easily as the web-developer or the QA lead.

For the clients' sake you can create a page with all components so they know what they have. This way they create their website like a puzzle. According to the components they can assign rules to where that are allowd to live so they can control how local market sites use them.

### Benefits for planning and issue / project tracking 
If you use a tool like [Jira](http://www.atlassian.com/jira "Jira issue and project tracking") you are in luck. You can define the components in there and assign them issues, userstories and estimates. Each component has a set of requirements.

## talk about:
* Client perspecitive
	* Naming conventions
	* Knowing what they have
	* Easily create a page with known components (cheap and easy)
* Development (web-dev and back-end)
	* Naming conventions
	* Per component CSS / Javascript / lazy loading
	* Per component model / view / controller
	* Per component translations
	* Component based CMS perhaps?
	* Analytics per component
	* Architecture and support documents are now based on the components and their rules.
* QA
	* Unit tests
	* Per component testing
* Jira
	* Components in jira
	* Per component issues
	* Per component requirements
	* A sprint is developing groups of components.
	* Per component estimates (also nice for project management).
* UI 
	* The same naming conventions and rules of usage.
	* Match Jira requirements and user stories
	* The basic rules are defined in this discipline
* Designers
	* Design according to components
	* Style guide is just a collection of components with their rules written down
	* Use software that can include components e.g. fireworks

### General pro's:
* HTML 5 semantics fit this model really well.
* You can easily make a page with all components on it.
* Pro communication in between disciplines.

### Considerations:
* Takes more time to kick-off.
* Semantics and naming is hard (needs to work cross disciplines).
* All disciplines need to understand the pattern and need to be willing to change their way of working.