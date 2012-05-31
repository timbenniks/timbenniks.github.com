module Jekyll

  class ImageTag < Liquid::Tag
    
    def initialize(tag_name, markup, tokens)
       @input = markup.split('][')
       @src = @input[0]
       @caption = @input[1]
       
       super
    end

    def render(context)
      "<figure>
          <img src=\"#{@src}\" title=\"#{@caption}\">
      	  <figcaption>#{@caption}</figcaption>
      </figure>"
    end
  end
end

Liquid::Template.register_tag('img', Jekyll::ImageTag)