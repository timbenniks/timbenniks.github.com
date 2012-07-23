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

In this article I am trying to find a solution for overhead created by a big team during the build of a website. 
I think the component based design pattern can help us to be more agile. 

Since a year and a bit I have been working in a big multidisciplinary team. If we work on a global platform website 
a team usually includes a whole bunch of people: multiple designers, an art-director, a copywriter, 
an account manager, a project manager, a UI designer, a web-developer, multiple back-end developers, 
an analytics person, a QA, a technical architect and a technical delivery manager.

Working with such a large group of people is bound to generate overhead, even if the end result is usually good.
In my experience people tend to work alongside each-other as they all have their own specialities and little islands of knowledge. The differenct disciplines all have a different termonology and a different project approach.

We need a process enhancement to kill as much communication overhead as possible.
I think the component based design pattern can help us with getting the basics right. 
With the groundwork in place we hopefully have more time to tackle that hard last twenty percent of 
a project and go the extra mile with quality assurance. 

What I think Component Based Design is
--------------------------------------

>Component based design is a pattern in which software (website, app, UI, design) is composed of separate, interchangeable items by breaking down their functions into components, each of which accomplishes one function and contains everything necessary to accomplish this. Conceptually this represents a separation of concerns and improves maintainability by having no cross-dependencies between the components.

When creating a component based design, instead of creating a [monolithic application](http://en.wikipedia.org/wiki/Monolithic_application "Monolithic application") (where the smallest component is the whole), several smaller components are built separately that, when composed together, will construct the actual UI. These components have their own responsibilities and are reusable throughout the website.

If you look at a website using a helicopter view, you will spot many elements that are used over and over again. Carousels, forms or video players usually have the same semantic values but look a little different depending on the context in which they live.

How it all works
---------------------

As a group components create a webpage. On their own a component has it's own rules and naming convention. Each component is responsible for it's own functionality and styling and is not to communicate with other components. This way a component can live anywhere and according to it's context it can respond to the context it is living in.

PRO'S
* re-usability of elements.
* easy prototyping.
* cross-discipline use of components (UI, visual design, web-development, back-end development).  
* proper naming conventions (all disciplines will understand what component of the site you talk about).
* re-use earlier developed components to easily build new ones.
* clients know what kind of components they have and can choose which to put what page.
* html5 semantics fit this model really well.
* you can do lazy loading of javascript according to the components that are loaded onto the page.
* you can easily make a page with all components on it. 
* Nice for art-direction.
* styleguide is automagically

CONS / CONSIDERATIONS
* photoshop will no longer work. Something more abstract is needed (e.g. fireworks).
* Web-developers need to make all components stand-alone so they work in all contexts.
* Semantics and naming is hard (needs to work cross disciplines).
* All disciplines need to understand the pattern and need to be willing to change their way of working.