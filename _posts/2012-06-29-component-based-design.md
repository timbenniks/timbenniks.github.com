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

Since a year or so I have been working in a big multidisciplinary team. If we work on a global platform website 
a team usually includes: multiple designers, an art-director, a copywriter, 
an account manager, a project manager, a UI designer, a web-developer, multiple back-end developers, 
an analytics person, a QA, a technical architect and a technical delivery manager.

Even though our results are always good, I feel like something is going wrong. We tend to work alongside 
each-other rather than with each-other. We all seem to have our specialities and little islands of knowledge. 
In such a big team, overhead is inevitable, even if the team consists of extremely talented individuals. 
To make up for lost time we have to put in a lot of extra effort to make the deadline.

We need a process enhancement to kill as much overhead as possible so we can become more agile. 
I think the component based design pattern can help us with getting the basics right. 
With the groundwork in place we hopefully have more time to tackle that hard last twenty percent of 
a project and go the extra mile with quality assurance. 

Definition of component based design (in my words)
------------------------------------

>Component based design is a pattern in which software (website, app, UI, design) is composed of separate, interchangeable items by breaking down their functions into components, each of which accomplishes one function and contains everything necessary to accomplish this. Conceptually this represents a separation of concerns and improves maintainability by having no cross-dependencies between the components.


When creating a component based design, instead of creating a monolithic application (where the smallest component is the whole), several smaller components are built separately that, when composed together, will construct the actual UI. These components have their own responsibilities and are reusable throughout the website.

If you look at a website using helicopter view, you will spot many elements that are used over and over again. Lists, images with caption, call to action buttons or media players will usually have the same semantic values but look a little different across the website.

Applied to creating a website
-----------------------------

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