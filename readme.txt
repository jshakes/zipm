Either:

Shortcode outputs a link to '/thepost/getfiles' (will need to add some kind of permalink thing for this to work)
The script we get link to will run the zipping functionality and output the file

Or:

Shorcode outputs a link with javascript bound to it that AJAXes the script, shows a loading gif while the file is being generated, then starts download

Then:

If caching is turned on, save the zip (in the uploads folder?), otherwise trash it (how will we know when user is finished downloading it?)