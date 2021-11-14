const generatedHead = () => `<meta charset="utf-8">
<title>Syle Guide Boilerplate</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#000000">

<!-- Style Guide Boilerplate Styles -->
<link rel="stylesheet" href="css/sg-style.css">
<!--[if lt IE 9]><link rel="stylesheet" href="css/sg-style-old-ie.css"><![endif]-->

<!-- https://github.com/sindresorhus/github-markdown-css -->
<link rel="stylesheet" href="css/github-markdown.css">

<!-- Replace below stylesheet with your own stylesheet -->
<link rel="stylesheet" href="css/style.css">

<!-- prism Syntax Highlighting Styles -->
<link rel="stylesheet" href="vendor/prism/prism.css">

<!-- TODO Add custom head injection -->`;

module.exports = generatedHead;