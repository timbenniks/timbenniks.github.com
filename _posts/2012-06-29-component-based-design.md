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

Since I work at [AKQA](http://www.akqa.com) I work in a big multidisciplinary team. When we build a typical website the team consists of a whole bunch of people. We have multiple designers, an art-director, a copywriter, 
an account manager, a project manager, a UI designer, a web-developer, multiple back-end developers, an analytics specialist, a QA, a technical architect and a technical delivery manager and sometimes an information analyst and a strategy person. 

Working with such a large group of people is bound to generate overhead due to communication issues. In my experience disciplines tend to work alongside each-other as they all have their own terminology. And in the end all information ends up in huge spread sheets or epic word documents. 

To be more flexible and agile we need to kill as much communication overhead as possible.
I think the component based design pattern can help us with getting the basics right.
With the groundwork in place we should have more time go the extra mile with quality assurance and innovation.

## What I think component based design is

>Component based design is a pattern in which software (A website in this case) is composed of separate, interchangeable items by breaking down their functions into components, each of which accomplishes one function and contains everything necessary to accomplish this. Conceptually this represents a separation of concerns and improves maintainability by having no cross-dependencies between the components.

When creating a component based design, instead of creating a [monolithic application](http://en.wikipedia.org/wiki/Monolithic_application "Monolithic application") (where the smallest component is the whole), several smaller components are built separately that, when composed together, will construct the actual UI. These components have their own responsibilities and are reusable throughout the website.

If a component has been designed properly it can be reused all over the website. Styling and behavior could be tweaked according to the context the component lives in. The beauty is that you only have to create a component once.

## The pattern is to be used by all disciplines, at all times. 
You will benefit if all disciplines know which components are needed to create a website. Communication will be way easier when everybody uses the same terminology and semantics while talking about the project.

Have a big a whiteboard session at the beginning of your project and define what blocks you need. Then define their rules and responsibilities and give the components logical names.

The UI designer or information architect is the one responsible for documenting what was written on the whiteboard. The content of the document should also match (or dictate) the [issue tracker's](#benefits_for_planning_and_issue_and_project_tracking) user stories, acceptance criteria and requirements per component.

### Clients
If the client understands the component pattern, they can easily prioritize certain components over others and have input on their behavior just like a developer or a project manager could.

For the clients' sake you can create a page with all components so they know what they have. This way they create their website like a puzzle. According to the components they can create access control ruls per component so any agency can create a webpage without stuff breaking.

### Planning, issue- and project tracking 
If you use a tool like [Jira](http://www.atlassian.com/jira "Jira issue and project tracking") you are in luck. You can define the components in there and assign them issues, user stories and estimates. Each component has a set of requirements. When you plan a sprint, you just add a bunch of components to create a user journey and you are done.

### QA department
Because we are dealing with components that have their own rules and responsibilities defined the QA person can run his test scripts against just one component. When you make each component reachable by a url, automatic testing gets a lot easier. Next to this, test scripts can be categorized by component and matched to Jira issues and user stories.

### Designers
In Photoshop you can design the components as smart objects. To create a page you only have to import the smart objects and arrange them properly. Once you change the design of a smart object it is updated on all places where the smart object has been used.

Next to the smart object awesomeness, a style guide is very easy to create. Just create in file on which you include all smart objects.

### Developers
Component based design is [not a new thing](http://en.wikipedia.org/wiki/Component-based_software_engineering) for developers. Components without dependencies on other components are easy to reuse and maintain. As they define their own responsibilities and use proper naming conventions they should be very understandable.

Components have their own model, view and controller in both back-end and front-end. Next to that they get their own unit-tests, CSS file(s), JavaScript file(s), translations and analytics tracking.

## Considerations
It takes more time before you get to do some actual coding or designing when you work this way. I can imagine people wanting to jump in and kick off. I suggest using prototypes to validate your ideas and from there define the components.

Semantics are hard. You have to make sure stuff has been named properly otherwise you might have to rework things later on in the project. Naming is also difficult across disciplines as they all use different naming conventions.

And last but not least, everybody in the team has to be on board with this way of working. If they don't quite get it communication is difficult again and the overhead is back. 