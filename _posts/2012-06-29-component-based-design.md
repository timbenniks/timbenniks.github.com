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

Since a year and a bit I have been working in a big multidisciplinary team. When we work on a big website the team consists of a whole bunch of people. We have multiple designers, an art-director, a copywriter, 
an account manager, a project manager, a UI designer, a web-developer, multiple back-end developers, an analytics specialist, a QA, a technical architect and a technical delivery manager and sometimes an information analyst and a strategy person. 

Working with such a large group of people is bound to generate overhead, even if the end result is usually good. In my experience people tend to work alongside each-other as they all have their own specialities and little islands of knowledge. Most disciplines have a different terminology and project approach. All information ends up in huge spread sheets and epic word documents. 

We need a process enhancement to kill as much communication overhead as possible.
I think the component based design pattern can help us with getting the basics right.
With the groundwork in place we should have more time to tackle that hard twenty per cent at the end of a project and go the extra mile with quality assurance and strategy.

I think that process enhancement is the component based design pattern.

## What I think component based design is

>Component based design is a pattern in which software (A website in this case) is composed of separate, interchangeable items by breaking down their functions into components, each of which accomplishes one function and contains everything necessary to accomplish this. Conceptually this represents a separation of concerns and improves maintainability by having no cross-dependencies between the components.

When creating a component based design, instead of creating a [monolithic application](http://en.wikipedia.org/wiki/Monolithic_application "Monolithic application") (where the smallest component is the whole), several smaller components are built separately that, when composed together, will construct the actual UI. These components have their own responsibilities and are reusable throughout the website.

If you design the component properly you only have to create it once and then reuse it all over the site. You can obviously tweak the styling and adapt the rules a bit according to the context the component is used in.

## This pattern is to be used by all disciplines, at all times. 
You will benefit a lot if all disciplines know what components are needed to create the website. Communication will be easier when everybody knows what you are talking about when you say that the search filter section needs to go to the compact version when it is displayed after the masthead and while viewed on a small screen.

Have a big a whiteboard session at the beginning of your project and define what blocks you need. Then name them and define their rules and responsibilities.

### Benefits for the client
If the client understands the component pattern, they can easily prioritise certain components over others and have input on their behaviour just as a developer or a project manager could.

For the clients' sake you can create a page with all components so they know what they have. This way they create their website like a puzzle. According to the components they can create access control ruls per component so any agency can create a webpage without stuff breaking.

### Benefits for planning and issue / project tracking 
If you use a tool like [Jira](http://www.atlassian.com/jira "Jira issue and project tracking") you are in luck. You can define the components in there and assign them issues, user stories and estimates. Each component has a set of requirements. When you plan a sprint, you just add a bunch off components to create a user journey and you are done.

### Benefits for the QA department
Because we are dealing with components that have their own rules and responsibilities defined the QA person can run his testscripts against just one component. When you make each component reachable by a url, automatic testing gets a lot easier. Next to this, test scripts can be categorized by component and matched to Jira issues and user stories.

## TODO
* Development (web-dev and back-end)
	* Naming conventions
	* Per component CSS / JavaScript / lazy loading
	* Per component model / view / controller
	* Per component translations
	* Component based CMS perhaps?
	* Analytics per component
	* Architecture and support documents are now based on the components and their rules.
	* unit tests per component
* UI 
	* The same naming conventions and rules of usage.
	* Match Jira requirements and user stories
	* The basic rules are defined in this discipline
* Designers
	* Design according to components
	* Style guide is just a collection of components with their rules written down
	* Use software that can include components e.g. fireworks

### Considerations:
* Takes more time to kick-off.
* Semantics and naming is hard (needs to work cross disciplines).
* All disciplines need to understand the pattern and need to be willing to change their way of working.
