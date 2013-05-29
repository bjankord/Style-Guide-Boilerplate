Style-Guide-Boilerplate
=======================

A starting point for crafting web style guides.

[View Demo](http://brettjankord.com/projects/style-guide-boilerplate/)

*Note: Sample patterns have been included in the demo. Your site will have it's own unique patterns.*


## How to use Style Guide Boilerplate

### Download the Style Guide Boilerplate
You can clone the repo, fork the repo, or download the zip file for the repo from GitHub.
Once you have the files for **Style Guide Boilerplate**, you'll create a place on your site for them.

### Set up a directory on your site for the style guide
I recommend creating a directory on your site in your root directory named `style-guide`. Really this folder can be anywhere, though I think it would be awesome if I could go to `anysite.com/style-guide/` and check out that site's style guide.

### Upload the Style Guide Boilerplate files
**Style Guide Boilerplate** is PHP based so you will need a server that supports PHP. Just upload the files from the GitHub repo to your newly created directory and your almost done.

### Hook up your own CSS into the style guide
In the `<head>` of **Style Guide Boilerplate** are custom styles for the boilerplate itself. These have all been prefixed with sg- so they hopefully shouldn't cause any conflicts with your website's own styles.

Below the custom styles for the boilerplate, you will add in your own custom stylesheet(s) which you use on your live site.

    <!-- Style Guide Boilerplate Styles -->
    <link rel="stylesheet" href="css/sg-style.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="css/sg-ie.css"><![endif]-->
	  
    <!-- Replace below stylesheet with your own stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    
    
### Review your live site CSS
You should be able to go to `yoursite.com/style-guide/` and see how your live site's CSS affects base elements.
The last step is creating your sites custom patterns/modules.

### Create custom patterns
To create custom patterns like buttons, breadcrumbs, alert messages, etc., create a new .html file and add your HTML markup into the file.

Save the file as `pattern-name.html` into the `markup/patterns` directory inside of your `style-guide` directory.

You should now be able to see the new patterns at `yoursite.com/style-guide/`


## About The Boilerplate

### Intro

At the top of the style guide is place to add your own comments/documentation about your style guide.

### Colors
This section is for you to add the colors you use throughout your site. This is great to keep track of things like link colors, backgrounds, etc. and make sure they are consistent.

Below is the markup used for the color samples. Feel free to edit it as needed.

    <ul class="sg-colors">
      <li class="sg-color--a"><span></span></li>
      <li class="sg-color--b"><span></span></li>
      <li class="sg-color--c"><span></span></li>
      <li class="sg-color--d"><span></span></li>
      <li class="sg-color--f"><span></span></li>
    </ul>

I would recommend adding styles in your main stylesheet for the markup above so that your colors are all in one place. If you update the colors you are using on your site, you wouldn't have to update a separate file for your style guide. If you are using a CSS preprocessor, this is a great place to use color variables.

The CSS used to style the color blocks is included in this repo's default style.css. `css/style.css`

### Font Stacks
This section is for listing out all of the font stacks used on the site. It's a great way to see all the current fonts in use on the site at a glance. As with the colors, I would include the styles for the font stack markup in your main stylesheet to keep things DRY. When you update your fonts in your main stylesheet, it will be easier to adjust your styleguide.

The markup for the font stacks looks like:

    <div class="sg-font-stacks-mod">
      <h2>Font Stacks</h2>
      <div class="sg-font sg-font--a">Ubuntu, sans-serif</div>
      <div class="sg-font sg-font--b">Vollkorn, serif</div>
      <div class="sg-font sg-font--c">HelveticaNeue, Helvetica, Arial, sans-serif</div>
    </div><!--/.sg-font-stacks-mod-->

### Folder Structure
 
There are two parts to the styleguide. Base styles and pattern styles. Inside the root directory is a folder named **markup**. In here are the folders for your markup snippets for base styles and pattern styles. Whatever **.html** files you add in to these folders will show up in the style guide.
 
#### Base
Base styles are for your base elements. Here you will have default styles for things like H1s-H6s, Blockquotes, Tabular Data, etc.

#### Patterns
Pattern styles are for your modular pieces of markup. Here you will have things like pagination, buttons, alerts, etc. Though you may also have custom styles for your base elements like your H1s-H6s, Blockquotes, Tabular Data, etc.

## Browser Support
The Style Guide Boilerplate has been tested in the latest stable version of Chrome, Firefox, Safari, Opera. It has also been tested IE6+. Aside from the menu not showing in IE8 or lower, the boilerplate is functional and usable in oldIE. It's also been tested on a handful of mobile devices. If you come across an browser rendering bug, or have any other issues with the boilerplate, please open an issue here on GitHub.


## Additional Resources
[Front-end Style Guides](http://24ways.org/2011/front-end-style-guides/)

[Front-end Style Guide Roundup](https://gimmebar.com/collection/4ecd439c2f0aaad734000022/front-end-styleguides)

[Future-Friendly Style Guides](https://speakerdeck.com/lukebrooker/future-friendly-style-guides)

[HTML KickStart](http://www.99lime.com/elements/)

[Oli.jp Style Guide](http://oli.jp/2011/style-guide/)

[Jeremy Keith's Pattern Primer](http://adactio.com/journal/5028/)

[Paul Robert Llyod's Style Guide](http://www.paulrobertlloyd.com/about/styleguide/)

[Pears](http://pea.rs/)

[Starbucks Style Guide](http://www.starbucks.com/static/reference/styleguide/)

## Credit
Thanks to: 

Jeremy Keith for letting me build on top of [Pattern Primer](https://github.com/adactio/Pattern-Primer).

Dustin Diaz for the [domready](https://github.com/ded/domready) code.

[Highlight.js](http://softwaremaniacs.org/soft/highlight/en/) for syntax highlighting in the code blocks.

## Licensing 
**Style Guide Boilerplate** is licensed under the [MIT License](http://en.wikipedia.org/wiki/MIT_License)

Use it, build upon it, make awesome shit with it.
