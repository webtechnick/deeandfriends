# Project specific notes:
# We need to install the HTML5 boilerplate gem so our source can work with that
# run at the prompt: `gem install compass-h5bp`
# If there is ever an update to HTML 5 Boilerplate, simply run: `gem update compass-h5bp`
# See H5BP project: https://github.com/sporkd/compass-h5bp

#http_path = "/"
css_dir = "css"
sass_dir = "sass"
images_dir = "img"
javascripts_dir = "js"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed

# development
# output_style = :nested
# production
output_style = :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
#line_comments = false
line_comments = true

preferred_syntax = :sass
